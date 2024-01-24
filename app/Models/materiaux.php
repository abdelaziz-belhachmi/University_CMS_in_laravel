<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materiaux extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom_materiel',
        'categorie_materiel',
        'etat',
        'local_id'
    ];

    public function local() {
        return $this->belongsTo(local::class);
    }
    
    
}
