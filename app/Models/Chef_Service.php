<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef_Service extends Model
{
    use HasFactory;


    protected $fillable = [
        'code_Chef',
    ];

    protected $table = '_chef__services';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
