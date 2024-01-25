<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class module extends Model
{
    use HasFactory;

     protected $fillable = [
        'Code_module',
        'Nom_module',
        'description_module',
        'filiere_id',
    ];
  
    public function filiere() {
        return $this->belongsTo(filiere::class);
    }

}
