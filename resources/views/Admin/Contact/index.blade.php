@extends('Admin.layout')
@section('title')
All Messages
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
                <div class="col-md-6">  <h5 class="card-header">Users Contact Management</h5></div>
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
                    <th>Name   of User</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>View</th>
                    <th>Status</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody class="table-border-bottom-0" >
                    @foreach ($data['contact'] as $contact )
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                             <td>{{ $contact->subject }}</td>
                             <td><a href="{{route('admin.contact.messages.view.message' , $contact->id)}}"  class="btn btn-warning" title="View Message"><i class='bx bx-navigation'></i></a></td>
                             @if($contact->is_replied == 0)
                             <td><a  href="{{route('admin.contact.messages.create' , $contact->id)}}" class="btn btn-primary" title="Reply Message"><i class='bx bx-reply'></i></a></td>
                             @else
                             <td><a href="#" readonly class="btn btn-success" title="Message Replied"><i class='bx bx-envelope-open'></i></a></td>
                             @endif
                             <td><a href="{{route('admin.contact.messages.delete' , $contact->id)}}" title="Delete Message" class="btn btn-danger"><i class='bx bx-trash'></i></a></td>


                        </tr>

                    <!-- Modal -->
                        <!-- Modal trigger button -->


                    {{-- Modal ends --}}
                    @endforeach
                    <tr>
                        <td colspan="10">
                            {{ $data['contact']->links() }}
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
