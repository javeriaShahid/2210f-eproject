@extends('Admin.layout')

@section('title')
Contact Message
@endsection

@section('content')


<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <div class="card-body">
      <div>
        <input type="hidden" value="{{session()->get('admin')['id']}}" name="user_id">

        <div class="row">
            <div class="col-md-12">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-message"></div> Subject </label>
                <input value="{{$data['contact']->subject}}" disabled name="image" type="text" class="form-control" placeholder="Second title" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-12 mt-2">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-message"></div> Message </label>
                <textarea  disabled name="" class="form-control" id="" cols="30" rows="10">{{$data['contact']->message}}</textarea>
            </div>

            <div class="col-md-12 d-flex ">
                <a href="{{route('admin.contact.messages.index')}}" id="submitButton" class="btn-primary btn mt-3">Back</a> &nbsp;

                <a href="{{route('admin.contact.messages.create' , $data['contact']->id)}}"  class="btn-success btn mt-3">Reply</a>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{asset("dashboardassets/js/tags-plugin.js")}}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('dashboardassets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src={{ asset('dashboardassets/js/main.js') }}></script>

<!-- endbuild -->
<!-- endbuild -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{asset('dashboardassets/js/jquery.richtext.js')}}"></script>
<!-- Main JS -->

<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>


<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

@endsection
