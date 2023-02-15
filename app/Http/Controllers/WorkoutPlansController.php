<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
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
        $equipment = Equipment::all();
        return view('admin.workout_plans.form', compact('exerciseData','equipment'));
    }
    public function insert(Request $request)
    {
        
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
            'exercise_list' => $request->exercise_list,
            
        ];
        // dd($data);
        $image = $request->file('upload_url');
        $image_name = time() . '.' . $image->getClientOriginalName();
        $request->upload_url->move(public_path('upload/images'), $image_name);
        $data['upload_url'] = $image_name;
        $user = Workout_Plans::insert($data);
        echo $user;
    }

    public function edit($id)
    {
        $plans = Workout_Plans::find($id);
        $exerciseData = Exercise::all();
        $equipment = Equipment::all();

        $daysWithExercise = [];
        $days = json_decode($plans->days);
        $exercise_list = json_decode($plans->exercise_list);

        $singleArr = array_merge($days,$exercise_list);

        $dayCount = 1;

        $GLOBALS['exerCount'] = 1;

        foreach ($singleArr as $k => $val) {
            if(strpos($val->name,'days-'.$dayCount) !== false){
                $daysWithExercise[($dayCount-1)]['day'] = $val->value;
                $dayCount++;
            }
            if(strpos($val->name,'exercise_list-'.$GLOBALS['exerCount']) !== false){
                $GLOBALS['exerciseList'] = [];

                $res = array_filter($singleArr,function($arr){
                    if(strpos($arr->name,'exercise_list-'.$GLOBALS['exerCount']) !== false){
                        array_push($GLOBALS['exerciseList'],Exercise::where('id',$arr->value)->first()->toArray());
                    }
                });

                $daysWithExercise[($GLOBALS['exerCount']-1)]['exercise_list'] = $GLOBALS['exerciseList'];
                $GLOBALS['exerCount']++;
            }
        }
        // exit;
        // dd($daysWithExercise);
        
        return view('admin.workout_plans.editForm', compact('plans','exerciseData','daysWithExercise','equipment'));
    }
    public function update(Request $request, $id)
    {
        
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
            'exercise_list' => $request->exercise_list,
        ];

        // dd($id);
        // dd($request->all());
        if($request->upload_url != 'undefined'){
            $image = $request->file('upload_url');
            $image_name = time() . '.' . $image->getClientOriginalName();
            $request->upload_url->move(public_path('upload/images'), $image_name);
            $data['upload_url'] = $image_name;
        }
        $user = Workout_Plans::where('id',$id)->update($data);
        echo $user;
    }

    public function destroy($id)
    {
        $Workout_Plans = Workout_Plans::findOrFail($id);
        $Workout_Plans->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
