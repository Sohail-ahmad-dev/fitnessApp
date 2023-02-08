<style>
    .dashbord_container{
        margin-top: 50px;
        margin-bottom: 50px;
    }
    .profile_img{
        
        width: 150px;
        border-radius: 100%;
        border: 5px solid #fff;
        display: block;
    }
</style>
@extends('layouts/default')

@section('title', 'Sign Up')
        <!-- Main Slider -->
@section('content')
<div class="container dashbord_container">
    <div class="row">
        
      
      @include('layouts.leftbar')
      
        <div class="col-sm-9">
            
            <!-- resumt -->
            <div class="panel panel-default">
                   <div class="panel-heading resume-heading">
                      <div class="row">
                         <div class="col-lg-12">
                            </div>
                            <div class="col-xs-12 col-sm-12">
                               <ul class="list-group">
                                <li class="list-group-item">
                                <img class="profile_img" src="{{ asset('upload/images/'. Auth::user()->image) }}" alt="{{ Auth::user()->name }}"></li>
                                  <li class="list-group-item"><i class="fa fa-user"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</li>
                                  <li class="list-group-item"><i class="fa fa-envelope"></i> {{ Auth::user()->email }}</li>
                                  <li class="list-group-item"><i class="fa fa-map-marker"></i> {{ Auth::user()->address }}</li>
                                  <li class="list-group-item"><i class="fa fa-phone"></i> {{ Auth::user()->phone_number }}
                                  </li>
                               </ul>
                            </div>
                         </div>
                      </div>
                   </div>
                   
                   
                   
               
                   
                   
                </div>
             </div>
            <!-- resume -->
    
        </div>
    </div>
    </div>
@endsection