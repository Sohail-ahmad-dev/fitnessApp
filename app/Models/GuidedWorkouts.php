<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuidedWorkouts extends Model
{
    use HasFactory;
    protected $fillable = [
        'workout_title',
        'workout_qualities',
        'workout_duration',
        'workout_calories',
        'upload_type',
        'workout_url',
        'workout_content',
        'workout_categories',
    ];
}
