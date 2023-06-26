<header>
    <div class="nav-bar">
      <a href="" class="logo">Logo</a>
      <div class="navigation">
        <div class="nav-items">
          <i class="uil uil-times nav-close-btn"></i>
          <a href="#"><i class="uil uil-home"></i> Home</a>
          <a href="{{url('/pcregisters/addpc')}}"><i class="uil uil-home"></i> register pc</a>
          <a href="#"><i class="uil uil-home"></i> scan by QR</a>
          <a href="#"><i class="uil uil-compass"></i> scan by barcode</a>
          <a href="{{url('/pcregisters/search')}}"><i class="uil uil-compass"></i> scan by pcID</a>
          <a href="{{url('/pcregisters')}}"><i class="uil uil-info-circle"></i>update pc info</a>
          <a href="{{ route('profile.show') }}"><i class="uil uil-document-layout-left"></i> profile</a>
          <a href="#"><i class="uil uil-envelope"></i> logout</a>
          <form action="{{ route('logout') }}" method="POST">
         @csrf
        <button type="submit" class="logout_btn">Logout</button>
      </form>
          
        </div>
      </div>
      <i class="uil uil-apps nav-menu-btn"></i>
    </div>
    <div class="scroll-indicator-container">
      <div class="scroll-indicator-bar"></div>
    </div>
  </header>