@extends('admin/layouts/default')

@section('title', 'Equipment')
        <!-- Main Slider -->
@section('content')
<div class="content container-fluid">
				
    <!-- Page Header -->
    <div class="crms-title row bg-white mb-4">
        <div class="col  p-0">
            <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="fa fa-object-group" aria-hidden="true"></i>
            </span>Add Equipment </h3>
        </div>
        <div class="col p-0 text-end">
            <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Equipment </li>
            </ul>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Add Equipment</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('equipment.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Equipment Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="equipment">
                                <span class="text-danger">
                                    @if ($errors->has('equipment'))
                                        {{$errors->first('equipment')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Equipment Image</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control" name="equipment_img">
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