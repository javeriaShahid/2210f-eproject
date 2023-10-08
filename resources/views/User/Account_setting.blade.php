

@extends('User.layout')
@section('title')
Account Settings
@endsection
@section('content')


<style>
.modal-backdrop{
    position: fixed!important;
    top: 40px;
    left: 0;
    z-index: 1055;
    display: none;
    width: 100%;
    height: 100%;
    overflow-x: hidden;
    outline: 0;
}
</style>

<div class="breadcrumb-section">
<div class="container">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Shop</li>
<li class="breadcrumb-item active" aria-current="page">My Account</li>
</ol>
</nav>
</div>
</div>

<div class="dashboard-section mt-110 mb-110">
<div class="container">
<div class="row g-4">
<div class="col-lg-3">
<div class="dashboard-left">
<div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
<button class="nav-link active nav-btn-style mx-auto" id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">
<svg width="20" height="20" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_388_603)">
<path d="M8.47911 7.33339H1.60411C0.719559 7.33339 0 6.61383 0 5.72911V1.60411C0 0.719559 0.719559 0 1.60411 0H8.47911C9.36383 0 10.0834 0.719559 10.0834 1.60411V5.72911C10.0834 6.61383 9.36383 7.33339 8.47911 7.33339ZM1.60411 1.375C1.47772 1.375 1.375 1.47772 1.375 1.60411V5.72911C1.375 5.85567 1.47772 5.95839 1.60411 5.95839H8.47911C8.60567 5.95839 8.70839 5.85567 8.70839 5.72911V1.60411C8.70839 1.47772 8.60567 1.375 8.47911 1.375H1.60411Z" />
<path d="M8.47911 22H1.60411C0.719559 22 0 21.2805 0 20.3959V10.7709C0 9.88618 0.719559 9.16663 1.60411 9.16663H8.47911C9.36383 9.16663 10.0834 9.88618 10.0834 10.7709V20.3959C10.0834 21.2805 9.36383 22 8.47911 22ZM1.60411 10.5416C1.47772 10.5416 1.375 10.6443 1.375 10.7709V20.3959C1.375 20.5223 1.47772 20.625 1.60411 20.625H8.47911C8.60567 20.625 8.70839 20.5223 8.70839 20.3959V10.7709C8.70839 10.6443 8.60567 10.5416 8.47911 10.5416H1.60411Z" />
<path d="M20.3953 22H13.5203C12.6356 22 11.916 21.2805 11.916 20.3959V16.2709C11.916 15.3862 12.6356 14.6667 13.5203 14.6667H20.3953C21.2798 14.6667 21.9994 15.3862 21.9994 16.2709V20.3959C21.9994 21.2805 21.2798 22 20.3953 22ZM13.5203 16.0417C13.3937 16.0417 13.291 16.1444 13.291 16.2709V20.3959C13.291 20.5223 13.3937 20.625 13.5203 20.625H20.3953C20.5217 20.625 20.6244 20.5223 20.6244 20.3959V16.2709C20.6244 16.1444 20.5217 16.0417 20.3953 16.0417H13.5203Z" />
<path d="M20.3953 12.8334H13.5203C12.6356 12.8334 11.916 12.1138 11.916 11.2291V1.60411C11.916 0.719559 12.6356 0 13.5203 0H20.3953C21.2798 0 21.9994 0.719559 21.9994 1.60411V11.2291C21.9994 12.1138 21.2798 12.8334 20.3953 12.8334ZM13.5203 1.375C13.3937 1.375 13.291 1.47772 13.291 1.60411V11.2291C13.291 11.3557 13.3937 11.4584 13.5203 11.4584H20.3953C20.5217 11.4584 20.6244 11.3557 20.6244 11.2291V1.60411C20.6244 1.47772 20.5217 1.375 20.3953 1.375H13.5203Z" />
</g>
<defs>
<clipPath id="clip0_388_603">
<rect width="22" height="22" fill="white" />
</clipPath>
</defs>
</svg>Dashboard</button>
<button class="nav-link nav-btn-style mx-auto" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true"><i class="lar la-user"></i><svg width="20" height="20" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
<path d="M18.7782 14.2218C17.5801 13.0237 16.1541 12.1368 14.5982 11.5999C16.2646 10.4522 17.3594 8.53136 17.3594 6.35938C17.3594 2.85282 14.5066 0 11 0C7.49345 0 4.64062 2.85282 4.64062 6.35938C4.64062 8.53136 5.73543 10.4522 7.40188 11.5999C5.84598 12.1368 4.41994 13.0237 3.22184 14.2218C1.14421 16.2995 0 19.0618 0 22H1.71875C1.71875 16.8823 5.88229 12.7188 11 12.7188C16.1177 12.7188 20.2812 16.8823 20.2812 22H22C22 19.0618 20.8558 16.2995 18.7782 14.2218ZM11 11C8.44117 11 6.35938 8.91825 6.35938 6.35938C6.35938 3.8005 8.44117 1.71875 11 1.71875C13.5588 1.71875 15.6406 3.8005 15.6406 6.35938C15.6406 8.91825 13.5588 11 11 11Z" />
</svg>My Profile</button>
<button class="nav-link nav-btn-style mx-auto" id="v-pills-address-tab" data-bs-toggle="pill" data-bs-target="#v-pills-address" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true"><i class="lar la-user"></i><svg width="20" height="20" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
<path d="M18.7782 14.2218C17.5801 13.0237 16.1541 12.1368 14.5982 11.5999C16.2646 10.4522 17.3594 8.53136 17.3594 6.35938C17.3594 2.85282 14.5066 0 11 0C7.49345 0 4.64062 2.85282 4.64062 6.35938C4.64062 8.53136 5.73543 10.4522 7.40188 11.5999C5.84598 12.1368 4.41994 13.0237 3.22184 14.2218C1.14421 16.2995 0 19.0618 0 22H1.71875C1.71875 16.8823 5.88229 12.7188 11 12.7188C16.1177 12.7188 20.2812 16.8823 20.2812 22H22C22 19.0618 20.8558 16.2995 18.7782 14.2218ZM11 11C8.44117 11 6.35938 8.91825 6.35938 6.35938C6.35938 3.8005 8.44117 1.71875 11 1.71875C13.5588 1.71875 15.6406 3.8005 15.6406 6.35938C15.6406 8.91825 13.5588 11 11 11Z" />
</svg>Manage Addressess</button>
<button class="nav-link nav-btn-style mx-auto" id="v-pills-order-tab" data-bs-toggle="pill" data-bs-target="#v-pills-order" type="button" role="tab" aria-controls="v-pills-order" aria-selected="true"><svg width="20" height="20" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
<path d="M19.7115 18.1422L18.729 5.7622C18.6678 4.96461 17.9932 4.3398 17.1933 4.3398H15.2527V4.25257C15.2527 1.90768 13.345 0 11.0002 0C8.65527 0 6.74758 1.90768 6.74758 4.25257V4.3398H4.80703C4.00708 4.3398 3.33251 4.96457 3.2715 5.76052L2.28872 18.1439C2.21266 19.1354 2.55663 20.1225 3.23235 20.852C3.90808 21.5815 4.86598 22 5.86041 22H16.1399C17.1342 22 18.0922 21.5816 18.768 20.852C19.4437 20.1224 19.7876 19.1354 19.7115 18.1422ZM8.03622 4.25257C8.03622 2.61826 9.36588 1.28863 11.0002 1.28863C12.6344 1.28863 13.9641 2.6183 13.9641 4.25257V4.3398H8.03622V4.25257ZM17.8225 19.9764C17.3835 20.4503 16.7859 20.7114 16.1399 20.7114H5.86045C5.21437 20.7114 4.61685 20.4503 4.17779 19.9764C3.73878 19.5024 3.5242 18.8866 3.57352 18.2441L4.55622 5.86072C4.56619 5.73044 4.67636 5.62843 4.80703 5.62843H6.74758V7.21548C6.74758 7.57131 7.03607 7.8598 7.3919 7.8598C7.74772 7.8598 8.03622 7.57131 8.03622 7.21548V5.62843H13.9641V7.21548C13.9641 7.57131 14.2526 7.8598 14.6084 7.8598C14.9642 7.8598 15.2527 7.57131 15.2527 7.21548V5.62843H17.1933C17.324 5.62843 17.4341 5.73048 17.4443 5.86244L18.4267 18.2424C18.4762 18.8866 18.2615 19.5024 17.8225 19.9764Z" />
<path d="M13.9035 10.9263C13.652 10.6746 13.244 10.6746 12.9924 10.9263L10.1154 13.8033L9.00909 12.697C8.75751 12.4454 8.34952 12.4454 8.0979 12.697C7.84627 12.9486 7.84627 13.3566 8.0979 13.6082L9.65977 15.1701C9.78558 15.2959 9.9505 15.3588 10.1153 15.3588C10.2802 15.3588 10.4451 15.2959 10.5709 15.1701L13.9034 11.8375C14.1551 11.5858 14.1551 11.1779 13.9035 10.9263Z" />
</svg> Order Tracking</button>
<button class="nav-link nav-btn-style mx-auto" id="v-pills-purchase-tab" data-bs-toggle="pill" data-bs-target="#v-pills-purchase" type="button" role="tab" aria-controls="v-pills-purchase" aria-selected="true">
<svg width="20" height="20" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
<path d="M7.41246 0.0859337C6.34254 0.356638 5.40152 1.12578 4.92027 2.11836C4.61519 2.75429 4.58941 2.90039 4.56793 4.00468L4.54644 4.98437H3.02535H1.50425L1.48707 5.0789C1.43121 5.36679 0.80816 16.6977 0.829644 17.0586C0.898394 18.266 1.66754 19.3402 2.80621 19.8215C3.39488 20.0664 3.38199 20.0664 7.73473 20.0664H11.7222L12.1218 20.466C12.9211 21.2523 13.875 21.7508 14.9535 21.9398C15.5636 22.043 16.6336 22.0043 17.1879 21.8582C19.13 21.334 20.5308 19.9203 21.0422 17.9695C21.1882 17.4066 21.2226 16.457 21.1238 15.834C20.707 13.3117 18.4769 11.3867 15.9589 11.3867H15.5593L15.5379 11.159C15.525 11.0387 15.4433 9.72812 15.3617 8.25C15.28 6.77187 15.1984 5.43554 15.1855 5.27226L15.1597 4.98437H13.6386H12.1175V4.19375C12.1175 3.32148 12.0574 2.87461 11.8726 2.40625C11.4429 1.31914 10.5793 0.511326 9.45348 0.150387C9.13121 0.0429649 9.0066 0.0300751 8.42223 0.0171852C7.86363 0.00429344 7.70035 0.0171852 7.41246 0.0859337ZM8.93785 1.39648C9.80582 1.62851 10.5148 2.35468 10.7211 3.22695C10.764 3.41601 10.7855 3.73398 10.7855 4.24101V4.98437H8.33629H5.88707V4.20664C5.88707 3.34726 5.93004 3.08515 6.14488 2.66836C6.45426 2.0625 7.05582 1.57265 7.70465 1.39648C8.00113 1.31914 8.64137 1.31914 8.93785 1.39648ZM4.55504 7.13281V7.94922H5.22105H5.88707V7.13281V6.3164H8.33629H10.7855V7.13281V7.94922H11.4515H12.1175V7.13281V6.3164H13.0199C13.8964 6.3164 13.9222 6.3207 13.9222 6.40234C13.9222 6.44961 13.991 7.64414 14.0726 9.05351C14.1586 10.4586 14.2187 11.6187 14.2144 11.623C14.2058 11.6273 14.0425 11.7004 13.8449 11.7863C12.3539 12.4223 11.2796 13.5867 10.8113 15.0734C10.4804 16.1219 10.489 17.368 10.8285 18.382L10.9488 18.7387L7.28785 18.7258L3.63121 18.7129L3.39488 18.6184C2.91363 18.4207 2.45386 17.9609 2.27769 17.5012C2.22183 17.3594 2.17027 17.1144 2.16168 16.9297C2.14449 16.6633 2.64293 7.66562 2.73316 6.62578L2.75894 6.3164H3.65699H4.55504V7.13281ZM16.9429 12.8648C18.0515 13.1914 18.9324 13.9262 19.4308 14.9316C19.7273 15.5246 19.8519 16.0531 19.8519 16.7105C19.8476 18.3519 18.8379 19.8172 17.2996 20.4145C16.8312 20.5949 16.4144 20.6723 15.8773 20.6723C14.9234 20.6723 14.1414 20.3973 13.3765 19.7914C12.7707 19.3102 12.2507 18.5195 12.0273 17.7461C11.8984 17.2863 11.8683 16.4227 11.9629 15.9371C12.255 14.5105 13.3379 13.3117 14.7257 12.8906C15.2027 12.7445 15.4089 12.723 16.0062 12.7402C16.4488 12.7488 16.6422 12.7789 16.9429 12.8648Z" />
<path d="M16.4186 15.8812C15.7698 16.5516 15.2284 17.0973 15.2069 17.093C15.1897 17.0844 14.919 16.7922 14.6097 16.4441L14.0425 15.8039L13.905 15.9285C13.8319 15.9973 13.6128 16.1949 13.4151 16.3711C13.2218 16.543 13.0671 16.702 13.0714 16.7191C13.0972 16.775 15.1425 19.0781 15.1725 19.0781C15.1897 19.0781 15.9675 18.2875 16.8999 17.325L18.5971 15.5676L18.1417 15.1121C17.8882 14.8586 17.6604 14.6523 17.6389 14.6523C17.6132 14.6566 17.0675 15.2066 16.4186 15.8812Z" />
</svg>
Order</button>
<a href="{{ route('user.logout') }}" class="nav-link nav-btn-style mx-auto" type="button" role="tab"><svg width="20" height="20" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_382_377)">
<path d="M21.7273 10.4732L19.3734 8.81368C18.9473 8.51333 18.3574 8.81866 18.3574 9.34047V12.6595C18.3574 13.1834 18.9485 13.4856 19.3733 13.1863L21.7272 11.5268C22.0916 11.2699 22.0906 10.7294 21.7273 10.4732Z" />
<path d="M18.4963 15.1385C18.1882 14.9603 17.7939 15.0655 17.6156 15.3737C16.1016 17.9911 13.2715 19.7482 10.0374 19.7482C5.21356 19.7482 1.28906 15.8237 1.28906 11C1.28906 6.17625 5.21356 2.25171 10.0374 2.25171C13.2736 2.25171 16.1025 4.0105 17.6156 6.62617C17.7938 6.93434 18.1882 7.03949 18.4962 6.86138C18.8043 6.68315 18.9096 6.28887 18.7314 5.98074C16.9902 2.97053 13.738 0.962646 10.0374 0.962646C4.48967 0.962646 0 5.45184 0 11C0 16.5477 4.48919 21.0373 10.0374 21.0373C13.7396 21.0373 16.9909 19.028 18.7315 16.0191C18.9097 15.711 18.8044 15.3168 18.4963 15.1385Z" />
<path d="M7.05469 10.3555C6.69873 10.3555 6.41016 10.644 6.41016 11C6.41016 11.356 6.69873 11.6445 7.05469 11.6445H17.0677V10.3555H7.05469Z" />
</g>
<defs>
<clipPath id="clip0_382_377">
<rect width="22" height="22" />
</clipPath>
</defs>
</svg>Logout</a>
</div>
</div>
</div>
<div class="col-lg-9">
<div class="tab-content" id="v-pills-tabContent">
<div class="tab-pane fade show active " id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
<div class="dashboard-area box--shadow">
<p>Hello, <strong>{{ session()->get('user')['name'] }}</strong></p>
<p>From your My Account Dashboard you have the ability to view a snapshot of your recent
account activity and update your account information. Select a link below to view or
edit information.</p>
<div class="row pt-25 g-4">
<div class="col-md-4 col-sm-6">
<div class="dashboard-card hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
<div class="header">
<h5>Total Order</h5>
</div>
<div class="body">
<div class="counter-item">
    @php
    $totalOrders  = \DB::table('checkouts')->where(['user_id'=>session()->get('user')['id']])->count();
    @endphp
<h2>{{ $totalOrders}}</h2>
</div>
<div class="icon">
    <img width="50" height="50" src="https://img.icons8.com/external-itim2101-lineal-itim2101/64/external-delivery-box-shopping-and-ecommerce-itim2101-lineal-itim2101.png" alt="external-delivery-box-shopping-and-ecommerce-itim2101-lineal-itim2101"/>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="dashboard-card hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".4s">
<div class="header">
<h5>Shipment in Progress </h5>
</div>
<div class="body">
<div class="counter-item">
    @php
    $pendingProducts  = \DB::table('checkouts')->where(['user_id'=>session()->get('user')['id'],'is_delivered' => 0])->count();
    @endphp
<h2>{{ $pendingProducts }}</h2>
</div>
<div class="icon">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
        <path d="M7.04461 0.190657C6.67439 0.420934 6.38422 0.771354 6.11407 1.34204C5.994 1.57232 5.8239 1.85265 5.71383 1.96278C5.61377 2.07292 4.93337 3.06411 4.20295 4.16543C3.47252 5.25674 2.84215 6.17784 2.80212 6.20788C2.70206 6.28797 2.14174 7.139 2.0717 7.32922C2.04168 7.41933 1.61143 8.10015 1.12114 8.83103C0.63085 9.5619 0.180586 10.2627 0.110545 10.3829C0.0304983 10.5431 0.000480672 14.628 0.000480672 25.9115C0.000480672 42.7217 -0.0395428 41.5703 0.610839 42.5114C0.790944 42.7718 1.18117 43.1422 1.53138 43.3625L2.13173 43.7529H13.1182H24.0946L24.4148 43.4926C25.2953 42.7417 25.2053 41.5403 24.2247 40.8795L23.8845 40.6492H13.4984H3.1023V26.5823V12.5154H9.35597H15.6096V16.6604C15.6096 20.7854 15.6096 20.7954 15.8398 21.1258C16.16 21.6064 16.5302 21.8466 17.0305 21.8967C17.4107 21.9368 17.8509 21.8266 19.682 21.1959L21.8833 20.445L24.0746 21.1859C25.2853 21.5963 26.436 21.9267 26.6561 21.9267C27.1064 21.9267 27.6167 21.5863 27.9269 21.0857C28.107 20.7954 28.117 20.5351 28.117 16.6404V12.5154H34.3706H40.6243V18.2123V23.8991L40.8544 24.2295C41.1746 24.7101 41.5448 24.9504 42.0651 25.0004C42.6355 25.0705 43.0357 24.9103 43.4259 24.4598L43.7261 24.1194V17.2411V10.3629L42.4053 8.36046C41.6749 7.25914 41.0345 6.308 40.9745 6.25794C40.8144 6.11777 39.6737 4.3957 39.5937 4.18545C39.5337 4.00523 38.413 2.3132 38.1629 2.02286C38.0928 1.92274 37.8127 1.54228 37.5525 1.15181C37.2823 0.771354 36.9221 0.35085 36.732 0.230706L36.3918 0.000429217H21.8733C7.83508 0.000429217 7.34479 0.0104412 7.04461 0.190657ZM16.8604 3.32442C16.8404 3.45457 16.6102 4.76615 16.3601 6.25794C16.1099 7.73972 15.8798 9.0613 15.8598 9.18145L15.8098 9.41172H10.1564H4.50312L5.30359 8.21028C5.75385 7.53948 6.14408 6.91873 6.1741 6.82862C6.20412 6.73851 6.42425 6.40812 6.64438 6.10776C6.87451 5.79739 7.41483 4.99642 7.85509 4.32562L8.65556 3.10415H12.788H16.9104L16.8604 3.32442ZM24.1246 6.00764C24.3848 7.57952 24.6249 8.98121 24.6549 9.13139L24.715 9.41172H21.8633H19.0216L19.0617 9.13139C19.2918 7.82982 19.7521 5.07652 19.8821 4.3056C19.9622 3.78497 20.0522 3.29438 20.0723 3.2243C20.1023 3.12418 20.5125 3.10415 21.8733 3.12418L23.6443 3.15421L24.1246 6.00764ZM35.4012 3.52466C35.5213 3.76495 35.9416 4.43575 36.3418 5.01645C36.742 5.60716 37.5825 6.82862 38.2029 7.74973L39.3235 9.41172H33.6202H27.9169L27.8668 9.18145C27.7267 8.58073 27.1964 5.25674 27.1064 4.4758C27.0563 3.98521 26.9863 3.48461 26.9563 3.34444L26.8963 3.10415H31.0487H35.2011L35.4012 3.52466ZM25.0152 15.3589V18.1923L23.6443 17.7117C22.8839 17.4414 22.1034 17.2211 21.9033 17.2211C21.7032 17.2211 20.9027 17.4414 20.1223 17.7017L18.7115 18.1822V15.3488V12.5154H21.8633H25.0152V15.3589Z" />
        <path d="M36.9321 28.344C33.4101 29.0849 30.4984 31.4778 29.0175 34.8418C27.9669 37.2447 27.8368 39.9179 28.6673 42.511C29.1276 43.9728 30.8085 46.5358 31.8892 47.4169C33.0398 48.368 35.1411 49.4193 36.6119 49.7897C37.3324 49.97 37.7526 50 39.1234 50C41.5348 49.99 42.6455 49.6696 44.9268 48.328C46.6979 47.2867 47.9386 45.855 49.1193 43.4822C49.9598 41.8002 50.2399 38.9868 49.7797 36.7942C49.5896 35.843 48.8992 34.201 48.3688 33.3801C48.1587 33.0497 47.9286 32.6592 47.8585 32.499C47.5384 31.7881 45.4972 30.1362 43.9262 29.2952C41.875 28.2139 39.2535 27.8634 36.9321 28.344ZM40.9145 31.4978C41.2747 31.5779 41.9851 31.8382 42.4954 32.0785C43.2458 32.4389 43.576 32.6792 44.2764 33.36C45.6272 34.6616 46.3276 35.833 46.6879 37.3949C47.0681 39.0769 46.858 40.869 46.0675 42.531C45.6873 43.352 45.5072 43.6023 44.6066 44.5134C43.6861 45.4445 43.466 45.6147 42.5754 46.0553C40.8744 46.8863 39.1234 47.1065 37.3724 46.7161C35.8715 46.3757 34.6208 45.6247 33.35 44.3232C32.1994 43.1418 31.549 41.7501 31.3088 39.9279C31.2088 39.1169 31.2088 38.8466 31.3489 38.0156C31.669 36.1334 32.2594 34.982 33.6102 33.6304C35.6514 31.5979 38.1729 30.857 40.9145 31.4978Z" />
        <path d="M38.363 34.632C38.1828 34.7421 37.9327 34.9824 37.7826 35.1726L37.5225 35.513V37.5054C37.5225 39.2976 37.5425 39.5279 37.7126 39.7982C37.8226 39.9584 38.7132 40.9195 39.6937 41.9307L41.4748 43.7529H42.2152C42.9356 43.7529 42.9556 43.7429 43.3359 43.3625C43.7161 42.982 43.7261 42.962 43.7261 42.2411L43.7361 41.5002L42.1752 39.9984L40.6243 38.4966V37.0449C40.6243 35.4229 40.5542 35.2027 39.8939 34.7021C39.4736 34.3817 38.8232 34.3516 38.363 34.632Z" />
        </svg>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="dashboard-card hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".4s">
<div class="header">
<h5>Shipped Orders</h5>
</div>
<div class="body">
@php
    $deliveredProducts  = \DB::table('checkouts')->where(['user_id'=>session()->get('user')['id'],'is_delivered' => 1])->count();

@endphp
<div class="counter-item">
<h2>
    {{ $deliveredProducts }}
</h2>
</div>
<div class="icon">
    <img width="50" height="50" src="https://img.icons8.com/ios/50/cruise-ship.png" alt="cruise-ship"/>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="dashboard-card hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".4s">
<div class="header">
<h5>Sent for Delivery</h5>
</div>
<div class="body">
@php
    $deliveredProducts  = \DB::table('checkouts')->where(['user_id'=>session()->get('user')['id'],'is_delivered' => 2])->count();

@endphp
<div class="counter-item">
<h2>
    {{ $deliveredProducts }}
</h2>
</div>
<div class="icon">
    <img width="50" height="50" src="https://img.icons8.com/external-kmg-design-detailed-outline-kmg-design/64/external-truck-delivery-ecommerce-2-kmg-design-detailed-outline-kmg-design.png" alt="external-truck-delivery-ecommerce-2-kmg-design-detailed-outline-kmg-design"/>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="dashboard-card hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".4s">
<div class="header">
<h5>Delivered Orders</h5>
</div>
<div class="body">
@php
    $deliveredProducts  = \DB::table('checkouts')->where(['user_id'=>session()->get('user')['id'],'is_delivered' => 3])->count();

@endphp
<div class="counter-item">
<h2>
    {{ $deliveredProducts }}
</h2>
</div>
<div class="icon">
    <img width="50" height="50" src="https://img.icons8.com/external-others-pike-picture/50/external-Delivered-Order-reviews-others-pike-picture.png" alt="external-Delivered-Order-reviews-others-pike-picture"/>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="dashboard-card hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".4s">
<div class="header">
<h5>Cancelled Orders</h5>
</div>
<div class="body">
@php
    $deliveredProducts  = \DB::table('checkouts')->where(['user_id'=>session()->get('user')['id'],'is_delivered' => 4])->count();

@endphp
<div class="counter-item">
<h2>
    {{ $deliveredProducts }}
</h2>
</div>
<div class="icon">
    <img width="50" height="50" src="https://img.icons8.com/ios/50/cancel-order.png" alt="cancel-order"/>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
<div class="dashboard-profile">
<div class="table-title-area">
<h3>Edit Your Profile</h3>
<p>From your My Account Dashboard you have the ability to view a snapshot of your
recent account activity and update your account information. Select a link below
to view or edit information.</p>
</div>
<div class="form-wrapper">
<form action="#">
<div class="row">
    <div class="col-12 mb-25">
        <div class="form-inner">
            <label for="">Profile Image</label>
        <input type="file" placeholder="">
        </div>
        </div>
<div class="col-xl-6 col-lg-12 col-md-6 mb-25">
<div class="form-inner">
<input type="text" placeholder="Enter your first name*" value="{{ $data['user']->name }}">
</div>
</div>
<div class="col-xl-6 col-lg-12 col-md-6 mb-25">
<div class="form-inner">
<input type="text" placeholder="Enter your User name*" value="{{ $data['user']->username }}">
</div>
</div>
<div class="col-xl-6 col-lg-12 col-md-6 mb-25">
<div class="form-inner">
<div class="row">
    <div class="col-md-3">
        <select id="country">
            <option value="{{ $data['user']->phone_code }}">{{ $data['user']->phone_code }}</option>
            @foreach ($data['country'] as $country)
                <option value="{{ $country->phonecode }}">{{$country->phonecode}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-9">
<input type="text" placeholder="Enter yout contact number" value="{{ $data['user']->contact_number }}">

    </div>
</div>
</div>
</div>
<div class="col-xl-6 col-lg-12 col-md-6 mb-25">
<div class="form-inner">
<input type="text" placeholder="Enter your email address*" value="{{ $data['user']->email }}">
</div>
</div>





<div class="col-12">
<div class="button-group">
<!--reset Button trigger modal -->
<button type="button" class="primary-btn3 black-bg  hover-btn5 hover-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Reset Password
  </button>
<button type="submit" class="primary-btn3 black-bg  hover-btn5 hover-white">Update
Profile</button>
<button class="primary-btn3 hover-btn5">Cancel</button>
</div>
</div>
</div>
</form>
{{-- Reset Password Form --}}
<div class="modal fade" id="exampleModal" style="margin-top: 10px;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Password reset form</h5>
          <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="passwordResetNotify" style="display:none">
                <div class="container-logo">
                    <h1 class="text-center text-success">Password Changed</h1>
                </div>
                <div class="text text-center">Your Password Has been Changed</div>
            </div>
          <form id="resetForm">
            @csrf
          <input type="email"  id="emailContainer" name="verification_email" class="mt-3 mb-3" placeholder="enter your email">&nbsp;
          <input type="text"  name="verification_code" style="display:none;" id="verificationContainer" class="mt-3 mb-3" placeholder="verification code">&nbsp;
          <div id="passwordContainer" class="mt-3 mb-3" style="display: none">
          <input type="text" name="password" placeholder="new password">&nbsp;
          <input type="text" name="confirm_password" placeholder="confirm password">
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="submitButton" class="btn btn-dark">Get code</button>
        </div>
    </div>
</div>
</div>
</form>
{{-- MOdal and form ends here for verification --}}
</div>
</div>
</div>
{{-- Adress pane --}}
<div class="tab-pane fade" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab">
    <div class="dashboard-profile">
    <div class="table-title-area">
    <h3>Edit Your Address</h3>
    <p>From your My Account Dashboard you have the ability to
    update your account address information. </p>
    </div>
    <div class="form-wrapper">
    <form id="saveAddress"  >
     @csrf
    <div class="row">
    <div class="col-xl-6 col-lg-12 col-md-6 mb-25">
    <div class="form-inner">
    <input type="hidden" name="address_id">
    <input type="text" placeholder="Enter your Address line 1*" name="streetaddress1" >
    </div>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-6 mb-25">
    <div class="form-inner">
    <input type="text" placeholder="Enter your Address line 2" name="streetaddress2">
    </div>
    </div>

    <div class="col-xl-6 col-lg-12 col-md-6 mb-25">
    <div class="form-inner">
    <input type="text" placeholder="Enter your Personal Contact Number*" name="contactNumber1" >
    </div>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-6 mb-25">
    <div class="form-inner">
    <input type="text" placeholder="Enter your Professional Contact Number" name="contactNumber2">
    </div>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-6 mb-25">
    {{-- <input type="text" list="country" id="countries"> --}}
    <div class="form-inner">
        <select name="country" id="country" >
            <option value="">Select Country</option>
            @foreach ($data['country'] as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
    </div>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-6 mb-25">
    <div class="form-inner">
    <select name="state" id="state">
    <option value="">Select Country First</option>

    </select>
    </div>
    </div>

    <div class="col-xl-6 col-lg-12 col-md-6 mb-25">
    <div class="form-inner">
    <select name="city" id="city">
    <option value="">Select State First </option>

    </select>
    </div>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-6 mb-25">
        <div class="form-inner">
        <input type="text" placeholder="Zip Code" name="postalcode">
        </div>
        </div>
    <div class="col-12">
    <div class="button-group">

 {{-- Start modal --}}
 <!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" class="primary-btn3 black-bg  hover-btn5 hover-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Select Address
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table  w-100">
                    <tr>
                        <th>Id </th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
               <tbody id="tableContainer">
          @foreach ($data ['address'] as $address  )
          <tr>
            <td>
            {{$address->id }}
            </td>
            <td>
              {{ $address->countries->name }}
            </td>
            <td class="d-flex">
                <input type="hidden" name="addressId" value="{{ $address ->id }}">
                <button class="btn plusButton text-white btn-warning"><i class="fa fa-plus"></i></button> |
                <button class="btn btn-danger removeButton"><i class="fa fa-trash"></i></button>
            </td>

        </tr>
          @endforeach
               </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 {{-- End modal --}}

    <button type="submit" class="primary-btn3 black-bg  hover-btn5 hover-white">Save
    Address</button>
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
{{-- End of address pane --}}
<div class="tab-pane fade" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab">
{{-- Order Information --}}



{{-- Order tracking --}}
<div class="order-traking-area">
<p>To track your order please enter your Order tracking ID in the box below and press the "Track"
button. This given to you on your receipt and in the confirmation email you should
have received.</p>
<form id="orderTracking" action="{{ route('order.track') }}" method="POST" >
    @csrf
<div class="row justify-content-center">
<div class="col-md-8 mb-25">
<div class="form-inner">
<label>Order tracking id</label>
<input type="text" name="tracking_number" placeholder="Enter your order ID">
</div>
</div>

<div class="col-md-5 d-flex justify-content-center">
<div class="button-group">
<button type="submit" class="primary-btn3 black-bg  hover-btn5 hover-white">Track</button>
</div>
</div>
</div>
</form>
</div>
{{-- Order Tracking Container --}}
</div>
<div class="tab-pane fade" id="v-pills-purchase" role="tabpanel" aria-labelledby="v-pills-purchase-tab">

<div class="table-title-area">
<h3>My Order</h3>

    <select id="order_select" name="last_order_data">
        <option value="5">Show:  Last 05 Order</option>
        <option value="10">Show: Last 10 Order</option>
        <option value="15">Show: Last 15 Order</option>
        <option value="20">Show: Last 20 Order</option>
    </select>

</div>

<div class="table-wrapper">
<table class="eg-table order-table table mb-0">
<thead>
<tr>
<th>Image</th>
<th>Order ID</th>
<th>Product Details</th>
<th>price</th>
<th>Status</th>
<th>Generate Label</th>
<th>Download Label</th>
<th>Cancel Order</th>
</tr>
</thead>
<tbody id="checkoutTable">
@foreach ($data['checkout'] as $checkout )
<tr>
    <td data-label="Image"><img alt="image" style="width: 40px ; height:40px ; object-fit:contain" src="{{ asset('assets/Productimages/' . $checkout->product->image) }}" class="img-fluid">
    </td>
    <td data-label="Order ID">#{{ $checkout->tracking_id }}</td>
    <td data-label="Product Details">{{ $checkout->product->name }}</td>
    <td data-label="price">PKR,{{ $checkout->total_price + $checkout->shipping_fees }}</td>
    @if($checkout->is_delivered == 1)
    <td data-label="Status" class="text-warning">Parcel Shipped</td>
    @elseif($checkout->is_delivered == 2)
    <td data-label="Status" class="text-primary">Sent For Delivery</td>
    @elseif($checkout->is_delivered == 3)
    <td data-label="Status" class="text-green">Delivered</td>
    @elseif($checkout->is_delivered == 4)
    <td data-label="Status" class="text-danger">Cancelled</td>
    @else
    <td data-label="Status" class="text-danger">Pending</td>
    @endif
    <td><a href="{{ route('label.view' , $checkout->id) }}" class="btn btn-primary"><i class="bx bxs-coupon"></i></a></td>
    <td><a href="{{ route('label.download' , $checkout->id) }}" class="btn btn-warning"><i class="bx bxs-cloud-download"></i></a></td>
    <td><a href="{{ route('order.cancel' , $checkout->tracking_id) }}" class="btn btn-danger"><i class="bx bx-trash"></i></a></td>
</tr>
@endforeach


</tbody>
</table>
</div>

<div class="table-pagination">
    <p class="text-center text-muted">
        Showing Order from  {{ $data['checkout']->firstItem() }} to {{ $data['checkout']->lastItem() }} From Total Orders Of  {{ $data['checkout']->total() }} entries
    </p>
<nav class="shop-pagination">
<ul class="pagination-list">
{{ $data['checkout']->links() }}
</ul>
</nav>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/css/custom/checkout.js') }}"></script>
<script src="{{ asset('assets/css/custom/accountsetting.js') }}"></script>
<script src="{{ asset('assets/css/custom/resetpassword.js') }}"></script>

<script>

    let FindState             = "{{ route('state.get') }}";
    let FindCity              = "{{ route('city.get') }}";
    let last_order_route      = "{{ route('filter.last.order') }}";
    let basePath              = "{{ asset('') }}";
    let view_labelRoute       = "{{ route('label.view') }}";
    let download_labelRoute   = "{{ route('label.download') }}";
    let cancelOrderRoute      = "{{ route('order.cancel') }}";
    let specificAddress   = "{{ route('specific.address') }}";
    let deleteAddress     = "{{ route('delete.address') }}";
    let createAddress     = "{{ route('address.create') }}";
    let getCodeRoute      = "{{ route('get.verification.code') }}";
    let verifyRoute       = "{{ route('verify.code') }}";  
    let resetRoute        = "{{ route('password.reset') }}";
</script>




@endsection

