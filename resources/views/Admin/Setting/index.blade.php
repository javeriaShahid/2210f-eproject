@extends('Admin.layout')
@section('title')
Website Settings
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
    /* Check Toggle */
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 30px;
  }

  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 5px;
    bottom: 0;
    background-color: rgb(182, 45, 45);
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 5px;
    bottom: 5px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: var(--bs-primary);
  }

  input:focus + .slider {
    box-shadow: 0 0 1px var(--bs-primary);
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
/* End of Check toggle */
</style>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="row">
                <div class="col-md-6">  <h5 class="card-header">Website Setting</h5></div>
                <div class="col-md-6">
                    <div class="row justify-content-end mt-3">
                        <div class="col-md-3"><a class="btn btn-success" href="{{ route('admin.setting.create') }}"><i class="bx bx-plus"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Main Logo</th>
                    <th>X-Icon</th>
                    <th>Website Title</th>
                    <th>Website Email</th>
                    <th>Designed By</th>
                    <th>Designed Year</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0" >
                    @foreach ($data['setting'] as $setting )
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td><img src="{{asset('settingsLogo/'. $setting->logo )}}" alt="{{$setting->logo}}" style="width: 50px; height:50px; object-fit:contain;"></td>
                            <td><img src="{{asset('settings_x_Icons/'. $setting->x_icon )}}" alt="{{$setting->x_icon}}" style="width: 50px; height:50px; object-fit:cover;"></td>
                            <td>{{ $setting->title }}</td>
                            <td>{{ $setting->email }}</td>
                            <td>{{ $setting->designed_by }}</td>
                            <td>{{ $setting->designed_year }}</td>
                            <td><label class="switch">

                                <input type="hidden" name="csrf_token" value="{{csrf_token()}}">
                                <input type="checkbox" @if($setting->status == "0" ) @else checked @endif name="status" data-value = "{{$setting->id}}">
                                <span class="slider round"></span>
                              </label></td>

                            {{-- Modal button ends --}}
                            <td><a href="{{ route('admin.setting.edit' , $setting->id) }}" class="btn btn-success"><i class="bx bx-pencil"></i></a> | <a href="{{ route('admin.setting.delete' , $setting->id) }}" class="btn btn-danger"><i class="bx bx-trash"></i></a></td>

                        </tr>

                    <!-- Modal -->
                        <!-- Modal trigger button -->


                    {{-- Modal ends --}}
                    @endforeach
                    <tr>
                        <td colspan="10">
                            {{ $data['setting']->links() }}
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
<script>
   $(document).ready(function(){
   let changeStatusUrl = "{{route('admin.setting.change_status')}}" ;
   let statusCheckBox  = $('input[name="status"]');
   let csrfToken       = $('input[name="csrf_token"]');

    // Changing Status
    $(statusCheckBox).on('change' , function(e){
    e.preventDefault()
    let statusValue   = $(this).prop('checked') == true ? 1 : 0 ;
    let idValue       = $(this).attr('data-value');
    let currentStatus = $(this);
        console.log(csrfToken.val());
    $.ajax({
        url : changeStatusUrl ,
        type : 'Get' ,
        data : { id : idValue , status : statusValue} ,

        success:function(response){
            if(response.status == true ){
                e.preventDefault()
                toastr['success']("Setting has been Activated");
                $(statusCheckBox).not(currentStatus).prop('checked', false);
            }
            if(response.status == false){
                e.preventDefault()
                toastr['error']("Failed to Activate Status");
                currentStatus.prop('checked' , false);
            }
            if(response.status == "required"){
                e.preventDefault()
                toastr['error']("Failed to Change Status You Must Active Atleast 1 Setting");
                currentStatus.prop('checked' , true);
            }
        }
    });

    });
   });
</script>
@endsection
