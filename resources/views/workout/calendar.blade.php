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

        /* h4,
                                            button,
                                            h5,
                                            i,
                                            p,
                                            h3 {
                                                color: #fff;
                                            } */

        .my-15 {
            margin: 15px 0;
        }

        .d-center {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }
    </style>

    <div class="container dashbord_container">

        @if (!empty($data))
            <div class="row">

                <div class="col-md-3">
                    @if ($data['upload_type'] == 'image')
                        <img src="{{ asset('public/upload/images/' . $data['upload_url']) }}" alt=""
                            class="img-responsive">
                    @endif

                    @if ($data['upload_type'] == 'video')
                        <video controls>
                            <source src="{{ asset('public/upload/images/' . $data['upload_url']) }}">
                        </video>
                    @endif
                </div>

                <div class="col-md-9 d-center">
                    <h2>{{ $data['title'] }}</h2>
                    <h4>{{ $data['level'] }}</h4>
                </div>



            </div>


            <form action="{{ route('user.workout.insert') }}" method="post" class="row">
                @csrf
                <input type="hidden" name="id" value="{{ $data['id'] }}">
                <div class="form-group col-md-6 my-15">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" required>
                </div>
                <div class="form-group col-md-6 my-15">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" name="end_date" id="end_date" required>
                </div>
                <button type="submit" class="btn btn-default">Add to Calendar</button>
            </form>


        @endif
    </div>

@endsection
