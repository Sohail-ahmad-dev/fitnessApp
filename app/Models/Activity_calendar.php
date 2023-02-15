<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity_calendar extends Model
{
    use HasFactory;
    protected $fillable = [
        'calendar_date',
        'workout_id',
        'activity_id',
    ];
}
