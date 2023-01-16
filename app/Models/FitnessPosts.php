<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FitnessPosts extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_category',
        'post_title',
        'post_content',
        'post_type',
        'post_url',
        'post_status',
    ];
}
