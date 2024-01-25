<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;


class ClassModule extends Pivot
{
    use HasFactory;
    protected $table = 'class_modules';

}
