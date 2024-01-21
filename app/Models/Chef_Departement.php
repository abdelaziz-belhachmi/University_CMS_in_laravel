<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef_Departement extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_doti',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
