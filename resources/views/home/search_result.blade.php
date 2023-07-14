<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('home.header')
    <link rel="icon" href="images/ASTU.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        

        .home {
            text-align: center;
            margin-bottom: 30px;
        }

        .content {
            overflow-x: auto;
        }

        @media (max-width: 767px) {
            table {
                font-size: 14px;
            }
        }

    </style>
</head>

<body>
    @include('home.navbar')
    <div style="height:150px;"></div>
    <div class="container">
        <section class="home">
            <h1>ASTUPC Users Detail</h1>
        </section>
        @include('sweetalert::alert')
        <section class="content">
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Description</th>
                        <th>PC Name</th>
                        <th>Serial Number</th>
                        
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
                        <td>
            

                        @if(isset($user['photo']) && $user['photo'])
                        <img src="{{ asset($user->photo) }}" alt="Photo" style="width: 150px; height: 150px; border-radius: 80%; object-fit: cover;">

                    @else
                        No photo available
                    @endif

                                                            
                        
                    </tr>
                    
                </tbody>
            </table>
        </section>
    </div>

    
    <br>
    <hr>
    @include('home.footer')
</body>

</html>