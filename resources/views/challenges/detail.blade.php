@extends('layouts/default')

@section('title', 'Challenges')
<!-- Main Slider -->
@section('content')
    <style>
        .dashbord_container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .challengesWrap {
            padding-top: 15px;
            padding-bottom: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }

        .challengesWrap>i {
            font-size: 25px;
        }

        .challengesWrap>i {
            font-size: 27px;
        }

        .challengesWrap h5 {
            font-size: 22px;
            font-weight: 600;
            padding: 7px 0;
        }

        h4,
        button,
        h5,
        i,
        p,
        h3 {
            color: #fff;
        }

        .overLay {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translate(-50%, 0px);
        }

        .mx-auto {
            margin: 0 auto
        }

        .btn {
            border-radius: 15px;
            margin: 25px auto 0;
            display: block;
        }
    </style>
    <section class="features" style="background-image:url({{ asset('public/assets/images/background/image-3.jpg') }});">
        <div class="container dashbord_container">
            <div class="row">

                @if (!empty($challenges))
                    <div class="col-md-12 position-relative">
                        <img src="{{ asset('public/upload/images/' . $challenges['image']) }}" class="img-responsive mx-auto"
                            alt="">
                        <div class="overLay">
                            <h3>
                                <strong>
                                    {{ $challenges['title'] }}
                                </strong>
                            </h3>
                        </div>
                    </div>

                    <div class="col-md-6 challengesWrap">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <h5>{{ $participants }}</h5>
                        <p class="mb-0">Participants</p>
                    </div>
                    <div class="col-md-6 challengesWrap">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                        <h5>{{ $challenges['reps'] }}</h5>
                        <p class="mb-0">Min</p>
                    </div>

                    <div class="col-md-12">

                        <h3>
                            <strong>
                                Description
                            </strong>
                        </h3>

                        <p>
                            {{ $challenges['description'] }}
                        </p>

                        @if ($join == 'Joined')
                            <form action="{{ route('challenges.leave') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $leaveId->id }}">
                                <button class="btn btn-default" type="submit">
                                    Leave Challenge
                                </button>

                            </form>
                        @else
                            <form action="{{ route('challenges.join') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="challenge_id" value="{{ $challenges['id'] }}">
                                <button class="btn btn-default" type="submit">
                                    Join Challenge
                                </button>

                            </form>
                        @endif


                    </div>
                @endif


            </div>
        </div>
    </section>
@endsection
