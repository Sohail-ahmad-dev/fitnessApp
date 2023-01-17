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
    .postDesc {
        width: 300px;
    }
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
                </span>Posts</h3>
            </div>
            <div class="col p-0 text-end">
                <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Posts</li>
                </ul>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 list_post">Posts List</h4>
                        <a class="add_post" href="{{url('fitness-posts/create')}}">Add Post</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Post Title</th>
                                        <th>Post Category</th>
                                        <th>Post Uploads</th>
                                        <th>Post Content</th>
                                        <th>Post Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @if(!empty($items))
                                   @foreach($items as $item)
                                        <tr>
                                            <td>
                                              {{!empty($item->post_title)? $item->post_title : "N/A"}}
                                            </td>
                                            <td>
                                                {{!empty($item->post_category)? $item->post_category : "N/A"}}
                                            </td>
                                           
                                            <td>
                                                @if($item->post_type == "image")
                                                    <img class="profile_img" src="{{ !empty (asset('upload/images/'. $item->post_url)) ? asset('upload/images/'. $item->post_url) :  "N/A"}}" alt="{{ $item->post_title}}">
                                                @else
                                                    <video width="100" height="100" controls>
                                                        <source src="{{ !empty (asset('upload/images/'. $item->post_url)) ? asset('upload/images/'. $item->post_url) :  "N/A"}}">
                                                    </video>
                                                @endif
                                            </td>
                                            <td>
                                             @if( $item->post_status == 1)
                                                <span class="text-success">Active</span>
                                            @else
                                                <span class="text-danger">In Active</span>
                                            @endif
                                            </td>
                                            <td class="postDesc">
                                                {{!empty($item->post_content)? $item->post_content : "N/A"}}
                                             </td>
                                           <td>
                                            <button type="button" class="btn btn-danger" onclick="deletePost({{ $item->id }})">Delete</button>
                                            <a href="{{ url('fitness-posts/'.$item->id.'/edit') }}" class="btn btn-primary">Update</a>
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