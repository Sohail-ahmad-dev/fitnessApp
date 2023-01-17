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
            </span>Edit Guided Workouts</h3>
        </div>
        <div class="col p-0 text-end">
            <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Guided Workouts</li>
            </ul>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Edit Guided Workouts</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('guided-workouts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Title</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="workout_title" value="{{$post->workout_title}}">
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Qualties</label>
                            <div class="col-md-10">
                                <select class="form-control" name="workout_qualities">
                                    <option {{ $post->workout_qualities == 'Standard' ? 'selected' : '' }} value="Standard">Standard</option>
                                    <option {{ $post->workout_qualities == 'Easy' ? 'selected' : '' }} value="Easy">Easy</option>
                                    <option {{ $post->workout_qualities == 'Advanced' ? 'selected' : '' }} value="Advanced">Advanced</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Duration</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="workout_duration" value="{{$post->workout_duration}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Kcal</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="workout_calories" value="{{$post->workout_calories}}">
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
                                <input class="form-control" type="file" name="workout_url">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Description</label>
                            <div class="col-md-10">
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="workout_content">{{$post->workout_content}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Workout Categories</label>
                            <div class="col-md-10">
                                <select class="form-control" name="workout_categories">
                                    <option {{ $post->workout_categories == 'Active Aging' ? 'selected' : '' }} value="Active Aging">Active Aging</option>
                                    <option {{ $post->workout_categories == 'Kickboxing' ? 'selected' : '' }} value="Kickboxing">Kickboxing</option>
                                    <option {{ $post->workout_categories == 'Cardio' ? 'selected' : '' }} value="Cardio">Cardio</option>
                                    <option {{ $post->workout_categories == 'Elliptical' ? 'selected' : '' }} value="Elliptical">Elliptical</option>
                                    <option {{ $post->workout_categories == 'Nutrition' ? 'selected' : '' }} value="Nutrition">Nutrition</option>
                                    <option {{ $post->workout_categories == 'HIIT' ? 'selected' : '' }} value="HIIT">HIIT</option>
                                    <option {{ $post->workout_categories == 'Cycling' ? 'selected' : '' }} value="Cycling">Cycling</option>
                                    <option {{ $post->workout_categories == 'Stretching' ? 'selected' : '' }} value="Stretching">Stretching</option>
                                </select>
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