@extends('Admin.layout')
@section('title')
Blocked Users
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
                <div class="col-md-6">  <h5 class="card-header">Users Management</h5></div>
                <div class="col-md-6">
                    <div class="row justify-content-end mt-3">
                        <div class="col-md-3 mr-5" style="margin-right:20px;"><a class="btn btn-warning" href="{{ route('admin.user.index') }}"><i class="bx bx-user"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Block Status</th>
                    <th>Activity Status</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0" >
                    @foreach ($data['user'] as $user )
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            @if($user->profile_image != null)
                            <td><img src="{{ asset('assets/UserImages/'. $user->profile_image) }}" style="width:40px; height:40px; object-fit:contain;" alt=""></td>
                            @else
                            <td class="text-danger">No Profile</td>
                            @endif
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_code }} {{$user->contact_number}}</td>
                            <td><a href="{{ route('admin.user.unblock' , $user->id) }}" class="btn btn-success">Un-Block</a></td>
                            @if($user->status == 1)
                            <td><button  class="btn btn-success">Online</button></td>
                            @else
                            <td><button  class="btn btn-danger">Offline</button></td>
                            @endif
                            <td> <a href="{{ route('admin.user.delete'  ,$user->id) }}" class="btn btn-danger"><i class="bx bx-trash"></i></a></td>
                        </tr>

                    <!-- Modal -->
                        <!-- Modal trigger button -->


                    {{-- Modal ends --}}
                    @endforeach
                    <tr>
                        <td colspan="10">
                            {{ $data['user']->links() }}
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
