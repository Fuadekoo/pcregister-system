<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>admin</title>
    <link rel="icon" href="images/guard.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
          .page-container {
      max-width: 800px;
      margin: 150px auto;
      padding: 40px;
    }

    .card-left,
    .card-right {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 80px;
    }
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
    <div class="container page-container">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-left" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Fuad Abdurahman</h5>
            <p class="card-text">im a software engineer .i develop mobile application and website in beutifull </p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">laravel developer</li>
            <li class="list-group-item">mobile app developer</li>
            <li class="list-group-item"></li>
          </ul>
          <div class="card-body">
            <a href="#" class="card-link">my facebook address</a>
            <a href="#" class="card-link">0910737199</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-right" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">beza kebede</h5>
            <p class="card-text">im a software engineer .i develop mobile application and website in beutifull </p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">flutter developer</li>
            <li class="list-group-item">python developer</li>
            <li class="list-group-item"></li>
          </ul>
          <div class="card-body">
            <a href="#" class="card-link">facebook link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>

  </body>
</html>