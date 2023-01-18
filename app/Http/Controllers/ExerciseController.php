<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\Excercise_Seconds;
use Illuminate\Support\Facades\Validator;

class ExerciseController extends Controller
{
    public function index()
    {
        $items = Exercise::all();
        return view('admin.exercise.index', compact('items'));
    }
    public function create()
    {
        return view('admin.exercise.form');
    }
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required',
            'muscel_group' => 'required',
            'primary_muscle' => 'required',
            'secondary_muscle' => 'required',
            'upload_type' => 'required',
            'description' => 'required',
            'upload_url' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('exercise/create')
                ->withErrors($validator)
                ->withInput();
        }
        
        $data = [
            'title' => $request->title,
            'category' => $request->category,
            'muscel_group' => $request->muscel_group,
            'primary_muscle' => $request->primary_muscle,
            'secondary_muscle' => $request->secondary_muscle,
            'upload_type' => $request->upload_type,
            'description' => $request->description,
            
        ];
        $image = $request->file('upload_url');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $request->upload_url->move(public_path('upload/images'), $image_name);
        $data['upload_url'] = $image_name;
        $user = Exercise::insert($data);
        return redirect('exercise');
    }
    public function delete($id)
    {
        $exercise = Exercise::findOrFail($id);
        $exercise->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }
    public function edit($id)
    {
        $post = Exercise::find($id);
        return view('admin.exercise.editForm', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $postData = Exercise::find($id);
        $postData->title = $request->title;
        $postData->category = $request->category;
        $postData->muscel_group = $request->muscel_group;
        $postData->primary_muscle = $request->primary_muscle;
        $postData->secondary_muscle = $request->secondary_muscle;
        $postData->upload_type = $request->upload_type;
        $postData->description = $request->description;
      
        if (!$request->hasFile('upload_url')) {
            $postData['upload_url'] = $postData->upload_url;
        } else {
            $image = $request->file('upload_url');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->upload_url->move(public_path('upload/images'), $image_name);
            $postData['upload_url'] = $image_name;
        }
        $postData->save();
        return redirect('exercise')->with('success', 'Post updated successfully');
    }
    public function ExerciseSecondsindex()
    {
        $secondsitems = Excercise_Seconds::all();
        return view('admin.exercise.exerciseSeconds_list', compact('secondsitems'));
    }
    public function ExerciseSecondsdelete($id)
    {
        $exercise = Excercise_Seconds::findOrFail($id);
        $exercise->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }
    public function ExSecondsInsert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required',
            'rest_value' => 'required',
            
        ]);
        if ($validator->fails()) {
            return redirect('exercise')
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'excercise_id' => $request->excercise_id,
            'value' => $request->value,
            'rest_value' => $request->rest_value,
            
        ];
       
        $user = Excercise_Seconds::insert($data);
        return redirect('exercise');
    }
    public function secondsEdit($id)
    {
        $secondspost = Excercise_Seconds::where('excercise_id',$id)->first();
        echo json_encode($secondspost);
    }
    public function secondsUpdate(Request $request, $id)
    {
        $secondsData = Excercise_Seconds::find($id);
        $secondsData->value = $request->input('value');
        $secondsData->rest_value = $request->input('rest_value');
        $secondsData->save();
        return response()->json(['success' => 'Name updated successfully.']);
    }
}
