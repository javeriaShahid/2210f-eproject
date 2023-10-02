

@extends('User.layout')
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
<h4>Billing Details</h4>
<form>
<div class="row">
<div class="col-lg-6">
<div class="form-inner">
<label>First Name</label>
<input type="text" name="fname" placeholder="Your first name">
</div>
</div>
<div class="col-lg-6">
<div class="form-inner">
<label>Last Name</label>
<input type="text" name="fname" placeholder="Your last name">
</div>
</div>
<div class="col-12">
<div class="form-inner">
<label>Country / Region</label>
<input type="text" name="fname" placeholder="Your country name">
</div>
</div>
<div class="col-12">
<div class="form-inner">
<label>Street Address</label>
<input type="text" name="fname" placeholder="House and street name">
</div>
</div>
<div class="col-12">
<div class="form-inner">
<select>
<option>Town / City</option>
<option>Dhaka</option>
<option>Saidpur</option>
<option>Newyork</option>
</select>
</div>
</div>
<div class="col-12">
<div class="form-inner">
<input type="text" name="fname" placeholder="Post Code">
</div>
</div>
<div class="col-12">
<div class="form-inner">
<label>Additional Information</label>
<input type="text" name="fname" placeholder="Your Phone Number">
</div>
</div>
<div class="col-12">
<div class="form-inner">
<input type="email" name="email" placeholder="Your Email Address">
</div>
</div>
<div class="col-12">
<div class="form-inner">
<input type="text" name="postcode" placeholder="Post Code">
</div>
</div>
<div class="col-12">
<div class="form-inner">
<textarea name="message" placeholder="Order Notes (Optional)" rows="6"></textarea>
</div>
</div>
</div>
</form>
</div>
<div class="form-wrap box--shadow">
<h4>Ship to a Different Address?</h4>
<form>
<div class="row">
<div class="col-md-6">
<div class="form-inner">
<label>First Name</label>
<input type="text" name="fname" placeholder="Your first name">
</div>
</div>
<div class="col-md-6">
<div class="form-inner">
<label>Last Name</label>
<input type="text" name="fname" placeholder="Your last name">
</div>
</div>
<div class="col-12">
<div class="form-inner">
<textarea name="message" placeholder="Order Notes (Optional)" rows="3"></textarea>
</div>
</div>
</div>
</form>
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
    <a href="#" class="quantity__minus minus-cart"><i class="bx bx-minus minus-cart"></i></a>
    <input name="quantity" type="text" class="quantity__input" value="{{$cart->quantity}}">
    <a href="#" class="quantity__plus plus-cart"><i class="bx bx-plus"></i></a>
</div>

 @php
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
</tr>
</thead>
</table>
</div>
<form class="payment-form">
<div class="payment-methods mb-30">
<ul class="payment-list">
<li class="check-payment">
<div class="form-check payment-check">
<h6>Check payments</h6>
<p class="para">Please send a check to Store Name, Store Street, Store State / Country, Store Postcode.</p>
</div>
<div class="checked">
</div>
</li>
<li class="cash-delivary">
<div class="form-check payment-check">
<h6>Cash on delivery</h6>
<p class="para">Pay with cash upon delivery.</p>
</div>
<div class="checked">
</div>
</li>
<li class="paypal">
<div class="form-check payment-check paypal">
<h6>Paypal</h6>
<img src="assets/img/inner-page/payment.png" alt>
<a href="#" class="about-paypal">What is PayPal?</a>
</div>
<div class="checked">
</div>
</li>
<li class="stripe">
<h6>Card</h6>
<div class="checked">
</div>
</li>
</ul>
<div class="choose-payment-method pt-25 pb-25" id="strip-payment" style="display: none;">
<h5>Select Your Payment Method</h5>
<div class="row gy-4 g-4">
<div class="col-md-12">
<div class="input-area">
<label>Card Number</label>
<div class="input-field">
<input type="text" placeholder="1234 1234 1234 1234">
<img src="assets/img/inner-page/payment.png" alt>
</div>
</div>
</div>
<div class="col-xl-7">
<div class="input-area">
<label>Expiration Date</label>
<div class="row gy-4">
<div class="col-sm-6">
<select>
<option>Month</option>
<option>January</option>
<option>February</option>
<option>March</option>
<option>April</option>
<option>May</option>
<option>June</option>
<option>July</option>
<option>August</option>
<option>September</option>
<option>October</option>
<option>November</option>
<option>December</option>
</select>
</div>
<div class="col-sm-6">
<select>
<option>Day</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
</select>
</div>
</div>
</div>
</div>
<div class="col-xl-5">
<div class="input-area">
<label>CVC</label>
<input type="text" placeholder="123">
</div>
</div>
</div>
</div>
<div class="payment-form-bottom d-flex align-items-start">
<input type="checkbox" class="custom-check-box" id="terms">
<label for="terms">I have read and agree to the website <a href="#">Terms and
conditions</a></label>
</div>
</div>
<div class="place-order-btn">
<button type="submit" class="primary-btn1 hover-btn3">Place Order</button>
</div>
</form>
</div>
</div>
</div>
</div>


<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/css/custom/cart.js') }}"></script>
<script>
    let deleteCartRoute   = "{{ route('cart.delete') }}";
    let addQuantityRoute  = "{{ route('cart.plus') }}" ;
    let minusQuantityCart = "{{ route('cart.minus') }}" ;
</script>

@endsection
