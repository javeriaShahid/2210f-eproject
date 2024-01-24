<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

                <div class="container" style="border: 1px solid rgb(158, 158, 158); width:600px; margin:auto; border-radius:5px ; height:450px; position:relative; top:60px; padding:10px;">

                    <div class="heading-text">
                        <h1 style="font-size:50px; text-align:center">Dazzle<b style="color:orangered">.</b></h1>
                    </div>
                    <div class="subject">
                        <h5 style="font-size: 30px; color:rgb(68, 67, 67); text-align:center ; position:relative; bottom:30px;">Admin Credientals</h5>
                    </div>
                    <div class="paragraph">
                        <p style="color:orangered; font-size:15px; font-family:arial; text-align:center ; position:relative ; bottom:30px;">Thank you for choosing Dazzle! Please Confirm Your account By Clicking the Link Below and also use this Password To access your Admin Dashboard in Dazzle!</p>
                         <center><span style="border:2px dotted black; padding:10px">{{$password}}</span></center><br><br>
                        <center>  <a href="{{ $route }}" style="text-align: center; padding:10px; background:orangered;color:white; text-decoration:none; font-family:arial; border:2px solid orangered; border-radius:5px; ">Confirm Verification</a></center>
                    </div>

                    <div class="link-to-website" style="padding: 10px; font-family:arial ; text-align:center; margin-top:30px;">
                      <span>Find Best Cosmatics and Jewells for Your loved ones in </span>  <a href="{{ $routeForHome }}" style="color: black;"><b>Dazzle</b><b style="color:orangered">.</b></a>
                    </div>
                </div>



</body>

</html>
