<?php

namespace App\Http\Controllers;

use App\Helpers\IdentificationHelper;
use App\Models\Activite;
use App\Models\Utilisateur;
use App\Models\Etape;
use App\Models\Validation;
use App\Models\Cloture;

class IndexController extends SuiviController
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

}