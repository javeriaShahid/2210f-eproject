<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

                <div class="container" style="border: 1px solid rgb(158, 158, 158); width:600px; margin:auto; border-radius:5px ; height:400px; position:relative; top:60px; padding:10px;">

                    <div class="heading-text">
                        <h1 style="font-size:50px; text-align:center">Dazzle<b style="color:orangered">.</b></h1>
                    </div>
                    <div class="subject">
                        <h5 style="font-size: 30px; color:rgb(68, 67, 67); text-align:center ; position:relative; bottom:30px;">Verification Code</h5>
                    </div>
                    <div class="paragraph">
                        <p style="color:orangered; font-size:15px; font-family:arial; text-align:center ; position:relative ; bottom:60px;">Use this code to verify your Email : {{ $email_data['to'] }}  .</p>
                    </div>
                    <div class="verificationCode" style="border:2px dotted black ; border-radius:5px;">
                        <h3 style="text-align: center; ">{{ $verification_code }}</h3>
                    </div>
                    <div class="link-to-website" style="padding: 10px; font-family:arial ; text-align:center; margin-top:30px;">
                      <span>Find Best Cosmatics and Jewells for Your loved ones in </span>  <a href="{{ $routeforhome }}" style="color: black;"><b>Dazzle</b><b style="color:orangered">.</b></a>
                    </div>
                </div>



</body>

</html>
