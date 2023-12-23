<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>{{__('all_admin.admin')}}</title>
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
            <h1 class="mt-5">{{__('all_admin.Dashboard')}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">{{__('all_admin.securitylist')}}</li>
                </ol>
            </nav>
            <h1>{{__('all_admin.securitylist')}}</h1>
            <section class="content">
 
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{__('all_admin.UserID')}}</th>
                            <th>{{__('all_admin.Name')}}</th>
                            <th>{{__('all_admin.Email')}}</th>
                            <th>{{__('all_admin.Role')}}</th>
                            <th>{{__('all_admin.Phone')}}</th>
                            <th>{{__('all_admin.Address')}}</th>
                            <th>{{__('all_admin.Photo')}}</th>
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
                            {{__('all_admin.SecurityUser')}} 
                            @elseif($user->usertype == 1)
                            {{__('all_admin.admin')}} 
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
