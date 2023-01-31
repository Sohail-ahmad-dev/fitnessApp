
<?php $equipmentsData = explode(',',$plans->equipment); ?>
<script>
    var daysWithExercise = '<?php echo json_encode($daysWithExercise); ?>' || [];
    var exerciseData = '<?php echo json_encode($exerciseData); ?>' || [];
    var equipmentsData = '<?php echo json_encode($equipmentsData); ?>' || [];
    setTimeout(() => {
        editDaysExercise(JSON.parse(daysWithExercise),JSON.parse(exerciseData));
        equipmentDrop(JSON.parse(equipmentsData))
    }, 2000);
</script>
<style>
          .MultiCheckBox {
            border:1px solid #e2e2e2;
            padding: 5px;
            border-radius:4px;
            cursor:pointer;
        }

        .MultiCheckBox .k-icon{ 
            font-size: 15px;
            float: right;
            font-weight: bolder;
            margin-top: -7px;
            height: 10px;
            width: 14px;
            color:#787878;
        } 

        .MultiCheckBoxDetail {
            display:none;
            /* position:absolute; */
            border:1px solid #e2e2e2;
            overflow-y:hidden;
        }

        .MultiCheckBoxDetailBody {
            overflow-y:scroll;
        }

            .MultiCheckBoxDetail .cont  {
                clear:both;
                overflow: hidden;
                padding: 2px;
            }

            .MultiCheckBoxDetail .cont:hover  {
                background-color:#cfcfcf;
            }

            .MultiCheckBoxDetailBody > div > div {
                float:left;
            }

        .MultiCheckBoxDetail>div>div:nth-child(1) {
        
        }

        .MultiCheckBoxDetailHeader {
            overflow:hidden;
            position:relative;
            height: 28px;
            background-color:#3d3d3d;
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
                color:#fff;
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
            .exerciseList.listex{
                display: none;
            }
            .inputBox input[name="days"] {
                margin-top: 15px;
                display: inline-block;
            }
            .inputBox button{
                float:right;
            }
            .dayscountBtn{
                margin-bottom: 15px;
            }
</style>
@extends('admin/layouts/default')

@section('title', 'Workouts')
        <!-- Main Slider -->
@section('content')
<div class="content container-fluid">
				
    <!-- Page Header -->
    <div class="crms-title row bg-white mb-4">
        <div class="col  p-0">
            <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="fa fa-object-group" aria-hidden="true"></i>
            </span>Edit Guided Workouts</h3>
        </div>
        <div class="col p-0 text-end">
            <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Guided Workouts</li>
            </ul>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Edit Guided Workouts</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('guided-workouts.update',$plans->id)}}" method="POST" enctype="multipart/form-data" onsubmit="return addWorkoutPlans('edit',{{$plans->id}})" id="editWorkoutPlans">
                        @csrf
                        {{-- <input type="hidden" name="_method" value="PATCH"> --}}
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Title</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{ $plans->title }}" name="title">
                                <span class="text-danger">
                                    @if ($errors->has('title'))
                                        {{$errors->first('title')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Category</label>
                            <div class="col-md-10">
                                <select class="form-control categoryOption" name="category">
                                    <option value="">-- Select --</option>
                                    <option 
                                        value="Lose Weight"
                                        @if($plans->category == 'Lose Weight')
                                            selected
                                        @endif
                                    >Lose Weight</option>
                                    <option 
                                        value="Build Muscle"
                                        @if($plans->category == 'Build Muscle')
                                            selected
                                        @endif
                                    >Build Muscle</option>
                                    <option 
                                        value="Improve well-being"
                                        @if($plans->category == 'Improve well-being')
                                            selected
                                        @endif
                                    >Improve well-being</option>
                                    <option 
                                        value="Get Fit"
                                        @if($plans->category == 'Get Fit')
                                            selected
                                        @endif
                                    >Get Fit</option>
                                    <option 
                                        value="Shape and Tone"
                                        @if($plans->category == 'Shape and Tone')
                                            selected
                                        @endif
                                    >Shape and Tone</option>
                                </select>
                                <span class="text-danger">
                                    @if ($errors->has('category'))
                                        {{$errors->first('category')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Level</label>
                            <div class="col-md-10">
                                <input value="{{$plans->level}}" type="text" class="form-control" name="level">
                                <span class="text-danger">
                                    @if ($errors->has('level'))
                                        {{$errors->first('level')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Kcal</label>
                            <div class="col-md-10">
                                <input value="{{$plans->kcal}}" type="text" class="form-control" name="kcal">
                                <span class="text-danger">
                                    @if ($errors->has('kcal'))
                                        {{$errors->first('kcal')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Goal</label>
                            <div class="col-md-10">
                                <input value="{{$plans->goal}}" type="text" class="form-control" name="goal">
                                <span class="text-danger">
                                    @if ($errors->has('goal'))
                                        {{$errors->first('goal')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Equipment</label>
                            <div class="col-md-10">
                                <select class="equipments_dropdown1" class="form-control" name="equipment">
                                    @if(!empty($equipment))
                                        @foreach($equipment as $exData)
                                            <option value="{{!empty($exData->id) ? $exData->id: 'N/A'}}">{{$exData->equipment}}</option>
                                        @endforeach()
                                    @endif
                                </select>
                                {{-- <select class="equipments_dropdown" class="form-control" name="equipment">
                                    @if(!empty($plans->equipment))
                                    <?php //$equipment = explode(',',$plans->equipment); ?>
                                        @foreach($equipment as $exData)
                                        <option value="{{!empty($exData) ? $exData: 'N/A'}}">{{$exData}}</option>
                                        @endforeach()
                                    @endif
                                </select> --}}
                                <span class="text-danger">
                                    @if ($errors->has('equipment'))
                                        {{$errors->first('equipment')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Duration</label>
                            <div class="col-md-10">
                                <input value="{{$plans->duration}}" type="text" class="form-control" name="duration">
                                <span class="text-danger">
                                    @if ($errors->has('duration'))
                                        {{$errors->first('duration')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Upload Type</label>
                            <div class="col-md-10">
                                <select class="form-control" name="upload_type">
                                    <option value="">-- Select --</option>
                                    <option 
                                        value="image"
                                        @if($plans->upload_type == 'image')
                                            selected
                                        @endif
                                    >Image</option>
                                    <option 
                                        value="video"
                                        @if($plans->upload_type == 'video')
                                            selected
                                        @endif
                                    >video</option>
                                </select>
                                <span class="text-danger">
                                    @if ($errors->has('upload_type'))
                                        {{$errors->first('upload_type')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Upload Image/Video</label>
                            <div class="col-md-10">
                                <input class="form-control" value="{{ $plans->upload_url }}" type="file" name="upload_url">
                                <span class="text-danger">
                                    @if ($errors->has('upload_url'))
                                        {{$errors->first('upload_url')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Description</label>
                            <div class="col-md-10">
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="description">{{ $plans->description }}</textarea>
                                <span class="text-danger">
                                    @if ($errors->has('description'))
                                        {{$errors->first('description')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-end">
                                <button onclick="daysCount({{$exerciseData}})" type="button" class="btn btn-primary dayscountBtn"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="form-group row workoutPlan_box">
                            
                        </div>
                        <div class="form-group mb-0 row">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

</div>
@endsection