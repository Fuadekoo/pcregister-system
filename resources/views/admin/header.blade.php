<header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3 style="color:red">{{__('headers.admin')}}<span>{{__('headers.page')}}</span></h3>
      </div>
      <div class="right_area">
      <form action="{{ route('logout') }}" method="POST">
         @csrf
        <button type="submit" class="logout_btn">{{__('headers.Logout')}}</button>
      </form>
        
      </div>
    </header>