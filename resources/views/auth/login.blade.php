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

@if($message = Session::get('success'))

<div class="alert alert-info">
{{ $message }}
</div>

@endif
<div class="container registerForm">
    <div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                    <h3 class="panel-title">Please Login</h3>
                     </div>
                     <div class="panel-body">
                        <form action="{{ route('sample.validate_login') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" value="{{old('email')}}">
                                    <span class="text-danger">
                                        @if ($errors->has('email'))
                                            {{$errors->first('email')}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                    <span class="text-danger">
                                        @if ($errors->has('password'))
                                            {{$errors->first('password')}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <input type="submit" value="Login" class="btn btn-info btn-block">
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection