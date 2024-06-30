<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TangibleCultureHeritage extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'name',
        'sk_number',
        'address',
        'latitude',
        'longitude',
        'description',
    ];
}
