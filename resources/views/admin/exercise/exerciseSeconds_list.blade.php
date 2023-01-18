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
                </span>Exercise Seconds</h3>
            </div>
            <div class="col p-0 text-end">
                <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Exercise Seconds</li>
                </ul>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 list_post">Exercise Seconds</h4>
                        <a class="add_post" href="{{url('exercise')}}">Exercise List</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Value</th>
                                        <th>Rest Value</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @if(!empty($secondsitems))
                                   @foreach($secondsitems as $item)
                                        <tr>
                                            <td>
                                              {{!empty($item->value)? $item->value : "N/A"}}
                                            </td>
                                            <td>
                                              {{!empty($item->rest_value)? $item->rest_value : "N/A"}}
                                            </td>
                                           <td>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteExerciseSeconds({{ $item->id }})">Delete</button>
                                          <button onclick="exerciseSecondsEdit({{$item->id}})" type="button" class="btn btn-primary btn-sm exSeconds" data-bs-toggle="modal" data-bs-target="#updateModal">
                                            Update
                                          </button>
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
  

  <!-- Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Exercise Seconds</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{-- <form action="{{url('exercise/secondsUpdate/'.$post->id)}}" method="POST" enctype="multipart/form-data"> --}}
                <form onsubmit="return secondsUpdate(this)" id="updateExerciseData">
                @csrf
                <input type="hidden" class="form-control" name="excercise_id">
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Value</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="value">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2">Rest Value</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="rest_value">
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
        <div class="modal-footer">
          <button  type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

    @endsection
