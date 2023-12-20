<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search user by user ID</title>
    <link rel="icon" href="/images/guard.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('home/css/security.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style>
        
    </style>
</head>

<body>
    @include('home.navbar')

    <div style="height: 150px;"></div>
    <h1>Update PC Register</h1>
    @include('sweetalert::alert')

    <form method="POST" action="/edit" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $pcregister['id'] }}">

    <div class="form-group">
        <label for="user_id">User Id:</label>
        <input type="text" class="form-control" name="user_id" id="user_id" value="{{ $pcregister->user_id }}" readonly>
    </div>

    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" value="{{ $pcregister->username }}">
    </div>

    <div class="form-group">
    <label for="description">Description:</label>
            <select name="description"  class="form-control" id="description" value="{{ $pcregister->description }}">
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
                <option value="other">Other</option>
            </select>


        <!-- <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description">{{ $pcregister->description }}</textarea> -->
    </div>

    <div class="form-group">
        <label for="pc_name">PC Name:</label>
        <input type="text" class="form-control" name="pc_name" id="pc_name" value="{{ $pcregister['pc_name'] }}">
    </div>

    <div class="form-group">
        <label for="serial_number">Serial Number:</label>
        <input type="text" class="form-control" name="serial_number" id="serial_number" value="{{ $pcregister['serial_number'] }}">
    </div>

    <!-- <div class="form-group">
        <label for="photo">Photo:</label>
        <input type="file" class="form-control-file" name="photo" id="photo">
    </div> -->

    <button type="submit" class="btn btn-primary">Update</button>
</form>
    <br>
    <hr>
    @include('home.footer')

    <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
</body>

</html>