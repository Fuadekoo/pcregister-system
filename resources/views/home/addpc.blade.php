
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="{{ asset('home/css/security.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f9f9f9;
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  margin-bottom: 30px;
  color: #333;
}

form {
  display: grid;
  grid-template-columns: 1fr;
  gap: 20px;
}

label {
  font-weight: bold;
}

input[type="text"],
select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.error {
  color: #ff6347;
}

.text-center {
  text-align: center;
}

/* button[type="submit"] {
  padding: 10px 20px;
  background-color: #3f51b5;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
} */

button[type="submit"]:hover {
  background-color: #303f9f;
}

/* Header and Footer Styles */

header,
footer {
  /* background-color: #303f9f; */
  /* color: #fff; */
  /* padding: 20px; */
}

header a,
footer a {
  /* color: #fff; */
  /* text-decoration: none; */
}

/* Media Query for Responsiveness */

@media (max-width: 768px) {
  .container {
    max-width: 100%;
    padding: 10px;
    border-radius: 0;
    box-shadow: none;
  }
}
  </style>  
</head>

<body>
    <!-- header start -->
    @include('home.navbar')
    <!-- header end -->
    <div style="height:150px;"></div>
    <div class="container">
        @include('sweetalert::alert')
        <h1>PC Register Page</h1>

        <form method="POST" action="{{ route('pcregisters.store') }}" enctype="multipart/form-data">
            @csrf

            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" id="user_id">
            <br/>
            @error('user_id')
            <span class="error">{{ $message }}</span>
            @enderror

            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
            @error('username')
            <span class="error">{{ $message }}</span>
            @enderror

            <label for="description">Description:</label>
            <select name="description" id="description">
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
                <option value="other">Other</option>
            </select>
            @error('description')
            <span class="error">{{ $message }}</span>
            @enderror


            <label for="pc_name">PC Name:</label>
            <input type="text" name="pc_name" id="pc_name">
            @error('pc_name')
            <span class="error">{{ $message }}</span>
            @enderror

            <label for="serial_number">Serial Number:</label>
            <input type="text" name="serial_number" id="serial_number">
            @error('serial_number')
            <span class="error">{{ $message }}</span>
            @enderror

            <label for="photo">Photo:</label>
            <div class="row">
                <div class="col-md-6">
                    <div id="my_camera"></div>
                    <br />
                    <input type=button value="Take Snapshot" onClick="take_snapshot()">
                    <input type="hidden" name="photo" class="image-tag" id="photo">
                </div>
                <div class="col-md-6">
                    <div id="results"></div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit">Save</button>
            </div>
        </form>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script>
        Webcam.set({
            width: 490,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>
    <br>
    <hr>
@include('home.footer')
</body>

</html>