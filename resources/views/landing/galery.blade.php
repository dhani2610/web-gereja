@extends('layouts-landing.app')

@section('style-fe')
<style>
.gallery .gallery-item{
  border: none;
}
</style>
@endsection

@section('content')
 

  <!-- ======= Gallery Section ======= -->
  <section id="gallery" class="gallery">

    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2 style="font-size: 40px;font-weight:800">Gallery</h2>
      </div>
    </div>

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-0">

        @foreach ($galery as $g)
        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="{{ asset('assets/img/galery/'.$g->img) }}" class="gallery-lightbox" data-gall="gallery-item">
              <img src="{{ asset('assets/img/galery/'.$g->img) }}" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </section><!-- End Gallery Section -->

@endsection

@section('script-fe')

@endsection
