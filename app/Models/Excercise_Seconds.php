<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excercise_Seconds extends Model
{
    use HasFactory;
    protected $fillable = [
        'excercise_id',
        'value',
        'rest_value',
    ];
}
