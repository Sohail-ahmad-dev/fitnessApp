@extends('layouts/default')

@section('title', 'Sign Up')
        <!-- Main Slider -->
@section('content')
<!--app cards-->
    <section class="features" style="background-image:url({{ asset('assets/images/background/image-3.jpg') }});">
        <div class="auto-container clearfix">

            <article class="post wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="0">
                <figure class="image">
                    <img src="{{ asset('assets/images/resource/features-image-1.jpg') }}" alt="" title="">
                    <a class="overlay" href="#"></a>
                    <div class="arrow from-right"><span></span></div>
                </figure>
                <div class="text">
                    <h3>Nutrition</h3>
                    <p>As a member you can also access our pool and tennis courts for free and have priority for booking any of the pre-book activities.</p>
                </div>
                <div class="clearfix"></div>
            </article>

            <article class="post wow fadeInRight" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="0">
                <figure class="image">
                    <img src="{{ asset('assets/images/resource/features-image-2.jpg') }}" alt="" title="">
                    <a class="overlay" href="{{ route('user.workout') }}"></a>
                    <div class="arrow from-right"><span></span></div>
                </figure>
                <div class="text">
                    <h3>Workout plans</h3>
                    <p>As a member you can also access our pool and tennis courts for free and have priority for booking any of the pre-book activities.</p>
                </div>

                <div class="clearfix"></div>
            </article>

            <article class="post wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="0">
                <div class="text">
                    <h3>Challenges</h3>
                    <p>As a member you can also access our pool and tennis courts for free and have priority for booking any of the pre-book activities.</p>
                </div>
                <figure class="image">
                    <img src="{{ asset('assets/images/resource/features-image-1.jpg') }}" alt="" title="">
                    <a class="overlay" href="#"></a>
                    <div class="arrow from-left"><span></span></div>
                </figure>
                <div class="clearfix"></div>
            </article>

            <article class="post wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="0">
                <div class="text">
                    <h3>Exercise List</h3>
                    <p>As a member you can also access our pool and tennis courts for free and have priority for booking any of the pre-book activities.</p>
                </div>
                <figure class="image">
                    <img src="{{ asset('assets/images/resource/features-image-2.jpg') }}" alt="" title="">
                    <a class="overlay" href="#"></a>
                    <div class="arrow from-left"><span></span></div>
                </figure>
                <div class="clearfix"></div>
            </article>
            <article class="post wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="0">
                <figure class="image">
                    <img src="{{ asset('assets/images/resource/features-image-1.jpg') }}" alt="" title="">
                    <a class="overlay" href="#"></a>
                    <div class="arrow from-right"><span></span></div>
                </figure>
                <div class="text">
                    <h3>Workout</h3>
                    <p>As a member you can also access our pool and tennis courts for free and have priority for booking any of the pre-book activities.</p>
                </div>
                <div class="clearfix"></div>
            </article>
            <article class="post wow fadeInRight" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="0">
                <figure class="image">
                    <img src="{{ asset('assets/images/resource/features-image-2.jpg') }}" alt="" title="">
                    <a class="overlay" href="#"></a>
                    <div class="arrow from-right"><span></span></div>
                </figure>
                <div class="text">
                    <h3>My Profile</h3>
                    <p>As a member you can also access our pool and tennis courts for free and have priority for booking any of the pre-book activities.</p>
                </div>

                <div class="clearfix"></div>
            </article>
        </div>
    </section>
    <!--End app cards-->
    @endsection