<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="keywords"
    content="Medick Responsive web template, Bootstrap Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <title>Panti Asuhan Hidayatul Muslimin 1</title>
  <link href="//fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css/style-starter.css') }}">
  <link rel="shortcut icon" type="image/x-icon" href="" />
  <!-- Tambahkan ini ke bagian <head> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <div class="header-w3l">
    <!--header-->

    <header id="site-header" class="header-w3l fixed-top">
      <div class="container">
        <nav class="navbar navbar-expand-lg stroke">
          <a class="navbar-brand" href="">
            {{-- di sini akan di tambahkan untuk link dan juga logo appnya --}}
            panti asuhan
          </a>
          <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
            data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
            <span class="navbar-toggler-icon fa icon-close fa-times"></span>
            </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mx-lg-auto">

              <li class="nav-item ">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="/about">About</a>
              </li>

              <li class="nav-item  ">
                <a class="nav-link" href="/donasi">Donasi</a>
              </li>


              <li class="nav-item">
                <a href="/program" class="nav-link">Program</a>
              </li>

              <li class="nav-item  ">
                <a class="nav-link" href="/berita">Berita</a>
              </li>
              <li class="nav-item">
                <a href="/galery" class="nav-link">galery</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="/kontak">Contact</a>
              </li>

            </ul>

          </div>
          <!-- toggle switch for light and dark theme -->
          <div class="mobile-position gap-5">
            <nav class="navigation">
              <div class="theme-switch-wrapper">
                <label class="theme-switch" for="checkbox">
                  <input type="checkbox" id="checkbox">
                  <div class="mode-container">
                    <i class="gg-sun"></i>
                    <i class="gg-moon"></i>
                  </div>
                </label>
              </div>
            </nav>
          </div>
          <!-- //toggle switch for light and dark theme -->
        </nav>
      </div>
    </header>
  </div>
  <!-- //header -->


  {{-- bagian dari conten kita --}}
  {{ $slot }}


  <section class="w3l-footer-29-main">
    <div class="footer-29 py-5">
      <div class="container py-lg-4">
        <div class="row footer-top-29">
          {{-- masukan info seperti email dan no telpon panti --}}
          @php
      use App\Models\Contact;
      $info = Contact::first();
      @endphp
          @if ($info)


        <div class="col-lg-6 col-md-6 col-sm-7 footer-list-29 footer-1 pr-lg-5">
        <div class="footer-logo mb-3">
          <a class="navbar-brand" href="/"><img src="{{  asset('storage/' . $info->image) }}"
            alt="panti asuhan">&nbsp;Panti
          Asuhan </a>
        </div>
        <p>{{ $info->alamat }}</p>

        </div>

        <div class="col-lg-2 col-md-6 col-sm-5 col-6 footer-list-29 footer-2 mt-sm-0 mt-5">

        <ul>
          <h6 class="footer-title-29">Content</h6>
          <li><a href="/">Home</a></li>
          <li><a href="/program">Program</a></li>
          <li><a href="/berita">Berita</a></li>
          <li><a href="/">Layanan</a></li>
          <li><a href="/donasi">Donasi</a></li>
          <li><a href="/about">Tentang Kami</a></li>
          <li><a href="/contact">Contact</a></li>
        </ul>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-7 footer-list-29 footer-4 mt-lg-0 mt-5">
        <ul class="mt-3">
          <li><a href="tel:{{ $info->telpon }}"><span class="fa fa-phone"></span>{{ $info->telpon }}</a></li>
          <li><a href="mailto:{{ $info->email }}" class="mail"><span class="fa fa-envelope-open-o"></span>
            {{ $info->email }}</a></li>
        </ul>
        </div>
      @endif
        </div>
      </div>
    </div>
  </section>
  <!-- //footer -->

  <!-- copyright -->
  <section class="w3l-copyright">
    <div class="container">
      <div class="row bottom-copies">
        <p class="col-lg-8 copy-footer-29">© 2025 Panti asuhan. All rights reserved. Design by
          <a href="http://wildan.enricko.com/" target="_blank">
            Wildan
          </a>
        </p>

        @php
      use App\Models\Media;
      $media = Media::all();
    @endphp
        <div class="col-lg-4 main-social-footer-29">
          @foreach ($media as $row)
        <a href="{{ $row->link }}" class="{{ $row->title }}">
        {{-- membut icon_class untuk di tampilkan di bawah ini agar tidak error --}}
        <span class="fa fa-{{ $row->title }}"></span>
        </a>
      @endforeach
        </div>

      </div>
    </div>

    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
      &#10548;
    </button>
    <script>
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function () {
        scrollFunction()
      };

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("movetop").style.display = "block";
        } else {
          document.getElementById("movetop").style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
    <!-- /move top -->
  </section>
  <!-- //copyright -->
  <!--//footer-->

  <!-- Template JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#m_pembayaran').on('change', function () {
        var selectedRekening = $(this).find(':selected').data('rekening');
        $('.rekening-bayar').val(selectedRekening);
      });
    });
  </script>

  <script src="{{ asset('js/theme-change.js') }}"></script>
  <!-- owl carousel -->
  <script src="{{ asset('js/owl.carousel.js') }}"></script>
  <!-- script for tesimonials carousel slider -->
  <script>
    $(document).ready(function () {
      $("#owl-demo2").owlCarousel({
        loop: true,
        nav: false,
        margin: 50,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          736: {
            items: 1,
            nav: false
          },
          991: {
            items: 2,
            margin: 30,
            nav: false
          },
          1080: {
            items: 3,
            nav: false
          }
        }
      })
    })
  </script>
  <!-- //script for tesimonials carousel slider -->
  <!-- stats number counter-->

  <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/jquery.countup.js') }}"></script>
  <script>
    $('.counter').countUp();
  </script>
  <!-- //stats number counter -->
  <!-- disable body scroll which navbar is in active -->
  <script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
  </script>
  <!-- disable body scroll which navbar is in active -->

  <!--/MENU-JS-->
  <script>
    $(window).on("scroll", function () {
      var scroll = $(window).scrollTop();

      if (scroll >= 80) {
        $("#site-header").addClass("nav-fixed");
      } else {
        $("#site-header").removeClass("nav-fixed");
      }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
      $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
      $(window).on("resize", function () {
        if ($(window).width() > 991) {
          $("header").removeClass("active");
        }
      });
    });
  </script>
  <!--//MENU-JS-->
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


  {{--
  <script src=""></script> --}}


</body>

</html>