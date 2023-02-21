<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    public function types()
    {
        return $this->belongsTo(Type::class);
    }

    public function utilisateurs()
    {
        return $this->belongsToMany(Utilisateur::class,'participation','activites_id','utilisateurs_id');
    }
    use HasFactory;
}
