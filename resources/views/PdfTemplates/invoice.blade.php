<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    ul li{
        list-style: none;
    }
</style>
<body>
    <div style="border: 1px solid rgba(0, 0, 0, 0.455); margin:auto; border-radius:5px; padding:20px ; width:400px; height:auto">

    <h1 style="text-align: center;">Dazzle<b style="color:orangered;">.</b></h1>
    <p style="text-align: center;position:relative; bottom:20px; font-size:15px;">This is your order Reciept From <b>Dazzle<b style="color:orangered;">.</b></b></p>

<div>
    <ul style="list-style: none;position:relative; right:30px">
        <li><span style="font-weight: bold;  position:relative; right:10px;">Invoice number:</span> #{{ $order->tracking_id }}</li>
        <li><span style="font-weight: bold; font-size:14px; position:relative; right:10px;">Date of Delivery:</span> <span>{{ $order->delivery_date  }}</span></li>

    </ul>
    <!-- float:left; position:relative ; bottom:90px  -->
    <ul style=" margin:10px; padding:0;" >
        <li><span style="font-weight: bold;position:relative; right:10px;"><u>Reciever's Details</u></span></li>
        <li style="color: orangered;">Name: <span style="color: black;">{{ $order->customer_name }}</span></li>
        <li style="color: orangered;">Email: <span style="color: black;">{{ $order->customer_email }}</span></li>
        <li  style="color: orangered;">Contact: <span style="color: black;">{{ $order->user->phone_code }}  {{ $order->user->contact_number }}</span></li>
        <li  style="color: orangered;">Address: <span style="color: black; font-size:13px;">{{ $order->address->addressline1 }}</span></li>
    </ul>
</div>
<!-- Table  -->
<table style="border: 1px solid; width:100%">
<tr style="width: 100%;">
<th style="background-color: black; color:white;font-weight: lighter;">Item description</th>
<th  style="background-color: black; color:white; font-weight: lighter;">Product Price(PKR)</th>
<th  style="background-color: black; color:white; font-weight: lighter;">Shipping Fees(PKR)</th>
<th  style="background-color: black; color:white; font-weight: lighter;">Quantity</th>
<th  style="background-color: black; color:white;font-weight: lighter;">Subtotal(PKR)</th>
</tr>
    <tr>
    <td style="background-color: rgb(228, 228, 228);">{{ $order->product->name }}</td>
    <td style="background-color: rgb(228, 228, 228);">PKR,{{ $order->total_price }}</td>
    <td style="background-color: rgb(228, 228, 228);" >PKR,{{ $order->shipping_fees }}</td>
    <td style="background-color: rgb(228, 228, 228);" >{{ $order->quantity }}</td>
    <td style="background-color: rgb(228, 228, 228);">PKR,{{ $order->total_price  * $order->quantity }}</td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td style="font-weight: bold; background-color:black; color:white; font-weight:lighter;">Total(PKR)</td>
        <td style="font-weight: bold;background-color:rgb(228, 228, 228)">PKR,{{ $order->total_price  * $order->quantity + $order->shipping_fees }}</td>
    </tr>
</table>
<div style="width: 100%; height:2px; margin-top:20px; background-color: rgba(0, 0, 0, 0.519);"></div>
<!-- Table end  -->

<div>
    <ul style="position: relative;right:40px;">
        <li  style="background-color: black; color:white; padding:10px; width:100%"><b>Payment Method:</b></li>
        <li style="position: relative;background-color:rgb(228, 228, 228); width:100%;  padding:10px">{{ $order->payment_method }}</li>

    </ul>
<p style="font-style: italic; text-align:center"> Note: Please send a remmittance advice by email to dazzle@gmail.com</p>
</div>
</div>


</body>
</html>
