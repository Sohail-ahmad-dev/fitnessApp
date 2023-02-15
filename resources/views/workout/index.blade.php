@extends('layouts/default')

@section('title', 'Workout Plan')
<!-- Main Slider -->
@section('content')
    <style>
        .dashbord_container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .filterBar {
            padding-bottom: 20px;
        }

        .filterBar>ul {
            display: flex;
            justify-content: center;
        }

        .filterBar>ul>li {
            margin: 0 10px;
        }

        .filterBar>ul>li>button {
            border-radius: 20px;
        }

        .workoutList {
            position: relative;
            min-height: 300px;
        }

        .workoutMain {
            /* position: absolute; */
            left: 0;
            top: 0;
            padding: 10px;
            display: flex;
            flex-wrap: wrap;
        }

        .workoutMain .items,
        .item {
            position: relative;
            margin: 5px 0 15px;
        }

        .pb-15 {
            padding-bottom: 15px;
        }

        .workoutMain .items img,
        .item img {
            /* width: 300px; */
            border-radius: 15px;
        }

        .text-white {
            color: #fff;
        }

        .overLay {
            position: absolute;
            bottom: 20px;
            left: 30px;
        }

        .overLay p {
            margin: 0;
        }

        h3 {
            color: #fff;
        }

        .createdMe>i {
            font-size: 24px;
            transition: .3s ease-in-out;
        }

        .createdMe>p {
            margin-bottom: 0;
        }

        .createdMe {
            display: block;
            width: 100%;
            min-height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px dotted #fff;
            border-radius: 15px;
            flex-direction: column;
            transition: .3s ease-in-out;
            color: #fff !important;
        }

        .my-20 {
            margin: 20px 0;
        }

        .cl-12 {
            width: 100%;
        }
    </style>
    <?php use Illuminate\Support\Str; ?>
    <section class="features" style="background-image:url({{ asset('public/assets/images/background/image-3.jpg') }});">
        <div class="container dashbord_container">
            <div class="row">

                {{-- {{ dd(Auth::id()) }} --}}
                <div class="col-12">

                    <div class="filterBar">
                        <ul>
                            @foreach ($workouts as $workout)
                                @if (!empty($workout['category']))
                                    <li>
                                        <button type="button" class="btn btn-default">{{ $workout['category'] }}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                </div>
                {{-- {{dd($workouts)}} --}}

                {{-- Created By me START --}}

                <div class="col-12 my-20 row">

                    <h3 class="pb-15 col-12">
                        <strong>Created by me</strong>
                    </h3>


                    <div class="item col-md-3 col-sm-4 col-12">
                        <a class="btn createdMe" href="{{ route('user.workout.create') }}">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            <p>Create workout</p>
                        </a>
                    </div>

                    @if (!empty($createdData))
                        @foreach ($createdData as $createdD)
                            <?php $title = Str::replace(' ', '-', $createdD['title']); ?>

                            <div class="item col-md-3 col-sm-4 col-12">
                                <a href="{{ url('/dashboard/workout/' . $createdD['id'] . '/' . $title) }}">
                                    <img src="{{ asset('public/upload/images/' . $createdD['upload_url']) }}"
                                        class="img-responsive" alt="">
                                    <div class="overLay">
                                        <h4 class="text-white">{{ $createdD['title'] }}</h4>
                                        <p class="text-white">{{ $createdD['duration'] }} .
                                            <span>{{ $createdD['level'] }}</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif


                </div>

                {{-- Created By me END --}}

                <div class="col-12">

                    <div class="workoutList">
                        <div class="workoutMain row">
                            @foreach ($workouts as $workout)
                                @if (!empty($workout['category']))
                                    <h3 class="pb-15 cl-12">
                                        <strong>{{ $workout['category'] }}</strong>
                                    </h3>
                                @endif

                                @if (!empty($workout['data']))
                                    @foreach ($workout['data'] as $workPosts)
                                        <?php $title = Str::replace(' ', '-', $workPosts['title']); ?>

                                        <div class="items col-md-3 col-sm-4 col-12">
                                            <a href="{{ url('/dashboard/workout/' . $workPosts['id'] . '/' . $title) }}">
                                                <img src="{{ asset('public/upload/images/' . $workPosts['upload_url']) }}"
                                                    class="img-responsive" alt="">
                                                <div class="overLay">
                                                    <h4 class="text-white">{{ $workPosts['title'] }}</h4>
                                                    <p class="text-white">{{ $workPosts['duration'] }} .
                                                        <span>{{ $workPosts['level'] }}</span>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


@endsection
