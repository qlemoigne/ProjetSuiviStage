<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Activite;
class Utilisateur extends Model
{
    public function activites()
    {
        return $this->belongsToMany(Activite::class,'participation','utilisateurs_id','activites_id');
    }

    public function etape(){
        return $this->hasMany(Etape::class,'validation','utilisateurs_id','etapes_id');
    }
    use HasFactory;
}
