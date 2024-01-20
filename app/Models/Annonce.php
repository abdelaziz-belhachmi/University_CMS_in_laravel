<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;


    protected $fillable = [
        'titre', 'description', 'date_creation','audience'
    ];

    // Define the one-to-one relationship with Audience
    public function audience()
    {
        return $this->hasOne(Audience::class);
    }

}
