<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<link rel="icon" href="images/guard.png" type="image/x-icon">
    @include('home.header')
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

        .delete-button {
            background-color: #FF0000;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            color: #FFFFFF;
        }

        .edit-button {
            background-color: #FFFF00;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            color: #000000;
        }

        .add-button {
            background-color: #00FF00;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            color: #FFFFFF;
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
            <h1>{{__('showpc.ASTUPCUsers')}}</h1>
        </section>
        @include('sweetalert::alert')
        <section class="content">
            <form action="{{ route('pcregisters.searchUpdate') }}" method="post" class="form-inline">
                @csrf
                <div class="input-group">
                <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror"
                    name="user_id" value="{{ old('user_id') }}" required autofocus placeholder="Search by user id">
                @error('user_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <button type="submit" class="btn btn-primary ml-2">
                    <i class="fas fa-search"></i>
                </button>
               </div>

</form>
            <table>
                <thead>
                    <tr>
                        <th>{{__('showpc.UserID')}}</th>
                        <th>{{__('showpc.Username')}}</th>
                        <th>{{__('showpc.Description')}}</th>
                        <th>{{__('showpc.PCName')}}</th>
                        <th>{{__('showpc.SerialNumber')}}</th>
                        <th>{{__('showpc.Photo')}}</th>
                        <th>{{__('showpc.Edit')}}</th>
                        <th>{{__('showpc.Delete')}}</th>
                       
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
                        <img src="{{asset($pcregister->photo) }}" alt="Photo" style="width: 150px; height: 120px;">


                        </td>
                        <td>
                            <a href="{{ url('edit/' . $pcregister['id']) }}"
                                class="btn btn-primary edit-button">Edit</a>
                        </td>
                        <td>
                            <a onClick="confirmation(event)" href="{{ url('delete/' . $pcregister['id']) }}"
                                class="btn btn-danger delete-button">Delete</a>
                        </td>
                      
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <script>

    //swiitalert script code
    function confirmation(ev){
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');
      console.log(urlToRedirect);
      swal({
        title:"are you sure to delete this registerpc",
        text:"you will not be able to revert this! automatically delete this data from database",
        icon:"warning",
        buttons:true,
        dangerMode:true,
      })
      .then((willCancel)=>{
        if(willCancel){
          window.location.href=urlToRedirect;

        }
      });
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



    <div style="height:200px;"></div>
    <br>
    <hr>
    @include('home.footer')
</body>

</html>
