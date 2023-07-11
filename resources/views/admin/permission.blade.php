<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
        @include('admin.css');
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
    <div class="container-fluid px-4">
    <h1 class="mt-4">Grant permission for User</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Grant permission for User</li>
        </ol>
    </nav>
    <h2>Grant permission for User</h2>
    <form action="{{ route('admin.update') }}" method="POST">
        @csrf
        <label for="user">Select User:</label>
        <select name="user_id" id="user" onchange="updateUserType(this)">
            @foreach ($users as $user)
                <option value="{{ $user->id }}" data-usertype="{{ $user->usertype }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="usertype">User Type:</label>
        <select name="usertype" id="usertype">
                <option value="0">user</option>
                <option value="1">admin</option>
                <option value="2">unautherised user</option>
            </select>
        <br><br>
        <button type="submit">Update</button>
    </form>
</div>

<script>
   

    function showUpdateContainer() {
    var updateContainer = document.querySelector('.update-container');
    var container = document.querySelector('.container');
    var updateMessage = document.querySelector('.update-message');
    
    updateContainer.style.display = 'block';
    container.style.display = 'none';
    updateMessage.innerHTML = ''; // Clear the previous message
}

    function updateUserType(selectElement) {
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var userTypeInput = document.getElementById('usertype');
        userTypeInput.value = selectedOption.getAttribute('data-usertype');
    }
</script>



<div class="container">
    <div class="update-message">
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
    </div>

    <button onclick="showUpdateContainer()">Give Permission</button>
</div>



    </div>
  </body>
</html>