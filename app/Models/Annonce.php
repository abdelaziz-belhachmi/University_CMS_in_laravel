<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;


    protected $fillable = [
        'titre', 
        'description', 
        'date_creation',
        'user_id',
    ];

    public function audience()
    {
        return $this->belongsTo(Audience::class, 'audience_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
