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
        p {
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
                    <h4>Goal</h4>
                    <button class="btn btn-default" type="button">
                        {{ $data['goal'] }}
                    </button>
                </div>

                <div class="col-12">
                    <h4>Equipment</h4>
                    <button class="btn btn-default" type="button">
                        {{ $data['equipment'] }}
                    </button>
                </div>

            </div>
        </div>


    </section>

@endsection
