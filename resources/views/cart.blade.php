

@extends('Layout')
@section('content')

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo-egenslab.b-cdn.net/html/beautico/preview/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Sep 2023 11:36:14 GMT -->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="assets/css/bootstrap.min.css" rel="stylesheet">

<link href="assets/css/bootstrap-icons.css" rel="stylesheet">

<link href="assets/css/all.min.css" rel="stylesheet">
<link href="assets/css/nice-select.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">

<link href="assets/css/fontawesome.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/boxicons.min.css">

<link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
<link rel="stylesheet" href="assets/css/slick-theme.css">
<link rel="stylesheet" href="assets/css/slick.css">

<link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<title>Dazzle</title>
<link rel="icon" href="assets/img/sm-logo.svg" type="image/gif">
</head>
<body>



<div class="breadcrumb-section">
<div class="container">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
<tr>
<td>
<div class="delete-icon">
<i class="bi bi-x-lg"></i>
</div>
</td>
<td data-label="Product" class="table-product">
<div class="product-img">
<img src="assets/img/inner-page/whistlist-img1.png" alt>
</div>
<div class="product-content">
<h6><a href="#">Eau De Blue Perfume</a></h6>
</div>
</td>
<td data-label="Price">
<p class="price">
<del>$40.00</del>
$30.00
</p>
</td>
<td data-label="Quantity">
<div class="quantity-counter">
<a href="#" class="quantity__minus"><i class="bx bx-minus"></i></a>
<input name="quantity" type="text" class="quantity__input" value="01">
<a href="#" class="quantity__plus"><i class="bx bx-plus"></i></a>
</div>
</td>
<td data-label="Total">
$30.00
</td>
</tr>
<tr>
<td>
<div class="delete-icon">
<i class="bi bi-x-lg"></i>
</div>
</td>
<td data-label="Product" class="table-product">
<div class="product-img">
<img src="assets/img/inner-page/whistlist-img2.png" alt>
</div>
<div class="product-content">
<h6><a href="#">Smooth Makeup Box</a></h6>
</div>
</td>
<td data-label="Price">
<p class="price">
<del>$40.00</del>
$25.00
</p>
</td>
<td data-label="Quantity">
<div class="quantity-counter">
<a href="#" class="quantity__minus"><i class="bx bx-minus"></i></a>
<input name="quantity" type="text" class="quantity__input" value="01">
<a href="#" class="quantity__plus"><i class="bx bx-plus"></i></a>
</div>
</td>
<td data-label="Total">
$50.00
</td>
</tr>
<tr>
<td>
<div class="delete-icon">
<i class="bi bi-x-lg"></i>
</div>
</td>
<td data-label="Product" class="table-product">
<div class="product-img">
<img src="assets/img/inner-page/whistlist-img3.png" alt>
</div>
<div class="product-content">
<h6><a href="#">Modern Red Lipstick</a></h6>
</div>
</td>
<td data-label="Price">
<p class="price">
<del>$40.00</del>
$32.00
</p>
</td>
<td data-label="Quantity">
<div class="quantity-counter">
<a href="#" class="quantity__minus"><i class="bx bx-minus"></i></a>
<input name="quantity" type="text" class="quantity__input" value="01">
<a href="#" class="quantity__plus"><i class="bx bx-plus"></i></a>
</div>
</td>
<td data-label="Total">
$30.00
</td>
</tr>
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
<th>$128.70</th>
</tr>
</thead>
<tbody>
<tr>
<td>Shipping</td>
<td>
<ul class="cost-list text-start">
<li>Shipping Fee</li>
<li>Total ( tax excl.)</li>
<li>Total ( tax incl.)</li>
<li>Taxes</li>
<li>Shipping Enter your address to view shipping options. <br> <a href="#">Calculate
shipping</a>
</li>
</ul>
</td>
<td>
<ul class="single-cost text-center">
<li>Fee</li>
<li>$15</li>
<li></li>
<li>$15</li>
<li>$15</li>
<li>$5</li>
</ul>
</td>
</tr>
<tr>
<td>Subtotal</td>
<td></td>
<td>$162.70</td>
</tr>
</tbody>
</table>
<button type="submit" class="primary-btn1 hover-btn3">Product Checkout</button>
</div>
</div>
</div>
</div>



<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>

<script src="assets/js/jquery.fancybox.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slick.js"></script>

<script src="assets/js/swiper-bundle.min.js"></script>

<script src="assets/js/jquery.fancybox.min.js"></script>

<script src="assets/js/main.js"></script>
</body>

<!-- Mirrored from demo-egenslab.b-cdn.net/html/beautico/preview/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Sep 2023 11:36:16 GMT -->
</html>

@endsection
