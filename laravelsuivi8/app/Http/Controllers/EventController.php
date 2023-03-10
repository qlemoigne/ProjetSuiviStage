<?php

namespace App\Http\Controllers;

use App\Helpers\IdentificationHelper;
use App\Models\Activite;
use App\Models\Utilisateur;
use App\Models\Etape;
use App\Models\Validation;
use App\Models\Cloture;

class EventController extends SuiviController
{
    public function index(){
        //$error = IdentificationHelper::identification($this->appli);
        if (empty($error)){

            $activites = Activite::all(); 
            $utilisateur = Utilisateur::find(1); // Utilisateur en cours

            $utilisateurs = Utilisateur::all(); // Ensemble de tout les utilisateurs
            $utilisateurs = $utilisateurs->where('id','!=',$utilisateur->id); // Eviter le doublon utilisateur 
        
            return view('accueil', ['menus' => $this->getMenus(), 'activites'=> $activites, 'utilisateurs'=>$utilisateurs, 'utilisateur'=>$utilisateur]);
        }
        
        else{
            return view('error', ['menus' => $this->getMenus(), 'message' => $error]);
        }
    }
    public function activite($id){

        $utilisateur = Utilisateur::find(1);
        $activite = Activite::find($id);
        $cloture = Cloture::where('activites_id','=',$id)->first();
        $etapes = Etape::all()->where('types_id','=',$activite->types_id);
        $date=$activite->debut;
        $validation = Validation::all()->where('utilisateurs_id','=',$utilisateur->id)->where('activites_id',"=",$activite->id);
        return view('event', ['menus' => $this->getMenus(), 'activite'=> $activite, 'etapes'=> $etapes, 'date'=> $date, 'validation'=>$validation,'cloture'=>$cloture]);
    }

    public function changementEtat(){
        header('Content-type: application/json');
        echo json_encode($_POST['id']);
        $validation= Validation::find($_POST['id']);
        if($validation->status==0){
            $validation->status=1;
            $validation->save();
        }
        else{
            $validation->status=0;
            $validation->save();   
        }
    }

    public function cloture(){
        echo json_encode($_POST['id']);
        $cloture= Cloture::find($_POST['id']);
        if($cloture->status==0){
            $cloture->status=1;
            $cloture->save();
        }
        else{
            $cloture->status=0;
            $cloture->save();   
        }
    }
    
}