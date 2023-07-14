<!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('home/css/security.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <title>qrcode generation</title>
 </head>
 <body style="text-align:center;">
  
 @include('home.navbar')
<div style="height:150px;"></div>
 <h1>QrCOde download page</h1>



   


<!-- //down -->

@if(isset($user) && is_object($user))
{{$user->username}}:
    <a href="{{ route('downloadBarCode', ['username' => $user->username]) }}" download>
        <img src="{{ asset('barcode/'.$user->username.'.png') }}" alt="Barcode">
    </a>
    <a href="{{ route('downloadQRCode', ['username' => $user->username]) }}" download>
        <img src="{{ asset('qrcode/'.$user->username.'.png') }}" alt="qrcode">
    </a>
@endif


    <br><br>




<div style="height:200px"></div>
<br>
    <hr>
@include('home.footer')
 </body>
 </html>