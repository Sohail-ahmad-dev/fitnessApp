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
            </span>Add Exercise </h3>
        </div>
        <div class="col p-0 text-end">
            <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Exercise </li>
            </ul>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Add Exercise</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('exercise.insert')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Title</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="title">
                                <span class="text-danger">
                                    @if ($errors->has('title'))
                                        {{$errors->first('title')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Categories</label>
                            <div class="col-md-10">
                                <select class="form-control" name="category">
                                    <option value="">-- Select --</option>
                                    <option value="Novice">Novice</option>
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Advanced">Advanced</option>
                                </select>
                                <span class="text-danger">
                                    @if ($errors->has('category'))
                                        {{$errors->first('category')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Muscel Group</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="muscel_group">
                                <span class="text-danger">
                                    @if ($errors->has('muscel_group'))
                                        {{$errors->first('muscel_group')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Primary Muscel</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="primary_muscle">
                                <span class="text-danger">
                                    @if ($errors->has('primary_muscle'))
                                        {{$errors->first('primary_muscle')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Secondary Muscel</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="secondary_muscle">
                                <span class="text-danger">
                                    @if ($errors->has('secondary_muscle'))
                                        {{$errors->first('secondary_muscle')}}
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
                                <input class="form-control" type="file" name="upload_url">
                                <span class="text-danger">
                                    @if ($errors->has('upload_url'))
                                        {{$errors->first('upload_url')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Description</label>
                            <div class="col-md-10">
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="description"></textarea>
                                <span class="text-danger">
                                    @if ($errors->has('description'))
                                        {{$errors->first('description')}}
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