

@extends('user.Layout')
@section("title")
Blogs
@endsection
@section('content')


<div class="breadcrumb-section">
<div class="container">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Blog Grid</li>
</ol>
</nav>
</div>
</div>


<div class="blog-grid-section mt-110 mb-110">
<div class="container-md container-fluid">
<div class="row g-4 mb-80 justify-content-center">
@if($data['blogs'] != null)
@foreach($data['blogs'] as $blogs)
<div class="col-lg-4 col-sm-6">
<div class="article-card" style="min-height: 500px!important; max-height:700px!important">
<div class="article-image">
<a href="{{route('blog_details' , $blogs->id)}}" class="article-card-img hover-img">
<img src="{{asset('blogImages/' . $blogs->image )}}" alt>
</a>
<div class="blog-date">
<a href="{{route('blog_details' , $blogs->id)}}"> @php
    $date = \Carbon\Carbon::parse($blogs->created_at);
    $formatedDate = $date->format('d,M Y');
    @endphp
    {{$formatedDate}}</a>
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
@endif

</div>
</div>
<div class="shop-pagination">
<center>
    {{$data['blogs']->links()}}
</center>
</div>

</div>
</div>


@endsection
