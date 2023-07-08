<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
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
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta a veniam ad necessitatibus voluptatem ducimus, aperiam eveniet cum sint accusantium pariatur dolorum et deserunt sit? Quasi quia iure eligendi minus, inventore vitae dolor qui nemo, ad cumque velit? Asperiores ipsam, nulla eaque voluptas autem ratione veniam error a maiores, sunt libero veritatis neque cumque ab delectus optio amet nemo numquam molestias, saepe labore natus! Dicta perferendis eius necessitatibus. Incidunt veniam tempora hic molestias soluta reprehenderit quisquam laborum earum amet vel ad quo inventore deserunt possimus at ipsa odio repudiandae eligendi deleniti dicta, commodi ipsum culpa ex suscipit! Laborum, mollitia placeat.</p>
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