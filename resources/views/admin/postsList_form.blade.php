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
            </span> Add Post </h3>
        </div>
        <div class="col p-0 text-end">
            <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Post</li>
            </ul>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Add Post</h4>
                </div>
                <div class="card-body">
                    <form action="{{url('fitness-posts')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Post Title</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="post_title">
                                <span class="text-danger">
                                    @if ($errors->has('post_title'))
                                        {{$errors->first('post_title')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Post Categories</label>
                            <div class="col-md-10">
                                <select class="form-control" name="post_category">
                                    <option value="">-- Select --</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                                <span class="text-danger">
                                    @if ($errors->has('post_category'))
                                        {{$errors->first('post_category')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Post Type</label>
                            <div class="col-md-10">
                                <select class="form-control" name="post_type">
                                    <option value="">-- Select --</option>
                                    <option value="image">Image</option>
                                    <option value="video">video</option>
                                </select>
                                <span class="text-danger">
                                    @if ($errors->has('post_category'))
                                        {{$errors->first('post_category')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Upload Image/Video</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="post_url">
                                <span class="text-danger">
                                    @if ($errors->has('post_url'))
                                        {{$errors->first('post_url')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Post Status</label>
                            <div class="col-md-10">
                                <select class="form-control" name="post_status">
                                    <option value="">-- Select --</option>
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                                <span class="text-danger">
                                    @if ($errors->has('post_status'))
                                        {{$errors->first('post_status')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Post Description</label>
                            <div class="col-md-10">
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="post_content"></textarea>
                                <span class="text-danger">
                                    @if ($errors->has('post_content'))
                                        {{$errors->first('post_content')}}
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