<?php
/**
 * Created by PhpStorm.
 * User: Shakeel
 * Date: 11/01/2023
 * Time: 6:55 PM
 */
?>

<header class="main-header">
    <div class="auto-container clearfix">

        <!-- Logo -->
        <div class="logo"><a href="#"><img src="/assets/images/logo.png" alt="Logo" title="StayFit"></a></div>

        <!-- Main Menu -->
        <nav class="main-menu">
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
                    <li class="current dropdown"><a href="index.html">Home</a>
                        <ul class="submenu">
                            <li><a href="index.html">Home Style One</a></li>
                            <li><a href="index-2.html">Home Style Two</a></li>
                            <li><a href="index-3.html">Home Style Three</a></li>
                            <li><a href="index-one-page-version.html"> One Page Version</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#">Pages</a>
                        <ul class="submenu">
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="qa.html">Q & A</a></li>
                            <li><a href="testimonials.html">Testimonials</a></li>
                            <li class="dropdown"><a href="gallery-page-2-col.html">Gallery</a>
                                <ul class="submenu">
                                    <li><a href="gallery-page-2-col.html">Gallery Two Col</a></li>
                                    <li><a href="gallery-page-3-col.html">Gallery Three Col</a></li>
                                    <li><a href="gallery-page-3-col-full-width.html">Gallery Three Col Full Width</a></li>
                                    <li><a href="gallery-page-4-col.html">Gallery Four Col</a></li>
                                    <li><a href="gallery-page-4-col-full-width.html">Gallery Four Col Full Width</a></li>
                                    <li><a href="gallery-page-6-col.html">Gallery Six Col</a></li>
                                    <li><a href="gallery-page-6-col-full-width.html">Gallery Six Col Full Width</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class=" dropdown"><a href="about-us.html">About us</a>
                        <ul class="submenu">
                            <li><a href="our-team.html">Our Team</a></li>
                            <li><a href="pricing.html">Our Pricing</a></li>

                        </ul>
                    </li>
                    <li class="dropdown"><a href="services.html">Services</a>
                        <ul class="submenu">
                            <li><a href="schedule.html">Our Schedule</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="blog.html">Blog</a>
                        <ul class="submenu">
                            <li><a href="blog-without-sidebar.html">Blog Full Width</a></li>
                            <li><a href="blog.html">Blog Left Sidebar</a></li>
                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                            <li><a href="blog-left-right-sidebar.html">Blog Left Right Sidebar</a></li>
                            <li><a href="blog-detail.html">Single Post</a></li>
                        </ul>
                    </li>

                    <li><a href="contact.html">Contact</a></li>
                    <li class="dropdown"><a href="#">Account</a>
                        <ul class="submenu">
                            <li><a href="{{route('register')}}">Register</a></li>
                            <li><a href="schedule.html">Login</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </nav>
        <!-- Main Menu End-->

    </div>

    <div class="open-hours">
        <div class="toggle-open-hours"><span class="fa fa-clock-o"></span> <span>Opening Hours</span> <br>Monday - Sunday 8:00 - 22:00</div>
    </div>

</header>

