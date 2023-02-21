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
            $utilisateurs = Utilisateur::all();
            echo session('MAIL');
            return view('index', ['menus' => $this->getMenus(), 'activites'=> $activites, 'utilisateurs'=>$utilisateurs]);
        }
        else{
            return view('error', ['menus' => $this->getMenus(), 'message' => $error]);
        }
    }
    
}