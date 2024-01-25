<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'prenom',
        'numero_telephone',
        'role',
        'date_naissance',
        'cin',
        'email',
        'password',
        'adresse',
        'ville',
        'code_postale',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



/* relation to the other models  */

public function Chef_Service()
{
    return $this->hasOne(Chef_Service::class);
}

public function Chef_filiere()
{
    return $this->hasOne(Chef_filiere::class);
}

public function Chef_Departement()
{
    return $this->hasOne(Chef_Departement::class);
}

public function professeur()
{
    return $this->hasOne(Professeur::class);
}

public function etudiant()
{
    return $this->hasOne(Etudiant::class);
}

//
public function annonces()
{
    return $this->hasMany(Annonce::class);
}




}
