<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'code_apogee',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classe() {
        return $this->belongsTo(classe::class);
    }
    


}
