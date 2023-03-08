<?php

namespace App\Http\Controllers;

use App\Helpers\IdentificationHelper;
use App\Models\Activite;
use App\Models\Utilisateur;
use App\Models\Etape;
use App\Models\Validation;
use App\Models\Cloture;

class changementEtatController extends SuiviController
{
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
    
}