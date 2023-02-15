@extends('layouts/default')

@section('title', 'Workout Plan')
<!-- Main Slider -->
@section('content')
    <style>
        .MultiCheckBox {
            border: 1px solid #e2e2e2;
            padding: 5px;
            border-radius: 4px;
            cursor: pointer;
        }

        .MultiCheckBox .k-icon {
            font-size: 15px;
            float: right;
            font-weight: bolder;
            margin-top: -7px;
            height: 10px;
            width: 14px;
            color: #787878;
        }

        .MultiCheckBoxDetail {
            display: none;
            /* position:absolute; */
            border: 1px solid #e2e2e2;
            overflow-y: hidden;
        }

        .MultiCheckBoxDetailBody {
            overflow-y: scroll;
        }

        .MultiCheckBoxDetail .cont {
            clear: both;
            overflow: hidden;
            padding: 2px;
        }

        .MultiCheckBoxDetail .cont:hover {
            background-color: #cfcfcf;
        }

        .MultiCheckBoxDetailBody>div>div {
            float: left;
        }

        .MultiCheckBoxDetail>div>div:nth-child(1) {}

        .MultiCheckBoxDetailHeader {
            overflow: hidden;
            position: relative;
            height: 28px;
            background-color: #3d3d3d;
        }

        .MultiCheckBoxDetailHeader>input {
            position: absolute;
            top: 4px;
            left: 3px;
        }

        .MultiCheckBoxDetailHeader>div {
            position: absolute;
            top: 5px;
            left: 24px;
            color: #fff;
        }

        .daysBox span {
            border: 1px solid #e3e3e3;
            padding: 10px 20px;
            margin: 0 5px;
            margin: 0 5px 5px;
            display: inline-block;
        }

        .daysBox {
            display: inline-block;
            margin-top: 7px;
            max-width: 100%;
        }

        .exerciseList.listex {
            display: none;
        }

        .inputBox input[name="days"] {
            margin-top: 15px;
            display: inline-block;
        }

        .inputBox button {
            float: right;
        }

        .dayscountBtn {
            margin-bottom: 15px;
        }

        .dashbord_container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .px-0 {
            padding-left: 0;
            padding-right: 0;
        }

        .pt-20 {
            padding-top: 20px;
        }

        .mx-auto {
            margin: 0 auto;
        }

        .pb-10 {
            padding-bottom: 10px;
        }

        .p-25 {
            padding: 25px;
        }

        .px-15 {
            padding-left: 15px;
            padding-right: 15px;
        }

        .shadow {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
    </style>

    <section class="features" style="background-image:url({{ asset('public/assets/images/background/image-3.jpg') }});">
        <div class="container dashbord_container">


            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-md-8 mx-auto col-12 bg-white p-25 shadow">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title pb-10">Add Workout Plan</h4>
                        </div>
                        <div class="card-body">
                            {{-- action="{{route('workoutPlans.insert')}}" --}}
                            <form method="POST" enctype="multipart/form-data" onsubmit="return addWorkoutPlans('add')"
                                id="addWorkoutPlans">
                                @csrf
                                <input type="hidden" name="roleUser" value="0">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Title</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="title">
                                        <span class="text-danger">
                                            @if ($errors->has('title'))
                                                {{ $errors->first('title') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Category</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="category">
                                            <option value="">-- Select --</option>
                                            <option value="Lose Weight">Lose Weight</option>
                                            <option value="Build Muscle">Build Muscle</option>
                                            <option value="Improve well-being">Improve well-being</option>
                                            <option value="Get Fit">Get Fit</option>
                                            <option value="Shape and Tone">Shape and Tone</option>
                                        </select>
                                        <span class="text-danger">
                                            @if ($errors->has('category'))
                                                {{ $errors->first('category') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Level</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="level">
                                        <span class="text-danger">
                                            @if ($errors->has('level'))
                                                {{ $errors->first('level') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Kcal</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="kcal">
                                        <span class="text-danger">
                                            @if ($errors->has('kcal'))
                                                {{ $errors->first('kcal') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Goal</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="goal">
                                        <span class="text-danger">
                                            @if ($errors->has('goal'))
                                                {{ $errors->first('goal') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Equipment</label>
                                    <div class="col-md-10">
                                        <select class="equipments_dropdown" class="form-control" name="equipment">
                                            @if (!empty($equipment))
                                                @foreach ($equipment as $exData)
                                                    <option
                                                        value="{{ !empty($exData->equipment) ? $exData->equipment : 'N/A' }}">
                                                        {{ $exData->equipment }}</option>
                                                @endforeach()
                                            @endif
                                        </select>
                                        <span class="text-danger">
                                            @if ($errors->has('equipment'))
                                                {{ $errors->first('equipment') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Duration</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="duration">
                                        <span class="text-danger">
                                            @if ($errors->has('duration'))
                                                {{ $errors->first('duration') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Upload Type</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="upload_type">
                                            <option value="">-- Select --</option>
                                            <option value="image">Image</option>
                                            <option value="video">video</option>
                                        </select>
                                        <span class="text-danger">
                                            @if ($errors->has('upload_type'))
                                                {{ $errors->first('upload_type') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Upload Image/Video</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="upload_url">
                                        <span class="text-danger">
                                            @if ($errors->has('upload_url'))
                                                {{ $errors->first('upload_url') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Description</label>
                                    <div class="col-md-10">
                                        <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="description"></textarea>
                                        <span class="text-danger">
                                            @if ($errors->has('description'))
                                                {{ $errors->first('description') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button onclick="daysCount({{ $exerciseData }})" type="button"
                                            class="btn btn-primary dayscountBtn"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="form-group row workoutPlan_box">
                                    <div class="row px-15">
                                        <label class="col-form-label col-md-2">Day 1</label>
                                        <div class="col-md-10 inputBox mb-2">
                                            <input type="text" name="days-1" class="form-control" value="1">
                                            <label class="col-form-label col-md-6 px-0">Select Excercise List</label>
                                            <div class="col-md-12 px-0">
                                                <select class="workoutPlans_dropdown" class="form-control"
                                                    name="exercise_list-1">
                                                    @if (!empty($exerciseData))
                                                        @foreach ($exerciseData as $exData)
                                                            <option
                                                                value="{{ !empty($exData->id) ? $exData->id : N / A }}">
                                                                {{ $exData->title }}</option>
                                                        @endforeach()
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <button class="btn btn-primary" type="submit">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </section>

@endsection
