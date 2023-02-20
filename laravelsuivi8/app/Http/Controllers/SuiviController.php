<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuiviController extends Controller
{
    public function __construct(){
        $this->appli = '4';
    }

    public function getMenus(){
        return session("MENU_".$this->appli);
    }
}
