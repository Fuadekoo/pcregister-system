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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('images/ASTU.jpg') }}" alt="Logo" class="logo-img">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/redirect') }}">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/pcregisters/addpc') }}">ADD</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/alldownload">QRCODE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/pcregisters') }}">UPDATE INFO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('profile.show') }}">PROFILE</a>
        </li>
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link nav-link">LOGOUT</button>
          </form>
        </li>
        <li class="nav-item">
          <form action="{{ route('pcregisters.searchUser') }}" method="post" class="form-inline">
            @csrf
            <div class="input-group">
              <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror"
                name="user_id" value="{{ old('user_id') }}" required autofocus>
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
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
