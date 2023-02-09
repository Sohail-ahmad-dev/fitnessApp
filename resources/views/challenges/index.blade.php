@extends('layouts/default')

@section('title', 'Challenges')
<!-- Main Slider -->
@section('content')
    <style>
        .dashbord_container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .items img {
            border-radius: 15px;
        }

        .items {
            position: relative;
        }

        .items .overLay {
            position: absolute;
            bottom: 20px;
            left: 20px;
        }

        .text-white {
            color: #ffffff;
        }

        .pb-15 {
            padding-bottom: 15px;
        }
    </style>
    <?php use Illuminate\Support\Str; ?>

    <section class="features" style="background-image:url({{ asset('assets/images/background/image-3.jpg') }});">
        <div class="container dashbord_container">
            <div class="row">



                @if (!empty($joined))
                    <h3 class="pb-15 col-md-12">
                        <strong>Joined</strong>
                    </h3>


                    @foreach ($joined as $challenge)
                        <div class="col-md-3 col-sm-4 col-6 pb-15">
                            <div class="items">
                                <?php $title = Str::replace(' ', '-', $challenge->title); ?>
                                <a href="{{ url('/dashboard/challenges/' . $challenge->id . '/' . $title) }}">
                                    <img src="{{ asset('upload/images/' . $challenge->image) }}" class="img-responsive"
                                        alt="">
                                    <div class="overLay">
                                        <h4 class="text-white">{{ $challenge->title }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif

                @if (!empty($challenges))
                    <h3 class="pb-15 col-md-12">
                        <strong>Other</strong>
                    </h3>


                    @foreach ($challenges as $challenge)
                        <div class="col-md-3 col-sm-4 col-6 pb-15">
                            <div class="items">
                                <?php $title = Str::replace(' ', '-', $challenge->title); ?>
                                <a href="{{ url('/dashboard/challenges/' . $challenge->id . '/' . $title) }}">
                                    <img src="{{ asset('upload/images/' . $challenge->image) }}" class="img-responsive"
                                        alt="">
                                    <div class="overLay">
                                        <h4 class="text-white">{{ $challenge->title }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
        </div>
    </section>

@endsection
