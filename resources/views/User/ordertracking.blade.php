@extends('User.layout')
@section('title')
Order tracking
@endsection
@section('content')
    <style>

        .bold {
            font-weight: 600;
        }

        .small {
            font-size: 12px !important;
            letter-spacing: 0.5px !important;
        }

        .Today {
            color: rgb(83, 83, 83);
        }

        .btn-outline-primary {
            background-color: #fff !important;
            color: #4bb8a9 !important;
            border: 1.3px solid #4bb8a9;
            font-size: 12px;
            border-radius: 0.4em !important;
        }

        .btn-outline-primary:hover {
            background-color: #4bb8a9 !important;
            color: #fff !important;
            border: 1.3px solid #4bb8a9;
        }


        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: #455A64;
            padding-left: 0px;
            margin-top: 30px
        }

        #progressbar li {
            list-style-type: none;
            font-size: 13px;
            width: 23.33%;
            float: left;
            position: relative;
            font-weight: 400;
            color: #455A64 !important;

        }

        #progressbar #step1:before {
            content: "1";
            color: #fff;
            width: 29px;
            margin-left: 15px !important;
            padding-left: 11px !important;
        }


        #progressbar #step2:before {
            content: "2";
            color: #fff;
            width: 29px;

        }
        #progressbar #step3:before {
            content: "3";
            color: #fff;
            width: 29px;

        }

        #progressbar #step4:before {
            content: "4";
            color: #fff;
            width: 29px;
            margin-right: 3px !important;
            padding-right: 1px !important;

        }

        #progressbar li:before {
            line-height: 29px;
            display: block;
            font-size: 12px;
            background: #455A64;
            border-radius: 50%;
            margin: auto;
        }

        #progressbar li:after {
            content: '';
            width: 121%;
            height: 2px;
            background: #455A64;
            position: absolute;
            left: 0%;
            right: 0%;
            top: 15px;
            z-index: -1;
        }

        #progressbar li:nth-child(2):after {
            left: 50%;
        }

        #progressbar li:nth-child(3):after {
            left: 50%;
        }

        #progressbar li:nth-child(1):after {
            left: 25%;
            width: 121%;
        }

        #progressbar li:nth-child(4):after {
            left: 30% !important;
            width: 50% !important;
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #4bb8a9;
        }

        .card {
            background-color: #fff;
            /* box-shadow: 2px 4px 15px 0px rgb(0, 108, 170); */
            z-index: 0;
        }

        small {
            font-size: 12px !important;
        }

        .a {
            justify-content: space-between !important;
        }

        .border-line {
            border-right: 1px solid rgb(226, 206, 226)
        }

        .card-footer img {
            opacity: 0.3;
        }

        .card-footer h5 {
            font-size: 1.1em;
            color: #8C9EFF;
            cursor: pointer;
        }
    </style>
</head>

<body>

  @if ($data['checkout']->is_delivered == 0)
  <div class="container-fluid my-5 d-sm-flex justify-content-center" >
    <div class="card px-2" style="width: 100%;">
        <div class="card-header bg-white">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <p class="text-muted"> Order # <span class="font-weight-bold text-primary">{{ $data['checkout']->tracking_id }}</span></p>

                        <p class="text-muted"> Place On <span class="font-weight-bold text-dark">{{ $data['checkout']->order_placed_date }}</span>
                        </p>

                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="media flex-column flex-sm-row">
                <div class="media-body ">
                    <h5 class="bold">{{ $data['checkout']->product->name }}</h5>
                    <p class="text-muted"> Qt: 1 Pair</p>
                    <h4 class="mt-3 mb-4 bold"> <span class="mt-5">PKR,</span>{{ $data['checkout']->total_price + $data['checkout']->shipping_fees }} <span
                            class="small text-muted"> via ({{ $data['checkout']->payment_method }}) </span></h4>
                </div>
            </div>
        </div>
        <div class="row px-4">
            <div class="col">
                <ul id="progressbar">
                    <li class="step0 active " id="step1">PLACED</li>
                    <li class="step0 text-muted text-center" id="step2">SHIPPED</li>
                    <li class="step0 text-muted text-center" id="step3">ORDER EN ROUTE</li>
                    <li class="step0  text-muted text-center" id="step4">DELIVERED</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@elseif ($data['checkout']->is_delivered == 1)
<div class="container-fluid my-5 d-sm-flex justify-content-center" >
    <div class="card px-2" style="width: 60%;">
        <div class="card-header bg-white">
            <div class="row justify-content-between">
                <div class="col">
                    <p class="text-muted"> Order # <span class="font-weight-bold text-primary">{{ $data['checkout']->tracking_id }}</span></p>
                    <div style="position: relative; bottom: 25px; margin-left: 200px;">
                        <p class="text-muted"> Place On <span class="font-weight-bold text-dark">{{ $data['checkout']->order_placed_date }}</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="media flex-column flex-sm-row">
                <div class="media-body ">
                    <h5 class="bold">{{ $data['checkout']->product->name }}</h5>
                    <p class="text-muted"> Qt: 1 Pair</p>
                    <h4 class="mt-3 mb-4 bold"> <span class="mt-5">PKR,</span> {{ $data['checkout']->total_price + $data['checkout']->shipping_fees }} <span
                            class="small text-muted"> via ({{ $data['checkout']->payment_method }}) </span></h4>
                </div>
            </div>
        </div>
        <div class="row px-4">
            <div class="col">
                <ul id="progressbar">
                    <li class="step0 active " id="step1">PLACED</li>
                    <li class="step0 active text-center" id="step2">SHIPPED</li>
                    <li class="step0 text-muted text-center" id="step3">ORDER EN ROUTE</li>
                    <li class="step0  text-muted text-center" id="step4">DELIVERED</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@elseif ($data['checkout']->is_delivered == 2)
<div class="container-fluid my-5 d-sm-flex justify-content-center" >
    <div class="card px-2" style="width: 100%;">
        <div class="card-header bg-white">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <p class="text-muted"> Order # <span class="font-weight-bold text-primary">{{ $data['checkout']->tracking_id }}</span></p>

                        <p class="text-muted"> Place On <span class="font-weight-bold text-dark">{{ $data['checkout']->order_placed_date }}</span>
                        </p>

                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="media flex-column flex-sm-row">
                <div class="media-body ">
                    <h5 class="bold">{{ $data ['checkout']->product->name }}</h5>
                    <p class="text-muted"> Qt: 1 Pair</p>
                    <h4 class="mt-3 mb-4 bold"> <span class="mt-5">PKR,</span>{{ $data ['checkout']->total_price + $data['checkout']->shipping_fees }} <span
                            class="small text-muted"> via ({{ $data ['checkout']->payment_method }}) </span></h4>
                </div>
            </div>
        </div>
        <div class="row px-4">
            <div class="col">
                <ul id="progressbar">
                    <li class="step0 active " id="step1">PLACED</li>
                    <li class="step0 active text-center" id="step2">SHIPPED</li>
                    <li class="step0 active text-center" id="step3">ORDER EN ROUTE</li>
                    <li class="step0  text-muted text-center" id="step4">DELIVERED</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@elseif ($data['checkout']->is_delivered == 3)
<div class="container-fluid my-5 d-sm-flex justify-content-center" >
    <div class="card px-2" style="width: 100%;">
        <div class="card-header bg-white">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <p class="text-muted"> Order # <span class="font-weight-bold text-primary">{{ $data['checkout']->tracking_id }}</span></p>

                        <p class="text-muted"> Place On <span class="font-weight-bold text-dark">{{ $data['checkout']->order_placed_date }}</span>
                        </p>


                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="media flex-column flex-sm-row">
                <div class="media-body ">
                    <h5 class="bold">{{ $data['checkout']->product->name }}</h5>
                    <p class="text-muted"> Qt: {{ $data['checkout']->quantity }} Pair</p>
                    <h4 class="mt-3 mb-4 bold"> <span class="mt-5">PKR,</span> {{ $data['checkout']->total_price + $data['checkout']->shipping_fees }} <span
                            class="small text-muted"> via ({{ $data['checkout']->payment_method }}) </span></h4>
                </div>
            </div>
        </div>
        <div class="row px-4">
            <div class="col">
                <ul id="progressbar">
                    <li class="step0 active " id="step1">PLACED</li>
                    <li class="step0 active text-center" id="step2">SHIPPED</li>
                    <li class="step0 active text-center" id="step3">ORDER EN ROUTE</li>
                    <li class="step0  active text-center" id="step4">DELIVERED</li>
                </ul>
            </div>
        </div>
    </div>
</div>

  @endif



@endsection
