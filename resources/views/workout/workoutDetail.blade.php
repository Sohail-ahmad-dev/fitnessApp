@extends('layouts/default')

@section('title', 'Workout Plan')
<!-- Main Slider -->
@section('content')
    <style>
        .dashbord_container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .btn.btn-default {
            border-radius: 20px;
            margin: 10px;
        }

        h4,
        button,
        h5,
        i,
        p,
        h3 {
            color: #fff;
        }

        .dashbord_container img {
            width: 100%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-12 {
            width: 100%;
        }

        .col-4 {
            width: 33.33%;
        }

        .items {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 25px 0 0;
        }

        .items>i {
            font-size: 27px;
        }

        .items h5 {
            font-size: 22px;
            font-weight: 600;
            padding: 7px 0;
        }

        h3 {
            font-weight: 600;
        }

        .workouts .col-3 {
            width: 120px;
            margin: 15px 0;
            padding: 0 10px;
        }

        .workouts img {
            width: 90px;
        }

        .workouts .col-9 {
            width: calc(100% - 120px);
            margin: 15px 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>

    <section class="features" style="background-image:url({{ asset('assets/images/background/image-3.jpg') }});">


        <div class="container dashbord_container">
            <div class="row">

                <div class="col-12">
                    <img src="{{ asset('/upload/images/' . $data['upload_url']) }}" alt="">
                </div>

                <div class="col-4 items">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <h5 class="duration">
                        {{ $data['duration'] }}
                    </h5>
                    <p class="mb-0">
                        Duration
                    </p>
                </div>

                <div class="col-4 items">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    <h5 class="level">
                        {{ $data['level'] }}
                    </h5>
                    <p class="mb-0">
                        Level
                    </p>
                </div>

                <div class="col-4 items">
                    <i class="fa fa-fire" aria-hidden="true"></i>
                    <h5 class="level">
                        {{ $data['kcal'] }}
                    </h5>
                    <p class="mb-0">
                        Kcal
                    </p>
                </div>

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12">
                    <h3>Goal</h3>
                    <button class="btn btn-default" type="button">
                        {{ $data['goal'] }}
                    </button>
                </div>

                <div class="col-12">
                    <h3>Equipment</h3>
                    <button class="btn btn-default" type="button">
                        {{ $data['equipment'] }}
                    </button>
                </div>

                <div class="col-12">
                    <hr>
                </div>

                @if (!empty($daysData))

                    @foreach ($daysData as $daysD)
                        <div class="col-12 workouts">
                            <h3>Day {{ $daysD['day'] }}</h3>
                            <p class="mb-0">
                                {{ $data['duration'] }} | {{ $data['kcal'] }} Kcal
                            </p>

                            @if (!empty($daysD['workout_list']))
                                @foreach ($daysD['workout_list'] as $workoutData)
                                    <div class="row">

                                        <div class="col-3">

                                            @if ($workoutData['upload_type'] == 'image')
                                                <img src="{{ asset('upload/images/' . $workoutData['upload_url']) }}"
                                                    alt="">
                                            @endif

                                            @if ($workoutData['upload_type'] == 'video')
                                                <video width="120" height="120" controls>
                                                    <source
                                                        src="{{ asset('upload/images/' . $workoutData['upload_url']) }}">
                                                </video>
                                            @endif

                                        </div>

                                        <div class="col-9">
                                            <h5>{{ $workoutData['title'] }}</h5>
                                            <p>{{ $data['equipment'] }}</p>
                                        </div>

                                    </div>
                                @endforeach
                            @endif


                        </div>
                    @endforeach

                @endif


            </div>
        </div>


    </section>

@endsection
