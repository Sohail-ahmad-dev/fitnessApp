@extends('layouts/default')

@section('title', 'Exercises')
<!-- Main Slider -->
@section('content')
    <style>
        .dashbord_container {
            margin-top: 50px;
            margin-bottom: 50px;
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
        h3 {
            color: #fff;
        }

        .details {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>

    <section class="features" style="background-image:url({{ asset('assets/images/background/image-3.jpg') }});">
        <div class="container dashbord_container">
            @if (!empty($exercises))


                @foreach ($exercises as $exercise)
                    <div class="row pb-15">
                        <div class="col-md-2">

                            @if ($exercise['upload_type'] == 'image')
                                <img src="{{ asset('upload/images/' . $exercise['upload_url']) }}" class="img-responsive"
                                    alt="">
                            @endif

                            @if ($exercise['upload_type'] == 'video')
                                <video width="120" height="120" controls>
                                    <source src="{{ asset('upload/images/' . $exercise['upload_url']) }}">
                                </video>
                            @endif

                        </div>

                        <div class="col-md-10 details">
                            <h5>{{ $exercise['title'] }}</h5>
                            <p>{{ $exercise['secondary_muscle'] }}</p>
                        </div>
                    </div>
                @endforeach
            @endif


        </div>
        </div>
    </section>

@endsection
