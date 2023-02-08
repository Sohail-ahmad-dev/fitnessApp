@extends('layouts/default')

@section('title', 'Challenges')
        <!-- Main Slider -->
@section('content')
<style>
  .dashbord_container{
    margin-top: 50px;
    margin-bottom: 50px;
  }
  .items img{
    border-radius: 15px;
  }
  .items{
    position: relative;
  }
  .items .overLay{
    position: absolute;
    bottom: 20px;
    left: 20px;
  }
  .text-white{
    color: #ffffff;
  }
  .pb-15{
    padding-bottom: 15px;
  }
</style>

<div class="container dashbord_container">
  <div class="row">

    <h3 class="pb-15">
      <strong>Other</strong>
    </h3>

    @foreach ($challenges as $challenge)
    <div class="col-md-3 col-sm-4 col-6">
      <div class="items">
        <a href="">
          <img src="{{asset('upload/images/'.$challenge->image)}}" class="img-responsive" alt="">
          <div class="overLay">
            <h4 class="text-white">{{$challenge->title}}</h4>
          </div>
        </a>
      </div>
    </div>
    @endforeach

  </div>
</div>
</div>

@endsection