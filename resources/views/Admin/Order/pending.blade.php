@extends('Admin.layout')
@section('title')
Pending Shippings
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
                <div class="col-md-6">  <h5 class="card-header">Orders Management</h5></div>

            </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Tracking Id</th>
                    <th>Client Name</th>
                    <th>Client Email</th>
                    <th>Product Image</th>
                    <th>Name of Product</th>
                    <th>Total Price</th>
                    <th>Quantity</th>
                    <th>Shipping Fees</th>
                    <th>Order Placed on</th>
                    <th>Date of Delivery</th>
                    <th>Payment Method</th>
                    <th>Delivery Status</th>
                    <th>Generate Label</th>
                    <th>Download Label</th>
                    <th>Delete Order</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0" >
                    @foreach ($data['checkout'] as $checkout )
                    <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>#{{ $checkout->tracking_id }}</td>
                            <td>{{ $checkout->user->name }}</td>
                            <td>{{ $checkout->user->email }}</td>
                            <td><img src="{{ asset('assets/Productimages/'.$checkout->product->image) }}" style="width: 40px; height:40px ; object-fit:contain" alt=""></td>
                            <td>{{ $checkout->product->name }}</td>
                            <td>PKR,{{ $checkout->total_price }}</td>
                            <td>{{ $checkout->quantity }}</td>
                            @if($checkout->shipping_fees < 1 )
                            <td>Free Shipping</td>
                            @else
                            <td>PKR,{{ $checkout->shipping_fees }}</td>
                            @endif
                            <td>{{ $checkout->order_placed_date}}</td>
                            <td>{{ $checkout->delivery_date}}</td>
                            <td>{{ $checkout->payment_method}}</td>
                            @if($checkout->is_delivered == 1)
                            <td><a href="{{ route('sent.delivery.order' , $checkout->tracking_id ) }}" class="btn btn-warning text-white" title="Parcel Shipped"><i class="bx bxs-ship"></i></a></td>
                            @elseif ($checkout->is_delivered == 2)
                            <td><a href="{{ route('delivered.order' , $checkout->tracking_id ) }}" class="btn btn-primary text-white" title="Sent for delivery"><i class="bx bxs-truck"></i></a></td>
                            @elseif ($checkout->is_delivered == 3)
                            <td><a class="btn btn-success text-white" title="Parcel Delivered"><i class="bx bxs-badge-check"></i></a></td>
                            @elseif ($checkout->is_delivered == 4)
                            <td><a class="btn btn-danger text-white" title="Parcel Cancelled"><i class="bx bxs-x-circle"></i></a></td>
                            @else
                            <td><a href="{{ route('shipped.order' , $checkout->tracking_id ) }}" class="btn btn-danger" title="Shipping In Progree"><i class="bx bx-mail-send"></i></a></td>
                            @endif
                            <td>
                                <a href="{{ route('label.view' , $checkout->id) }}" class="btn btn-warning"><i class='bx bxs-coupon'></i></a>
                            </td>
                            <td>
                                <a href="{{ route('label.download' , $checkout->id) }}" class="btn btn-primary"><i class="bx bx-cloud-download"></i></a>
                            </td>
                            <td>
                                <a href="" class="btn btn-danger"><i class="bx bx-trash"></i></a>
                            </td>
                        </tr>

                    <!-- Modal -->
                        <!-- Modal trigger button -->


                    {{-- Modal ends --}}
                    @endforeach

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
{{-- custom --}}

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
@endsection
