<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_classe',
    ];

    public function filiere() {
        return $this->belongsTo(filiere::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'class_modules', 'classes_id', 'modules_id');
    }

}
