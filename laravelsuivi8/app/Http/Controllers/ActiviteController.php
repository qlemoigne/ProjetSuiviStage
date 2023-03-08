<?php

namespace App\Http\Controllers;

use App\Helpers\IdentificationHelper;
use App\Models\Activite;
use App\Models\Utilisateur;
use App\Models\Etape;
use App\Models\Validation;
use App\Models\Cloture;

class ActiviteController extends SuiviController
{
    public function activite($id){

        $utilisateur = Utilisateur::find(1);
        $activite = Activite::find($id);
        $cloture = Cloture::where('activites_id','=',$id)->first();
        $etapes = Etape::all()->where('types_id','=',$activite->types_id);
        $date=$activite->debut;
        $validation = Validation::all()->where('utilisateurs_id','=',$utilisateur->id)->where('activites_id',"=",$activite->id);
        return view('event', ['menus' => $this->getMenus(), 'activite'=> $activite, 'etapes'=> $etapes, 'date'=> $date, 'validation'=>$validation,'cloture'=>$cloture]);
    }
}