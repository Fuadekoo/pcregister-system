<div class="sidebar">
      <center>
      <img src="{{ asset('images/admin.png') }}" class="profile_image" alt="">

        <h4>{{Auth::user()->name }}</h4>
      </center>
      <a href="/redirect"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="/allregister"><i class="fas fa-users"></i><span>Upload users</span></a>
      <a href="/register"><i class="fas fa-user-plus"></i><span>user registeration</span></a>
      <a href="/permission"><i class="fas fa-key"></i><span>permission</span></a>
      <!-- <a href="/dev"><i class="fas fa-code"></i><span>developer</span></a> -->

      <a href="{{ route('profile.show') }}"><i class="fas fa-cog"></i><span>Settings</span></a>
    </div>