<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">

<style>
    /* Custom Login Page Styles */
    body {
        background-color: #f7fafc;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        max-width: 400px;
        padding: 40px;
        background-color: #ffffff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .login-title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        color: #333333;
    }

    .form-control {
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 10px;
        margin-bottom: 20px;
        width: 100%;
    }

    .language{
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 18px;
        font-weight: bold;
        color: #E8E8E8;
    }

    .form-check {
        margin-bottom: 20px;
    }

    .form-check-label {
        font-size: 14px;
    }

    .forgot-password-link {
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
        display: block;
        text-align: right;
        text-decoration: none;
    }

    .submit-button {
        background-color: #4caf50;
        color: #ffffff;
        border: none;
        border-radius: 3px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
    }

    .submit-button:hover {
        background-color: #45a049;
    }

    .icon-lock,
    .icon-person {
        display: inline-block;
        width: 20px;
        height: 20px;
        background-repeat: no-repeat;
        background-position: center center;
        vertical-align: middle;
        margin-right: 10px;
    }
    /* .logo{
        background-image: url('{{ asset('images/guard.png') }}');
    } */

    .icon-lock {
    background-image: url('{{ asset('images/lock-solid.svg') }}');
}


    .icon-person {
        background-image: url('{{ asset('images/user-solid.svg') }}'); /* Replace with your person icon image path */
    }
</style>
<title>login</title>
<link rel="icon" href="images/guard.png" type="image/x-icon">
<link rel="stylesheet" href="path/to/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
<a href="#" class="navbar-brand">    
<li class="language">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        @foreach (Config::get('languages') as $lang => $language)
            @if ($lang != App::getLocale())
                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
            @endif
        @endforeach
        </div>
</li>
</li>
</div>
    <!-- <img src="{{ asset('images/astu.png') }}" alt="Logo" class="logo-img"> -->
</a>

<div class="login-container">
@if($errors->any())
        <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
        @endif
    <div style="color:green" class="logo">
        <h1>ASTU GET-PC MS</h1>
    </div>
    <div class="login-title">{{__('login.login')}}</div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3 input-group align-items-start border">

            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="{{__('login.email')}}" />
            <span class="input-group-text">
        <span class="icon-person" style="width: 20px; height: 20px;"></span>
    </span>
        </div>

        <div class="mb-3 input-group align-items-start border">

            <input id="password" class="form-control border-0" type="password" name="password" required autocomplete="current-password" placeholder="{{__('login.password')}}" />
            <span class="input-group-text">
        <span class="icon-lock" style="width: 20px; height: 20px;"></span>
    </span>
    </div>



   

        <button class="submit-button" type="submit">
        {{__('login.login')}}
        </button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
