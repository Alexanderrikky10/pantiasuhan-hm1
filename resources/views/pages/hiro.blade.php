<x-layout>
    <!--/w3l-banner-content-->
<div class="banner-w3l-main">
    <div class="w3l-banner-content">
      <div class="container">
        <div class="bannerhny-info text-center">
          <h6 class="title-subhny mb-2"></h6>
          <h3 class="">Berani berbuat baik</h3>
          <a class="btn btn-style btn-white mt-sm-5 mt-4" href="">
            Read More</a>
        </div>
      </div>
    </div>
  </div>
  <!--//w3l-banner-content-->
  
  <!-- banner bottom shape -->
  <div class="position-relative">
    <div class="shape overflow-hidden">
      <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
      </svg>
    </div>
  </div>
  <!-- banner bottom shape -->
  
  <!--/w3l-content-1-->
<div class="w3l-content-1 py-5">
  <div class="container py-lg-5 py-md-4 py-2">
    @foreach ($about as $item)
    <div class="row w3l-content-inf mt-lg-5 pt-lg-5">

      <!-- Kolom Kiri -->
      <div class="col-lg-5 w3l-content-left mt-lg-4">
        <h3 class="title-w3l mb-4">{{ $item->title }}</h3>
        <div class="pl-5">
          <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="radius-image img-fluid" width="150px">
        </div>
      </div>

      <!-- Kolom Kanan -->
      <div class="col-lg-7 w3l-content-right pl-lg-5 mt-lg-4">
        <p class="para-sub pr-lg-5 mt-md-3 mt-3 mx-auto" style="text-align: justify;"><?= substr($item->content, 0, 499). "..." ?></p>
        <a class="btn btn-style btn-outline-light mt-sm-5 mt-4 mr-2" href="/about">Read More</a>
      </div>

    </div>
    @endforeach
  </div>
</div>

  <!--//w3l-content-1-->

  <!-- /w3l-content-4-->
  <section class="w3l-content-4 py-5" id="blog">
    <div class="container py-lg-5 py-md-4 py-2">
      <div class="title-content text-center">
        <h3 class="title-w3l pb-sm-o pb-2 text-center">Berita</h3>
      </div>
      <div class="row inner-sec-w3ls">
        <!--/services-grids-->

        @foreach ($berita as $item )
          
          <div class="col-lg-4 col-md-6 about-in blog-grid-info text-left mt-5">
            <div class="card img">
              <div class="card-body img">
                <a href="/berita-detail/{{ $item->id }}" class="d-block">
                  <img src="{{ asset('storage/'. $item->image) }}" alt="{{ $item->title }}"
                    class="img-fluid radius-image">
                </a>
                <div class="blog-des mt-4">
                  <h5 class="card-title mb-2">
                    <a href="berita-detail/{{ $item->id }}">{{ $item->title }}</a>
                  </h5>
                  <ul class="admin-post mb-3">
                    <li>
                      <p><span class="fa fa-clock-o"></span>{{ $item->date }}</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        
      </div>
    </div>
    </div>
    <div class="d-flex justify-content-center">
      <a href="" class="btn btn-info ">view all</a>
    </div>
  </section>
  <!-- //w3l-content-4-->
  
  
  
  <!-- /w3l-content-4-->
  <section class="w3l-content-4 py-5" id="donasi" style="background: var(--bg-color);">
  <div class="content-4-main py-lg-5 py-md-4">
    <div class="container">
      <div class="title-content text-center">
        <h3 class="title-w3l mb-sm-5 mb-4 pb-lg-2" style="font-size:25px;">Donasi</h3>
      </div>
      <div class="content-info-in row">
        <div class="col-lg-2"></div>
        <div class="content-left col-lg-8 d-inline justify-content-center">
          <h5 style="text-align:center">Grafik Donasi Masuk per Bulan</h5>

          <!-- Grafik Donasi -->
          <div class="mt-4">
            <canvas id="donasiChart" width="100%" height="60"></canvas>
          </div>

          <!-- Link Program -->
          <div class="text-center mt-4">
            <p>
              <a href="#">Program yang kami miliki</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Script Chart -->
  <script>
    const ctx = document.getElementById('donasiChart').getContext('2d');
    const donasiChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Total Donasi (Rp)',
                data: {!! json_encode($data) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });
  </script>
</section>


</x-layout>