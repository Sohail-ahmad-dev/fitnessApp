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
    </style>


    <!--Exercise-list-->
    <div class="container dashbord_container">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div id="myCalendarWrapper"></div>
                </div>


                @if (empty($exercises))
                    <div class="col-md-12">
                        <div class="panel panel-default w-100 emptyCalendar">
                            <div class="panel-body w-100 d-flex">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <h4 class="text-muted py-10">Noting planed for this day - yet!</h4>
                                <a href="javascript::void" data-toggle="modal" data-target="#addToCalendar">Plan
                                    something</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12 activityWraper">
                        <div class="panel panel-default">
                            <div class="panel-heading d-flex justify-between">
                                <h2>Activity</h2>
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
                                            <a href="#">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5>Delete</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="panel-body">
                                <a href="{{ route('today.activity') }}">
                                    <p class="mb-0 text-muted">
                                        {{ count($exercises) }} Activites
                                    </p>

                                    <div class="row">

                                        <div class="col-md-2 px-5">
                                            @foreach ($exercises as $exercise)
                                                <img src="{{ asset('upload/images/' . $exercise['upload_url']) }}"
                                                    alt="" class="img-responsive">
                                            @endforeach
                                        </div>

                                    </div>
                                </a>


                            </div>
                        </div>
                    </div>
                @endif
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
                            <a href="" class="d-flex">
                                <i class="fa fa-plug pr-15" aria-hidden="true"></i>
                                <h4>Workout</h4>
                            </a>
                        </div>
                        <div class="col-md-12 py-10">
                            <a href="" class="d-flex">
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
        const nextYear = new Date().getFullYear() + 1;
        const myCalender = new CalendarPicker('#myCalendarWrapper', {
            // If max < min or min > max then the only available day will be today.
            min: new Date(),
            max: new Date(nextYear, 10), // NOTE: new Date(nextYear, 10) is "Nov 01 <nextYear>"
            locale: 'en-US', // Can be any locale or language code supported by Intl.DateTimeFormat, defaults to 'en-US'
            showShortWeekdays: false // Can be used to fit calendar onto smaller (mobile) screens, defaults to false
        });


        myCalender.onValueChange((currentValue) => {
            // var data = {
            //         'date': e.currentTarget.dataset.date,
            //         '_token': '{{ csrf_token() }}'
            //     }

            //     fetch('{{ route('calendar.activity') }}', {
            //             method: 'POST',
            //             headers: {
            //                 'Accept': 'application/json',
            //                 'Content-Type': 'application/json'
            //             },
            //             body: JSON.stringify(data)
            //         })
            //         .then(res => res.json())
            //         .then(data => {
            //             var img_base = "{{ asset('upload/images/') }}"

            //             var count = data.length;
            //             var html = `<div class="col-md-12 my-20 border-1 p-15">
        //                   <a href="{{ route('today.activity') }}">
        //                       <h2>Activities</h2>

        //                       <p class="mb-0 text-muted">
        //                           ${count} activities
        //                       </p>`;
            //             var mapHtml = data.map(elm => {
            //                 return `<img src="${img_base+'/'+elm.upload_url}" alt="" width="90px">`
            //             }).join('')

            //             html += mapHtml;
            //             html += `</a></div>`
            //             // console.log(html);
            //             document.querySelector(".activites").innerHTML = html;
            //         })
            //         .catch(err => console.log('error => ', err))
        });
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
