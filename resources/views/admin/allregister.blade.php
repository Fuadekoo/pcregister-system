<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>{{__('all_admin.admin')}}</title>
    <link rel="icon" href="images/guard.png" type="image/x-icon">
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
    <h1 class="mt-5">{{__('all_admin.Dashboard')}}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-5">
            <li class="breadcrumb-item active">{{__('all_admin.allsecurityregister')}}</li>
        </ol>
    </nav>
    
    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data" class="my-4">
    @csrf
    <div class="input-group">
        <input type="file" name="users" id="users" required class="form-control" required accept=".xlsx, .xls">
        <button type="submit" class="btn btn-primary">{{__('all_admin.Import')}}</button>
    </div>
</form>
@error('users')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
@enderror
<div>
  <h1>{{__('all_admin.h1note')}}</h1>
  <p>{{__('all_admin.must')}}</p>
  <ul>
  <li>{{__('all_admin.security_id')}}</li>
      <li>{{__('all_admin.Name')}}</li>
      <li>{{__('all_admin.Email')}}</li>
      <li>{{__('all_admin.address')}}</li>
      <li>{{__('all_admin.Phone')}}</li>
      <li>{{__('all_admin.password')}}</li>
  </ul>
  <p>{{__('all_admin.only')}}</p>
</div>
</div>

    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Add your custom JS files if needed -->
    <script src="path/to/your/custom.js"></script>
  </body>
</html>
