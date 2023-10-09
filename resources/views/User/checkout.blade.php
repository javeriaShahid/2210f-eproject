

@extends('User.layout')
@section('title')
Checkout Products
@endsection
@section('content')


<div class="breadcrumb-section">
<div class="container">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Shop</li>
<li class="breadcrumb-item active" aria-current="page">Checkout</li>
</ol>
</nav>
</div>
</div>


<div class="checkout-section pt-110 mb-110">
<div class="container">
<div class="row gy-5">
<div class="col-lg-7">
<div class="form-wrap mb-30">
    <div class="row">
        <div class="col-md-6">
<h4>Billing Details</h4>

        </div>
        <div class="col-md-6 d-flex justify-content-end mb-3">

            <!-- Button trigger modal -->
<button type="button" class="primary-btn1 hover-btn3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Select Address
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Address Management</h5>
          <button type="button" class="btn-close closeAddress" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            {{-- Creating A New Address for user to select --}}
            <div id="createAddressContainer" style="display: none">
                <form action="" id="createAddressForm">
                    @csrf
                        <div class="form-inner">
                            <label for="">Address Line 1</label>
                            <input type="text" name="addressline1" placeholder="Enter Address Line 1">
                        </div>

                        <div class="form-inner">
                            <label for="">Address Line 2 <small>(optional)</small></label>
                            <input type="text" name="addressline2" placeholder="Enter Address Line 1">
                        </div>

                        <div class="form-inner">
                            <label for="">Phone number 1 </label>
                            <input type="text" name="phonenumber1" placeholder="Enter Address Line 1">
                        </div>

                        <div class="form-inner">
                            <label for="">Phone number 2 (optional) </label>
                            <input type="text" name="phonenumber2" placeholder="Enter Address Line 1">
                        </div>
                        <div class="form-inner">
                            <label for="">Country</label>
                           <select name="country" id="country">
                            <option value="">Select Country</option>
                            @foreach ($data['country'] as $country )
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="form-inner">
                            <label for="">State</label>
                           <select name="state" id="state">
                            <option value="">Select Country First</option>
                           </select>
                        </div>
                        <div class="form-inner">
                            <label for="">City</label>
                           <select name="city" id="city">
                            <option value="">Select State First</option>
                           </select>
                        </div>

                        <div class="form-inner">
                            <label for="">Postal / Zipcode</label>
                           <input type="text" name="postalcode" placeholder="Postal / Zip Code">
                        </div>


                </form>

            </div>
            {{-- Creating A new Address --}}
            {{-- Search container for address check --}}
            <div class="search-container" >

                    <form id="searchAddress">
                        @csrf
                             <div class="form-inner">
                                <div class="row">
                                    <div class="col-md-8">
                                    <input type="email" name="email_address" placeholder="Your Email address">
                                    </div>
                                    <div class="col-md-2">
                                    <button type="button" id="searchBtn" class="primary-btn1">Find</button>
                                    </div>
                                </div>
                                </div>
                    </form>
                     </div>
            {{-- Search container for address check --}}
            {{-- Table container for address --}}
            <div class="" id="table-container" style="display: none">
                <table class="table table-responsive">
                    <tr>
                        <th>
                            Sr.no
                        </th>
                        <th>
                            Address line
                        </th>
                        <th>
                            Country Name
                        </th>
                        <th>
                            Action
                        </th>

                    </tr>
                  <tbody id="tableData"></tbody>

                </table>
            </div>
            {{-- Table container for address remove --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="primary-btn1" id="createAdButton">Create</button>
          <button type="button" id="createAddressButton" style="display: none" class="primary-btn1">Add Address</button>
        </div>
      </div>
    </div>
  </div>
        </div>

    </div>
<form action="{{ route('checkout.store') }}" method="post">
    @csrf
<div class="row">
<div class="col-lg-6">
<div class="form-inner">
<label>Full Name</label>
<input type="text" name="name" placeholder="Your Full name" value="{{ session()->get('user')['name'] }}">
</div>
</div>
<div class="col-lg-6">
<div class="form-inner">
<label>Email Address</label>
<input type="text" name="email" placeholder="Your Email address"  value="{{ session()->get('user')['email'] }}">
</div>
</div>
<div class="col-12">
<div class="form-inner">
<label>Country</label>
<select name="country" id="checkout_country">
    <option value="">Select Your Country</option>
    @foreach ($data['country'] as $country )
        <option value="{{ $country->id }}">{{ $country->name }}</option>
    @endforeach
</select>
</div>
</div>
<div class="col-12">
<div class="form-inner">
<label>State</label>
<select name="state" id="checkout_state">
    <option value="">Select Country First</option>
</select>
</div>
</div>
<div class="col-12">
<div class="form-inner">
<label>City</label>
<select name="city" id="checkout_city">
    <option value="">Select State First</option>
</select>
</div>
</div>
<div class="col-12">
<div class="form-inner">
<input type="hidden" name="address_id">

<label>Street Address Line 1</label>
<input type="text" name="streetaddress1" placeholder="House and street name">
</div>
</div>
<div class="col-12">
    <div class="form-inner">
    <label>Street Address Line 2 <small>(optional)</small></label>
    <input type="text" name="streetaddress2" placeholder="House and street name">
    </div>
    </div>
<div class="col-12">
<div class="form-inner">
 <label>Postal / Zip Code</label>
<input type="text" name="postalcode" placeholder="Post Code / Zip Code">
</div>
</div>
<div class="col-12">
<div class="form-inner">
<label>Contact Number 1</label>
<input type="text" name="contactNumber1" placeholder="Your Phone Number">
</div>
</div>
<div class="col-12">
    <div class="form-inner">
    <label>Contact Number 2 <small>(optional)</small></label>
    <input type="text" name="contactNumber2" placeholder="Your Phone Number">
    </div>
    </div>
</div>
</div>
</div>
<div class="col-lg-5">
<div class="added-product-summary mb-30">
<h5>Order Summary</h5>
<ul class="added-products">
    @php
    $totalAmount  = 0 ;
    $shippingFees = 0 ;
     @endphp

@foreach ($data['cart'] as $cart )


<li class="single-product">
<div class="product-area">
<div class="product-img">
<img src="{{ asset('assets/Productimages/'.$cart->product->image)}}" alt>
</div>
<div class="product-info">
<h5><a href="#">{{ $cart->product->name }}</a></h5>
<div class="product-total">
<div class="quantity-counter">
    <input name="cart_id" type="hidden"  value="{{$cart->id}}">
    <input name="cart_ids[]" type="hidden"  value="{{$cart->id}}">

    <a href="#" class="quantity__minus minus-cart"><i class="bx bx-minus minus-cart"></i></a>
    <input type="hidden" name="cart_quantity[]" value="{{ $cart->quantity }}">
    <input name="quantity" type="text" class="quantity__input" value="{{$cart->quantity}}">
    <a href="#" class="quantity__plus plus-cart"><i class="bx bx-plus"></i></a>
</div>

 @php
$currentDate = \Carbon\Carbon::now();

// Total delivery duration
$totalDeliveryDuration = $cart->product->delivery_duration;

// Ensure $currentDate is a Carbon instance
if (!($currentDate instanceof Carbon)) {
    $currentDate = \Carbon\Carbon::parse($currentDate);
}

// Calculate the last delivery date
$lastDeliveryDate = $currentDate->addDays($totalDeliveryDuration);

// Convert the last delivery date to a formatted string
$lastDeliveryDateString = $lastDeliveryDate->toDateString();

 $price   =  0 ;
 if($cart->product->sale_status == 1)
 {
    $price  = $cart->product->discounted_price * $cart->quantity ;
 }
 else {

    $price  = $cart->product->price * $cart->quantity;
 }
 $totalAmount  += $price ;
 $shippingFees += $cart->product->shipping_fees;
 @endphp
<span class="product-price totalprice">Rs,{{$price}}</span>
<input type="hidden" name="DeliveryDate[]" value="{{ $lastDeliveryDate }}">
</strong>
</div>
</div>
</div>
<input name="cartId" type="hidden"  value="{{$cart->id}}">
<div class="delete-btn delete-icon">
<i class="bx bx-x"></i>
</div>
</li>
@endforeach


</ul>
</div>
<div class="cost-summary mb-30">
<table class="table cost-summary-table">
<thead>
<tr>
<th>Subtotal</th>
<th id="subTotal">PKR, {{$totalAmount}}</th>
</tr>
</thead>
<tbody>
<tr>
<td class="tax">Delivery Charges</td>
<td id="shipping_fees">PKR,{{ $shippingFees }}</td>
</tr>

</tbody>
</table>
</div>
<div class="cost-summary total-cost mb-30">
<table class="table cost-summary-table total-cost">
<thead>
<tr>
<th>Total</th>
<th id="totalAmount">PKR,{{ $totalAmount + $shippingFees }}</th>
<input type="hidden" name="total_price" value="{{ $totalAmount + $shippingFees }}">
</tr>
</thead>
</table>
</div>

<div class="payment-methods mb-30">
<div class="form-group">
    <label for="" class="mb-3 "><b>Select Payment Method</b></label>
    <select name="payment_method" id="">
        <option value="">Select Payment</option>
        <option value="Cash on Delivery">Cash on Delivery</option>
    </select>
</div>
</div>
<div class="place-order-btn">
<button type="submit" id="checkoutBtn" class="primary-btn1 hover-btn3">Place Order</button>
</div>
</form>
</div>
</div>
</div>
</div>


<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/css/custom/cart.js') }}"></script>
<script src="{{ asset('assets/css/custom/checkout.js') }}"></script>
<script>
    let deleteCartRoute   = "{{ route('cart.delete') }}";
    let addQuantityRoute  = "{{ route('cart.plus') }}" ;
    let minusQuantityCart = "{{ route('cart.minus') }}" ;
    let addAddressRoute   = "{{ route('add.address') }}" ;
    let deleteAddress     = "{{ route('delete.address') }}";
    let getAddress        = "{{ route('get.address') }}"  ;
    let specificAddress   = "{{ route('specific.address') }}";
    let FindState         = "{{ route('state.get') }}";
    let FindCity          = "{{ route('city.get') }}";
    let accountRoute      = "{{ route('myaccount') }}";
</script>

@endsection
