<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search user by user ID</title>
    <link rel="icon" href="images/ASTU.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('home/css/security.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            text-align:center;
        }

        h1 {
            font-size: 24px;
            margin-top: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 30%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .error {
            color: red;
        }
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

        <label for="user_id">User Id:</label>
        <input type="text" name="user_id" id="user_id" value="{{ $pcregister->user_id }}" readonly>
        

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="{{ $pcregister->username }}">
        

        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $pcregister->description }}</textarea>
        

        <label for="pc_name">PC Name:</label>
        <input type="text" name="pc_name" id="pc_name" value="{{ $pcregister['pc_name'] }}">

        <label for="serial_number">Serial Number:</label>
        <input type="text" name="serial_number" id="serial_number" value="{{ $pcregister['serial_number'] }}">

        <label for="photo">Photo:</label>
        <input type="file" name="photo" id="photo" value="{{ $pcregister['photo'] }}">

        <button type="submit">Update</button>
    </form>
    <br>
    <hr>
    @include('home.footer')
</body>

</html>