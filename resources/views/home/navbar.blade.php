<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
<style>
/* CSS Styles for Header */

header {
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.navbar-brand {
  display: flex;
  align-items: center;
}

.logo-img {
  width: 50px;
  height: 50px;
  object-fit: cover;
}

.navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

.navbar-nav {
  margin-left: auto;
}

.nav-item {
  margin-left: 15px;
}

.nav-link {
  color: #333;
  font-weight: bold;
  transition: color 0.3s;
}

.nav-link:hover {
  color: #555;
}

.alert-danger {
  background-color: #f8d7da;
  color: #721c24;
  border-color: #f5c6cb;
  margin-top: 8px;
  padding: 5px;
  border-radius: 4px;
}
button[type="submit"]:hover {
  background-color: #303f9f;
}
/* Media Query for Responsiveness */

@media (max-width: 576px) {
  .nav-item {
    margin-left: 0;
    margin-bottom: 10px;
  }
}

</style>

<header>
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
    <img src="{{ asset('images/ASTU.jpg') }}" alt="Logo" class="logo-img">
      <!-- <img src="{{ asset('images/guard.png') }}" alt="Logo" class="logo-img"> -->
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/redirect') }}">{{__('navbar.home')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/pcregisters/addpc') }}">{{__('navbar.add')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/download-code">{{__('navbar.download')}}</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/pcregisters') }}">{{__('navbar.task')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('profile.show') }}">{{__('navbar.profile')}}</a>
          
          <li class="nav-item dropdown">

   
</li>
        </li>
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link nav-link">{{__('navbar.logout')}}</button>
          </form>
        </li>
        <li class="nav-item">
          <form action="{{ route('pcregisters.searchUser') }}" method="post" id ="barcodeForm" class="form-inline">
            @csrf
            <div class="input-group">
              <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror"
                name="user_id" value="{{ old('user_id') }}" required autofocus placeholder="scan using barcode reader">
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
          <script>
                // Automatically submit the form when a barcode is scanned
                document.getElementById('user_id').addEventListener('input', function(event) {
                    document.getElementById('barcodeForm').submit();
                });
            </script>
          @if (session('message'))
          <div class="alert alert-danger mt-2">
            {{ session('message') }}
          </div>
          @endif
        </li>
      </ul>
    </div>
  </nav>

  <div class="scroll-indicator-container">
    <div class="scroll-indicator-bar"></div>
  </div>
</header>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
