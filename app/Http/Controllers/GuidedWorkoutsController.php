<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuidedWorkouts;
use Illuminate\Support\Facades\Validator;

class GuidedWorkoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = GuidedWorkouts::all();
        return view('admin.guided_workouts.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guided_workouts.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'workout_title' => 'required',
            'workout_qualities' => 'required',
            'workout_duration' => 'required',
            'workout_calories' => 'required',
            'upload_type' => 'required',
            'workout_content' => 'required',
            'workout_categories' => 'required',
            'workout_url' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('guided-workouts/create')
                ->withErrors($validator)
                ->withInput();
        }
        
        $data = [
            'workout_title' => $request->workout_title,
            'workout_qualities' => $request->workout_qualities,
            'workout_duration' => $request->workout_duration,
            'workout_calories' => $request->workout_calories,
            'upload_type' => $request->upload_type,
            'workout_content' => $request->workout_content,
            'workout_categories' => $request->workout_categories,
            
        ];
        $image = $request->file('workout_url');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $request->workout_url->move(public_path('upload/images'), $image_name);
        $data['workout_url'] = $image_name;
        $user = GuidedWorkouts::insert($data);
        return redirect('guided-workouts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = GuidedWorkouts::find($id);
        return view('admin.guided_workouts.editForm', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $postData = GuidedWorkouts::find($id);
        $postData->workout_title = $request->workout_title;
        $postData->workout_qualities = $request->workout_qualities;
        $postData->workout_duration = $request->workout_duration;
        $postData->workout_calories = $request->workout_calories;
        $postData->upload_type = $request->upload_type;
        $postData->workout_content = $request->workout_content;
        $postData->workout_categories = $request->workout_categories;
      
        if (!$request->hasFile('workout_url')) {
            $postData['workout_url'] = $postData->workout_url;
        } else {
            $image = $request->file('workout_url');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->workout_url->move(public_path('upload/images'), $image_name);
            $postData['workout_url'] = $image_name;
        }
        $postData->save();
        return redirect('/guided-workouts')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workout = GuidedWorkouts::findOrFail($id);
        $workout->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
