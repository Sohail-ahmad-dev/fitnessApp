<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout_Plans;
use App\Models\Exercise;
use Illuminate\Support\Facades\Validator;

class WorkoutPlansController extends Controller
{
    public function index()
    {
        $items = Workout_Plans::all();
        return view('admin.workout_plans.index', compact('items'));
    }
    public function create()
    {
        $exerciseData = Exercise::all();
        return view('admin.workout_plans.form', compact('exerciseData'));
    }
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required',
            'level' => 'required',
            'kcal' => 'required',
            'goal' => 'required',
            'equipment' => 'required',
            'duration' => 'required',
            'upload_type' => 'required',
            'upload_url' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('workoutPlans/create')
                ->withErrors($validator)
                ->withInput();
        }
        
        $data = [
            'title' => $request->title,
            'category' => $request->category,
            'level' => $request->level,
            'kcal' => $request->kcal,
            'goal' => $request->goal,
            'equipment' => $request->equipment,
            'duration' => $request->duration,
            'upload_type' => $request->upload_type,
            'description' => $request->description,
            'days' => $request->days,
            
        ];
        $image = $request->file('upload_url');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $request->upload_url->move(public_path('upload/images'), $image_name);
        $data['upload_url'] = $image_name;
        $user = Workout_Plans::insert($data);
        return redirect('workoutPlans');
    }
}
