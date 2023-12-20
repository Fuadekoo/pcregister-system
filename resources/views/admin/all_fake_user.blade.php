<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>admin</title>
    <link rel="icon" href="images/guard.png" type="image/x-icon">
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
            <h1 class="mt-5">Dashboard</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">security list</li>
                </ol>
            </nav>
            <h1>security list</h1>
            <section class="content">
 
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->security_id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                            @if($user->usertype == 0)
                                Security User
                            @elseif($user->usertype == 1)
                                Admin
                            @else
                                unautherised security
                            @endif

                            </td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                                @if(isset($user['photo']) && $user['photo'])
                                <img src="{{ asset($user->photo) }}" alt="Photo" style="width: 150px; height: 150px; border-radius: 80%; object-fit: cover;">
                                @else
                                No photo available
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
</body>
</html>
