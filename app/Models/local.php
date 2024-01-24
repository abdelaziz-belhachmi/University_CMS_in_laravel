<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class local extends Model
{
    use HasFactory;

    protected $fillable = [
        'Code_local',
        'Nom_local',
        'Type_local',
        'departement_id'
    ];

    public function reservation() {
        return $this->hasMany(reservation::class);
    }
    
    public function materiaux() {
        return $this->hasMany(materiaux::class);
    }

    public function departement() {
        return $this->belongsTo(Departement::class);
    }
}
