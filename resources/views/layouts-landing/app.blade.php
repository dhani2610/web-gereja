<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts-landing.head')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts-landing.navbar')

  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">
        @php
            $slider = \App\Models\Slider::get();
        @endphp

        <!-- Slide 1 -->
        @foreach ($slider as $sd)
          <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}" style="background-image: url({{ asset('assets/img/slider/'.$sd->img) }})">
            <div class="carousel-container">
           <div class="container">
              <h2 class="animated fadeInDown">Selamat Datang</h2>
              <p class="animated fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
            </div>
            </div>
          </div>
        @endforeach

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    
    @yield('content')
   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts-landing.footer')
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('layouts-landing.foot')

</body>

</html>