<?php

namespace App\Http\Controllers;
use App\Models\Activite;
use App\Models\Utilisateur;
class Controllerbase extends Controller
{
    public function index(){

        $activites = Activite::all();
        $utilisateurs =Utilisateur::all();
        return view('index',['activites'=> $activites],['utilisateurs'=>$utilisateurs]);
    }
   
}