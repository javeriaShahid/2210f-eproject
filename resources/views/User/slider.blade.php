

@extends('user.Layout')
@section('content')
@section('title')
Products
@endsection
<div class="breadcrumb-section">
<div class="container">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ route('user.index') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Shop</li>
<li class="breadcrumb-item active" aria-current="page">Shop Slider</li>
</ol>
</nav>
</div>
</div>


<div class="best-selling-section mb-110">
  @if($data['product']->count() >= 1)
  <div class="container">
    <div class="section-title2 mt-3">
        <h3>{{ $data['title'] }}</h3>
        <div class="all-product hover-underline">
            <a href="slider">*View All Product
                <svg width="33" height="13" viewBox="0 0 33 13" xmlns="http://www.w3.org/2000/svg">
                    <path d="M25.5083 7.28L0.491206 7.25429C0.36093 7.25429 0.23599 7.18821 0.143871 7.0706C0.0517519 6.95299 0 6.79347 0 6.62714C0 6.46081 0.0517519 6.3013 0.143871 6.18369C0.23599 6.06607 0.36093 6 0.491206 6L25.5088 6.02571C25.6391 6.02571 25.764 6.09179 25.8561 6.2094C25.9482 6.32701 26 6.48653 26 6.65286C26 6.81919 25.9482 6.9787 25.8561 7.09631C25.764 7.21393 25.6386 7.28 25.5083 7.28Z" />
                    <path d="M33.0001 6.50854C29.2204 7.9435 24.5298 10.398 21.623 13L23.9157 6.50034L21.6317 0C24.5358 2.60547 29.2224 5.06539 33.0001 6.50854Z" />
                </svg>
            </a>
        </div>
    </div>
    <div class="row gy-4">
    @foreach ( $data['product'] as $product )


        <div class="col-lg-4 col-md-6">
    <div class="product-card hover-btn">
    <div class="product-card-img double-img">
    <a href="accordion">
    <img src="{{ asset('assets/Productimages/' . $product->image) }}" style="height:280px!important;object-fit:contain" alt class="img1">
    <?php
        $subimage   = \DB::table('productimages')->where('product_id' , $product->id)->first();

        ?>

    <img src="{{ asset('assets/subImages/' . $subimage->image) }}" style="height:280px!important;object-fit:contain" alt class="img2">
    @if($product->sale_status == 1)
    <div class="countdown-timer">
        <ul data-countdown="{{ $product->discounted_end_time }} 00:00:00">
        <li class="times" data-days="00">00</li>
        <li>
        :
        </li>
        <li class="times" data-hours="00">00</li>
        <li>
        :
        </li>
        <li class="times" data-minutes="00">00</li>
        <li>
        :
        </li>
        <li class="times" data-seconds="00">00</li>
        </ul>
        </div>
        <div class="batch">
        <span class="new">Deal</span>
        <span>- {{$product->discount_percentage}}%</span>
        </div>
        @endif
    </a>
    <div class="overlay">
    <div class="cart-area">
        @if(session()->has('user'))
    <input type="hidden" name="productId" value="{{ $product->id }}">
    <button type="button"  class="hover-btn3 add-cart-btn addToCart"><i class="bi bi-bag-check"></i> Add To Cart</button>
    @else
    <a  href="{{ route('cart.error') }}" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
    @endif
    </div>
    </div>
    <div class="view-and-favorite-area">
    <ul>
    <li>
    <a href="wishlist">
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
    <g clip-path="url(#clip0_168_378)">
    <path d="M16.528 2.20919C16.0674 1.71411 15.5099 1.31906 14.8902 1.04859C14.2704 0.778112 13.6017 0.637996 12.9255 0.636946C12.2487 0.637725 11.5794 0.777639 10.959 1.048C10.3386 1.31835 9.78042 1.71338 9.31911 2.20854L9.00132 2.54436L8.68352 2.20854C6.83326 0.217151 3.71893 0.102789 1.72758 1.95306C1.63932 2.03507 1.5541 2.12029 1.47209 2.20854C-0.490696 4.32565 -0.490696 7.59753 1.47209 9.71463L8.5343 17.1622C8.77862 17.4201 9.18579 17.4312 9.44373 17.1868C9.45217 17.1788 9.46039 17.1706 9.46838 17.1622L16.528 9.71463C18.4907 7.59776 18.4907 4.32606 16.528 2.20919ZM15.5971 8.82879H15.5965L9.00132 15.7849L2.40553 8.82879C0.90608 7.21113 0.90608 4.7114 2.40553 3.09374C3.76722 1.61789 6.06755 1.52535 7.5434 2.88703C7.61505 2.95314 7.68401 3.0221 7.75012 3.09374L8.5343 3.92104C8.79272 4.17781 9.20995 4.17781 9.46838 3.92104L10.2526 3.09438C11.6142 1.61853 13.9146 1.52599 15.3904 2.88767C15.4621 2.95378 15.531 3.02274 15.5971 3.09438C17.1096 4.71461 17.1207 7.2189 15.5971 8.82879Z" />
    </g>
    </svg>
    </a>
    </li>
    <li>
    <a data-bs-toggle="modal" data-bs-target="#product-view">
    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
    <path d="M21.8601 10.5721C21.6636 10.3032 16.9807 3.98901 10.9999 3.98901C5.019 3.98901 0.335925 10.3032 0.139601 10.5718C0.0488852 10.6961 0 10.846 0 10.9999C0 11.1537 0.0488852 11.3036 0.139601 11.4279C0.335925 11.6967 5.019 18.011 10.9999 18.011C16.9807 18.011 21.6636 11.6967 21.8601 11.4281C21.951 11.3039 21.9999 11.154 21.9999 11.0001C21.9999 10.8462 21.951 10.6963 21.8601 10.5721ZM10.9999 16.5604C6.59432 16.5604 2.77866 12.3696 1.64914 10.9995C2.77719 9.62823 6.58487 5.43955 10.9999 5.43955C15.4052 5.43955 19.2206 9.62969 20.3506 11.0005C19.2225 12.3717 15.4149 16.5604 10.9999 16.5604Z" />
    <path d="M10.9999 6.64832C8.60039 6.64832 6.64819 8.60051 6.64819 11C6.64819 13.3994 8.60039 15.3516 10.9999 15.3516C13.3993 15.3516 15.3515 13.3994 15.3515 11C15.3515 8.60051 13.3993 6.64832 10.9999 6.64832ZM10.9999 13.9011C9.40013 13.9011 8.09878 12.5997 8.09878 11C8.09878 9.40029 9.40017 8.0989 10.9999 8.0989C12.5995 8.0989 13.9009 9.40029 13.9009 11C13.9009 12.5997 12.5996 13.9011 10.9999 13.9011Z" />
    </svg>
    </a>
    </li>
    </ul>
    </div>
    </div>
    <div class="product-card-content">
    <h6><a href="accordion" class="hover-underline">{{ $product->name}}</a></h6>
    <p><a href="#">{{$product->brand->name}}</a></p>
    @if($product->sale_status == 1)
    <p class="price">Rs,{{$product->discounted_price}} <del class="text-danger">Rs,{{ $product->price }}</del></p>
    @else
    <p class="price">Rs,{{$product->price}}</p>
    @endif
    </div>
    <span class="for-border"></span>
    </div>
    </div> @endforeach
    <div>{{ $data['product']->links() }}</div>
    <div class="modal product-view-modal" id="product-view">
    <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-body">
    <div class="close-btn" data-bs-dismiss="modal">
    </div>
    <div class="shop-details-top-section">
    <div class="row gy-4">
    <div class="col-lg-6">
    <div class="shop-details-img">
    <div class="tab-content" id="view-tabContent">
    <div class="tab-pane fade show active" id="view-pills-img1" role="tabpanel">
    <div class="shop-details-tab-img">
    <img src="assets/img/inner-page/shop-details-tab-img1.png" alt>
    </div>
    </div>
    <div class="tab-pane fade" id="view-pills-img2" role="tabpanel">
    <div class="shop-details-tab-img">
    <img src="assets/img/inner-page/shop-details-tab-img2.png" alt>
    </div>
    </div>
    <div class="tab-pane fade" id="view-pills-img3" role="tabpanel">
    <div class="shop-details-tab-img">
    <img src="assets/img/inner-page/shop-details-tab-img3.png" alt>
    </div>
    </div>
    <div class="tab-pane fade" id="view-pills-img4" role="tabpanel">
    <div class="shop-details-tab-img">
    <img src="assets/img/inner-page/shop-details-tab-img4.png" alt>
    </div>
    </div>
    </div>
    <div class="nav nav-pills" id="view-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link active" id="view-pills-img1-tab" data-bs-toggle="pill" data-bs-target="#view-pills-img1" type="button" role="tab" aria-controls="view-pills-img1" aria-selected="true">
    <img src="assets/img/inner-page/shop-details-nav-img1.png" alt>
    </button>
    <button class="nav-link" id="view-pills-img2-tab" data-bs-toggle="pill" data-bs-target="#view-pills-img2" type="button" role="tab" aria-controls="view-pills-img2" aria-selected="false">
    <img src="assets/img/inner-page/shop-details-nav-img2.png" alt>
    </button>
    <button class="nav-link" id="view-pills-img3-tab" data-bs-toggle="pill" data-bs-target="#view-pills-img3" type="button" role="tab" aria-controls="view-pills-img3" aria-selected="false">
    <img src="assets/img/inner-page/shop-details-nav-img3.png" alt>
    </button>
    <button class="nav-link" id="view-pills-img4-tab" data-bs-toggle="pill" data-bs-target="#view-pills-img4" type="button" role="tab" aria-controls="view-pills-img4" aria-selected="false">
    <img src="assets/img/inner-page/shop-details-nav-img4.png" alt>
    </button>
    </div>
    </div>
    </div>

<div class="gift-section">
<img src="assets/img/home1/gift-card-img1.png" alt class="gift-img1">
<img src="assets/img/home1/gift-card-img2.png" alt class="gift-img2">
<div class="container-lg container-fluid">
<div class="gift-wrapper">
<h5>DAZZLE GIFT CARD</h5>
<div class="gift-card-content">
<p>Whatever your summer looks like, bring your own heat with up to 25% off Lumin Brand.Pellentesque
ipsum dui.</p>
</div>
<a href="gift-card.html" class="primary-btn1 hover-btn3">*Shop Gift Cards*</a>
</div>
</div>
  @else
  <div class="text-center text-danger mt-5 mb-5">No Products Found</div>
  @endif
</div>



<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/css/custom/cart.js') }}"></script>
<script>
    let addToCartRoute  = "{{ route('cart.store') }}";
</script>
@endsection
