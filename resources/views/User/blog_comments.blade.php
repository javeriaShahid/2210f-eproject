@extends('user.Layout')
@section("title")
Blog's Comments
@endsection
@section('content')
<div class="comment-section container mb-3 mt-5" id="comment">

<div class="comment-title">
    <h3>All Comments</h3>
    </div>
    <ul class="author-comment mb-100">
    @if($data['blogscomments'] != null)
    @foreach($data['blogscomments'] as $comments)
    <li>
    <div class="author-img">
    <img src="{{asset("UserImages/" . $comments->userdata->profile_image)}}" style="object-fit:cover" alt>
    </div>
    <div class="comment-content">
    <div class="author-post">
    <div class="author-info">
    <h5>{{$comments->userdata->name}}</h5>
    <span>
        @php
        $date = \Carbon\Carbon::parse($comments->created_at);
        $formattedDate = $date->format('d, M Y h:i A');
    @endphp

    {{$formattedDate}}
    </div>
    </div>
    <p>{{$comments->message}}</p>
    </div>
    </li>
    @endforeach
    @endif
</ul>
<center>{{$data['blogscomments']->links()}}</center>
</div>

@endsection
