<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filiere extends Model
{
    use HasFactory;



    public function departement() {
        return $this->belongsTo(Departement::class);
    }

    public function chefFiliere() {
        return $this->hasOne(Chef_filiere::class);
    }



}
