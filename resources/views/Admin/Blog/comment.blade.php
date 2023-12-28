@extends('Admin.layout')
@section('title')
Blog's Comments
@endsection

@section('content')
<style>
    .shad_box{
        width:100%!important;
        white-space: normal!important;
    }

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
                <div class="col-md-6">  <h5 class="card-header">Blog's Comments</h5></div>

            </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Commented By</th>
                    <th>User Image</th>
                    <th>Blog Title </th>

                    <th>Commented At</th>
                    <th>View Comment</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0" >
                    @foreach ($data['comment'] as $comments )
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>@if ($comments->userdata != null)
                                {{$comments->userdata->name}}
                                <td><img src="{{asset('assets/UserImages/'. $comments->userdata->profile_image )}}" alt="{{$comments->userdata->profile_image}}" style="width: 50px; height:50px; object-fit:cover;"></td>
                                @endif</td>
                                <td>{{ $comments->blog->title }}</td>

                            <td>
                                @php
                                $date = \Carbon\Carbon::parse($comments->created_at);
                                $formattedDate = $date->format('d, M Y h:i A');
                                @endphp
                                {{$formattedDate}}

                            </td>

                            <td><a href="{{route('admin.blogs.view.comment' , $comments->id)}}" class="btn btn-primary" title="view Comment"><i class="bx bx-message"></i></a></td>
                            {{-- Modal button ends --}}
                            <td><a href="{{ route('blog_details' , $comments->blog_id) }}" class="btn btn-success" title="View Blog"><i class="bx bx-image"></i></a> | <a href="{{route('admin.blogs.delete.comment' , $comments->id)}}" class="btn btn-danger"><i class="bx bx-trash"></i></a></td>

                        </tr>

                    <!-- Modal -->
                        <!-- Modal trigger button -->


                    {{-- Modal ends --}}
                    @endforeach
                    <tr>
                        <td colspan="10">
                            {{ $data['comment']->links() }}
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
{{-- custom --}}


<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

@endsection
