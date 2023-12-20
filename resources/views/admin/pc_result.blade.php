<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>admin</title>
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
    <h1 class="mt-4">Dashboard</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
    <section class="content">
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Description</th>
                        <th>PC Name</th>
                        <th>Serial Number</th>
                        <th>Register_BY</th>
                        <th>Photo</th>
                       
                        
                    </tr>
                </thead>
                <tbody>
            
                    <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->description }}</td>
                        <td>{{ $user->pc_name }}</td>
                        <td>{{ $user->serial_number }}</td>
                        <td>{{$user->Register_BY}}</td>
                        <td>
                        @if(isset($user['photo']) && $user['photo'])
                        <img src="{{ asset($user->photo) }}" alt="Photo" style="width: 150px; height: 150px; border-radius: 80%; object-fit: cover;">
                        @else
                        No photo available
                        @endif
                        </td>
                                                            

                    </tr>
                    
                </tbody>
            </table>
        </section>
    </div>
</div>

    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Add your custom JS files if needed -->
    <script src="path/to/your/custom.js"></script>
  </body>
</html>




