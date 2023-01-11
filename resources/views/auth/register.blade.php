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
                    <h3 class="panel-title">Please sign up</h3>
                     </div>
                     <div class="panel-body">
                        <form action="{{ route('register.create') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                <input type="text" name="first_name" id="first_name" class="form-control input-sm" value="{{old('first_name')}}" placeholder="First Name">
                                <span class="text-danger">
                                    @if ($errors->has('first_name'))
                                        {{$errors->first('first_name')}}
                                    @endif
                                </span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" class="form-control input-sm" value="{{old('last_name')}}" placeholder="Last Name">
                                    <span class="text-danger">
                                        @if ($errors->has('last_name'))
                                            {{$errors->first('last_name')}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" value="{{old('email')}}">
                            <span class="text-danger">
                                @if ($errors->has('email'))
                                    {{$errors->first('email')}}
                                @endif
                            </span>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                    <span class="text-danger">
                                        @if ($errors->has('password'))
                                            {{$errors->first('password')}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                                    <span class="text-danger">
                                        @if ($errors->has('password_confirmation'))
                                            {{$errors->first('password_confirmation')}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <input type="submit" value="Register" class="btn btn-info btn-block">
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection