@extends('admin/layouts/default')

@section('title', 'Posts List ')
        <!-- Main Slider -->
@section('content')
<div class="content container-fluid">
				
    <!-- Page Header -->
    <div class="crms-title row bg-white mb-4">
        <div class="col  p-0">
            <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="fa fa-object-group" aria-hidden="true"></i>
            </span> Edit Post </h3>
        </div>
        <div class="col p-0 text-end">
            <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Post</li>
            </ul>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Edit Post</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('fitness-posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Post Title</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="post_title" value="{{$post->post_title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Post Categories</label>
                            <div class="col-md-10">
                                <select class="form-control" name="post_category">
                                    <option {{ $post->post_category == 'A' ? 'selected' : '' }} value="A">A</option>
                                    <option {{ $post->post_category == 'B' ? 'selected' : '' }}  value="B">B</option>
                                    <option {{ $post->post_category == 'C' ? 'selected' : '' }}  value="C">C</option>
                                    <option {{ $post->post_category == 'D' ? 'selected' : '' }}  value="D">D</option>
                                    <option {{ $post->post_category == 'E' ? 'selected' : '' }}  value="E">E</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Post Type</label>
                            <div class="col-md-10">
                                <select class="form-control" name="post_type">
                                    <option {{ $post->post_type == 'image' ? 'selected' : '' }}  value="image">Image</option>
                                    <option {{ $post->post_type == 'video' ? 'selected' : '' }} value="video">video</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Upload Image/Video</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="post_url">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Post Status</label>
                            <div class="col-md-10">
                                <select class="form-control" name="post_status">
                                    <option {{ $post->post_status == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ $post->post_status == 0 ? 'selected' : '' }} value="0">In Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Post Description</label>
                            <div class="col-md-10">
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="post_content">{{$post->post_content}}</textarea>
                            </div>
                        </div>
                        <div class="form-group mb-0 row">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <button class="btn btn-primary" type="submit">Update Record</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

</div>
@endsection