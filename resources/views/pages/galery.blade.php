<x-layout>

  <div class="breadcrumb-bg  w3l-inner-page-breadcrumb py-5">
    <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3 my-lg-3">
      <h2 class="title pt-5" style="font-size:30px;">Galery Panti</h2>
    </div>
  </div>


  <!--/Berita-Posts-->
  <section class="w3l-blog py-5" id="blog">
    <div class="container py-lg-5 py-md-4 py-2">
      <div class="title-content text-center">
        <h3 class="title-w3l pb-sm-o pb-2 text-center">Galeri</h3>
      </div>
      <div class="row inner-sec-w3ls">
        <!--/services-grids-->
        @foreach ($galery as $item)
      <div class="col-lg-4 col-md-6 about-in blog-grid-info text-left mt-5">
        <div class="card img">
        <div class="card-body img">
          <a href="/detail-galery/{{ $item->id }}" class="d-block">
          <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
            class="img-fluid radius-image">
          </a>
          <div class="blog-des mt-4">
          <h5 class="card-title mb-2"><a href="/detail-galery/{{ $item->id }}">{{ $item->judul }} </a></h5>
          <ul class="admin-post mb-3">
            <li>
            <p><span
              class="fa fa-clock-o"></span>{{ \Carbon\Carbon::parse($item->created_ad)->format('d M Y') }}</p>
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
  </section>
</x-layout>