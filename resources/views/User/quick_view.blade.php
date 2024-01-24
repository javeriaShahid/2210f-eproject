

@extends('user.Layout')
@section('content')
@section('title')
{{ @$data['title']}}
@endsection

@php
$data['top-product'] = \App\Models\FeedBack::orderBy('rating' , 'desc')->limit(3)->get();
$data['categories'] = \App\Models\Category::withoutTrashed()->get();
$data['brands'] = \App\Models\Brand::withoutTrashed()->get();
@endphp

<div class="breadcrumb-section">
<div class="container">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Shop</li>
<li class="breadcrumb-item active" aria-current="page">Quick View</li>
</ol>
</nav>
</div>
</div>


<div class="left-sidebar-section column-sidebar-padding mt-110 mb-110">
<div class="container-fluid">
<div class="row gy-5 justify-content-center">
<div class="col-xl-3 col-md-8">
<div class="sidebar-area">
<div class="shop-widget mb-30">
<h5 class="shop-widget-title">Price Filter</h5>
<div class="range-wrap">
<div class="row">
<div class="col-sm-12">
<form>
<input type="text" name="min-value" value>
<input type="text" name="max-value" value>
</form>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div id="slider-range"></div>
</div>
</div>
<div class="slider-labels">
<div class="caption">
<span id="slider-range-value1"></span>
</div>
<a href="#" id="ApplyFilterRange">Apply</a>
<div class="caption">
<span id="slider-range-value2"></span>
</div>
</div>
</div>
</div>
<div class="shop-widget mb-30">
<div class="check-box-item">
<h5 class="shop-widget-title">Categories</h5>
<ul class="shop-item">
<li>
<a class="category-filter " data-id="0" style="cursor: pointer">All Product</a>
</li>

@foreach ($data['categories']  as $category)
<li >
    <a style="cursor: pointer" class="category-filter " data-id="{{ $category->id}}">{{ $category->name }}</a>
</li>
@endforeach
</ul>
</div>
</div>
<div class="shop-widget mb-30">
<div class="check-box-item">
<h5 class="shop-widget-title">Our Brand </h5>
<ul class="shop-item">
@foreach ($data['brands'] as $brand )
<li class="brand-list">
<a style="cursor: pointer" data-id='{{ $brand->id }}' class="brand-filter">{{ $brand->name }}
<span>{{ $brand->product->count() }}</span>
</a>
</li>
@endforeach
</ul>
</div>
</div>
<div class="shop-widget">
<h5 class="shop-widget-title">Top Rated Product</h5>
@foreach ($data['top-product'] as $topProduct)
<div class="top-product-widget mb-20">
    <div class="top-product-img">
    <a  href="{{ route("accordion" ,  @$topProduct->products->id) }}"><img style="width: 70px!important;height:60px!important; object-fit:cover;" src="{{ asset('ProductImages/' . @$topProduct->products->image) }}" alt></a>
    </div>
    <div class="top-product-content">
    <h6><a href="{{ route("accordion" ,  @$topProduct->products->id) }}"> {{ @$topProduct->products->name }}</a></h6>
    @if(@$topProduct->products->sale_status == 1)
    <span>PKR, {{ @$topProduct->products->discounted_price }} <del>PKR, {{ @$topProduct->products->price }}</del></span>
    @else
    <span>PKR, {{ @$topProduct->products->price }}</span>
    @endif
    </div>
    </div>

@endforeach


</div>
</div>
</div>
<div class="col-xl-9">
<div class="shop-columns-title-section mb-40">
<p>Showing {{ $data['product']->firstItem() }}–{{ $data['product']->lastItem() }} of {{ $data['product']->total() }} Results</p>
<div class="filter-selector">
<div class="selector two">
<select class="sortByPrice">
<option value="">Default Sorting</option>
<option value="asc">Price Low to High</option>
<option value="desc">Price High to Low</option>
</select>
</div>
<ul class="grid-view">
<li class="column-2">
<svg xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 20">
<g>
<rect width="4.88136" height="5.10638" rx="2.44068" />
<rect y="7.44678" width="4.88136" height="5.10638" rx="2.44068" />
<rect y="14.8937" width="4.88136" height="5.10638" rx="2.44068" />
<rect x="7.11865" width="4.88136" height="5.10638" rx="2.44068" />
<rect x="7.11865" y="7.44678" width="4.88136" height="5.10638" rx="2.44068" />
<rect x="7.11865" y="14.8937" width="4.88136" height="5.10638" rx="2.44068" />
</g>
</svg>
</li>
<li class="column-3 active">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
<g clip-path="url(#clip0_1610_1442)">
<rect width="5.10638" height="5.10638" rx="2.55319" />
<rect y="7.44678" width="5.10638" height="5.10638" rx="2.55319" />
<rect y="14.8937" width="5.10638" height="5.10638" rx="2.55319" />
<rect x="7.44678" width="5.10638" height="5.10638" rx="2.55319" />
<rect x="7.44678" y="7.44678" width="5.10638" height="5.10638" rx="2.55319" />
<rect x="7.44678" y="14.8937" width="5.10638" height="5.10638" rx="2.55319" />
<rect x="14.8936" width="5.10638" height="5.10638" rx="2.55319" />
<rect x="14.8936" y="7.44678" width="5.10638" height="5.10638" rx="2.55319" />
<rect x="14.8936" y="14.8937" width="5.10638" height="5.10638" rx="2.55319" />
</g>
</svg>
</li>
<li class="column-4">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
<g clip-path="url(#clip0_1610_1453)">
<rect width="3.64741" height="3.64741" rx="1.8237" />
<rect y="8.17627" width="3.64741" height="3.64741" rx="1.8237" />
<rect y="16" width="3.64741" height="3.64741" rx="1.8237" />
<rect x="5.31909" width="3.64741" height="3.64741" rx="1.8237" />
<rect x="5.31909" y="8.17627" width="3.64741" height="3.64741" rx="1.8237" />
<rect x="5.31909" y="16" width="3.64741" height="3.64741" rx="1.8237" />
<rect x="10.6382" width="3.64741" height="3.64741" rx="1.8237" />
<rect x="16.3525" width="3.64741" height="3.64741" rx="1.8237" />
<rect x="10.6384" y="8.17627" width="3.64741" height="3.64741" rx="1.8237" />
<rect x="16.3525" y="8.17627" width="3.64741" height="3.64741" rx="1.8237" />
<rect x="10.6382" y="16" width="3.64741" height="3.64741" rx="1.8237" />
<rect x="16.3525" y="16" width="3.64741" height="3.64741" rx="1.8237" />
</g>
</svg>
</li>
</ul>
</div>
</div>
<div class="all-products list-grid-product-wrap">
<div class="row gy-4 mb-80 " id="productContainer">

@if($data['product']->count() >= 1)
@foreach ($data['product'] as $product )

<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 item">
<div class="product-card style-3 hover-btn">
<div class="product-card-img double-img">
<a href="{{ route('accordion' , $product->id) }}">
<img src="{{ asset('ProductImages/' . $product->image) }}" alt style="height:280px!important;object-fit:cover"  class="img1">
<?php
$subimage   = \DB::table('productimages')->where('product_id' , $product->id)->first();
?>

<img src="{{ asset('ProductSubImages/' . $subimage->image) }}" style="height:280px!important;object-fit:cover" alt class="img2">
@if($product->sale_status == 1)
<div class="batch">
    <span>-{{ $product->discount_percentage }} %</span>
    </div>
@endif
</a>
<div class="overlay">
<div class="cart-area">
<a href="{{ route('accordion' , $product->id) }}" class="hover-btn3 add-cart-btn" >*Quick View*</a>
</div>
</div>
<div class="view-and-favorite-area">
<ul>
<li>
<a href="whistlist.html">
<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
<g clip-path="url(#clip0_168_378)">
<path d="M16.528 2.20919C16.0674 1.71411 15.5099 1.31906 14.8902 1.04859C14.2704 0.778112 13.6017 0.637996 12.9255 0.636946C12.2487 0.637725 11.5794 0.777639 10.959 1.048C10.3386 1.31835 9.78042 1.71338 9.31911 2.20854L9.00132 2.54436L8.68352 2.20854C6.83326 0.217151 3.71893 0.102789 1.72758 1.95306C1.63932 2.03507 1.5541 2.12029 1.47209 2.20854C-0.490696 4.32565 -0.490696 7.59753 1.47209 9.71463L8.5343 17.1622C8.77862 17.4201 9.18579 17.4312 9.44373 17.1868C9.45217 17.1788 9.46039 17.1706 9.46838 17.1622L16.528 9.71463C18.4907 7.59776 18.4907 4.32606 16.528 2.20919ZM15.5971 8.82879H15.5965L9.00132 15.7849L2.40553 8.82879C0.90608 7.21113 0.90608 4.7114 2.40553 3.09374C3.76722 1.61789 6.06755 1.52535 7.5434 2.88703C7.61505 2.95314 7.68401 3.0221 7.75012 3.09374L8.5343 3.92104C8.79272 4.17781 9.20995 4.17781 9.46838 3.92104L10.2526 3.09438C11.6142 1.61853 13.9146 1.52599 15.3904 2.88767C15.4621 2.95378 15.531 3.02274 15.5971 3.09438C17.1096 4.71461 17.1207 7.2189 15.5971 8.82879Z" />
</g>
</svg>
</a>
</li>
<li>
<a href="{{ route('accordion' , $product->id) }}" title="View Product">
<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 12 12" fill="none">
<g clip-path="url(#clip0_1624_9279)">
<path d="M9.34308 12H2.65737C1.24308 12 0.0859375 10.8429 0.0859375 9.42857V9.34286L0.34308 2.48571C0.385937 1.07143 1.54308 0 2.91451 0H9.08594C10.4574 0 11.6145 1.07143 11.6574 2.48571L11.9145 9.34286C11.9574 10.0286 11.7002 10.6714 11.2288 11.1857C10.7574 11.7 10.1145 12 9.42879 12H9.34308ZM2.91451 0.857143C1.97165 0.857143 1.24308 1.58571 1.20022 2.48571L0.94308 9.42857C0.94308 10.3714 1.71451 11.1429 2.65737 11.1429H9.42879C9.90022 11.1429 10.3288 10.9286 10.6288 10.5857C10.9288 10.2429 11.1002 9.81429 11.1002 9.34286L10.8431 2.48571C10.8002 1.54286 10.0717 0.857143 9.12879 0.857143H2.91451Z" />
<path d="M6.00018 5.14244C4.32875 5.14244 3.00018 3.81387 3.00018 2.14244C3.00018 1.8853 3.17161 1.71387 3.42875 1.71387C3.6859 1.71387 3.85733 1.8853 3.85733 2.14244C3.85733 3.34244 4.80018 4.2853 6.00018 4.2853C7.20018 4.2853 8.14304 3.34244 8.14304 2.14244C8.14304 1.8853 8.31447 1.71387 8.57161 1.71387C8.82875 1.71387 9.00018 1.8853 9.00018 2.14244C9.00018 3.81387 7.67161 5.14244 6.00018 5.14244Z" />
</g>
</svg>
</a>
</li>
</ul>
</div>
</div>


<div class="product-card-content">
<h6><a href="{{ route('accordion' , $product->id) }}" class="hover-underline">{{ $product->name }}</a></h6>
<p><a href="{{ route('accordion' , $product->id) }}">{{ @$product->brand->name }}</a></p>
@if ($product->sale_status == 1)
<p class="price">PKR , {{ $product->discounted_price }} <del>PKR, {{ $product->price }}</del></p>
@else
<p class="price">PKR, {{ $product->price }}</del></p>
@endif

@php
    $data['feedback'] = \App\Models\Feedback::where('product_id' , $product->id )->get();
@endphp

<div class="rating">
<ul>
    <?php
    $totalRatings = 0;
    $totalRecords = count($data['feedback']);

    // Calculate total ratings
    foreach ($data['feedback'] as $feedback) {
        $totalRatings += $feedback->rating;
    }

    // Calculate average rating
    $averageRating = ($totalRecords > 0) ? ($totalRatings / $totalRecords) : 0;

    // Maximum possible rating stars
    $maxStars = 5;

    // Calculate the number of full stars
    $fullStars = floor($averageRating / $maxStars);
    $halfStar = $averageRating % $maxStars >= ($maxStars / 2);

    // Display full stars
    for ($i = 0; $i < $fullStars; $i++) {
        echo '<li><i class="bi bi-star-fill"></i></li>';
    }

    // Display half star if needed
    if ($halfStar) {
        echo '<li><i class="bi bi-star-half"></i></li>';
        $fullStars++; // Increment the count of full stars for proper spacing
    }

    // Display remaining empty stars
    $emptyStars = $maxStars - $fullStars;
    for ($i = 0; $i < $emptyStars; $i++) {
        echo '<li><i class="bi bi-star"></i></li>';
    }
    ?>
</ul>
<span>({{ $data['feedback']->count() }})</span>
</div>

</div>
<span class="for-border"></span>
</div>
</div>
@endforeach
</div>
</div>

@else
<center><b class="text-danger">No Products Available</b></center>
@endif
<center><img class="loader-ajax" style="display: none" src="{{ asset('assets/css/ajax-loader.gif') }}" alt=""></center>



{{ $data['product']->links() }}

</div>
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
<p>Whatever your summer looks like, bring your own heat with up to 25% off Lumin Brand.Pellentesque ipsum dui.</p>
</div>
<a href="gift-card.html" class="primary-btn1 hover-btn3">*Shop Gift Cards*</a>
</div>
</div>
</div>
<script src="{{ asset("assets/js/jquery-3.6.0.min.js") }}"></script>
<script src="{{ asset('assets/js/range-slider.js') }}"></script>
<script src="{{ asset("assets/css/custom/filter.js") }}"></script>
<script>
    let rangeRoute    = "{{ route('filter.price') }}";
    let categoryRoute = "{{ route('filter.category') }}";
    let brandRoute    = "{{ route('filter.brand') }}";
    let sortRoute    =  "{{ route('filter.sort') }}";
    let accordion     = "{{ route('accordion') }}";
    let baseUrl       = "{{ asset('') }}";
</script>
@endsection
