<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;



    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }
}
