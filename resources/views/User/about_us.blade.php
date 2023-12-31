

@extends('User.layout')
@section('title')
About Us
@endsection

@section('content')



<div class="breadcrumb-section">
    <div class="container">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">About Us</li>
</ol>
</nav>
</div>
</div>


<div class="about-us-banner mt-110  mb-110">
<div class="container">
<div class="row">
<div class="col-12">
<div class="about-us-thumb hover-img mb-60">
@if($data['a_banners'] != null)
<img src="{{asset('aboutusbannerImages/' .$data['a_banners']->image)}}" alt>
|@endif
</div>
</div>
</div>
</div>

<div class="about-us-content">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="about-us-wrapper">
@if($data['a_banners'] != null)
<h1>{{$data['a_banners']->title}}</h1>
<p>{{$data['a_banners']->description}}</p>
@endif


</div>
</div>
</div>
</div>
</div>

</div>


<div class="about-us-video">
<div class="container">
<div class="row">
<div class="col-12">
<div class="about-video-thumb">
@if($data['a_banners'] != null)
<img src="{{asset('aboutUsBannerVideos/' . $data['a_banners']->video_banner)}}" alt style="width:100%">
<a data-fancybox="popup-video" href="{{asset('aboutUsVideos/' . $data['a_banners']->video)}}"><i class="bi bi-play-fill"></i></a>
@endif
</div>
</div>
</div>
</div>
</div>


<div class="best-brand-section style-2 mb-110">
<div class="container-fluid">
<div class="section-title style-2 text-center">
<h3>Our Best Brand</h3>
</div>
<div class="best-brand-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="swiper brand-slider">
<div class="swiper-wrapper">
@if($data['brands'] != null)
@foreach($data['brands'] as $brands)
<div class="swiper-slide">
<div class="brand-icon">
<a href="shop-list.html">
<img src="{{ asset("assets/BrandImages/" . $brands->image) }}" style="height:100px ; object-fit:contain;" alt>
</a>
</div>
</div>
@endforeach
@endif
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="makeup-section mb-110">
<div class="container">
@if($data['aboutUs'] != null)
@foreach($data['aboutUs'] as $aboutUs)
@if($aboutUs->side == "Left")
<div class="makeup-top-item">
    <div class="row align-items-center justify-content-center g-0 gy-4">
    <div class="col-lg-6">
    <div class="makeup-img hover-img">
    <img src="{{ asset("aboutusImages/" . $aboutUs->image) }}" style="height:500px; object-fit:cover;" alt>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="makeup-content">
    <span>{{ $aboutUs->short_title }}</span>
    <h2>{{ $aboutUs->title }}</h2>
    <p>{{ $aboutUs->description }}</p>
    <a href="{{ route("search.category" , $aboutUs->category) }}" class="primary-btn1 style-2 hover-btn3">*Try It Now*</a>
    </div>
    </div>
    </div>
    </div>
@elseif($aboutUs->side == "Right")
<div class="row align-items-center justify-content-center g-0 gy-4">
    <div class="col-lg-6 order-lg-1 order-2">
    <div class="makeup-content">
    <span>{{ $aboutUs->short_title }}</span>
    <h2>{{ $aboutUs->title }}</h2>
    <p>{{ $aboutUs->description }}</p>
    <a href="{{ route("search.category" , $aboutUs->category) }}" class="primary-btn1 style-2 hover-btn3">*Try It Now*</a>
    </div>
    </div>
    <div class="col-lg-6 order-lg-2 order-1">
    <div class="makeup-img hover-img">
    <img src="{{ asset("aboutusImages/" . $aboutUs->image) }}"  style="height:500px; object-fit:cover;"  alt>
    </div>
    </div>
    </div>
    @endif
@endforeach

@endif
</div>
</div>


<div class="say-about-section mb-110">
<img src="assets/img/home1/testimonial-vector-2.png" alt class="vector3">
<img src="assets/img/home1/testimonial-vector-1.png" alt class="vector4">
<div class="container-fluid p-0">
<div class="section-title2 style-3">
<h3>They Say About Our Product</h3>
<div class="slider-btn">
<div class="about-prev-btn">
<i class="bi bi-arrow-left"></i>
</div>
<div class="about-next-btn">
<i class="bi bi-arrow-right"></i>
</div>
</div>
</div>
<div class="say-about-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="swiper say-about-slider">
<div class="swiper-wrapper">
<div class="swiper-slide">
<div class="say-about-card">
<div class="say-about-card-top">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
</div>
<p>“I was recommended snaga from a dear friendest onest Gives energy, strength & mostly youm motivationt goint and WOW!!! Gives energy, strength & mostlydat youm motivation”</p>
<div class="say-about-card-bottom">
<div class="author-area">
<div class="author-img">
<img src="assets/img/home2/testimonial-author-img1.png" alt>
</div>
<div class="author">
<h5>Jayden Carter</h5>
<p>Manager at Global Business</p>
</div>
</div>
<div class="quote">
<svg width="59" height="41" viewBox="0 0 59 41" xmlns="http://www.w3.org/2000/svg">
<g opacity="0.05">
<path d="M27.8217 13.4959C27.7944 13.2156 27.7396 12.9284 27.6712 12.6481C27.062 5.56517 21.1144 0 13.8664 0C6.2077 0 0 6.20099 0 13.8514C0 21.283 5.85865 27.3268 13.2093 27.6686C11.4367 30.4649 8.58264 32.7278 5.09894 33.7944L4.98259 33.8286C3.36735 34.3208 2.25175 35.8933 2.40232 37.6435C2.57342 39.6604 4.34608 41.1576 6.37196 40.9867C12.3333 40.4808 18.2946 37.4384 22.3464 32.4954C24.3791 30.0341 25.9533 27.1353 26.9114 23.9767C27.8765 20.8249 28.205 17.4202 27.8765 14.0633L27.8217 13.4959Z" />
<path d="M58.8217 13.4959C58.7944 13.2156 58.7396 12.9284 58.6712 12.6481C58.062 5.56517 52.1144 0 44.8664 0C37.2077 0 31 6.20099 31 13.8514C31 21.283 36.8586 27.3268 44.2093 27.6686C42.4367 30.4649 39.5826 32.7278 36.0989 33.7944L35.9826 33.8286C34.3674 34.3208 33.2517 35.8933 33.4023 37.6435C33.5734 39.6604 35.3461 41.1576 37.372 40.9867C43.3333 40.4808 49.2946 37.4384 53.3464 32.4954C55.3791 30.0341 56.9533 27.1353 57.9114 23.9767C58.8765 20.8249 59.205 17.4202 58.8765 14.0633L58.8217 13.4959Z" />
</g>
</svg>
</div>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="say-about-card">
<div class="say-about-card-top">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
</div>
<p>“I was recommended snaga from a dear friendest onest Gives energy, strength & mostly youm motivationt goint and WOW!!! Gives energy, strength & mostlydat youm motivation”</p>
<div class="say-about-card-bottom">
<div class="author-area">
<div class="author-img">
<img src="assets/img/home2/testimonial-author-img2.png" alt>
</div>
<div class="author">
<h5>Colton Roman</h5>
<p>Ceo at Global Business</p>
</div>
</div>
<div class="quote">
<svg width="59" height="41" viewBox="0 0 59 41" xmlns="http://www.w3.org/2000/svg">
<g opacity="0.05">
<path d="M27.8217 13.4959C27.7944 13.2156 27.7396 12.9284 27.6712 12.6481C27.062 5.56517 21.1144 0 13.8664 0C6.2077 0 0 6.20099 0 13.8514C0 21.283 5.85865 27.3268 13.2093 27.6686C11.4367 30.4649 8.58264 32.7278 5.09894 33.7944L4.98259 33.8286C3.36735 34.3208 2.25175 35.8933 2.40232 37.6435C2.57342 39.6604 4.34608 41.1576 6.37196 40.9867C12.3333 40.4808 18.2946 37.4384 22.3464 32.4954C24.3791 30.0341 25.9533 27.1353 26.9114 23.9767C27.8765 20.8249 28.205 17.4202 27.8765 14.0633L27.8217 13.4959Z" />
<path d="M58.8217 13.4959C58.7944 13.2156 58.7396 12.9284 58.6712 12.6481C58.062 5.56517 52.1144 0 44.8664 0C37.2077 0 31 6.20099 31 13.8514C31 21.283 36.8586 27.3268 44.2093 27.6686C42.4367 30.4649 39.5826 32.7278 36.0989 33.7944L35.9826 33.8286C34.3674 34.3208 33.2517 35.8933 33.4023 37.6435C33.5734 39.6604 35.3461 41.1576 37.372 40.9867C43.3333 40.4808 49.2946 37.4384 53.3464 32.4954C55.3791 30.0341 56.9533 27.1353 57.9114 23.9767C58.8765 20.8249 59.205 17.4202 58.8765 14.0633L58.8217 13.4959Z" />
</g>
</svg>
</div>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="say-about-card">
<div class="say-about-card-top">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
</div>
<p>“I was recommended snaga from a dear friendest onest Gives energy, strength & mostly youm motivationt goint and WOW!!! Gives energy, strength & mostlydat youm motivation”</p>
<div class="say-about-card-bottom">
<div class="author-area">
<div class="author-img">
<img src="assets/img/home2/testimonial-author-img3.png" alt>
</div>
<div class="author">
<h5>Lincoln Miles</h5>
<p>Director at Global Business</p>
</div>
</div>
<div class="quote">
<svg width="59" height="41" viewBox="0 0 59 41" xmlns="http://www.w3.org/2000/svg">
<g opacity="0.05">
<path d="M27.8217 13.4959C27.7944 13.2156 27.7396 12.9284 27.6712 12.6481C27.062 5.56517 21.1144 0 13.8664 0C6.2077 0 0 6.20099 0 13.8514C0 21.283 5.85865 27.3268 13.2093 27.6686C11.4367 30.4649 8.58264 32.7278 5.09894 33.7944L4.98259 33.8286C3.36735 34.3208 2.25175 35.8933 2.40232 37.6435C2.57342 39.6604 4.34608 41.1576 6.37196 40.9867C12.3333 40.4808 18.2946 37.4384 22.3464 32.4954C24.3791 30.0341 25.9533 27.1353 26.9114 23.9767C27.8765 20.8249 28.205 17.4202 27.8765 14.0633L27.8217 13.4959Z" />
<path d="M58.8217 13.4959C58.7944 13.2156 58.7396 12.9284 58.6712 12.6481C58.062 5.56517 52.1144 0 44.8664 0C37.2077 0 31 6.20099 31 13.8514C31 21.283 36.8586 27.3268 44.2093 27.6686C42.4367 30.4649 39.5826 32.7278 36.0989 33.7944L35.9826 33.8286C34.3674 34.3208 33.2517 35.8933 33.4023 37.6435C33.5734 39.6604 35.3461 41.1576 37.372 40.9867C43.3333 40.4808 49.2946 37.4384 53.3464 32.4954C55.3791 30.0341 56.9533 27.1353 57.9114 23.9767C58.8765 20.8249 59.205 17.4202 58.8765 14.0633L58.8217 13.4959Z" />
</g>
</svg>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="swiper-pagination2"></div>
</div>
</div>
</div>


<div class="beauty-article-section mb-110">
<div class="container-md container-fluid">
<div class="section-title style-2 text-center">
<h3>Our Beauty Article</h3>
</div>
<div class="row gy-4">
<div class="col-lg-7">
<div class="row gy-4">
@foreach($data['blogs'] as $blogs)
<div class="col-sm-6">
<div class="article-card" style="min-height: 500px!important; max-height:500px!important">
<div class="article-image">
<a href="{{route('blog_details' , $blogs->id)}}" class="article-card-img hover-img">
<img src="{{asset('blogImages/' . $blogs->image )}}" >
</a>
<div class="blog-date">
<a href="{{route('blog_details' , $blogs->id)}}">
    @php
    $date = \Carbon\Carbon::parse($blogs->created_at);
    $formatedDate = $date->format('d,M Y');
    @endphp
    {{$formatedDate}}
</a>
</div>
</div>
<div class="article-card-content">
<div class="tag">
<ul>
    @php

    $tagsId =  json_decode($blogs->tags);
    $tags   = \App\Models\Category::whereIn('id' ,$tagsId)->paginate(4);
    @endphp
    @foreach ($tags as $tag )
    <li ><a href="{{route('search.blog' , $tag->id)}}"> {{$tag->name}} </a></li>
    @endforeach
</ul>
</div>
<h5><a href="{{route('blog_details' , $blogs->id)}}" class="hover-underline">{{$blogs->title}}</a></h5>
<p>{!! $blogs->blog_qoute !!}</p>

<a href="{{route('blog_details' , $blogs->id)}}">Read More</a>
</div>
</div>
</div>
@endforeach

</div>
</div>



</div>
</div>
</div>


<div class="newsletter-section mb-110">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="newsletter-banner hover-img">
<div class="newsletter-content">
<h2>Sign up to our newsletter for all the latest Offer & discounts.</h2>
<form>
<div class="from-inner">
<input type="email" placeholder="Email Address">
<div class="from-arrow">
<i class="bi bi-arrow-right"></i>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="instagram-section mb-110">
<div class="container">
<div class="section-title style-3">
<h3>Instagram Feed</h3>
<p>Follow us on <a href>@Egenslab</a></p>
</div>
</div>
<div class="instagram-wrapper">
<div class="container-fluid p-0">
<div class="row">
<div class="col-12">
<div class="swiper instagram-slider">
<div class="swiper-wrapper">
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img6.png" alt></a>
</div>
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img2.png" alt></a>
</div>
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img3.png" alt></a>
</div>
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img4.png" alt></a>
</div>
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img5.png" alt></a>
</div>
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img6.png" alt></a>
</div>
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img7.png" alt></a>
</div>
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img8.png" alt></a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.6.0.min.js"></script>


</body>

<!-- Mirrored from demo-egenslab.b-cdn.net/html/beautico/preview/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Sep 2023 11:36:47 GMT -->
</html>

@endsection
