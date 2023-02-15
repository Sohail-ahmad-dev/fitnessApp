@extends('layouts/default')

@section('title', 'Exercises')
<!-- Main Slider -->
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/CalendarPicker.style.css') }}">
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

        #myCalendarWrapper {
            border: 2px solid #bcbcbc;
            padding: 20px;
            margin: 20px 0;
        }

        .activityWraper img {
            max-width: 100%;
            border-radius: 10px;
        }

        .px-5 {
            padding: 5px;
        }

        .addButton {
            position: fixed;
            right: 40px;
            bottom: 30px;
            width: 45px;
            height: 45px;
            background-color: #0c1f34;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            border-radius: 50%;
            z-index: 9999;
            border: 1px solid #fff;
        }

        .addButton>i {
            font-size: 22px;
            color: #fff;
        }

        .pr-15 {
            padding-right: 15px;
        }

        .d-flex {
            display: flex;
            align-items: center;
        }

        #addToCalendar .modal-body a {
            color: #000;
        }

        #addToCalendar .modal-body h4 {
            font-weight: 600;
        }

        .py-10 {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .emptyCalendar .panel-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0;
        }

        .emptyCalendar h4 {
            padding-bottom: 5px;
        }

        .emptyCalendar i {
            font-size: 28px;
        }

        .w-100 {
            width: 100%;
        }

        .justify-between {
            justify-content: space-between;
            align-items: center;
        }

        .border-0 {
            border: 0;
            background-color: transparent;
        }

        .dropdown-menu {
            left: unset;
            right: 0;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .dropdown-menu .col-md-9 {
            display: flex;
            align-items: center;
        }

        .d-block {
            display: block;
            width: 100%;
        }

        .dropdown-menu>li>form {
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: 400;
            line-height: 1.42857143;
            color: #333;
            white-space: nowrap;
        }

        .dropdown-menu>li>form button {
            background-color: transparent;
        }

        .ifNoPlan,
        .activityWraper,
        .workoutWraper {
            display: none;
        }

        .col-md-12 {
            width: 100%;
        }

        .workoutWraper .panel-body h2,
        .workoutWraper .panel-body h5 {
            color: #fff;
            padding-left: 10px;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .workoutWraper .panel,
        .workoutWraper .panel-body {
            padding: 0;
            border-radius: 15px;
        }

        .workoutWraper .panel-body .features {
            margin: 0;
            border-radius: 15px;
        }

        .dropdownWraper button>i {
            color: #fff;
        }

        .dropdownWraper .dropdown h5 {
            color: #000;
        }

        .dropdownWraper {
            position: absolute;
            right: 30px;
            z-index: 999;
            top: 5px;
        }
    </style>

    <?php use Illuminate\Support\Str; ?>
    <!--Exercise-list-->
    <div class="container dashbord_container">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div id="myCalendarWrapper"></div>
                </div>

                {{-- Workout Start --}}

                <div class="col-md-12 workoutWraper"@if (!empty($data['workoutPlan'])) style="display:block;" @endif>
                    <div class="panel panel-default">
                        {{-- <div class="panel-heading d-flex justify-between">
                            <h2>Workout</h2>
                            <div class="dropdown">
                                <button class="btn btn-default border-0 dropdown-toggle" type="button" id="dropdownMenu1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li>
                                        <a href="#">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <i class="fa fa-arrows" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-md-9">
                                                    <h5>Move</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <i class="fa fa-files-o" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-md-9">
                                                    <h5>Duplicate</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('calendar.destroy') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id"
                                                value="{{ !empty($data['calendar']) ? $data['calendar'] : '' }}">

                                            <button class="d-block">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5>Delete</h5>
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>

                        </div> --}}

                        <div class="panel-body">

                            <div class="dropdownWraper">
                                <div class="dropdown">
                                    <button class="btn btn-default border-0 dropdown-toggle" type="button"
                                        id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li>
                                            <a href="#">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-arrows" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5>Move</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-files-o" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5>Duplicate</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('calendar.destroy') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id"
                                                    value="{{ !empty($data['workoutPlanId']) ? $data['workoutPlanId'] : '' }}">

                                                <button class="d-block">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <h5>Delete</h5>
                                                        </div>
                                                    </div>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @php
                                $workoutPlan = !empty($data['workoutPlan']) ? $data['workoutPlan'] : [];
                            @endphp
                            @if (!empty($workoutPlan))
                                <?php $title = Str::replace(' ', '-', $workoutPlan['title']); ?>
                                <a href="{{ url('/dashboard/workout/' . $workoutPlan['id'] . '/' . $title) }}">

                                    <div class="row features"
                                        @if ($workoutPlan['upload_type'] == 'image') style="background-image:url({{ asset('upload/images/' . $workoutPlan['upload_url']) }});" @endif>


                                        <h2 class="col-md-12">
                                            {{ $workoutPlan['title'] }}
                                        </h2>
                                        <h5 class="col-md-12 mt-10">
                                            {{ $workoutPlan['level'] }}
                                        </h5>

                                    </div>
                                </a>
                            @else
                                <a href="#"></a>
                            @endif


                        </div>
                    </div>
                </div>

                {{-- Workout End --}}


                {{-- Activities Start --}}
                <div class="col-md-12 activityWraper"@if (!empty($data['exercises'])) style="display:block;" @endif>
                    <div class="panel panel-default">
                        <div class="panel-heading d-flex justify-between">
                            <h2>Activity</h2>
                            <div class="dropdown">
                                <button class="btn btn-default border-0 dropdown-toggle" type="button" id="dropdownMenu1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li>
                                        <a href="#">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <i class="fa fa-arrows" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-md-9">
                                                    <h5>Move</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <i class="fa fa-files-o" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-md-9">
                                                    <h5>Duplicate</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('calendar.destroy') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id"
                                                value="{{ !empty($data['calendar']) ? $data['calendar'] : '' }}">

                                            <button class="d-block">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5>Delete</h5>
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <div class="panel-body">
                            <a href="{{ route('today.activity') }}">
                                <p class="mb-0 text-muted">
                                    {{ count($data['exercises']) }} Activites
                                </p>

                                <div class="row">

                                    @foreach ($data['exercises'] as $exercise)
                                        @if ($exercise['upload_type'] == 'image')
                                            <div class="col-md-2 px-5">
                                                <img src="{{ asset('upload/images/' . $exercise['upload_url']) }}"
                                                    class="img-responsive" alt="">
                                            </div>
                                        @endif

                                        @if ($exercise['upload_type'] == 'video')
                                            <div class="col-md-2 px-5">
                                                <video controls>
                                                    <source src="{{ asset('upload/images/' . $exercise['upload_url']) }}">
                                                </video>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </a>


                        </div>
                    </div>
                </div>


                <div class="col-md-12 ifNoPlan" @if (empty($data['exercises']) && empty($data['workoutPlan'])) style="display:block;" @endif>
                    <div class="panel panel-default w-100 emptyCalendar">
                        <div class="panel-body w-100 d-flex">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <h4 class="text-muted py-10">Noting planed for this day - yet!</h4>
                            <a href="javascript::void" class="sessionCreateDate" data-toggle="modal"
                                data-target="#addToCalendar">Plan
                                something</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="addButton" data-toggle="modal" data-target="#addToCalendar">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addToCalendar" tabindex="-1" role="dialog" aria-labelledby="addToCalendarLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="addToCalendarLabel">Wat would you like to do?</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 py-10">
                            <a href="{{ route('user.workout') }}" class="d-flex">
                                <i class="fa fa-plug pr-15" aria-hidden="true"></i>
                                <h4>Workout</h4>
                            </a>
                        </div>
                        <div class="col-md-12 py-10">
                            <a href="{{ route('user.exercise') }}" class="d-flex">
                                <i class="pr-15 fa fa-trophy" aria-hidden="true"></i>
                                <h4>Activity</h4>
                            </a>
                        </div>
                        <div class="col-md-12 py-10">
                            <a href="" class="d-flex">
                                <i class="pr-15 fa fa-map-marker" aria-hidden="true"></i>
                                <h4>Track cardio</h4>
                            </a>
                        </div>
                        <div class="col-md-12 py-10">
                            <a href="" class="d-flex">
                                <i class="pr-15 fa fa-bar-chart" aria-hidden="true"></i>
                                <h4>Track Progress</h4>
                            </a>
                        </div>
                        <div class="col-md-12 py-10">
                            <a href="" class="d-flex">
                                <i class="pr-15 fa fa-cutlery" aria-hidden="true"></i>
                                <h4>Log Food</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/admin/js/CalendarPicker.js') }}"></script>


    <script>
        var calendarDate = '';

        const nextYear = new Date().getFullYear() + 1;
        const myCalender = new CalendarPicker('#myCalendarWrapper', {
            // If max < min or min > max then the only available day will be today.
            min: new Date(),
            max: new Date(nextYear, 10), // NOTE: new Date(nextYear, 10) is "Nov 01 <nextYear>"
            // locale: 'en-US', // Can be any locale or language code supported by Intl.DateTimeFormat, defaults to 'en-US'
            showShortWeekdays: false // Can be used to fit calendar onto smaller (mobile) screens, defaults to false
        });
        calendarDate = myCalender.date;
        calendarDate = calendarDate.getFullYear() + '-' + (calendarDate.getMonth() + 1) + '-' + calendarDate
            .getDate();



        myCalender.onValueChange((currentValue) => {
            calendarDate = currentValue.getFullYear() + '-' + (currentValue.getMonth() + 1) + '-' + currentValue
                .getDate();

            var data = {
                'date': calendarDate,
                '_token': '{{ csrf_token() }}'
            }

            fetch('{{ route('calendar.activity') }}', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(res => res.json())
                .then(data => {
                    var appendActivity = document.querySelector(".activityWraper .panel-body a");
                    var img_base = "{{ asset('upload/images/') }}"

                    var count = data['exercises'].length;
                    var count2 = data['workoutPlan'] ? 2 : 0;
                    console.log(count2);
                    if (count > 0) {
                        document.querySelector(".activityWraper").style.display = 'block'
                        html = `<p class="mb-0 text-muted">
                                        ${count} Activites
                                    </p>
                                    <div class="row">`;
                        var mapHtml = data['exercises'].map(elm => {
                            if (elm.upload_type === 'image') {
                                return `<div class="col-md-2 px-5">
                                        <img src="${img_base+'/'+elm.upload_url}" alt="" class="img-responsive">
                                    </div>`
                            } else {
                                return `<div class="col-md-2 px-5">
                                        <video controls>
                                            <source
                                                src="${img_base+'/'+elm.upload_url}">
                                        </video>
                                        </div>`
                            }

                        }).join('')

                        html += mapHtml;
                        html += `</div>`
                        console.log(html);
                        appendActivity.innerHTML = html;

                    } else {
                        document.querySelector(".activityWraper").style.display = 'none'
                    }

                    if (count2 > 0) {

                        var urlBase = '{{ url('') }}'
                        var title = data['workoutPlan']['title'].replaceAll(' ', '-');
                        var id = data['workoutPlan']['id'];

                        var redirectUrl = urlBase + '/dashboard/workout/' + id + '/' + title;

                        document.querySelector(".workoutWraper").style.display = 'block'
                        var html = ''
                        if (data['workoutPlan']['upload_type'] === 'image') {
                            html = `<div class="row features" style="background-image:url( ${img_base + '/' + data['workoutPlan']['upload_url']});">
                                <h2 class="col-md-12">
                                    ${title}
                                </h2>
                                <h5 class="col-md-12 mt-10">
                                    ${data['workoutPlan']['level']}
                                </h5>
                            </div>`;
                        }
                        document.querySelector('.workoutWraper .panel-body>a').setAttribute('href', redirectUrl)
                        // console.log(html);
                        document.querySelector('.workoutWraper .panel-body>a').innerHTML = html;
                    } else {
                        document.querySelector(".workoutWraper").style.display = 'none'
                    }

                    if (count === 0 && count2 === 0) {
                        document.querySelector(".ifNoPlan").style.display = 'block'
                    } else {
                        document.querySelector(".ifNoPlan").style.display = 'none'
                    }

                })
                .catch(err => console.log('error => ', err))
        });

        var btn = document.querySelector(".addButton");
        var btn2 = document.querySelector(".sessionCreateDate");

        btn2.addEventListener("click", function() {
            sessionDate()
        })

        btn.addEventListener("click", function() {
            sessionDate()
        })

        function sessionDate() {
            fetch('{{ route('calendar.dateAssign') }}', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        calendarDate,
                        '_token': '{{ csrf_token() }}'
                    })
                })
                .then(res => res.json())
                .catch(err => console.log('error => ', err))
        }
    </script>

    {{-- <script>
        // document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        });
        calendar.render();
        // });

        var calendarGrid = document.querySelectorAll(".fc-day");

        calendarGrid.forEach(elm => {

            elm.addEventListener("click", function(e) {

                calendarGrid.forEach(el => {
                    el.classList.remove('fc-day-today')
                })

                var data = {
                    'date': e.currentTarget.dataset.date,
                    '_token': '{{ csrf_token() }}'
                }

                fetch('{{ route('calendar.activity') }}', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(res => res.json())
                    .then(data => {
                        var img_base = "{{ asset('upload/images/') }}"

                        var count = data.length;
                        var html = `<div class="col-md-12 my-20 border-1 p-15">
                              <a href="{{ route('today.activity') }}">
                                  <h2>Activities</h2>

                                  <p class="mb-0 text-muted">
                                      ${count} activities
                                  </p>`;
                        var mapHtml = data.map(elm => {
                            return `<img src="${img_base+'/'+elm.upload_url}" alt="" width="90px">`
                        }).join('')

                        html += mapHtml;
                        html += `</a></div>`
                        // console.log(html);
                        document.querySelector(".activites").innerHTML = html;
                    })
                    .catch(err => console.log('error => ', err))

                e.currentTarget.classList.add('fc-day-today')

            })

        });
    </script> --}}

@endsection
