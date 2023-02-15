<?php
/**
 * Created by PhpStorm.
 * User: Shakeel
 * Date: 11/01/2023
 * Time: 6:55 PM
 */
?>

<header class="main-header">
    <div class="auto-container clearfix row">

        <!-- Logo -->
        <div class="logo col-md-2"><a href="#"><img src="/assets/images/logo.png" alt="Logo" title="StayFit"></a>
        </div>

        <!-- Main Menu -->
        <nav class="main-menu col-md-10" style="margin: 0;">
            <div class="navbar-header">
                <!-- Toggle Button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="navbar-collapse collapse clearfix">
                <ul class="nav navbar-nav navbar-right">

                    <li class="{{ request()->routeIs('dashboard') ? 'current' : '' }}">
                        <a href="{{ route('dashboard') }}">Home</a>
                    </li>

                    <li
                        class="{{ request()->routeIs('user.workout') ||
                        request()->routeIs('user.workoutCalendar') ||
                        request()->routeIs('user.workoutDetail') ||
                        request()->routeIs('user.workout.create')
                            ? 'current'
                            : '' }}">
                        <a href="{{ route('user.workout') }}">Workout</a>
                    </li>

                    <li
                        class="{{ request()->routeIs('user.challenges') || request()->routeIs('challenges.detail') ? 'current' : '' }}">
                        <a href="{{ route('user.challenges') }}">Challenges</a>
                    </li>

                    <li
                        class="{{ request()->routeIs('user.exercise') || request()->routeIs('today.activity') ? 'current' : '' }}">
                        <a href="{{ route('user.exercise') }}">Exercise List</a>
                    </li>

                    <li
                        class="{{ request()->routeIs('user.calendar') || request()->routeIs('calendar.detail') ? 'current' : '' }}">
                        <a href="{{ route('user.calendar') }}">Activity Calendar</a>
                    </li>

                    @if (!Auth::user())
                        <li class="dropdown"><a href="#">Account</a>
                            <ul class="submenu">
                                <li><a href="{{ route('register') }}">Register</a></li>
                                <li><a href="{{ route('login') }}">Login</a></li>
                            </ul>
                        </li>
                    @endif

                    @if (Auth::user())
                        <li class="dropdown">
                            <a href="">
                                Welcome {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                            </a>
                            <ul class="submenu">
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <div class="clearfix"></div>
            </div>
        </nav>
        <!-- Main Menu End-->

    </div>

    <div class="open-hours">
        <div class="toggle-open-hours"><span class="fa fa-clock-o"></span> <span>Opening Hours</span> <br>Monday -
            Sunday 8:00 - 22:00</div>
    </div>

</header>
