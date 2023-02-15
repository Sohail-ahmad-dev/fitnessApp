<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use Illuminate\Support\Facades\Validator;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Equipment::all();
        return view('admin.equipment.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.equipment.form');
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
            'equipment' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('equipment/create')
                ->withErrors($validator)
                ->withInput();
        }
        
        $data = [
            'equipment' => $request->equipment,
        ];
        if ($request->hasFile('equipment_img')) {
            $image = $request->file('equipment_img');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->equipment_img->move(public_path('upload/images'), $image_name);
            $data['equipment_img'] = $image_name;
        }
        
        $user = Equipment::insert($data);
        return redirect('equipment');
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
        $post = Equipment::find($id);
        return view('admin.equipment.editForm', compact('post'));
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
            'equipment' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('equipment/create')
                ->withErrors($validator)
                ->withInput();
        }

        $equipment = Equipment::find($id);

        $equipment->equipment = $request->equipment;
        
        if ($request->hasFile('equipment_img')) {
            $image = $request->file('equipment_img');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->equipment_img->move(public_path('upload/images'), $image_name);
            $equipment->equipment_img = $request->equipment_img;
        }
        
        $equipment->save();
        return redirect('equipment')->with('success', 'Equipment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exercise = Equipment::findOrFail($id);
        $exercise->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
