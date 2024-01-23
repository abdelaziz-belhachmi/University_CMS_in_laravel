<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;


    // models relationships

    protected $fillable = [
       
    ];


    public function local() {
        return $this->belongsTo(local::class);
    }
    
    // public function creneau() {
    //     return $this->belongsTo(creneau::class);
    // }


}
