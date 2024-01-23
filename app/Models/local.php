<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class local extends Model
{
    use HasFactory;



    public function reservation() {
        return $this->hasMany(reservation::class);
    }

    public function departement() {
        return $this->belongsTo(Departement::class);
    }
}
