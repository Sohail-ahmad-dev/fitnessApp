<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout_Plans extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category',
        'level',
        'kcal',
        'goal',
        'equipment',
        'duration',
        'upload_type',
        'upload_url',
        'description',
        'days'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
}
