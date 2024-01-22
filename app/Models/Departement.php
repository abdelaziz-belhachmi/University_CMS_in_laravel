<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'Code_departement',
        'Nom_departement',
        'Description',
    ];

    public function filieres() {
        return $this->hasMany(filiere::class);
    }

    public function chefDepartement() {
        return $this->hasOne(Chef_Departement::class);
    }
    
}
