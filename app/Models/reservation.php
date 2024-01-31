<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;


    // models relationships

    protected $fillable = [
       'Titre_reservation',
       'sujet_reservation',
       'start_time',
       'day',
       'month',
       'year',
       'local_id',
       'user_id',
       'classes_id',

    ];


    public function local() {
        return $this->belongsTo(local::class);
    }
    
    public function class() {
        return $this->hasOne(classe::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
    
    public function modules(){
        return $this->belongsTo(module::class);
    }

}
