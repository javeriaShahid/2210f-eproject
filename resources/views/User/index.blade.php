

@extends('User.layout')
@section('content')
@section('title')
Home
@endsection
@php
$carousel  = \App\Models\CarouselSetting::where('status' , 1)->get();
$c_banners =  \App\Models\CategoryBanner::where('status' , 1)->get();
$data['aboutUs']  = \App\Models\AboutUs::where("status" , 1)->orderBy('id' , 'desc')->paginate(2);
$data['newProducts'] = \App\Models\Product::where("is_published" , 1)->orderBy("id" , "desc")->get();
$data['dealsBanners'] = \App\Models\DealsBanner::where("status" , 1)->orderBy("id" , "desc")->limit(2)->get();
$data['testimonals'] = \App\Models\Feedback::orderBy("id" , "desc")->paginate(5);
$data['blogs'] = \App\Models\Blogs::where('status' , 1)->orderBy('id' , 'desc')->paginate(3);
$category =  \App\Models\category::withoutTrashed()->get();
@endphp
<div class="banner-section">
<div class="container-fluid p-0">
<div class="row">
<div class="col-lg-12">
<div class="swiper banner1-slider">
<div class="swiper-wrapper">
@foreach($carousel as $items)
<div class="swiper-slide">
<div class="banner-wrapper">
<div class="banner-left">
<img src="assets/img/home1/icon/banner-vector1.svg" alt class="banner-vector1">
<img src="assets/img/home1/icon/banner-vector2.svg" alt class="banner-vector2">
<img src="assets/img/home1/icon/banner-vector3.svg" alt class="banner-vector3">

<div class="banner-content">
<div class="discount">
<img src="assets/img/home1/discount-bg.svg" alt>
<p><strong>{{$items->tag_1}} </strong>{{$items->tag_2}} </p>
</div>
<h1>{{$items->main_title}} </h1>
<p>{{$items->description}} </p>
<a href="{{ route('search.category' , $items->category_id) }}" class="primary-btn1 hover-btn3">*Shop Now* </a>
</div>
</div>
<div class="banner-right-wrapper">
<div class="banner-right-img">
<img src="{{asset('carouselImages/' . $items->image)}}" alt class="banner-right-bg" style="height:650px ; object-fit:cover">
</div>
</div>
</div>
</div>
@endforeach
</div>
<div class="swiper-pagination1"></div>
</div>
</div>
</div>
</div>
</div>
<div class="banner-footer mb-110">
<div class="container-fluid p-0">
<div class="banner-footer-wrapper">
<div class="row g-lg-4 gy-4">
<div class="col-lg-3 col-sm-6 d-flex justify-content-lg-start justify-content-center">
<div class="banner-footer-item">
<div class="banner-footer-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="55" height="32" viewBox="0 0 55 32">
<path d="M14.9999 27.4286H10.4285C10.1254 27.4286 9.83471 27.3082 9.62038 27.0938C9.40605 26.8795 9.28564 26.5888 9.28564 26.2857C9.28564 25.9826 9.40605 25.6919 9.62038 25.4776C9.83471 25.2633 10.1254 25.1429 10.4285 25.1429H14.9999C15.303 25.1429 15.5937 25.2633 15.8081 25.4776C16.0224 25.6919 16.1428 25.9826 16.1428 26.2857C16.1428 26.5888 16.0224 26.8795 15.8081 27.0938C15.5937 27.3082 15.303 27.4286 14.9999 27.4286ZM52.1428 27.4286H49.2857C48.9825 27.4286 48.6919 27.3082 48.4775 27.0938C48.2632 26.8795 48.1428 26.5888 48.1428 26.2857C48.1428 25.9826 48.2632 25.6919 48.4775 25.4776C48.6919 25.2633 48.9825 25.1429 49.2857 25.1429H51.1942L52.7348 16.9326C52.7142 12.7314 49.1256 9.14286 44.7142 9.14286H37.2102L33.5736 25.1429H40.1428C40.4459 25.1429 40.7366 25.2633 40.9509 25.4776C41.1652 25.6919 41.2856 25.9826 41.2856 26.2857C41.2856 26.5888 41.1652 26.8795 40.9509 27.0938C40.7366 27.3082 40.4459 27.4286 40.1428 27.4286H32.1428C31.9713 27.4287 31.802 27.3902 31.6474 27.3159C31.4928 27.2417 31.3569 27.1336 31.2498 26.9997C31.1427 26.8657 31.067 26.7094 31.0285 26.5423C30.99 26.3752 30.9896 26.2016 31.0274 26.0343L35.1828 7.74858C35.2399 7.49542 35.3814 7.26924 35.5842 7.10723C35.7869 6.94521 36.0387 6.85702 36.2982 6.85715H44.7142C50.3851 6.85715 54.9999 11.472 54.9999 17.1429L53.2651 26.496C53.2165 26.7581 53.0776 26.9949 52.8726 27.1652C52.6676 27.3356 52.4094 27.4288 52.1428 27.4286Z" fill="#222222" />
<path d="M44.7142 32C41.5645 32 39 29.4377 39 26.2857C39 23.1337 41.5645 20.5714 44.7142 20.5714C47.864 20.5714 50.4285 23.1337 50.4285 26.2857C50.4285 29.4377 47.864 32 44.7142 32ZM44.7142 22.8572C42.824 22.8572 41.2857 24.3954 41.2857 26.2857C41.2857 28.176 42.824 29.7143 44.7142 29.7143C46.6045 29.7143 48.1428 28.176 48.1428 26.2857C48.1428 24.3954 46.6045 22.8572 44.7142 22.8572ZM19.5714 32C16.4217 32 13.8571 29.4377 13.8571 26.2857C13.8571 23.1337 16.4217 20.5714 19.5714 20.5714C22.7211 20.5714 25.2857 23.1337 25.2857 26.2857C25.2857 29.4377 22.7211 32 19.5714 32ZM19.5714 22.8572C17.6811 22.8572 16.1428 24.3954 16.1428 26.2857C16.1428 28.176 17.6811 29.7143 19.5714 29.7143C21.4617 29.7143 23 28.176 23 26.2857C23 24.3954 21.4617 22.8572 19.5714 22.8572ZM15 6.85716H5.85711C5.554 6.85716 5.26331 6.73675 5.04899 6.52242C4.83466 6.30809 4.71425 6.0174 4.71425 5.7143C4.71425 5.41119 4.83466 5.1205 5.04899 4.90618C5.26331 4.69185 5.554 4.57144 5.85711 4.57144H15C15.3031 4.57144 15.5938 4.69185 15.8081 4.90618C16.0224 5.1205 16.1428 5.41119 16.1428 5.7143C16.1428 6.0174 16.0224 6.30809 15.8081 6.52242C15.5938 6.73675 15.3031 6.85716 15 6.85716ZM15 13.7143H3.57139C3.26829 13.7143 2.9776 13.5939 2.76327 13.3796C2.54894 13.1652 2.42854 12.8745 2.42854 12.5714C2.42854 12.2683 2.54894 11.9776 2.76327 11.7633C2.9776 11.549 3.26829 11.4286 3.57139 11.4286H15C15.3031 11.4286 15.5938 11.549 15.8081 11.7633C16.0224 11.9776 16.1428 12.2683 16.1428 12.5714C16.1428 12.8745 16.0224 13.1652 15.8081 13.3796C15.5938 13.5939 15.3031 13.7143 15 13.7143ZM15 20.5714H1.28568C0.982575 20.5714 0.691885 20.451 0.477557 20.2367C0.26323 20.0224 0.142822 19.7317 0.142822 19.4286C0.142822 19.1255 0.26323 18.8348 0.477557 18.6205C0.691885 18.4061 0.982575 18.2857 1.28568 18.2857H15C15.3031 18.2857 15.5938 18.4061 15.8081 18.6205C16.0224 18.8348 16.1428 19.1255 16.1428 19.4286C16.1428 19.7317 16.0224 20.0224 15.8081 20.2367C15.5938 20.451 15.3031 20.5714 15 20.5714Z" />
<path d="M32.1428 27.4286H24.1428C23.8397 27.4286 23.549 27.3082 23.3347 27.0938C23.1203 26.8795 22.9999 26.5888 22.9999 26.2857C22.9999 25.9826 23.1203 25.6919 23.3347 25.4776C23.549 25.2633 23.8397 25.1429 24.1428 25.1429H31.2308L36.4239 2.28571H10.4285C10.1254 2.28571 9.83471 2.16531 9.62038 1.95098C9.40605 1.73665 9.28564 1.44596 9.28564 1.14286C9.28564 0.839753 9.40605 0.549063 9.62038 0.334735C9.83471 0.120408 10.1254 1.4297e-07 10.4285 1.4297e-07H37.8571C38.0286 -8.56294e-05 38.1979 0.0384228 38.3525 0.112672C38.507 0.186921 38.6429 0.295008 38.7501 0.42892C38.8572 0.562832 38.9328 0.719137 38.9713 0.886249C39.0098 1.05336 39.0102 1.227 38.9725 1.39429L33.2582 26.5371C33.2011 26.7903 33.0596 27.0165 32.8569 27.1785C32.6541 27.3405 32.4023 27.4287 32.1428 27.4286Z" />
</svg>
</div>
<div class="banner-footer-content">
<h5>Free Delivery</h5>
<p>Free product delivary after $500 and get descount over the produce.</p>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 d-flex justify-content-center">
<div class="banner-footer-item">
<div class="banner-footer-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45">
<g clip-path="url(#clip0_282_150)">
<path d="M44.9556 32.1431C44.6995 29.5083 43.3504 27.1104 41.1568 25.391C40.3108 24.7279 39.35 24.1736 38.2904 23.7322V11.8524C38.2904 11.729 38.258 11.6077 38.1962 11.5009C38.1345 11.394 38.0458 11.3052 37.9389 11.2435L19.4968 0.596001C19.3899 0.534289 19.2686 0.501801 19.1452 0.501801C19.0218 0.501801 18.9005 0.534289 18.7937 0.596001L0.351562 11.2435C0.244665 11.3052 0.155896 11.394 0.0941818 11.5009C0.0324681 11.6077 -1.4679e-05 11.729 4.97629e-09 11.8524V33.1475C-1.4679e-05 33.271 0.0324681 33.3922 0.0941818 33.4991C0.155896 33.606 0.244665 33.6947 0.351562 33.7564L18.7937 44.4039C18.9005 44.4657 19.0218 44.4981 19.1452 44.4981C19.2686 44.4981 19.3899 44.4657 19.4968 44.4039L37.9389 33.7564C38.0809 33.674 38.1895 33.5444 38.2459 33.3901C38.7256 34.009 39.0578 34.7028 39.2147 35.4341C39.7946 38.1357 38.0473 40.7623 34.6548 42.2889C34.5082 42.3549 34.3887 42.4692 34.3161 42.6126C34.2436 42.7561 34.2224 42.9201 34.256 43.0773C34.2897 43.2345 34.3763 43.3755 34.5012 43.4766C34.6262 43.5778 34.7821 43.633 34.9429 43.6332C34.9878 43.6332 35.0332 43.6289 35.0787 43.62C38.3336 42.9813 40.9975 41.4671 42.7825 39.2411C44.4292 37.1879 45.2009 34.6671 44.9556 32.1431ZM19.1452 21.6881L14.0045 18.7201L31.0403 8.88444L36.1811 11.8524L19.1452 21.6881ZM8.65626 15.6323L25.6921 5.79667L29.6341 8.07259L12.5982 17.9083L8.65626 15.6323ZM11.8952 19.1261L11.8951 25.8878L7.95322 23.612L7.95313 16.8501L11.8952 19.1261ZM19.1452 2.01684L24.2859 4.98482L7.25001 14.8204L2.10938 11.8524L19.1452 2.01684ZM1.40625 13.0703L6.54688 16.0383L6.54697 24.018C6.54696 24.1414 6.57944 24.2627 6.64115 24.3695C6.70287 24.4764 6.79164 24.5652 6.89853 24.6269L12.2467 27.7146C12.3536 27.7763 12.4748 27.8088 12.5982 27.8088C12.7217 27.8088 12.8429 27.7763 12.9498 27.7146C13.0567 27.6529 13.1454 27.5641 13.2072 27.4572C13.2689 27.3503 13.3014 27.2291 13.3014 27.1057L13.3015 19.938L18.4421 22.906V42.5773L1.40625 32.7416V13.0703ZM19.8483 42.5772V22.906L36.8842 13.0703V23.2302C35.4218 22.7891 33.8077 22.5368 32.0737 22.4833V20.2093C32.0737 20.0755 32.0356 19.9445 31.9637 19.8316C31.8919 19.7188 31.7894 19.6287 31.6681 19.5721C31.5469 19.5155 31.4121 19.4946 31.2794 19.512C31.1467 19.5294 31.0218 19.5842 30.9192 19.6701L22.7903 26.4737C22.7086 26.5422 22.6435 26.6283 22.5999 26.7256C22.5564 26.8229 22.5355 26.9288 22.539 27.0354C22.5424 27.1419 22.57 27.2463 22.6196 27.3406C22.6693 27.435 22.7398 27.5167 22.8257 27.5798L30.9546 33.5436C31.0594 33.6206 31.1834 33.6669 31.313 33.6776C31.4425 33.6883 31.5725 33.6628 31.6884 33.6041C31.8043 33.5454 31.9017 33.4557 31.9698 33.3449C32.0378 33.2342 32.0738 33.1067 32.0737 32.9768V30.6128C33.9357 30.7129 35.5714 31.2138 36.8371 32.0766C36.8532 32.0876 36.8684 32.0992 36.8843 32.1102V32.7416L19.8483 42.5772ZM39.2815 40.5105C39.4533 40.2864 39.6124 40.0529 39.7581 39.8111C40.6426 38.341 40.9302 36.7254 40.5897 35.139C40.232 33.4724 39.1806 31.9721 37.6291 30.9145C35.9719 29.7849 33.8077 29.1878 31.3705 29.1878C31.1841 29.1878 31.0052 29.2619 30.8734 29.3937C30.7415 29.5256 30.6674 29.7044 30.6674 29.8909V31.5887L24.3806 26.9763L30.6674 21.7145V23.1755C30.6674 23.362 30.7415 23.5409 30.8734 23.6727C31.0052 23.8046 31.1841 23.8787 31.3705 23.8787C39.7622 23.8787 43.1793 28.4038 43.556 32.2789C43.8319 35.1187 42.5386 38.4272 39.2815 40.5105Z" />
</g>
</svg>
</div>
<div class="banner-footer-content">
<h5>7 Days Return</h5>
<p>Product can be returned by following return policy with terms and condition.</p>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 d-flex justify-content-center">
<div class="banner-footer-item">
<div class="banner-footer-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45">
<g clip-path="url(#clip0_282_171)">
<path d="M44.4348 8.66459L35.4348 5.06459C35.2199 4.97847 34.9801 4.97847 34.7652 5.06459L25.7652 8.66459C25.5984 8.73145 25.4554 8.84674 25.3546 8.99559C25.2539 9.14445 25.2 9.32005 25.2 9.49979V18.8022C25.2047 20.5114 25.6495 22.1907 26.4915 23.6781C27.3336 25.1656 28.5446 26.4111 30.0078 27.2946L34.6374 30.072C34.7772 30.1557 34.9371 30.2 35.1 30.2C35.2629 30.2 35.4228 30.1557 35.5626 30.072L39.6 27.6492V37.7292C39.5995 38.1205 39.4439 38.4957 39.1672 38.7724C38.8905 39.0491 38.5153 39.2047 38.124 39.2052H3.276C2.88469 39.2047 2.50954 39.0491 2.23284 38.7724C1.95614 38.4957 1.80048 38.1205 1.8 37.7292V17.5998H22.5C22.7387 17.5998 22.9676 17.505 23.1364 17.3362C23.3052 17.1674 23.4 16.9385 23.4 16.6998C23.4 16.4611 23.3052 16.2322 23.1364 16.0634C22.9676 15.8946 22.7387 15.7998 22.5 15.7998H1.8V13.6758C1.80048 13.2845 1.95614 12.9093 2.23284 12.6326C2.50954 12.3559 2.88469 12.2003 3.276 12.1998H22.5C22.7387 12.1998 22.9676 12.105 23.1364 11.9362C23.3052 11.7674 23.4 11.5385 23.4 11.2998C23.4 11.0611 23.3052 10.8322 23.1364 10.6634C22.9676 10.4946 22.7387 10.3998 22.5 10.3998H3.276C2.4073 10.4003 1.57431 10.7456 0.960045 11.3598C0.345779 11.9741 0.000476916 12.8071 0 13.6758V37.7238C0.000476916 38.5925 0.345779 39.4255 0.960045 40.0397C1.57431 40.654 2.4073 40.9993 3.276 40.9998H38.124C38.9927 40.9993 39.8257 40.654 40.44 40.0397C41.0542 39.4255 41.3995 38.5925 41.4 37.7238V26.4198C42.5211 25.4902 43.4246 24.326 44.0466 23.0091C44.6687 21.6923 44.9941 20.255 45 18.7986V9.49979C45 9.32005 44.9461 9.14445 44.8454 8.99559C44.7446 8.84674 44.6016 8.73145 44.4348 8.66459ZM43.2 18.8022C43.1963 20.2008 42.8323 21.5748 42.1431 22.7918C41.4539 24.0088 40.4627 25.0277 39.2652 25.7502L35.1 28.2504L30.9348 25.7502C29.7373 25.0277 28.7461 24.0088 28.0569 22.7918C27.3677 21.5748 27.0037 20.2008 27 18.8022V10.1082L35.1 6.86819L43.2 10.1082V18.8022Z" />
<path d="M32.1371 16.2174C32.0535 16.1337 31.9543 16.0673 31.8451 16.022C31.7359 15.9766 31.6188 15.9533 31.5005 15.9532C31.3823 15.9531 31.2652 15.9763 31.1559 16.0215C31.0466 16.0667 30.9473 16.1329 30.8636 16.2165C30.7799 16.3 30.7135 16.3993 30.6682 16.5085C30.6229 16.6177 30.5995 16.7348 30.5994 16.853C30.5993 16.9713 30.6225 17.0884 30.6677 17.1977C30.7129 17.307 30.7791 17.4063 30.8627 17.49L33.2639 19.8894C33.4327 20.0581 33.6616 20.1529 33.9002 20.1529C34.1388 20.1529 34.3677 20.0581 34.5365 19.8894L39.3371 15.0888C39.5059 14.9198 39.6006 14.6907 39.6004 14.4518C39.6002 14.213 39.5052 13.984 39.3362 13.8153C39.1672 13.6465 38.9381 13.5518 38.6993 13.552C38.4604 13.5521 38.2315 13.6472 38.0627 13.8162L33.8993 17.9814L32.1371 16.2174ZM6.2999 33.7998C6.06121 33.7998 5.83229 33.8946 5.66351 34.0634C5.49472 34.2322 5.3999 34.4611 5.3999 34.6998C5.3999 34.9385 5.49472 35.1674 5.66351 35.3362C5.83229 35.505 6.06121 35.5998 6.2999 35.5998H13.4999C13.7386 35.5998 13.9675 35.505 14.1363 35.3362C14.3051 35.1674 14.3999 34.9385 14.3999 34.6998C14.3999 34.4611 14.3051 34.2322 14.1363 34.0634C13.9675 33.8946 13.7386 33.7998 13.4999 33.7998H6.2999Z" />
</g>
</svg>
</div>
<div class="banner-footer-content">
<h5>Payment Secure</h5>
<p>Payment will be secure and your card information will not disclosed.</p>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 d-flex justify-content-lg-end justify-content-center">
<div class="banner-footer-item">
<div class="banner-footer-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45">
<path d="M41.6326 26.5428L38.203 20.6028C38.123 20.4642 37.9981 20.357 37.8489 20.299L30.6079 17.4836C30.8384 16.705 30.9553 15.8972 30.9549 15.0853C30.9549 10.4231 27.162 6.6302 22.4998 6.6302C17.8376 6.6302 14.0447 10.4231 14.0447 15.0853C14.0443 15.8972 14.1612 16.705 14.3917 17.4836L7.15067 20.299C7.0015 20.357 6.87658 20.4642 6.79656 20.6028L3.36698 26.5428C3.31626 26.6306 3.28513 26.7283 3.27573 26.8293C3.26633 26.9302 3.27888 27.032 3.31252 27.1277C3.34616 27.2233 3.40009 27.3105 3.47061 27.3834C3.54114 27.4562 3.62658 27.513 3.72109 27.5497L6.70225 28.7089V38.3839C6.70226 38.5256 6.74508 38.6639 6.8251 38.7809C6.90512 38.8978 7.0186 38.9878 7.15067 39.0392L22.2449 44.9082C22.4088 44.972 22.5906 44.972 22.7545 44.9082L37.8488 39.0392C37.9808 38.9878 38.0943 38.8978 38.1743 38.7809C38.2543 38.6639 38.2972 38.5256 38.2972 38.3839V28.7089L41.2783 27.5497C41.3728 27.5129 41.4582 27.4562 41.5287 27.3833C41.5992 27.3105 41.6531 27.2233 41.6868 27.1276C41.7205 27.032 41.7331 26.9302 41.7238 26.8293C41.7144 26.7283 41.6833 26.6306 41.6326 26.5428ZM22.4999 8.03645C26.3867 8.03645 29.5487 11.1986 29.5487 15.0853C29.5487 18.972 26.3866 22.1341 22.4999 22.1341C18.6132 22.1341 15.4511 18.972 15.4511 15.0853C15.4511 11.1986 18.6131 8.03645 22.4999 8.03645ZM22.4999 23.5404C25.8501 23.5404 28.7515 21.5817 30.119 18.7494L35.668 20.9489L22.4999 26.0691L9.33168 20.9489L14.8806 18.7494C16.2482 21.5817 19.1496 23.5404 22.4999 23.5404ZM4.9948 26.536L7.71291 21.8283L21.4811 27.1818L18.763 31.8896L4.9948 26.536ZM8.10868 29.2556L18.8156 33.4188C18.9721 33.4796 19.1452 33.4824 19.3036 33.4267C19.4621 33.371 19.5953 33.2605 19.6793 33.1151L21.7968 29.4476V43.2251L8.10868 37.9028V29.2556ZM36.8911 37.9028L23.203 43.2251V29.4476L25.3205 33.1152C25.4045 33.2606 25.5377 33.3711 25.6961 33.4269C25.8545 33.4826 26.0277 33.4798 26.1842 33.4189L36.8911 29.2557V37.9028ZM26.2368 31.8896L23.5186 27.1818L37.2869 21.8283L40.005 26.536L26.2368 31.8896ZM20.7504 19.6526C21.2372 19.6526 21.6952 19.4626 22.0402 19.1176L27.5214 13.6365C28.2336 12.9242 28.2336 11.7653 27.5213 11.0529C27.1764 10.7079 26.7176 10.5179 26.2297 10.5179C25.7418 10.5179 25.283 10.7079 24.938 11.0529L20.9033 15.0877L19.8264 13.7326C19.6559 13.5171 19.4387 13.3431 19.1911 13.2236C18.9436 13.1042 18.6722 13.0426 18.3973 13.0433C17.9852 13.044 17.5854 13.1837 17.2625 13.4397C16.475 14.0659 16.3437 15.2161 16.9696 16.0035L19.2638 18.8905C19.4334 19.1264 19.6566 19.3185 19.9151 19.451C20.1736 19.5835 20.4599 19.6526 20.7504 19.6526ZM18.1374 14.5404C18.2111 14.4814 18.3028 14.4493 18.3972 14.4495C18.526 14.4495 18.6456 14.5071 18.7254 14.6075L20.2925 16.5796C20.3542 16.6572 20.4315 16.7208 20.5195 16.7664C20.6074 16.812 20.704 16.8385 20.803 16.8441C20.9019 16.8497 21.0009 16.8344 21.0934 16.7991C21.186 16.7639 21.2701 16.7094 21.3402 16.6394L25.9322 12.0473C26.0116 11.9678 26.1172 11.9241 26.2296 11.9241C26.342 11.9241 26.4475 11.9679 26.5269 12.0472C26.6056 12.1261 26.6499 12.2331 26.6499 12.3447C26.6499 12.4562 26.6057 12.5632 26.5269 12.6422L21.0458 18.1233C21.0073 18.1626 20.9613 18.1937 20.9105 18.2148C20.8598 18.236 20.8052 18.2467 20.7502 18.2464C20.682 18.2469 20.6146 18.2307 20.554 18.1992C20.4934 18.1676 20.4414 18.1218 20.4026 18.0656C20.3943 18.0537 20.3857 18.042 20.3766 18.0307L18.0705 15.1285C18.0015 15.0416 17.9699 14.9309 17.9825 14.8207C17.995 14.7104 18.0507 14.6097 18.1374 14.5404ZM21.7968 4.04024V0.74707C21.7968 0.56059 21.8708 0.381747 22.0027 0.249886C22.1346 0.118024 22.3134 0.0439453 22.4999 0.0439453C22.6864 0.0439453 22.8652 0.118024 22.9971 0.249886C23.1289 0.381747 23.203 0.56059 23.203 0.74707V4.04024C23.203 4.22672 23.1289 4.40557 22.9971 4.53743C22.8652 4.66929 22.6864 4.74337 22.4999 4.74337C22.3134 4.74337 22.1346 4.66929 22.0027 4.53743C21.8708 4.40557 21.7968 4.22672 21.7968 4.04024ZM14.697 2.92702C14.6038 2.76552 14.5785 2.57359 14.6268 2.39346C14.6751 2.21333 14.7929 2.05975 14.9544 1.96651C15.1159 1.87327 15.3079 1.848 15.488 1.89627C15.6681 1.94454 15.8217 2.06239 15.9149 2.2239L17.5615 5.07586C17.6547 5.23736 17.68 5.42929 17.6317 5.60942C17.5835 5.78955 17.4656 5.94313 17.3041 6.03637C17.1426 6.12961 16.9507 6.15488 16.7705 6.10661C16.5904 6.05834 16.4368 5.94049 16.3436 5.77898L14.697 2.92702ZM9.38116 7.40435C9.42731 7.32437 9.48877 7.25427 9.56202 7.19805C9.63527 7.14183 9.71888 7.10059 9.80808 7.07669C9.89727 7.05279 9.9903 7.0467 10.0818 7.05877C10.1734 7.07083 10.2617 7.10081 10.3416 7.147L13.1936 8.79354C13.3538 8.88745 13.4703 9.04089 13.5178 9.2204C13.5652 9.3999 13.5397 9.59089 13.4469 9.75169C13.3541 9.91249 13.2014 10.03 13.0222 10.0787C12.843 10.1273 12.6519 10.1031 12.4905 10.0114L9.6385 8.36481C9.47701 8.27157 9.35918 8.118 9.31092 7.93788C9.26265 7.75775 9.28792 7.56584 9.38116 7.40435ZM7.27354 14.9002C7.27354 14.7137 7.34762 14.5349 7.47948 14.403C7.61134 14.2711 7.79018 14.1971 7.97667 14.1971H11.2698C11.6581 14.1971 11.9729 14.5119 11.9729 14.9002C11.9729 15.2885 11.6581 15.6033 11.2698 15.6033H7.97667C7.79018 15.6033 7.61134 15.5292 7.47948 15.3974C7.34762 15.2655 7.27354 15.0867 7.27354 14.9002ZM27.3887 5.26087L29.0353 2.40891C29.0814 2.32893 29.1429 2.25883 29.2161 2.20261C29.2894 2.14639 29.373 2.10515 29.4622 2.08125C29.5514 2.05735 29.6444 2.05126 29.7359 2.06333C29.8275 2.07539 29.9158 2.10537 29.9957 2.15156C30.0757 2.19772 30.1458 2.25919 30.202 2.33244C30.2582 2.40569 30.2995 2.48929 30.3234 2.57848C30.3473 2.66767 30.3534 2.76069 30.3413 2.85224C30.3293 2.94378 30.2993 3.03206 30.2532 3.11203L28.6065 5.96399C28.5604 6.04398 28.4989 6.1141 28.4257 6.17032C28.3524 6.22655 28.2688 6.26779 28.1796 6.29169C28.0904 6.31559 27.9973 6.32168 27.9058 6.30961C27.8142 6.29753 27.7259 6.26754 27.646 6.22134C27.4845 6.12808 27.3667 5.9745 27.3184 5.79438C27.2702 5.61426 27.2955 5.42235 27.3887 5.26087ZM31.3638 10.0746C31.2706 9.91306 31.2453 9.72114 31.2936 9.54102C31.3419 9.3609 31.4597 9.20732 31.6212 9.11408L34.4731 7.46754C34.6345 7.37577 34.8257 7.35157 35.0049 7.40022C35.1841 7.44886 35.3367 7.56641 35.4296 7.72721C35.5224 7.888 35.5479 8.07899 35.5004 8.2585C35.453 8.438 35.3364 8.59145 35.1763 8.68535L32.3243 10.3319C32.2444 10.3781 32.1561 10.4081 32.0645 10.4202C31.973 10.4323 31.8799 10.4262 31.7907 10.4023C31.7015 10.3784 31.6179 10.3371 31.5447 10.2809C31.4714 10.2247 31.41 10.1545 31.3638 10.0746ZM33.3599 14.5672H36.653C37.0414 14.5672 37.3561 14.882 37.3561 15.2703C37.3561 15.6586 37.0414 15.9734 36.653 15.9734H33.3599C33.1734 15.9734 32.9946 15.8993 32.8627 15.7675C32.7309 15.6356 32.6568 15.4568 32.6568 15.2703C32.6568 15.0838 32.7309 14.905 32.8627 14.7731C32.9946 14.6412 33.1734 14.5672 33.3599 14.5672Z" />
</svg>
</div>
<div class="banner-footer-content">
<h5>Original Product</h5>
<p>You will get orginal and authentic products by insureing product quality.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="choose-product-section mb-110">
<div class="container">
<div class="section-title text-center">
<h3>Choose What You Want</h3>
</div>
<div class="row gy-4 justify-content-center">
    @foreach($c_banners as $categoryBanners)
    <div class="col-lg-4 col-md-6">
        <div class="choose-product-card hover-img style-2">
        <a href="{{route('search.category' , $items->category_id)}}">
        <img src="{{asset('categoryBanners/'. $categoryBanners->image)}}" alt>
        </a>
        <div class="choose-product-card-content">
        <h2 class="first-text" style="color:{{$categoryBanners->color_1}}">{{$categoryBanners->title_1}}</h2>
        <h2 class="second-text" style="-webkit-text-stroke: 1px {{$categoryBanners->color_2}};" >{{$categoryBanners->title_2}}</h2>
        </div>
        </div>
        </div>
    @endforeach


<div class="best-selling-section mb-110">
<div class="container">
<div class="section-title2">
    <h3>Best Selling Product</h3>
    <div class="all-product hover-underline">
        <a href="{{route('slider')}}">*View All Product
            <svg width="33" height="13" viewBox="0 0 33 13" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.5083 7.28L0.491206 7.25429C0.36093 7.25429 0.23599 7.18821 0.143871 7.0706C0.0517519 6.95299 0 6.79347 0 6.62714C0 6.46081 0.0517519 6.3013 0.143871 6.18369C0.23599 6.06607 0.36093 6 0.491206 6L25.5088 6.02571C25.6391 6.02571 25.764 6.09179 25.8561 6.2094C25.9482 6.32701 26 6.48653 26 6.65286C26 6.81919 25.9482 6.9787 25.8561 7.09631C25.764 7.21393 25.6386 7.28 25.5083 7.28Z" />
                <path d="M33.0001 6.50854C29.2204 7.9435 24.5298 10.398 21.623 13L23.9157 6.50034L21.6317 0C24.5358 2.60547 29.2224 5.06539 33.0001 6.50854Z" />
            </svg>
        </a>
    </div>
</div>
<div class="row gy-4">
@foreach ( $data['popular'] as $product )


    <div class="col-lg-4 col-md-6">
<div class="product-card hover-btn">
<div class="product-card-img double-img">
<a href="{{route('accordion' , $product->id)}}">
<img src="{{ asset("ProductImages/" . $product->image) }}" style="height:280px!important;object-fit:contain" alt class="img1">
<?php
    $subimage   = \DB::table('productimages')->where('product_id' , $product->id)->first();

    ?>

<img src="{{ asset("ProductSubImages/" . $subimage->image) }}" style="height:280px!important;object-fit:contain" alt class="img2">
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
<a href="{{route('accordion' , $product->id)}}">
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
<h6><a href="{{route('accordion' , $product->id)}}" class="hover-underline">{{ $product->name}}</a></h6>
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




<div class="just-for-section mb-110">
<img src="assets/img/home1/icon/vector-1.svg" alt class="vector1">
<img src="assets/img/home1/icon/vector-2.svg" alt class="vector2">
<div class="container">
<div class="section-title2 style-2">
<h3>Just For You</h3>
<div class="all-product hover-underline">
<a href="slider">*View All Product
<svg width="33" height="13" viewBox="0 0 33 13" xmlns="http://www.w3.org/2000/svg">
<path d="M25.5083 7.28L0.491206 7.25429C0.36093 7.25429 0.23599 7.18821 0.143871 7.0706C0.0517519 6.95299 0 6.79347 0 6.62714C0 6.46081 0.0517519 6.3013 0.143871 6.18369C0.23599 6.06607 0.36093 6 0.491206 6L25.5088 6.02571C25.6391 6.02571 25.764 6.09179 25.8561 6.2094C25.9482 6.32701 26 6.48653 26 6.65286C26 6.81919 25.9482 6.9787 25.8561 7.09631C25.764 7.21393 25.6386 7.28 25.5083 7.28Z" />
<path d="M33.0001 6.50854C29.2204 7.9435 24.5298 10.398 21.623 13L23.9157 6.50034L21.6317 0C24.5358 2.60547 29.2224 5.06539 33.0001 6.50854Z" />
</svg>
</a>
</div>
</div>
<div class="row gy-4 justify-content-center">
<div class="col-lg-3">
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
@foreach($category as $categoryDetails)
    <button class="nav-link active" id="v-Korean-tab" data-bs-toggle="pill" data-bs-target="#v-Korean" type="button" role="tab" aria-controls="v-Korean" aria-selected="true">
{{$categoryDetails->name}}
@php
$numberOfProducts = \App\Models\Product::where('category_id' , $categoryDetails->id)->count();
@endphp
<span>({{$numberOfProducts}})</span>
</button>
@endforeach

</div>
<div class="offer-img hover-img">
<img src="assets/img/home1/offer-img.png" alt>
<div class="discount-buy">
<div class="discount">
<svg width="65" height="65" viewBox="0 0 65 65" xmlns="http://www.w3.org/2000/svg">
<path d="M30.4435 1.58116C31.4962 0.259924 33.5038 0.259924 34.5565 1.58116V1.58116C35.4448 2.69608 37.0597 2.90009 38.1973 2.0411V2.0411C39.5455 1.02317 41.4901 1.52244 42.1811 3.06395V3.06395C42.7642 4.36476 44.2776 4.96398 45.5932 4.4149V4.4149C47.1521 3.76422 48.9114 4.7314 49.1974 6.39632V6.39632C49.4387 7.80127 50.7556 8.75805 52.1663 8.55338V8.55338C53.8381 8.31084 55.3016 9.68515 55.1645 11.3689V11.3689C55.0488 12.7897 56.0864 14.0439 57.5037 14.1965V14.1965C59.1833 14.3774 60.2591 16.0724 59.7076 17.6692V17.6692C59.2422 19.0166 59.9352 20.4895 61.2701 20.9897V20.9897C62.8519 21.5826 63.4723 23.492 62.5411 24.9014V24.9014C61.7552 26.0907 62.0602 27.6897 63.2287 28.5062V28.5062C64.6134 29.4738 64.7395 31.4775 63.487 32.611V32.611C62.43 33.5675 62.3278 35.1921 63.2565 36.2736V36.2736C64.3571 37.5552 63.9809 39.5272 62.4858 40.3137V40.3137C61.2242 40.9773 60.7212 42.5254 61.3518 43.8039V43.8039C62.0991 45.3189 61.2443 47.1354 59.6006 47.5254V47.5254C58.2136 47.8544 57.3414 49.2288 57.6342 50.6239V50.6239C57.9813 52.2771 56.7016 53.8241 55.0125 53.793V53.793C53.5873 53.7667 52.4007 54.881 52.3374 56.3051V56.3051C52.2623 57.9927 50.6381 59.1728 49.0099 58.7226V58.7226C47.6359 58.3428 46.2095 59.1269 45.794 60.4906V60.4906C45.3017 62.1065 43.435 62.8456 41.9699 62.0047V62.0047C40.7336 61.295 39.157 61.6998 38.4154 62.9173V62.9173C37.5366 64.36 35.5449 64.6117 34.3349 63.4328V63.4328C33.3139 62.438 31.6861 62.438 30.6651 63.4328V63.4328C29.4551 64.6117 27.4634 64.36 26.5846 62.9173V62.9173C25.843 61.6998 24.2664 61.295 23.0301 62.0047V62.0047C21.565 62.8456 19.6983 62.1065 19.206 60.4906V60.4906C18.7905 59.1269 17.3641 58.3428 15.9901 58.7226V58.7226C14.3619 59.1728 12.7377 57.9927 12.6626 56.3051V56.3051C12.5993 54.881 11.4127 53.7667 9.98747 53.793V53.793C8.29845 53.8241 7.01874 52.2771 7.36578 50.6239V50.6239C7.65863 49.2288 6.78642 47.8544 5.3994 47.5254V47.5254C3.75571 47.1354 2.9009 45.3189 3.64819 43.8039V43.8039C4.27879 42.5254 3.77578 40.9773 2.51416 40.3137V40.3137C1.01908 39.5272 0.642888 37.5552 1.74347 36.2736V36.2736C2.67219 35.1921 2.56999 33.5675 1.51304 32.611V32.611C0.260513 31.4775 0.386573 29.4738 1.77129 28.5062V28.5062C2.93979 27.6897 3.24481 26.0907 2.45895 24.9014V24.9014C1.52767 23.492 2.14806 21.5826 3.72992 20.9897V20.9897C5.06477 20.4895 5.75784 19.0166 5.29244 17.6692V17.6692C4.74093 16.0725 5.81667 14.3774 7.49627 14.1965V14.1965C8.9136 14.0439 9.95118 12.7897 9.83549 11.3689V11.3689C9.6984 9.68515 11.1619 8.31084 12.8337 8.55338V8.55338C14.2444 8.75805 15.5613 7.80127 15.8026 6.39632V6.39632C16.0886 4.7314 17.8479 3.76422 19.4068 4.4149V4.4149C20.7224 4.96398 22.2358 4.36475 22.8189 3.06395V3.06395C23.5099 1.52244 25.4545 1.02317 26.8027 2.0411V2.0411C27.9403 2.90009 29.5552 2.69608 30.4435 1.58116V1.58116Z" />
</svg>
<h6>30% <br><span>off</span></h6>
</div>
<a href="slider" class="buy-btn hover-btn4">*Buy Now*</a>
</div>
</div>
</div>

<div class="col-lg-9">
<div class="tab-content" id="v-pills-tabContent">
<div class="tab-pane fade show active" id="v-Korean" role="tabpanel" aria-labelledby="v-Korean-tab">
<div class="row gy-4">
@if($data['dealsProduct']->count() > 0 )
@foreach($data['dealsProduct'] as $dealsProduct)
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="{{asset("ProductImages/" . $dealsProduct->image)}}" alt>
<div class="batch">
<span>-{{$dealsProduct->discount_percentage}}%</span>
</div>
</a>
@if ($dealsProduct->stock <= 0)
    <div class="out-of-stock">
    <span>Out Of Stock</span>
    </div>
    <div class="overlay">
    <div class="cart-area">
    <a href="#" class="hover-btn3 add-cart-btn ">Request Stock</a>
    </div>
    @else
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
    @endif

</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">{{$dealsProduct->name}}</a></h6>
<p><a href="#">{{$dealsProduct->brand->name}}</a></p>
<p class="price">PKR , {{$dealsProduct->discounted_price}} <del>PKR ,{{$dealsProduct->price}}</del></p>

</div>
<span class="for-border"></span>
</div>
</div>
@endforeach
@else
<div class="col-md-6">
    <h3 class="text-danger text-center">No Product available</h3>
</div>
@endif</div></div>

<div class="tab-pane fade" id="v-makeup" role="tabpanel" aria-labelledby="v-makeup-tab">
<div class="row gy-4">
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-7.png" alt class="img1">
<img src="assets/img/home1/product-img-22.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Youthful Renewal Formula</a></h6>
<p><a href="#">Crystal Gleam</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-8.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Vivid Eye Pencil</a></h6>
<p><a href="#">REVLON</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-9.png" alt class="img1">
<img src="assets/img/home1/product-img-21.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Firming Night Cream</a></h6>
<p><a href="#">Crystal</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-10.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Brightening Cream Complex</a></h6>
<p><a href="#">Radiant</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-11.png" alt class="img1">
<img src="assets/img/home1/product-img-14.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Age-Defying Miracle</a></h6>
<p><a href="#">Radiance</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-12.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Oil-Control Pressed</a></h6>
<p><a href="#">Whispering</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-skin-care" role="tabpanel" aria-labelledby="v-skin-care-tab">
<div class="row gy-4">
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-7.png" alt class="img1">
<img src="assets/img/home1/product-img-22.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Youthful Renewal Formula</a></h6>
<p><a href="#">Crystal Gleam</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-8.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Vivid Eye Pencil</a></h6>
<p><a href="#">REVLON</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-9.png" alt class="img1">
<img src="assets/img/home1/product-img-21.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Firming Night Cream</a></h6>
<p><a href="#">Crystal</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-10.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Brightening Cream Complex</a></h6>
<p><a href="#">Radiant</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-11.png" alt class="img1">
<img src="assets/img/home1/product-img-14.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Age-Defying Miracle</a></h6>
<p><a href="#">Radiance</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-12.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Oil-Control Pressed</a></h6>
<p><a href="#">Whispering</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-personal-care" role="tabpanel" aria-labelledby="v-personal-care-tab">
<div class="row gy-4">
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-7.png" alt class="img1">
<img src="assets/img/home1/product-img-22.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Youthful Renewal Formula</a></h6>
<p><a href="#">Crystal Gleam</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-8.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Vivid Eye Pencil</a></h6>
<p><a href="#">REVLON</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-9.png" alt class="img1">
<img src="assets/img/home1/product-img-21.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Firming Night Cream</a></h6>
<p><a href="#">Crystal</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-10.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Brightening Cream Complex</a></h6>
<p><a href="#">Radiant</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-11.png" alt class="img1">
<img src="assets/img/home1/product-img-14.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Age-Defying Miracle</a></h6>
<p><a href="#">Radiance</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-12.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Oil-Control Pressed</a></h6>
<p><a href="#">Whispering</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-fragrance" role="tabpanel" aria-labelledby="v-fragrance-tab">
<div class="row gy-4">
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-7.png" alt class="img1">
<img src="assets/img/home1/product-img-22.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Youthful Renewal Formula</a></h6>
<p><a href="#">Crystal Gleam</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-8.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Vivid Eye Pencil</a></h6>
<p><a href="#">REVLON</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-9.png" alt class="img1">
<img src="assets/img/home1/product-img-21.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Firming Night Cream</a></h6>
<p><a href="#">Crystal</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-10.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Brightening Cream Complex</a></h6>
<p><a href="#">Radiant</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-11.png" alt class="img1">
<img src="assets/img/home1/product-img-14.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Age-Defying Miracle</a></h6>
<p><a href="#">Radiance</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-12.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Oil-Control Pressed</a></h6>
<p><a href="#">Whispering</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-health" role="tabpanel" aria-labelledby="v-health-tab">
<div class="row gy-4">
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-7.png" alt class="img1">
<img src="assets/img/home1/product-img-22.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Youthful Renewal Formula</a></h6>
<p><a href="#">Crystal Gleam</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-8.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Vivid Eye Pencil</a></h6>
<p><a href="#">REVLON</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-9.png" alt class="img1">
<img src="assets/img/home1/product-img-21.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Firming Night Cream</a></h6>
<p><a href="#">Crystal</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-10.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Brightening Cream Complex</a></h6>
<p><a href="#">Radiant</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-11.png" alt class="img1">
<img src="assets/img/home1/product-img-14.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Age-Defying Miracle</a></h6>
<p><a href="#">Radiance</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-12.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Oil-Control Pressed</a></h6>
<p><a href="#">Whispering</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-accessories" role="tabpanel" aria-labelledby="v-accessories-tab">
<div class="row gy-4">
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-7.png" alt class="img1">
<img src="assets/img/home1/product-img-22.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Youthful Renewal Formula</a></h6>
<p><a href="#">Crystal Gleam</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-8.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Vivid Eye Pencil</a></h6>
<p><a href="#">REVLON</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-9.png" alt class="img1">
<img src="assets/img/home1/product-img-21.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Firming Night Cream</a></h6>
<p><a href="#">Crystal</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-10.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Brightening Cream Complex</a></h6>
<p><a href="#">Radiant</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-11.png" alt class="img1">
<img src="assets/img/home1/product-img-14.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Age-Defying Miracle</a></h6>
<p><a href="#">Radiance</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-12.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Oil-Control Pressed</a></h6>
<p><a href="#">Whispering</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-kids" role="tabpanel" aria-labelledby="v-kids-tab">
<div class="row gy-4">
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-7.png" alt class="img1">
<img src="assets/img/home1/product-img-22.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Youthful Renewal Formula</a></h6>
<p><a href="#">Crystal Gleam</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-8.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Vivid Eye Pencil</a></h6>
<p><a href="#">REVLON</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-9.png" alt class="img1">
<img src="assets/img/home1/product-img-21.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Firming Night Cream</a></h6>
<p><a href="#">Crystal</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-10.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Brightening Cream Complex</a></h6>
<p><a href="#">Radiant</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-11.png" alt class="img1">
<img src="assets/img/home1/product-img-14.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Age-Defying Miracle</a></h6>
<p><a href="#">Radiance</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-12.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Oil-Control Pressed</a></h6>
<p><a href="#">Whispering</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-skin-care2" role="tabpanel" aria-labelledby="v-skin-care2-tab">
<div class="row gy-4">
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-7.png" alt class="img1">
<img src="assets/img/home1/product-img-22.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Youthful Renewal Formula</a></h6>
<p><a href="#">Crystal Gleam</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-8.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Vivid Eye Pencil</a></h6>
<p><a href="#">REVLON</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-9.png" alt class="img1">
<img src="assets/img/home1/product-img-21.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Firming Night Cream</a></h6>
<p><a href="#">Crystal</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-10.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Brightening Cream Complex</a></h6>
<p><a href="#">Radiant</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/product-img-11.png" alt class="img1">
<img src="assets/img/home1/product-img-14.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Age-Defying Miracle</a></h6>
<p><a href="#">Radiance</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="product-card style-2 hover-btn">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/product-img-12.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="cart" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Oil-Control Pressed</a></h6>
<p><a href="#">Whispering</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
<span class="for-border"></span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="offer-banner mb-110">
<div class="container">
<div class="row gy-4">

@if($data['dealsBanners'] !=null)
@foreach ($data['dealsBanners'] as $deals )
    <div class="col-lg-6 ">
    <div class="offer-banner-{{$deals->side}} text-white hover-img">
    <img src="{{asset("DealsBannersImages/" . $deals->image)}}" alt style="height:250px;object-fit:contain; width:100%">
    <div class="offer-banner-{{$deals->side}}-content">
    <h5 style="color:{{$deals->title_color}}">{{$deals->title}}</h5>
    <h4  style="color:{{$deals->text_color}}">{{$deals->percent_off}}% <span>off</span></h4>
    @if($deals->short_description != null)
    <p  style="color:{{$deals->text_color}}">{{$deals->short_description}}</p>
    @endif
    <a href="{{route('search.category' , $deals->category_id)}}" class="buy-btn2 hover-btn3">*Buy Now*</a>
    </div>
    </div>
    </div>

@endforeach

@endif



</div>
</div>
</div>


<div class="newest-product-section mb-110">
<div class="container">
<div class="section-title2 style-2">
<h3>Newest Product</h3>
<div class="slider-btn">
<div class="prev-btn">
<i class="bi bi-arrow-left"></i>
</div>
<div class="next-btn">
<i class="bi bi-arrow-right"></i>
</div>
</div>
</div>
<div class="row">
<div class="col-12">




<div class="swiper newest-slider">
<div class="swiper-wrapper">

    {{-- Slider --}}
 @foreach($data['newProducts'] as $product)
<div class="swiper-slide">
    <div class="product-card hover-btn">
        <div class="product-card-img double-img">
        <a href="{{route('accordion' , $product->id)}}">
        <img src="{{ asset("ProductImages/" . $product->image) }}" style="height:280px!important;object-fit:contain" alt class="img1">
        <?php
            $subimage   = \DB::table('productimages')->where('product_id' , $product->id)->first();

            ?>

        <img src="{{ asset("ProductSubImages/" . $subimage->image) }}" style="height:280px!important;object-fit:contain" alt class="img2">
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
        <a href="{{route('accordion' , $product->id)}}">
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
        <h6><a href="{{route('accordion' , $product->id)}}" class="hover-underline">{{ $product->name}}</a></h6>
        <p><a href="#">{{$product->brand->name}}</a></p>
        @if($product->sale_status == 1)
        <p class="price">Rs,{{$product->discounted_price}} <del class="text-danger">Rs,{{ $product->price }}</del></p>
        @else
        <p class="price">Rs,{{$product->price}}</p>
        @endif
        </div>
        <span class="for-border"></span>
        </div>
</div>
@endforeach
{{-- End --}}


</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="exclusive-product-section mb-110">
<img src="assets/img/home1/icon/vector-3.svg" alt class="vector3">
<img src="assets/img/home1/icon/vector-4.svg" alt class="vector4">
<div class="container">
<div class="section-title style-2 text-center">
<h3>Exclusive Product</h3>
</div>
<div class="row">
<div class="col-lg-12">
<div class="swiper exclusive-slider">
<div class="swiper-wrapper">
<div class="swiper-slide">
<div class="row g-4">
<div class="col-lg-6">
<div class="exclusive-product-left">
<h2>Infallible Pro Matte Perfume.</h2>
<p>Whatever your summer looks like, bring your own heat with up to 25% off Lumin Brand.Pellentesque ipsum dui, laoreet vitae ex in, pellentesque aliquam leo.</p>
<ul>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Paraben-Free
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Sulfate-Free
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Clean at Sephora
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Fragrance Free
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Cruelty-Free
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Antioxidants
</li>
</ul>
<a href="slider" class="primary-btn1 hover-btn3">*Buy Now*</a>
</div>
</div>
<div class="col-lg-6">
<div class="exclusive-product-right">
<div class="product-right-img hover-img">
<a href="accordion">
<img src="assets/img/home1/ex-product-img-01.png" alt>
</a>
</div>
<div class="product-right-content">
<a href="slider">
<img src="assets/img/home1/loreal-logo.png" alt>
</a>
<div class="star-bg">
<img src="assets/img/home1/star.svg" alt>
<span>NEW</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="row g-4">
<div class="col-lg-6">
<div class="exclusive-product-left">
<h2>Radiant Glow Moisturizer.</h2>
<p>Whatever your summer looks like, bring your own heat with up to 25% off Lumin Brand.Pellentesque ipsum dui, laoreet vitae ex in, pellentesque aliquam leo.</p>
<ul>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Paraben-Free
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Sulfate-Free
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Clean at Sephora
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Fragrance Free
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Cruelty-Free
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Antioxidants
</li>
</ul>
<a href="slider" class="primary-btn1 hover-btn3">*Buy Now*</a>
</div>
</div>
<div class="col-lg-6">
<div class="exclusive-product-right">
<div class="product-right-img hover-img">
<a href="accordion">
<img src="assets/img/home1/ex-product-img-02.png" alt>
</a>
</div>
<div class="product-right-content">
<a href="slider">
<img src="assets/img/home1/loreal-logo.png" alt>
</a>
<div class="star-bg">
<img src="assets/img/home1/star.svg" alt>
<span>NEW</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="row g-4">
<div class="col-lg-6">
<div class="exclusive-product-left">
<h2>Nourishing Day Cream.</h2>
<p>Whatever your summer looks like, bring your own heat with up to 25% off Lumin Brand.Pellentesque ipsum dui, laoreet vitae ex in, pellentesque aliquam leo.</p>
<ul>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Paraben-Free
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Sulfate-Free
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Clean at Sephora
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Fragrance Free
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Cruelty-Free
</li>
<li>
<svg width="13" height="11" viewBox="0 0 13 11" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2986 0.0327999C9.89985 0.832756 6.86143 2.97809 4.03623 6.6688L2.36599 4.778C2.09946 4.4871 1.63748 4.4871 1.38872 4.778L0.162693 6.17792C-0.0682981 6.45063 -0.0505298 6.86879 0.19823 7.12332L3.96516 10.814C4.28499 11.1231 4.78251 11.0322 4.99574 10.6504C7.00358 6.92333 9.17134 4.15985 12.7961 0.996384C13.2581 0.596406 12.8672 -0.167189 12.2986 0.0327999Z" />
</svg>
Antioxidants
</li>
</ul>
<a href="slider" class="primary-btn1 hover-btn3">*Buy Now*</a>
</div>
</div>
<div class="col-lg-6">
<div class="exclusive-product-right">
<div class="product-right-img hover-img">
<a href="accordion">
<img src="assets/img/home1/ex-product-img-03.png" alt>
</a>
</div>
<div class="product-right-content">
<a href="slider">
<img src="assets/img/home1/loreal-logo.png" alt>
</a>
<div class="star-bg">
<img src="assets/img/home1/star.svg" alt>
<span>NEW</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="slider-btn">
<div class="prev-btn exclusive-prev-btn">
<i class="bi bi-arrow-up"></i>
</div>
<div class="next-btn exclusive-next-btn">
<i class="bi bi-arrow-down"></i>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="special-offer-section mb-110">
<div class="container">
<div class="section-title2 style-2">
<h3>Special Offer</h3>
</div>
<div class="special-offer-wrapper">
<div class="row">
<div class="col-lg-4 p-lg-0">
<div class="special-offer-left">
<h2>Are You Ready For This Christmas!</h2>
<p>Whatever your summer looks like, bring your own heat with up to 25% off Lumin</p>
<div class="hurry-bg">
<svg width="65" height="65" viewBox="0 0 65 65" xmlns="http://www.w3.org/2000/svg">
<path d="M30.4435 1.58116C31.4962 0.259924 33.5038 0.259924 34.5565 1.58116V1.58116C35.4448 2.69608 37.0597 2.90009 38.1973 2.0411V2.0411C39.5455 1.02317 41.4901 1.52244 42.1811 3.06395V3.06395C42.7642 4.36476 44.2776 4.96398 45.5932 4.4149V4.4149C47.1521 3.76422 48.9114 4.7314 49.1974 6.39632V6.39632C49.4387 7.80127 50.7556 8.75805 52.1663 8.55338V8.55338C53.8381 8.31084 55.3016 9.68515 55.1645 11.3689V11.3689C55.0488 12.7897 56.0864 14.0439 57.5037 14.1965V14.1965C59.1833 14.3774 60.2591 16.0724 59.7076 17.6692V17.6692C59.2422 19.0166 59.9352 20.4895 61.2701 20.9897V20.9897C62.8519 21.5826 63.4723 23.492 62.5411 24.9014V24.9014C61.7552 26.0907 62.0602 27.6897 63.2287 28.5062V28.5062C64.6134 29.4738 64.7395 31.4775 63.487 32.611V32.611C62.43 33.5675 62.3278 35.1921 63.2565 36.2736V36.2736C64.3571 37.5552 63.9809 39.5272 62.4858 40.3137V40.3137C61.2242 40.9773 60.7212 42.5254 61.3518 43.8039V43.8039C62.0991 45.3189 61.2443 47.1354 59.6006 47.5254V47.5254C58.2136 47.8544 57.3414 49.2288 57.6342 50.6239V50.6239C57.9813 52.2771 56.7016 53.8241 55.0125 53.793V53.793C53.5873 53.7667 52.4007 54.881 52.3374 56.3051V56.3051C52.2623 57.9927 50.6381 59.1728 49.0099 58.7226V58.7226C47.6359 58.3428 46.2095 59.1269 45.794 60.4906V60.4906C45.3017 62.1065 43.435 62.8456 41.9699 62.0047V62.0047C40.7336 61.295 39.157 61.6998 38.4154 62.9173V62.9173C37.5366 64.36 35.5449 64.6117 34.3349 63.4328V63.4328C33.3139 62.438 31.6861 62.438 30.6651 63.4328V63.4328C29.4551 64.6117 27.4634 64.36 26.5846 62.9173V62.9173C25.843 61.6998 24.2664 61.295 23.0301 62.0047V62.0047C21.565 62.8456 19.6983 62.1065 19.206 60.4906V60.4906C18.7905 59.1269 17.3641 58.3428 15.9901 58.7226V58.7226C14.3619 59.1728 12.7377 57.9927 12.6626 56.3051V56.3051C12.5993 54.881 11.4127 53.7667 9.98747 53.793V53.793C8.29845 53.8241 7.01874 52.2771 7.36578 50.6239V50.6239C7.65863 49.2288 6.78642 47.8544 5.3994 47.5254V47.5254C3.75571 47.1354 2.9009 45.3189 3.64819 43.8039V43.8039C4.27879 42.5254 3.77578 40.9773 2.51416 40.3137V40.3137C1.01908 39.5272 0.642888 37.5552 1.74347 36.2736V36.2736C2.67219 35.1921 2.56999 33.5675 1.51304 32.611V32.611C0.260513 31.4775 0.386573 29.4738 1.77129 28.5062V28.5062C2.93979 27.6897 3.24481 26.0907 2.45895 24.9014V24.9014C1.52767 23.492 2.14806 21.5826 3.72992 20.9897V20.9897C5.06477 20.4895 5.75784 19.0166 5.29244 17.6692V17.6692C4.74093 16.0725 5.81667 14.3774 7.49627 14.1965V14.1965C8.9136 14.0439 9.95118 12.7897 9.83549 11.3689V11.3689C9.6984 9.68515 11.1619 8.31084 12.8337 8.55338V8.55338C14.2444 8.75805 15.5613 7.80127 15.8026 6.39632V6.39632C16.0886 4.7314 17.8479 3.76422 19.4068 4.4149V4.4149C20.7224 4.96398 22.2358 4.36475 22.8189 3.06395V3.06395C23.5099 1.52244 25.4545 1.02317 26.8027 2.0411V2.0411C27.9403 2.90009 29.5552 2.69608 30.4435 1.58116V1.58116Z" />
</svg>
<p>HURRY <br>
UP!</p>
</div>
<div class="offer-timer">
<p>Offer Will Be End:</p>
<div class="countdown-timer">
<ul data-countdown="2023-10-23 12:00:00">
<li data-days="00">00</li>
<li>
<svg xmlns="http://www.w3.org/2000/svg" width="4" height="13" viewBox="0 0 4 13">
<path d="M0 11.0633C0 11.5798 0.186992 12.0317 0.560976 12.419C0.95122 12.8063 1.43089 13 2 13C2.58537 13 3.06504 12.8063 3.43903 12.419C3.81301 12.0317 4 11.5798 4 11.0633C4 10.5146 3.81301 10.0546 3.43903 9.68343C3.06504 9.29609 2.58537 9.10242 2 9.10242C1.43089 9.10242 0.95122 9.29609 0.560976 9.68343C0.186992 10.0546 0 10.5146 0 11.0633ZM0 1.96089C0 2.49348 0.186992 2.95345 0.560976 3.34078C0.95122 3.72812 1.43089 3.92179 2 3.92179C2.58537 3.92179 3.06504 3.72812 3.43903 3.34078C3.81301 2.95345 4 2.49348 4 1.96089C4 1.42831 3.81301 0.968343 3.43903 0.581006C3.06504 0.193669 2.58537 0 2 0C1.43089 0 0.95122 0.193669 0.560976 0.581006C0.186992 0.968343 0 1.42831 0 1.96089Z" />
</svg>
</li>
<li data-hours="00">00</li>
<li>
<svg xmlns="http://www.w3.org/2000/svg" width="4" height="13" viewBox="0 0 4 13">
<path d="M0 11.0633C0 11.5798 0.186992 12.0317 0.560976 12.419C0.95122 12.8063 1.43089 13 2 13C2.58537 13 3.06504 12.8063 3.43903 12.419C3.81301 12.0317 4 11.5798 4 11.0633C4 10.5146 3.81301 10.0546 3.43903 9.68343C3.06504 9.29609 2.58537 9.10242 2 9.10242C1.43089 9.10242 0.95122 9.29609 0.560976 9.68343C0.186992 10.0546 0 10.5146 0 11.0633ZM0 1.96089C0 2.49348 0.186992 2.95345 0.560976 3.34078C0.95122 3.72812 1.43089 3.92179 2 3.92179C2.58537 3.92179 3.06504 3.72812 3.43903 3.34078C3.81301 2.95345 4 2.49348 4 1.96089C4 1.42831 3.81301 0.968343 3.43903 0.581006C3.06504 0.193669 2.58537 0 2 0C1.43089 0 0.95122 0.193669 0.560976 0.581006C0.186992 0.968343 0 1.42831 0 1.96089Z" />
</svg>
</li>
<li data-minutes="00">00</li>
<li>
<svg xmlns="http://www.w3.org/2000/svg" width="4" height="13" viewBox="0 0 4 13">
<path d="M0 11.0633C0 11.5798 0.186992 12.0317 0.560976 12.419C0.95122 12.8063 1.43089 13 2 13C2.58537 13 3.06504 12.8063 3.43903 12.419C3.81301 12.0317 4 11.5798 4 11.0633C4 10.5146 3.81301 10.0546 3.43903 9.68343C3.06504 9.29609 2.58537 9.10242 2 9.10242C1.43089 9.10242 0.95122 9.29609 0.560976 9.68343C0.186992 10.0546 0 10.5146 0 11.0633ZM0 1.96089C0 2.49348 0.186992 2.95345 0.560976 3.34078C0.95122 3.72812 1.43089 3.92179 2 3.92179C2.58537 3.92179 3.06504 3.72812 3.43903 3.34078C3.81301 2.95345 4 2.49348 4 1.96089C4 1.42831 3.81301 0.968343 3.43903 0.581006C3.06504 0.193669 2.58537 0 2 0C1.43089 0 0.95122 0.193669 0.560976 0.581006C0.186992 0.968343 0 1.42831 0 1.96089Z" />
</svg>
</li>
<li data-seconds="00">00</li>
</ul>
</div>
</div>
<a href="slider" class="primary-btn1 style-2 hover-btn3">*Shop Now*</a>
</div>
</div>
<div class="col-lg-8 p-lg-0">
<div class="slick-wrapper">
<div id="slick2">
<div class="slide-item">
<div class="product-card style-4">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/sp-product-img-01.png" alt class="img1">
<img src="assets/img/home1/sp-product-img-05.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="#" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add
To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Mystic Woods Aroma</a></h6>
<p><a href="#">Whispering</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="slide-item">
<div class="product-card style-4">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/sp-product-img-02.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="#" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add
To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Dewy Fresh Face</a></h6>
<p><a href="#">Pure Bliss</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="slide-item">
<div class="product-card style-4">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/sp-product-img-03.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="#" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add
To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Rose Petal Flush</a></h6>
<p><a href="#">Velvet Tint</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="slide-item">
<div class="product-card style-4">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/sp-product-img-04.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="#" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add
To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Hydrating Waves</a>
</h6>
<p><a href="#">Crystal Gleam</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="slide-item">
<div class="product-card style-4">
<div class="product-card-img double-img">
<a href="accordion">
<img src="assets/img/home1/sp-product-img-05.png" alt class="img1">
<img src="assets/img/home1/sp-product-img-01.png" alt class="img2">
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="#" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add
To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Velvet Red Charm</a></h6>
<p><a href="#">Radiant</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="slide-item">
<div class="product-card style-4">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/sp-product-img-06.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="#" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add
To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Intensive Cream</a>
</h6>
<p><a href="#">Nectar Nouri</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="slide-item">
<div class="product-card style-4">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/sp-product-img-01.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="#" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add
To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Mystic Woods Aroma</a></h6>
<p><a href="#">Whispering</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="slide-item">
<div class="product-card style-4">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/sp-product-img-02.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="#" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add
To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Dewy Fresh Face</a></h6>
<p><a href="#">Pure Bliss</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="slide-item">
<div class="product-card style-4">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/sp-product-img-03.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="#" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add
To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Rose Petal Flush</a></h6>
<p><a href="#">Velvet Tint</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="slide-item">
<div class="product-card style-4">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/sp-product-img-04.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="#" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add
To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Hydrating Waves</a>
</h6>
<p><a href="#">Crystal Gleam</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="slide-item">
<div class="product-card style-4">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/sp-product-img-05.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="#" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add
To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Velvet Red Charm</a></h6>
<p><a href="#">Radiant</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="slide-item">
<div class="product-card style-4">
<div class="product-card-img">
<a href="accordion">
<img src="assets/img/home1/sp-product-img-06.png" alt>
<div class="batch">
<span>-15%</span>
</div>
</a>
<div class="overlay">
<div class="cart-area">
<a href="#" class="hover-btn3 add-cart-btn"><i class="bi bi-bag-check"></i> Add
To Cart</a>
</div>
</div>
</div>
<div class="product-card-content">
<h6><a href="accordion" class="hover-underline">Intensive Cream</a>
</h6>
<p><a href="#">Nectar Nouri</a></p>
<p class="price">$150.00 <del>$200.00</del></p>
<div class="rating">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="best-brand-section mb-110">
<div class="container-fluid">
<div class="section-title style-2 text-center">
<h3>Our Best Brand</h3>
</div>
<div class="best-brand-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="swiper brand-slider">
<div class="swiper-wrapper">
    @foreach ($data['brand'] as $brand )
    <div class="swiper-slide">
        <div class="brand-icon">
        <a href="slider">
        <img src="{{ asset('assets/BrandImages/' . $brand->image)}}"  style="height:100px ; object-fit:contain;" alt>
        </a>
        </div>
        </div>

    @endforeach
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="makeup-section mb-110">
    <div class="container">
    @if($data['aboutUs'] != null)
    @foreach($data['aboutUs'] as $aboutUs)
    @if($aboutUs->side == "Left")
    <div class="makeup-top-item">
        <div class="row align-items-center justify-content-center g-0 gy-4">
        <div class="col-lg-6">
        <div class="makeup-img hover-img">
        <img src="{{ asset("aboutusImages/" . $aboutUs->image) }}" style="height:500px; object-fit:cover;" alt>
        </div>
        </div>
        <div class="col-lg-6">
        <div class="makeup-content">
        <span>{{ $aboutUs->short_title }}</span>
        <h2>{{ $aboutUs->title }}</h2>
        <p>{{ $aboutUs->description }}</p>
        <a href="{{ route("search.category" , $aboutUs->category) }}" class="primary-btn1 style-2 hover-btn3">*Try It Now*</a>
        </div>
        </div>
        </div>
        </div>
    @elseif($aboutUs->side == "Right")
    <div class="row align-items-center justify-content-center g-0 gy-4">
        <div class="col-lg-6 order-lg-1 order-2">
        <div class="makeup-content">
        <span>{{ $aboutUs->short_title }}</span>
        <h2>{{ $aboutUs->title }}</h2>
        <p>{{ $aboutUs->description }}</p>
        <a href="{{ route("search.category" , $aboutUs->category) }}" class="primary-btn1 style-2 hover-btn3">*Try It Now*</a>
        </div>
        </div>
        <div class="col-lg-6 order-lg-2 order-1">
        <div class="makeup-img hover-img">
        <img src="{{ asset("aboutusImages/" . $aboutUs->image) }}"  style="height:500px; object-fit:cover;"  alt>
        </div>
        </div>
        </div>
        @endif
    @endforeach
    @else

    <div class="makeup-top-item">
    <div class="row align-items-center justify-content-center g-0 gy-4">
    <div class="col-lg-6">
    <div class="makeup-img hover-img">
    <img src="assets/img/home1/makeup-img1.png" alt>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="makeup-content">
    <span>BROW BESTSELLERS</span>
    <h2>They’re kinda our Best thing!</h2>
    <p>Whatever your summer looks like, bring your own heat with up to 25% off Lumin Brand.Pellentesque ipsum dui, laoreet vitae ex in, pellentesque aliquam leo.</p>
    <a href class="primary-btn1 style-2 hover-btn3">*Shop All Brows*</a>
    </div>
    </div>
    </div>
    </div>

    <div class="row align-items-center justify-content-center g-0 gy-4">
    <div class="col-lg-6 order-lg-1 order-2">
    <div class="makeup-content">
    <h2>Try on your perfect Best Makeup!</h2>
    <p>Whatever your summer looks like, bring your own heat with up to 25% off Lumin Brand.Pellentesque ipsum dui, laoreet vitae ex in, pellentesque aliquam leo.</p>
    <a href class="primary-btn1 style-2 hover-btn3">*Try It Now*</a>
    </div>
    </div>
    <div class="col-lg-6 order-lg-2 order-1">
    <div class="makeup-img hover-img">
    <img src="assets/img/home1/makeup-img2.png" alt>
    </div>
    </div>
    </div>
    @endif
    </div>
    </div>



<div class="say-about-section mb-110">
<img src="assets/img/home1/testimonial-vector-2.png" alt class="vector3">
<img src="assets/img/home1/testimonial-vector-1.png" alt class="vector4">
<div class="container-fluid p-0">
<div class="section-title2 style-3">
<h3>They Say About Our Product</h3>
<div class="slider-btn">
<div class="about-prev-btn">
<i class="bi bi-arrow-left"></i>
</div>
<div class="about-next-btn">
<i class="bi bi-arrow-right"></i>
</div>
</div>
</div>
<div class="say-about-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="swiper say-about-slider">
<div class="swiper-wrapper">
@if($data['testimonals'] != null)
@foreach ($data['testimonals'] as  $testimonals)
<div class="swiper-slide">
    <div class="say-about-card">
    <div class="say-about-card-top">
    <ul>
        @for($i = 0 ; $i <= $testimonals->rating ; $i ++)
        <li><i class="bi bi-star-fill"></i></li>
        @endfor
    </ul>
    </div>
    <p>“{{@$testimonals->message}}”</p>
    <div class="say-about-card-bottom">
    <div class="author-area">
    <div class="author-img">
    <img src="{{asset("UserImages/". @$testimonals->user->profile_image)}}" alt>
    </div>
    <div class="author">
    <h5>{{@$testimonals->user->name}}</h5>
    @php
        if($testimonals->user->role == 1){
            $role = 'Admin at Dazzle.';
        }
        else{
            $role = 'Customer at Dazzle.';
        }
    @endphp
    <p>{{@$role}}</p>
    </div>
    </div>
    <div class="quote">
    <svg width="59" height="41" viewBox="0 0 59 41" xmlns="http://www.w3.org/2000/svg">
    <g opacity="0.05">
    <path d="M27.8217 13.4959C27.7944 13.2156 27.7396 12.9284 27.6712 12.6481C27.062 5.56517 21.1144 0 13.8664 0C6.2077 0 0 6.20099 0 13.8514C0 21.283 5.85865 27.3268 13.2093 27.6686C11.4367 30.4649 8.58264 32.7278 5.09894 33.7944L4.98259 33.8286C3.36735 34.3208 2.25175 35.8933 2.40232 37.6435C2.57342 39.6604 4.34608 41.1576 6.37196 40.9867C12.3333 40.4808 18.2946 37.4384 22.3464 32.4954C24.3791 30.0341 25.9533 27.1353 26.9114 23.9767C27.8765 20.8249 28.205 17.4202 27.8765 14.0633L27.8217 13.4959Z" />
    <path d="M58.8217 13.4959C58.7944 13.2156 58.7396 12.9284 58.6712 12.6481C58.062 5.56517 52.1144 0 44.8664 0C37.2077 0 31 6.20099 31 13.8514C31 21.283 36.8586 27.3268 44.2093 27.6686C42.4367 30.4649 39.5826 32.7278 36.0989 33.7944L35.9826 33.8286C34.3674 34.3208 33.2517 35.8933 33.4023 37.6435C33.5734 39.6604 35.3461 41.1576 37.372 40.9867C43.3333 40.4808 49.2946 37.4384 53.3464 32.4954C55.3791 30.0341 56.9533 27.1353 57.9114 23.9767C58.8765 20.8249 59.205 17.4202 58.8765 14.0633L58.8217 13.4959Z" />
    </g>
    </svg>
    </div>
    </div>
</div>
</div>
@endforeach
@endif
</div>
</div>
</div>
</div>
<div class="swiper-pagination2"></div>
</div>
</div>
</div>
</div>
</div>

<div class="beauty-article-section mb-110">
    <div class="container-md container-fluid">
    <div class="section-title style-2 text-center">
    <h3>Our Beauty Article</h3>
    </div>
    <div class="row gy-4">
    <div class="col-lg-7">
    <div class="row gy-4">
    @foreach($data['blogs'] as $blogs)
    <div class="col-sm-6">
    <div class="article-card" style="min-height: 500px!important; max-height:500px!important">
    <div class="article-image">
    <a href="{{route('blog_details' , $blogs->id)}}" class="article-card-img hover-img">
    <img src="{{asset('blogImages/' . $blogs->image )}}" >
    </a>
    <div class="blog-date">
    <a href="{{route('blog_details' , $blogs->id)}}">
        @php
        $date = \Carbon\Carbon::parse($blogs->created_at);
        $formatedDate = $date->format('d,M Y');
        @endphp
        {{$formatedDate}}
    </a>
    </div>
    </div>
    <div class="article-card-content">
    <div class="tag">
    <ul>
        @php

        $tagsId =  json_decode($blogs->tags);
        $tags   = \App\Models\Category::whereIn('id' ,$tagsId)->paginate(4);
        @endphp
        @foreach ($tags as $tag )
        <li ><a href="{{route('search.blog' , $tag->id)}}"> {{$tag->name}} </a></li>
        @endforeach
    </ul>
    </div>
    <h5><a href="{{route('blog_details' , $blogs->id)}}" class="hover-underline">{{$blogs->title}}</a></h5>
    <p>{!! $blogs->blog_qoute !!}</p>

    <a href="{{route('blog_details' , $blogs->id)}}">Read More</a>
    </div>
    </div>
    </div>
    @endforeach

    </div>
    </div>



    </div>
    </div>
    </div>


<div class="newsletter-section mb-110">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="newsletter-banner hover-img">
<div class="newsletter-content">
<h2>Sign up to our newsletter for all the latest Offer & discounts.</h2>
<form>
<div class="from-inner">
<input type="email" placeholder="Email Address">
<div class="from-arrow">
<i class="bi bi-arrow-right"></i>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="instagram-section mb-110">
<div class="container">
<div class="section-title style-3">
<h3>Instagram Feed</h3>
<p>Follow us on <a href>@Dazzle</a></p>
</div>
</div>
<div class="instagram-wrapper">
<div class="container-fluid p-0">
<div class="row">
<div class="col-12">
<div class="swiper instagram-slider">
<div class="swiper-wrapper">
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img1.png" alt></a>
</div>
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img2.png" alt></a>
</div>
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img3.png" alt></a>
</div>
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img4.png" alt></a>
</div>
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img5.png" alt></a>
</div>
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img6.png" alt></a>
</div>
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img7.png" alt></a>
</div>
<div class="swiper-slide">
<a href="https://www.instagram.com/"><img src="assets/img/home1/insta-img8.png" alt></a>
</div>
</div>
</div>
</div>
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
<a href="gift_card" class="primary-btn1 hover-btn3">*Shop Gift Cards*</a>
</div>
</div>
</div>




<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/css/custom/cart.js') }}"></script>
<script>
    let addToCartRoute  = "{{ route('cart.store') }}";
</script>
@endsection
