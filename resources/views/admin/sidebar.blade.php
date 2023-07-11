<div class="sidebar">
      <center>
      <img src="{{ asset('images/admin.png') }}" class="profile_image" alt="">

        <h4>{{Auth::user()->name }}</h4>
      </center>
      <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="/component"><i class="fas fa-cogs"></i><span>Components</span></a>
      <a href="/permission"><i class="fas fa-table"></i><span>permission</span></a>
      <a href="#"><i class="fas fa-th"></i><span>calender</span></a>
      <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
      <a href="{{ route('profile.show') }}"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
    </div>