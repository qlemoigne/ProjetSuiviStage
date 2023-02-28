<?php

namespace App\Http\Controllers;

use App\Helpers\IdentificationHelper;
use App\Models\Activite;
use App\Models\Utilisateur;
use App\Models\Etape;
use App\Models\Validation;

class Controllerbase extends SuiviController
{
    public function index(){
        //$error = IdentificationHelper::identification($this->appli);
        if (empty($error)){
            $activites = Activite::all();
            $utilisateur = Utilisateur::find(1);
            $utilisateurs = Utilisateur::all();
            $utilisateurs = $utilisateurs->where('id','!=',$utilisateur->id);
            $activite = Activite::find(1);
        
            return view('accueil', ['menus' => $this->getMenus(), 'activites'=> $activites, 'utilisateurs'=>$utilisateurs, 'utilisateur'=>$utilisateur]);
        }
        else{
            return view('error', ['menus' => $this->getMenus(), 'message' => $error]);
        }
    }
    public function activite($id){
        $utilisateur = Utilisateur::find(1);
        $activite = Activite::find($id);
        $etapes = Etape::all()->where('types_id','=',$activite->types_id);
        $date=$activite->debut;
        $validation = Validation::all()->where('utilisateurs_id','=',$utilisateur->id)->where('activites_id',"=",$activite->id);
        return view('event', ['menus' => $this->getMenus(), 'activite'=> $activite, 'etapes'=> $etapes, 'date'=> $date, 'validation'=>$validation]);
    }
    
}