<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntangibleCultureHeritage extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'name',
        'sk_number',
        'description',
    ];
}
