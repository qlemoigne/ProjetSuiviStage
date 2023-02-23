<?php

namespace App\Http\Controllers;

use App\Helpers\IdentificationHelper;
use App\Models\Activite;
use App\Models\Utilisateur;

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
            
            echo session('MAIL');
            //return view('accueil', ['menus' => $this->getMenus(), 'activites'=> $activites, 'utilisateurs'=>$utilisateurs, 'utilisateur'=>$utilisateur]);
            return view('event', ['menus' => $this->getMenus(), 'activite'=> $activite]);
        }
        else{
            return view('error', ['menus' => $this->getMenus(), 'message' => $error]);
        }
    }
    
}