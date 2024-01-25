<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class demandes extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'description', 'destinataire'];

    public function etudiant(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
