

@extends('User.layout')
@section('content')
@section('title')
Carts
@endsection
<!DOCTYPE html>


<div class="breadcrumb-section">
<div class="container">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Shop</li>
<li class="breadcrumb-item active" aria-current="page">Cart</li>
</ol>
</nav>
</div>
</div>


<div class="whistlist-section cart mt-110 mb-110">
<div class="container">
<div class="row mb-50">
<div class="col-12">
<div class="whistlist-table">
<table class="eg-table2">
<thead>
<tr>
<th></th>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
</tr>
</thead>
<tbody>
    @php
    $totalAmount  = 0 ;
    $shippingFees = 0 ;
     @endphp
    @if($data['cart']->count() < 1)
    <tr>

     <td  colspan="6"><center><span class="text-danger">No Items Left</span></center></td>

     </tr>
     @else
@foreach ($data['cart'] as $cart )
<tr id="cartContainer">
<td>
<input type="hidden" value="{{ $cart->id }}" name="cartId">
<div class="delete-icon">
<i class="bi bi-x-lg"></i>
</div>
</td>
<td data-label="Product" class="table-product">
<div class="product-img">
<img src="{{ asset('Productimages/'. $cart->product->image) }}" alt style="object-fit: cover">
</div>
<div class="product-content">
<h6><a href="#">{{ $cart->product->name }}</a></h6>
</div>
</td>
<td data-label="Price">
<p class="price">
@if($cart->product->sale_status == 1)
<del>PKR ,{{ $cart->product->price }}</del>
PKR ,{{ $cart->product->discounted_price }}
@else
PKR ,{{ $cart->product->price }}
@endif
</p>
</td>
<td data-label="Quantity">
<div class="quantity-counter">
<input name="cart_id" type="hidden"  value="{{$cart->id}}">
<a href="#" class="quantity__minus minus-cart"><i class="bx bx-minus minus-cart"></i></a>
<input name="quantity" type="text" class="quantity__input" value="{{$cart->quantity}}">
<a href="#" class="quantity__plus plus-cart"><i class="bx bx-plus"></i></a>
</div>
</td>
<td class="totalprice" data-label="Total">
@php
if($cart->product->sale_status == 1)
$productTotal = $cart->product->discounted_price  * $cart->quantity ;
else {
$productTotal = $cart->product->price  * $cart->quantity ;
}
$totalAmount  += $productTotal ;
$shippingFees += $cart->product->shipping_fees;
@endphp
PKR ,{{ $productTotal }}

</td>
</tr>
@endforeach
@endif
</tbody>
</table>
</div>
</div>
</div>
<div class="row g-4">
<div class="col-lg-4">
<div class="coupon-area">
<div class="cart-coupon-input">
<h5>Coupon Code</h5>
<form>
<div class="form-inner">
<input type="text" placeholder="Coupon Code">
<button type="submit" class="primary-btn1 hover-btn3">Apply Code</button>
</div>
</form>
</div>
</div>
</div>
<div class="col-lg-8">
<table class="cart-table">
<thead>
<tr>
<th>Cart Totals</th>
<th></th>
<th id="subTotal">PKR,{{ $totalAmount }}</th>
</tr>
</thead>
<tbody>
<tr>
<td>Shipping</td>
<td>
<ul class="cost-list text-start">
<li>Total Shipping Fee</li>

</ul>
</td>
<td>
<ul class="single-cost text-center">
{{-- <li>${{  }}</li> --}}
<li id="shipping_fees">PKR,{{ $shippingFees }}</li>
</ul>
</td>
</tr>
<tr>
<td>Subtotal</td>
<td></td>
@php
    $subTotal  = $totalAmount + $shippingFees  ;

@endphp
<td id="totalAmount">PKR,{{ $subTotal }}</td>
</tr>

</tbody>
</table>
<a href="{{ route('checkout') }}" class="primary-btn1 hover-btn3">Product Checkout</a>
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
