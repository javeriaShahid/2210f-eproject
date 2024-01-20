
@extends('user.Layout')
@section('title')
FAQ's
@endsection
@section('content')


<div class="breadcrumb-section">
<div class="container">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">FAQ</li>
</ol>
</nav>
</div>
</div>

@php
    dd($data);
@endphp
<div class="faq-section mt-110 mb-110">
<div class="container">
<div class="faq-title">
<h1>Frequently
<svg xmlns="http://www.w3.org/2000/svg" width="53" height="50" viewBox="0 0 53 50">
<path d="M26.7227 10.7143L34.7395 0L35.1849 13.8393L48.1008 9.82143L40.084 20.792L53 25.4464L40.084 29.4643L48.1008 40.625L34.7395 36.1607V50L26.2773 38.8393L18.2605 50L17.8151 36.1607L4.89916 40.1786L12.916 29.4643L0 25L12.916 20.5357L4.89916 9.82143L18.2605 13.3929V0L26.7227 10.7143Z" />
</svg> <br>
<span>Asked Questions</span>
</h1>
</div>
@foreach ($data['faqs'] as  $faqdata)
<div class="row g-4 mb-110">
<div class="col-lg-4 ">
<div class="faq-item">
<h3>{{$faqdata->name}}
<svg xmlns="http://www.w3.org/2000/svg" width="27" height="25" viewBox="0 0 27 25">
<path d="M13.3613 5.35714L17.3697 0L17.5924 6.91964L24.0504 4.91071L20.042 10.396L26.5 12.7232L20.042 14.7321L24.0504 20.3125L17.3697 18.0804V25L13.1387 19.4196L9.13025 25L8.90756 18.0804L2.44958 20.0893L6.45798 14.7321L0 12.5L6.45798 10.2679L2.44958 4.91071L9.13025 6.69643V0L13.3613 5.35714Z" />
</svg>
</h3>
</div>
</div>
<div class="col-lg-8">
<div class="faq-content">
<div class="accordion" id="accordionExample">
@if($faqdata->faqs != null)
<div class="accordion" id="accordionExample">
    @foreach ($faqdata->faqs as $key => $value )
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading{{ $key }}">
            <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
                {{ $key + 1 }}. {{ $value->title }}
            </button>
        </h2>
        <div id="collapse{{ $key }}" class="accordion-collapse collapse @if($key == 0) show @endif"  aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                {{ $value->answer }}
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif



</div>
</div>
</div>
</div>
@endforeach

</div>
</div>


<script>
     $(document).ready(function () {
        $("#collapse0").addClass("show");
    });
</script>
@endsection
