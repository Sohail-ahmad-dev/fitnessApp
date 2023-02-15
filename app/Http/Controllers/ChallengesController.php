<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Challenges;
use Illuminate\Http\Request;

class ChallengesController extends Controller
{
    public function index()
    {
        $items = Challenges::all();
        return view('admin.challenges.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.challenges.form');
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
            'title' => 'required',
            'description' => 'required',
            'reps' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('challenges/create')
                ->withErrors($validator)
                ->withInput();
        }
        
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'reps' => $request->reps,
        ];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(public_path('upload/images'), $image_name);
            $data['image'] = $image_name;
        }
        
        $user = Challenges::insert($data);
        return redirect('challenges');
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
        $post = Challenges::find($id);
        return view('admin.challenges.editForm', compact('post'));
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'reps' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('challenges/create')
                ->withErrors($validator)
                ->withInput();
        }

        $equipment = Challenges::find($id);

        $equipment->title = $request->title;
        $equipment->description = $request->description;
        $equipment->reps = $request->reps;
        
        if ($request->hasFile('equipment_img')) {
            $image = $request->file('equipment_img');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->equipment_img->move(public_path('upload/images'), $image_name);
            $equipment->image = $request->image;
        }
        
        $equipment->save();
        return redirect('challenges')->with('success', 'Challenges updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exercise = Challenges::findOrFail($id);
        $exercise->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
