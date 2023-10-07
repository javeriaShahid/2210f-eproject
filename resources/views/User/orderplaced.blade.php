@extends('User.layout')
@section('title')
Order Placed
@endsection
@section('content')

<div>
    <div class="container "
        style="margin-top: 50px; height: 100px;  width: 100px; ">
        <!-- <img width="98" height="98" src="https://img.icons8.com/color/96/checkmark--v1.png" alt="checkmark--v1" /> -->
        <img width="96" height="96" src="https://img.icons8.com/color/96/order-completed.png" alt="order-completed"/>
    </div>
    <h2 class="d-flex justify-content-center" style="color: green;">Order Successfully Placed</h2>
</div>

<p style="text-align: center; margin-top: 50px;">Thank you for choosing <b>DAZZLE</b>. We're honored to fulfill your order and look forward to exceeding your expectations.
    doloribus perferendis eos illum quod!</p>
<div class="container">
    <div class="table-wrapper">
        <table class="eg-table order-table table mb-0">
            <thead>
                <tr class=" bg-dark text-white">
                    <th>Image</th>
                    <th>Tracking ID</th>
                    <th>Product Details</th>
                    <th>Total Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                    <th>Order Placed On</th>
                    <th>Date of Delivery</th>
                    <th>Generate Label</th>
                    <th>Download Label</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['checkout'] as $checkout )
                <tr>
                    <td data-label="Image"><img alt="image" style="height: 40px ; width:40px; object-fit:contain" src="{{ asset('assets/Productimages/' . $checkout->product->image) }}"
                            class="img-fluid">
                    </td>
                    <td data-label="Order ID">#{{ $checkout->tracking_id }}</td>
                    <td data-label="Product Details">{{ $checkout->product->name }}</td>
                    <td data-label="price">PKR,{{ $checkout->total_price }}</td>
                    <td data-label="quantity">{{ $checkout->quantity }}</td>
                    <td data-label="quantity">PKR,{{ $checkout->total_price + $checkout->shipping_fees }}</td>
                    <td data-label="quantity">{{ $checkout->order_placed_date }}</td>
                    <td data-label="quantity">{{ $checkout->delivery_date }}</td>
                    <td data-label="label generate"><a href="{{ route('label.view' , $checkout->id) }}" class="btn btn-success"><i class="bx bx-bookmarks"></i></a></td>
                    <td data-label="label download"><a href="{{ route('label.download' , $checkout->id) }}" class="btn btn-warning"><i class="bx bx-cloud-download"></i></a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>



</div>
@endsection