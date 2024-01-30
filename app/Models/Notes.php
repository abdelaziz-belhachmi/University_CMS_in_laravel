<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $fillable =[
   'CC1',
   'CC2',
   'Ratt',
   'etudiants_id',
   'modules_id',

    ];

    use HasFactory;
    
     public function etudiants() {
        return $this->belongsTo(Etudiant::class);
    }
    
    public function modules() {
        return $this->belongsTo(module::class);
    }
}
