<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FitnessPosts;
use Illuminate\Support\Facades\Validator;

class FitnessPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = FitnessPosts::all();
        return view('admin.posts_list', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.postsList_form');
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
            'post_title' => 'required',
            'post_category' => 'required',
            'post_url' => 'required',
            'post_status' => 'required',
            'post_content' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('fitness-posts/create')
                ->withErrors($validator)
                ->withInput();
        }
        
        $data = [
            'post_title' => $request->post_title,
            'post_category' => $request->post_category,
            'post_type' => $request->post_type,
            'post_status' => $request->post_status,
            'post_content' => $request->post_content
            
        ];
        $image = $request->file('post_url');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $request->post_url->move(public_path('upload/images'), $image_name);
        $data['post_url'] = $image_name;
        $user = FitnessPosts::insert($data);
        return redirect('fitness-posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = FitnessPosts::find($id);
        return view('admin.postEdit_form', compact('post'));
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
       
        // dd($request->all);
        $postData = FitnessPosts::find($id);
        $postData->post_title = $request->post_title;
        $postData->post_category = $request->post_category;
        $postData->post_type = $request->post_type;
        $postData->post_status = $request->post_status;
        $postData->post_content = $request->post_content;
      
        if (!$request->hasFile('post_url')) {
            $postData['post_url'] = $postData->post_url;
        } else {
            $image = $request->file('post_url');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->post_url->move(public_path('upload/images'), $image_name);
            $postData['post_url'] = $image_name;
        }
        $postData->save();
        return redirect('/fitness-posts')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = FitnessPosts::findOrFail($id);
        $posts->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function blogPost()
    {
        $blogs = FitnessPosts::all();
        return view('blog_post', compact('blogs'));
    }
}
