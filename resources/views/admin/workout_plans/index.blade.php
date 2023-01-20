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

@section('title', 'Posts List ')
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
                </span>Workout Plan</h3>
            </div>
            <div class="col p-0 text-end">
                <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Workout Plan</li>
                </ul>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 list_post">Workout Plan</h4>
                        <a class="add_post" href="{{url('workoutPlans/create')}}">Add Workout Plan</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Level</th>
                                        <th>Kcal</th>
                                        <th>Goal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @if(!empty($items))
                                   @foreach($items as $item)
                                        <tr>
                                            <td>
                                              {{!empty($item->title)? $item->title : "N/A"}}
                                            </td>
                                            <td>
                                              {{!empty($item->category)? $item->category : "N/A"}}
                                            </td>
                                            <td>
                                                {{!empty($item->level)? $item->level : "N/A"}}
                                            </td>
                                            <td>
                                                {{!empty($item->kcal)? $item->kcal : "N/A"}}
                                            </td>
                                            <td>
                                                {{!empty($item->goal)? $item->goal : "N/A"}}
                                            </td>
                                           <td>
                                            <button type="button" class="btn btn-danger" onclick="deleteWorkoutPlan({{ $item->id }})">Delete</button>
                                            <a href="{{ url('WorkoutPlan/edit/'.$item->id) }}" class="btn btn-primary">Update</a>
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
    @endsection