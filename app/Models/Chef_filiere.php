<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef_filiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_Chef',
    ];

    protected $table = '_chef_filieres';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function filiere() {
        return $this->belongsTo(filiere::class);
    }

}
