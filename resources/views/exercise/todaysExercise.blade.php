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

        h4,
        button,
        h5,
        i,
        p,
        h3,
        h1 {
            color: #fff;
        }

        .row {
            display: flex;
            width: 100%;
        }
    </style>

    <section class="features" style="background-image:url({{ asset('assets/images/background/image-3.jpg') }});">
        <div class="container dashbord_container">

            @if (!empty($exercises))

                @foreach ($exercises as $exercise)
                    <div class="row pb-15">

                        <div class="exercise-list col-md-12">
                            <div class="row">

                                <div class="exercise-content col-md-10">

                                    <div class="content">
                                        <h1>{{ $exercise['title'] }}</h1>
                                        <p>{{ $exercise['secondary_muscle'] }}</p>
                                    </div>

                                </div>

                                <div class="togle-buton col-md-2">

                                    @if ($exercise['upload_type'] == 'image')
                                        <img src="{{ asset('upload/images/' . $exercise['upload_url']) }}"
                                            class="img-responsive" alt="">
                                    @endif

                                    @if ($exercise['upload_type'] == 'video')
                                        <video controls>
                                            <source src="{{ asset('upload/images/' . $exercise['upload_url']) }}">
                                        </video>
                                    @endif

                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach

                {{-- <form onsubmit="return addToCalendar()" id="addToCalendar">
                    @csrf
                    <input type="hidden" name="exercise_id">
                    <div class="calendarBtn">
                    </div>
                </form> --}}

            @endif

        </div>
    </section>


@endsection
