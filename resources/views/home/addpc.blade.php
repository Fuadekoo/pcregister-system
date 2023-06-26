<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>security</title>
  <link rel="stylesheet" href="{{ asset('home/css/security.css') }}">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<style>
     #results { padding:20px; border:1px solid; background:#ccc; }
    /* Apply some basic styles to form elements */
form {
  max-width: 400px;
  margin: 0 auto;
}

label {
  display: block;
  margin-bottom: 8px;
  color: #333; /* Set label text color */
}

input[type="text"],
textarea {
  width: 100%;
  padding: 8px;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="file"] {
  margin-bottom: 16px;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
}

/* Style form labels */
label {
  font-weight: bold;
  color: #555; /* Set label color */
}

/* Add some spacing between form elements */
form > * {
  margin-bottom: 16px;
}

</style>
</head>
<body>
<!-- header start -->
@include('home.navbar')
  <!-- header end -->
<!-- BODY START -->
@include('sweetalert::alert')

  <section class="home">
    <h1>pc register page</h1>
  </section>

  <section class="content">
  <form method="POST" action="{{ route('pcregisters.store') }}" enctype="multipart/form-data">
    @csrf
    <label for="user_id">User ID:</label>
    <input type="text" name="user_id" id="user_id">
    @error('user_id')
            <span class="error" style="color: red;">{{ $message }}</span>
        @enderror
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    @error('username')
            <span class="error" style="color: red;">{{ $message }}</span>
        @enderror
    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea>
    @error('description')
            <span class="error" style="color: red;">{{ $message }}</span>
        @enderror
    <label for="pc_name">PC Name:</label>
    <input type="text" name="pc_name" id="pc_name">
    @error('pc_name')
            <span class="error" style="color: red;">{{ $message }}</span>
        @enderror
    <label for="serial_number">Serial Number:</label>
    <input type="text" name="serial_number" id="serial_number">
    @error('serial_number')
            <span class="error" style="color: red;">{{ $message }}</span>
        @enderror
    <label for="photo">Photo:</label>
    <!-- <input type="file" name="photo" id="photo"> -->
    <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="photo" class="image-tag" id="photo">
            </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-center">
    <button type="submit">Save</button>
</form>
  </section>
<!-- BODY END -->
  <script>
    //access camera 
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    
    Webcam.attach( '#my_camera' );
    
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
    //Javacript for the scroll indicator bar
    window.addEventListener("scroll", () => {
      const indicatorBar = document.querySelector(".scroll-indicator-bar");

      const pageScroll = document.body.scrollTop || document.documentElement.scrollTop;
      const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      const scrollValue = (pageScroll / height) * 100;

      indicatorBar.style.width = scrollValue + "%";
    });

    //Responsive navigation menu toggle
    const menuBtn = document.querySelector(".nav-menu-btn");
    const closeBtn = document.querySelector(".nav-close-btn");
    const navigation = document.querySelector(".navigation");

    menuBtn.addEventListener("click", () => {
      navigation.classList.add("active");
    });

    closeBtn.addEventListener("click", () => {
      navigation.classList.remove("active");
    });
  </script>

</body>
</html>