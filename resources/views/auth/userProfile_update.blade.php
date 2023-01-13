<style>
    .registerForm{
        margin-top: 50px;
        margin-bottom: 30px;
    }
</style>
@extends('layouts/default')

@section('title', 'Sign Up')
        <!-- Main Slider -->
@section('content')
<div class="container registerForm">
    <div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                    <h3 class="panel-title">Update Profile</h3>
                     </div>
                     <div class="panel-body">
                        <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                <input type="text" name="first_name" id="first_name" class="form-control input-sm" value="{{ $item->first_name }}" placeholder="First Name">
                                <span class="text-danger">
                                    @if ($errors->has('first_name'))
                                        {{$errors->first('first_name')}}
                                    @endif
                                </span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" class="form-control input-sm" value="{{ $item->last_name }}" placeholder="Last Name">
                                    <span class="text-danger">
                                        @if ($errors->has('last_name'))
                                            {{$errors->first('last_name')}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" value="{{$item->password_save}}">
                                    <span class="text-danger">
                                        @if ($errors->has('password'))
                                            {{$errors->first('password')}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="phone_number" id="phone_number" class="form-control input-sm" placeholder="Phone Number" value="{{ $item->phone_number }}">
                                    
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="address" id="address" class="form-control input-sm" placeholder="Address" value="{{ $item->address }}">
                                    
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="file" name="image" id="image" class="form-control input-sm" placeholder="image">
                                    
                                </div>
                            </div>
                        </div>
                        
                        <input type="submit" value="Update" class="btn btn-info btn-block">
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection