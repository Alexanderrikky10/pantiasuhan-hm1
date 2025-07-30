<x-layout>
    
    <!--/breadcrumb-bg-->
    <div class="breadcrumb-bg w3l-inner-page-breadcrumb py-5">
        <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3 my-lg-3">
          <h2 class="title pt-5">About</h2>
          <ul class="breadcrumbs-custom-path mt-3 text-center">
            <li><a href="">Home</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> About </li>
          </ul>
        </div>
      </div>
    <!--//breadcrumb-bg-->
    <!-- banner bottom shape -->
    <div class="position-relative">
      <div class="shape overflow-hidden">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
      </div>
    </div>
    <!-- banner bottom shape -->
    <!-- //w3l-inner-page-breadcrumb-->
    <section class="w3l-about-ab" id="about">
      <div class="midd-w3 py-5">
        <div class="container py-lg-5 py-md-4 py-2">
          <div class="imgw3l-ab mb-md-5 mb-3">
            <img src="assets/images/banner2.jpg" alt="" class="radius-image img-fluid">
          </div>
         @foreach ($about as $item )
         <div class="row">
            <div class="col-lg-4 left-wthree-img">
              <h3 class="title-w3l mb-4">{{ $item->title }}</h3>
              <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="radius-image img-fluid" width="300px">
            </div>
            <div class="col-lg-8 pl-lg-5 align-self">
              <p class="mt-5" style="text-align: justify;">
               {{ wordwrap(substr($item->content,0,1294),1320) }}
              </p>
            </div>
          </div>
          <br>
            <p style="text-align: justify;">
              {{   wordwrap(substr( $item->content, 1294, 2500), 1320)  }}
            </p>
         @endforeach
        </div>
      </div>
    </section>
    <!-- /w3l-content-2-->
  
    <!-- home page block grids -->
    <section class="w3l-two-servicses py-5" id="services2" style="background: var(--bg-grey);">
      <div class="container py-lg-5 py-md-4 py-2" >
       @foreach ($visi_misi as $item )
         <div class="row bottom-ab-grids">
          <div class="col-lg-12 bottom-ab-left align-self">
            <h3 class="title-w3l mb-4 text-center">Visi & Misi</h3>
          </div>
          <div class="col-lg-6 bottom-right-grids pl-lg-5 mt-lg-0 mt-5" style="border-right:2px solid black;">
  
            <h4 class="title-w3l mb-4" style="font-size:30px;">Visi</h4>
            <p class="">
              {{ $item->visi }}
            </p>
  
          </div>
          <div class="col-lg-6 bottom-right-grids pl-lg-5 mt-lg-0 mt-5">
          <h4 class="title-w3l mb-4" style="font-size:30px;">Misi</h4>
            <p class="">
              {!! nl2br(e($item->misi)) !!}
            </p>
          </div>
        </div>
       @endforeach
        
      </div>
    </section>
    <!-- //home page block grids -->
  
    <!-- /w3l-content-5-->
    <section class="w3l-content-5 py-5">
      <div class="content-4-main py-lg-5 py-md-4">
        <div class="container pb-5">
          <div class="title-content text-left">
            <h6 class="title-subhny">Here & Now, Every Day</h6>
            <h3 class="title-w3l two mb-sm-5 mb-4">Healing Experiences- For Everyone <br> All The Time</h3>
          </div>
          <div class="content-info-in row">
            <div class="content-left col-lg-6">
              <p class=""> We focus on the needs of every small to middle market businesses to improve and grow
                their return. lacinia id erat eu
                ullam corper. Nunc id ipsum fringilla, gravida felis vitae. lacinia id, sunt in
                culpa quis lacinia. Lorem ipsum dolor, sit amet init elit. Eos,
                debitis doler et in.lacinia id, sunt in culpa quis. </p>
              <a href="#discover" class="btn btn-style btn-primary mt-md-5 mt-4">Get in touch</a>
            </div>
            <div class="content-right col-lg-6 mt-lg-0 mt-5">
              <p> We focus on the needs of every small to middle market businesses to improve and grow
                their return. lacinia id erat eu
                ullam corper. Nunc id ipsum fringilla, gravida felis vitae. lacinia id, sunt in
                culpa quis lacinia. Lorem ipsum dolor, sit amet init elit. Eos,
                debitis. gravida felis vitae. lacinia id, sunt in
                culpa quis. Lorem ipsum dolor sit amet</p>
            </div>
          </div>
        </div>
      </div>
    </section> 
    <!-- /w3l-content-5-->
  
    <!-- /team-sec-->
     <section class="w3l-team">
      <div class="team py-5">
        <div class="container py-lg-5 py-md-4">
          <div class="title-content text-center">
            <h3 class="title-w3l mb-sm-3 text-center">Meet Our Team</h3>
          </div>
          <div class="row team-row justify-content-center">
            <div class="col-lg-3 col-6 team-wrap mt-4 pt-lg-2">
              <div class="team-info">
                <div class="column position-relative img-circle">
                  <a href="#url"><img src="{{ asset('images/alex.jpg') }}" alt="alexander rikky" class="img-fluid" /></a>
                </div>
                <div class="column-btm">
                  <h3 class="name-pos"><a href="#url">Alexander Rikky
                  </a></h3>
                  <p>Web dev</p>
                  <div class="social">
                    <a href="#facebook" class="facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                    <a href="#twitter" class="twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                  </div>
                </div>
              </div>
            </div> 
            <!-- end team member -->
  
  
          </div>
        </div>
      </div>
    </section> 
    <!--//team-sec -->
    
    
</x-layout>