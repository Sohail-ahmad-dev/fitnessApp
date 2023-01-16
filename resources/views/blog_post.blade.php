<style>
    video{
        margin: 0 auto;
    }
</style>
@extends('layouts/default')

@section('title', 'Blog Posts')
        <!-- Main Slider -->
@section('content')

    <!--Page Banner -->
    <section class="page-banner" style="background-image:url(images/background/page-banner-bg.jpg);">
    	<div class="auto-container">
        	<h1>Our Blog</h1>
        </div>
    </section>

	<!-- Blog -->
    <section id="blog" class="blog section no-sidebar">
        <div class="auto-container">
            <div class="row">
                <!-- Blog Left Side Begins -->
                <div class="col-md-12">
                    <!-- Post -->
                    @if(!empty($blogs))
                    @foreach($blogs as $blog)
                    <div class="post-item wow" data-animation="fadeInUp" data-animation-delay="300">
                        <!-- Post Title -->
                        <h2 class="wow fadeInUp"><a href="blog-detail.html">{{$blog->post_title}}</a></h2>
                        <div class="post wow fadeInUp">
                            <!-- Image -->
                            @if($blog->post_type == "image")
                                <a href="blog-detail.html"><img class="img-responsive" src="{{ !empty (asset('upload/images/'. $blog->post_url)) ? asset('upload/images/'. $blog->post_url) :  "N/A"}}" alt="{{ $blog->post_title}}" alt="{{$blog->post_title}}" /></a>
                            @else
                                <video width="850" height="350" controls>
                                    <source src="{{ !empty (asset('upload/images/'. $blog->post_url)) ? asset('upload/images/'. $blog->post_url) :  "N/A"}}">
                                </video>
                            @endif
                            <div class="post-content">	
                                <!-- Text -->
                                <p>{{$blog->post_content}}</p>
                                <!-- Meta -->
                                <div class="posted-date">July 19, 2014   /   <span>by</span> <a href="#">John</a>   /   <a href="#">12 Comments</a></div>
                            </div>
                        </div>
                    </div><!-- End Post -->
                    @endforeach
                    @endif
                    
                    <!-- Pagination -->
                    {{-- <div class="post-nav wow fadeInRight" data-animation="fadeInUp" data-animation-delay="300">
                            <ul class="pagination">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="active"><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>	<!-- Pagination Ends--> --}}
                </div><!-- Blog Left Side Ends -->
                
                
                
            </div>
        
        </div>
    </section>
    <!-- Our Blog Section Ends -->
    @endsection

	