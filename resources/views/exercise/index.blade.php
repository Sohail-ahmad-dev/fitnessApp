@extends('layouts/default')

@section('title', 'Exercises')
<!-- Main Slider -->
@section('content')
    <style>
        .dashbord_container {
            margin-top: 50px;
            margin-bottom: 50px;
            position: relative;
        }

        .text-white {
            color: #ffffff;
        }

        .pb-15 {
            padding-bottom: 15px;
        }

        video {
            width: 100%;
            height: 100%;
        }

        h4,
        button,
        h5,
        i,
        p,
        h3,
        h1 {
            color: #fff;
        }

        .details {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .row {
            justify-content: center;
            display: flex;
            width: 100%;
        }

        .calendarBtn {
            position: absolute;
            bottom: 0;
            right: 0;
        }
    </style>

    <section class="features" style="background-image:url({{ asset('assets/images/background/image-3.jpg') }});">
        <div class="container dashbord_container">

            @if (!empty($exercises))


                @foreach ($exercises as $exercise)
                    <div class="row pb-15">

                        <div class="exercise-list col-md-12">
                            <div class="row">

                                <div class="exercise-content col-md-11">
                                    @if ($exercise['upload_type'] == 'image')
                                        <img src="{{ asset('upload/images/' . $exercise['upload_url']) }}"
                                            class="img-responsive" alt="">
                                    @endif

                                    @if ($exercise['upload_type'] == 'video')
                                        <video controls>
                                            <source src="{{ asset('upload/images/' . $exercise['upload_url']) }}">
                                        </video>
                                    @endif

                                    <div class="content">
                                        <h1>{{ $exercise['title'] }}</h1>
                                        <p>{{ $exercise['secondary_muscle'] }}</p>
                                    </div>
                                </div>
                                <div class="togle-buton col-md-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="calander"
                                            onchange="addCalendarBtn()" id="{{ $exercise['id'] }}">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach

                <form onsubmit="return addToCalendar()" id="addToCalendar">
                    @csrf
                    <input type="hidden" name="exercise_id">
                    <div class="calendarBtn">
                    </div>
                </form>

            @endif

        </div>
        </div>
    </section>

@endsection
