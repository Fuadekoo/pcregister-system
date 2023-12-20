<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>admin</title>
    <link rel="icon" href="images/guard.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
        @include('admin.css');
        <style>
    /* Custom Registration Page Styles */
    body {
        background-color: #f7fafc;
        font-family: Arial, sans-serif;
    }

    .registration-container {
        max-width: 400px;
        margin: 0 auto;
        padding: 40px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .registration-title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .form-control {
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 10px;
        margin-bottom: 20px;
        width: 100%;
        color: #555;
    }

    .terms-label {
        font-size: 14px;
        margin-bottom: 20px;
        display: block;
        color: #666;
    }

    .terms-link {
        color: #666;
        text-decoration: underline;
        margin-left: 5px;
    }

    .login-link {
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
        display: block;
        text-align: right;
    }

    .submit-button {
        background-color: #ff5722;
        color: #fff;
        border: none;
        border-radius: 3px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
    }

    .submit-button:hover {
        background-color: #f44336;
    }
    </style>
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    @include('admin.header');
    <!--header area end-->
    <!--sidebar start-->
    @include('admin.sidebar');
    <!--sidebar end-->

    <div class="content">
    <a href="#" class="navbar-brand">
    <!-- <img src="{{ asset('images/astu.png') }}" alt="Logo" class="logo-img"> -->
  </a>
<div class="text-center">
    <div class="registration-container">
        <div class="registration-title">Register</div>

        <form method="POST" action="{{ route('users.create') }}">
            @csrf

            <div class="mb-3">
                <input id="id" class="form-control" type="text" name="security_id" :value="old('userid')" required autofocus autocomplete="name" placeholder="security_id" />
            </div>
            <div class="mb-3">
                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
            </div>

            <div class="mb-3">
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
            </div>

            <div class="mb-3">
                <input id="phone" class="form-control" type="number" name="phone" :value="old('phone')" required autocomplete="username" placeholder="Phone" />
            </div>

            <div class="mb-3">
                <input id="address" class="form-control" type="text" name="address" :value="old('address')" required autocomplete="username" placeholder="Address" />
            </div>

            <div class="mb-3">
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
            </div>

            <div class="mb-3">
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <label class="terms-label">
                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="terms-link">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="terms-link">'.__('Privacy Policy').'</a>',
                    ]) !!}
                </label>
            @endif

            <div class="mb-3 text-end">
                <a class="login-link" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button class="submit-button" type="submit">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
    </div>

  </body>
</html>


