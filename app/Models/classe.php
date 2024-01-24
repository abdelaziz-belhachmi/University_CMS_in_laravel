<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    use HasFactory;


    public function filiere() {
        return $this->belongsTo(filiere::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
    
}
