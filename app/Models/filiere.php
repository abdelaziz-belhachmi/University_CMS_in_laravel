<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'Code_filiere',
        'Nom_filliere',
        'description',
        'departement_id'
    ];


    public function departement() {
        return $this->belongsTo(Departement::class);
    }

    public function chefFiliere() {
        return $this->hasOne(Chef_filiere::class,'filieres_id', 'id');
    }

    public function classes() {
        return $this->hasMany(classe::class);
    }
    
    public function users()
    {
        return $this->hasManyThrough(User::class, classe::class);
    }


}
