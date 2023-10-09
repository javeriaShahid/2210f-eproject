

@extends('user.Layout')
@section('content')
@section('title')
Our Brands
@endsection

<div class="breadcrumb-section">
<div class="container">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Our Brand</li>
</ol>
</nav>
</div>
</div>


<div class="brands-section mt-110 mb-110">
<div class="container">
<div class="brands-section-title mb-70">
<p>EXPLORE</p>
<h1>Brands</h1>
</div>
<div class="row border-remove row-cols-xl-5 row-cols-lg-4 row-cols-sm-3 row-cols-1 g-0">
@foreach ($data['brand'] as $brand )

<div class="col">
    <div class="client-logo">
    <a href="shop-list.html">
    <img src="{{ asset('assets/BrandImages/' . $brand->image) }}" style="height: 100px ;width:200px ; object-fit:Contain;" alt>
    </a>
    </div>
    </div>
@endforeach
</div>
</div>
</div>


<div class="gift-section">
<img src="assets/img/home1/gift-card-img1.png" alt class="gift-img1">
<img src="assets/img/home1/gift-card-img2.png" alt class="gift-img2">
<div class="container-lg container-fluid">
<div class="gift-wrapper">
<h5>BEAUTICO GIFT CARD</h5>
<div class="gift-card-content">
<p>Whatever your summer looks like, bring your own heat with up to 25% off Lumin Brand.Pellentesque ipsum dui.</p>
</div>
<a href="gift-card.html" class="primary-btn1 hover-btn3">*Shop Gift Cards*</a>
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

<!-- Mirrored from demo-egenslab.b-cdn.net/html/beautico/preview/our-brand.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Sep 2023 11:35:45 GMT -->
</html>

@endsection
