<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<link rel="icon" href="images/guard.png" type="image/x-icon">
@include('home.header')
</head>
<body>
<!-- header start -->
@include('home.navbar')
  <!-- header end -->

  <section class="home">
    <h1>ASTU</h1>
  </section>

  <section class="content">
    <p>Adama science and Technology University.</p>
   </section>

  <script>
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