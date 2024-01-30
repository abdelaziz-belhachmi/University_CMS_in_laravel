<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class module extends Model
{
    use HasFactory;

     protected $fillable = [
        'code_module',
        'nom_module',
        'description_module',
        'semestre',
        'filiere_id',
    ];
  
    public function filiere() {
        return $this->belongsTo(filiere::class);
    }

    public function classes()
    {
        return $this->belongsToMany(classe::class, 'class_modules', 'modules_id','classes_id');
    }

    public function professeurs()
    {
        return $this->belongsTo(Professeur::class);
    }


    public function notes()
    {
        return $this->hasMany(Notes::class,'modules_id');
    }


}
