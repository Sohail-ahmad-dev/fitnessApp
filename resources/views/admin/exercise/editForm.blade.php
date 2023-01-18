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
            </span>Edit Exercise </h3>
        </div>
        <div class="col p-0 text-end">
            <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Exercise </li>
            </ul>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Edit Exercise</h4>
                </div>
                <div class="card-body">
                    <form action="{{url('exercise/update/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Title</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="title" value="{{$post->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Categories</label>
                            <div class="col-md-10">
                                <select class="form-control" name="category">
                                    <option {{ $post->category == 'Novice' ? 'selected' : '' }} value="Novice">Novice</option>
                                    <option {{ $post->category == 'Beginner' ? 'selected' : '' }} value="Beginner">Beginner</option>
                                    <option {{ $post->category == 'Intermediate' ? 'selected' : '' }} value="Intermediate">Intermediate</option>
                                    <option {{ $post->category == 'Advanced' ? 'selected' : '' }} value="Advanced">Advanced</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Muscel Group</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="muscel_group" value="{{$post->muscel_group}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Primary Muscel</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="primary_muscle" value="{{$post->primary_muscle}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Secondary Muscel</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="secondary_muscle" value="{{$post->secondary_muscle}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Upload Type</label>
                            <div class="col-md-10">
                                <select class="form-control" name="upload_type">
                                    <option {{ $post->upload_type == 'image' ? 'selected' : '' }} value="image">Image</option>
                                    <option {{ $post->upload_type == 'video' ? 'selected' : '' }} value="video">video</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Upload Image/Video</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="upload_url">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Description</label>
                            <div class="col-md-10">
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="description">{{$post->description}}</textarea>
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