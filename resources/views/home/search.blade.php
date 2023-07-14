<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<link rel="icon" href="images/ASTU.png" type="image/x-icon">
  @include('home.header')
  <style>
        body {
      background-image: url('{{ asset('images/nodata.png') }}');
      background-repeat: no-repeat;
      background-size: cover;
    }
    .content {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      text-align: center;
    }

    .no-data {
      color: red;
      font-size: 24px;
      animation: fadeIn 1s ease-in-out infinite alternate;
    }

    .search-info {
      color: green;
      font-size: 50px;
      animation: fadeIn 1s ease-in-out infinite alternate;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
      }
      100% {
        opacity: 1;
      }
    }
  </style>
</head>

<body>
  <!-- header start -->
  @include('home.navbar')
  <!-- header end -->

  <section class="home">
  
  </section>

  <section class="content">
    <h1 class="no-data">No Data</h1>
    <br/>
    <h2 class="search-info">Please search correctly</h2>
  </section>

  <script>
    // JavaScript code here
  </script>
</body>

</html>
