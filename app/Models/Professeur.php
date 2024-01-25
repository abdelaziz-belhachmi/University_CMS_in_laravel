<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_doti',
        // 'grade',
        // 'date_integration',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function module()
    {
        return $this->hasOne(module::class);
    }

}
