<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Add your custom CSS files if needed -->
    <link rel="stylesheet" href="path/to/your/custom.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="style.css">
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
    <h1 class="mt-5">Dashboard</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-5">
            <li class="breadcrumb-item active">all security register</li>
        </ol>
    </nav>
    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data" class="my-4">
    @csrf
    <div class="input-group">
        <input type="file" name="users" id="users" required class="form-control">
        <button type="submit" class="btn btn-primary">Import</button>
    </div>
</form>
<div>
  <h1>import excel file is must be 6 colomns</h1>
  <p>must be writen in this form</p>
  <ul>
    <li>security_id</li>
    <li>name</li>
    <li>emails</li>
    <li>phone</li>
    <li>adreess</li>
    <li>password</li>
  </ul>
  <p>only the above form is include in excel files</p>
</div>
</div>

    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Add your custom JS files if needed -->
    <script src="path/to/your/custom.js"></script>
  </body>
</html>
