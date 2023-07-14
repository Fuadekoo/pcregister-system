<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>admin</title>
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}"> -->
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
                    <li class="breadcrumb-item active">pclist</li>
                </ol>
            </nav>

            <div class="mb-3">
                <form action="{{ route('/search_pc_user') }}" method="post" class="form-inline">
                    @csrf
                    <div class="input-group">
                        <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror"
                            name="user_id" value="{{ old('user_id') }}" required autofocus>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="mb-3">
                <h1>pclist</h1>
            </div>
            @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
            <section class="content">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Username</th>
                                <th>Description</th>
                                <th>PC Name</th>
                                <th>Serial Number</th>
                                <th>Photo</th>
                                <th>Register By</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pcregisters as $pcregister)
                            <tr>
                                <td>{{ $pcregister->user_id }}</td>
                                <td>{{ $pcregister->username }}</td>
                                <td>{{ $pcregister->description }}</td>
                                <td>{{ $pcregister->pc_name }}</td>
                                <td>{{ $pcregister->serial_number }}</td>
                                <td>
                                    <img src="{{ asset($pcregister->photo) }}" alt="Photo" style="width: 150px; height: 120px;">
                                </td>
                                <td>{{$pcregister->Register_BY}}</td>
                                <td>
                                    <button type="button" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
</body>
</html>
