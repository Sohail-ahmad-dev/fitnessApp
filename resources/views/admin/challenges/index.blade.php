<style>
    .list_post{
        display: inline-block;
    }
    .add_post{
        float: right;
        color: #fff;
        padding: 10px 20px;
        border-radius: 4px;
        background: linear-gradient(to right, #da8cff, #9a55ff);
    }
	.profile_img{
		width:100px;
	}
    /* .postDesc {
        width: 300px;
    } */
</style>
@extends('admin/layouts/default')

@section('title', 'Challenges')
        <!-- Main Slider -->
@section('content')
@if($message = Session::get('success'))

<div class="alert alert-info">
{{ $message }}
</div>
@endif
    <div class="content container-fluid">
        <div class="crms-title row bg-white mb-4">
            <div class="col  p-0">
                <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="la la-table"></i>
                </span>Challenges List</h3>
            </div>
            <div class="col p-0 text-end">
                <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Challenges List</li>
                </ul>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 list_post">Challenges List</h4>
                        <a class="add_post" href="{{route('challenges.create')}}">Add Challenge</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Reps</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @if(!empty($items))
                                   @foreach($items as $item)
                                        <tr>
                                            <td>
                                                <img class="profile_img" src="{{ asset('upload/images/'. $item->image)}}" alt="{{ $item->title}}">
                                            </td>
                                            <td>
                                              {{!empty($item->title)? $item->title : "N/A"}}
                                            </td>
                                            <td>
                                              {{!empty($item->reps)? $item->reps : "N/A"}}
                                            </td>
                                            <td>
                                              {{!empty($item->description)? $item->description : "N/A"}}
                                            </td>
                                           <td>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteChallenges({{ $item->id }})">Delete</button>
                                                <a href="{{ url('challenges/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">Update</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->



@endsection
