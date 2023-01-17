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
            </span>Add Guided Workouts</h3>
        </div>
        <div class="col p-0 text-end">
            <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Guided Workouts</li>
            </ul>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Add Guided Workouts</h4>
                </div>
                <div class="card-body">
                    <form action="{{url('guided-workouts')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Title</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="workout_title">
                                <span class="text-danger">
                                    @if ($errors->has('workout_title'))
                                        {{$errors->first('workout_title')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Qualties</label>
                            <div class="col-md-10">
                                <select class="form-control" name="workout_qualities">
                                    <option value="">-- Select --</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Easy">Easy</option>
                                    <option value="Advanced">Advanced</option>
                                </select>
                                <span class="text-danger">
                                    @if ($errors->has('workout_qualities'))
                                        {{$errors->first('workout_qualities')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Duration</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="workout_duration">
                                <span class="text-danger">
                                    @if ($errors->has('workout_duration'))
                                        {{$errors->first('workout_duration')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Kcal</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="workout_calories">
                                <span class="text-danger">
                                    @if ($errors->has('workout_calories'))
                                        {{$errors->first('workout_calories')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Upload Type</label>
                            <div class="col-md-10">
                                <select class="form-control" name="upload_type">
                                    <option value="">-- Select --</option>
                                    <option value="image">Image</option>
                                    <option value="video">video</option>
                                </select>
                                <span class="text-danger">
                                    @if ($errors->has('upload_type'))
                                        {{$errors->first('upload_type')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Upload Image/Video</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="workout_url">
                                <span class="text-danger">
                                    @if ($errors->has('workout_url'))
                                        {{$errors->first('workout_url')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Description</label>
                            <div class="col-md-10">
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="workout_content"></textarea>
                                <span class="text-danger">
                                    @if ($errors->has('workout_content'))
                                        {{$errors->first('workout_content')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Workout Categories</label>
                            <div class="col-md-10">
                                <select class="form-control" name="workout_categories">
                                    <option value="">-- Select --</option>
                                    <option value="Active Aging">Active Aging</option>
                                    <option value="Kickboxing">Kickboxing</option>
                                    <option value="Cardio">Cardio</option>
                                    <option value="Elliptical">Elliptical</option>
                                    <option value="Nutrition">Nutrition</option>
                                    <option value="HIIT">HIIT</option>
                                    <option value="Cycling">Cycling</option>
                                    <option value="Stretching">Stretching</option>
                                </select>
                                <span class="text-danger">
                                    @if ($errors->has('workout_categories'))
                                        {{$errors->first('workout_categories')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group mb-0 row">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <button class="btn btn-primary" type="submit">Add</button>
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