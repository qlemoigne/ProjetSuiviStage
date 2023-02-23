<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    public function types()
    {
        return $this->belongsTo(Type::class);
    }
    use HasFactory;
}
