<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;

    protected $fillable = ['visiteur', 'etudiants', 'professeurs', 'chef_departement', 'chef_filliere', 'chef_service'];


    public function annonce()
    {
        // return $this->belongsTo(Annonce::class);
        return $this->hasMany(Annonce::class, 'audience_id');


    }
}
