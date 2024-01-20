@extends('Admin.layout')

@section('title')
Message Reply

@endsection
@php
$parentRoute = Route('admin.message.feedback.reply.post' , $data['feedback']->id);
@endphp
@section('content')

{{-- If Condition --}}
<form action="{{ $parentRoute }}" id="replyMessage" method="Post">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <div class="card-body">
      <div>
        <div class="row g-3">
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-user"></div> User Name</label>
                <input name="name" type="text" readonly value="{{$data['feedback']->user->name}}" class="form-control" placeholder="Enter Category name" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-envelope"></div> User Email</label>
                <input name="email" type="email" readonly value="{{$data['feedback']->user->email}}" class="form-control" placeholder="Enter Category name" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-12">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-envelope"></div> Message</label>
                <textarea  readonly  type="text" class="form-control" placeholder="Enter Subject" aria-describedby="defaultFormControlHelp">{{$data['feedback']->message}}</textarea>
            </div>
            <div class="col-md-12 " id="replyContainer">
                <div class="main-div">
                <div class="d-flex justify-content-between">
                    <label for="defaultFormControlInput" class="form-label mt-3"><div class="bx bx-chat"></div> Reply Message</label> <button id="plus" class="btn btn-success mt-2 mb-3"><i class="bx bx-plus"></i></button>
                </div>
                <textarea name="message[]"  placeholder="Enter Message" id="" cols="30" rows="10" class="form-control message"></textarea>
            </div>
            </div>
        </div>

         <button type="submit" class="btn-primary btn mt-3"> Reply </button>
         <a href="{{route('admin.feedback.messages.index')}}" class="btn-secondary btn mt-3"> Back To list </a>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

</form>
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('dashboardassets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src={{ asset('dashboardassets/js/main.js') }}></script>
<!-- endbuild -->
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
{{-- custom --}}
<script src="{{ asset('assets/css/custom/feedback.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

@endsection
