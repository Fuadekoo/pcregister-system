<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
@include('home.header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<!-- header start -->
@include('home.navbar')
  <!-- header end -->

  <section class="home">
    <h1>pc info</h1>

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
            <th>barcode</th>
            <th>Photo</th>
            <th>DELETE</th>
            <th>EDIT</th>
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
            <td>{!! DNS2D::getBarcodeHTML('$pcregister->barcode', 'QRCODE',2,10) !!}</td>
            
            <td>
                @if($pcregister->photo)
                
                <img src="{{ url('storage/uploads/'.$pcregister->photo) }}" alt="Photo">
                @else
                No photo available
                @endif
            </td>
           
            <td><a  onClick = "confirmation(event)" href="{{ url('delete/' . $pcregister['id']) }}"  class="btn btn-danger">Delete</a></td>

            <td><a  href="{{ url('edit/' . $pcregister['id']) }}"  class="btn btn-primary">edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

   </section>

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

</body>
</html>
