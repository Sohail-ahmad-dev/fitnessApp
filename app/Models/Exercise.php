<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category',
        'muscel_group',
        'primary_muscle',
        'secondary_muscle',
        'upload_type',
        'upload_url',
        'description',
    ];
}
