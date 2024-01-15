@extends('Admin.layout')
@section('title')
All Feedbacks
@endsection

@section('content')
<style>
    .shad_box{
        width:100%!important;
        white-space: normal!important;
    }
</style>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="row">
                <div class="col-md-6">  <h5 class="card-header">FeedBacks Management</h5></div>
                <div class="col-md-6">
                    <div class="row justify-content-end mt-3">

                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Name of User</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Email</th>
                    <th>Ratings Given</th>
                    <th>No.Replies</th>
                    <th>View</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody class="table-border-bottom-0" >
                    @foreach ($data['feedback'] as $feedback )
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ @$feedback->user->name }}</td>
                            <td><img src="{{asset('ProductImages/' . @$feedback->products->image)}}" style="width:50px; height:50px; object-fit:cover;" alt=""></td>
                            <td>{{@$feedback->products->name}}</td>
                             <td>{{ @$feedback->user->email }}</td>
                             <td>{{@$feedback->rating}}</td>
                             <td>{{@$feedback->replies->count()}}</td>
                             <td><a href="{{route('admin.feedback.messages.view.message' , $feedback->id)}}" class="btn btn-warning" title="view message"><i class="bx bx-message"></i></a></td>
                             <td><a  href="{{route('admin.feedback.messages.create' , $feedback->id)}}" class="btn btn-primary" title="Reply Message"><i class='bx bx-reply'></i></a> |
                             <a href="{{route('admin.feedback.messages.delete' , $feedback->id)}}" title="Delete Message" class="btn btn-danger"><i class='bx bx-trash'></i></a></td>


                        </tr>

                    <!-- Modal -->
                        <!-- Modal trigger button -->


                    {{-- Modal ends --}}
                    @endforeach
                    <tr>
                        <td colspan="10">
                            {{ $data['feedback']->links() }}
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!--/ Hoverable Table rows -->
</div>
</div>
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

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
@endsection
