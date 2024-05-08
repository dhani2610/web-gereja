@extends('layouts-landing.app')

@section('style-fe')

@endsection

@section('content')
 

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio team">
  <div class="container-fluid">

    <div class="section-title">
      <h2>Pengurus</h2>
      <h3>Pengurus</h3>
    </div>

    <div class="row">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          @php
              $arrayPengurus = ['Pendeta Ressort','Sekertaris' ,'Bendahara','Fungsional','Pararaton','Bestur Ressort','Ketua Dewan Diakonia','Ketua Dewan Koinonia','Ketua Dewan Marturia'];
          @endphp
          <li data-filter="*" class="filter-active">All</li>
          @foreach ($arrayPengurus as $peng)
            @php
                $slug = Str::slug($peng);
            @endphp
            <li data-filter=".filter-{{ $slug }}">{{ $peng }}</li>
          @endforeach
        </ul>
      </div>
    </div>

    <div class="row portfolio-container justify-content-center">

      <div class="col-xl-10">
        <div class="row">

          @foreach ($pengurus as $p)
          @php
              $slugP = Str::slug($peng);
          @endphp
          <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-{{ $slugP }}">
            <div class="member" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $p->id }}">
              <img src="{{ asset('assets/img/pengurus/'.$p->foto) }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>{{ $p->namaPengurus }}</h4>
                  <span>{{ $p->jabatan }}</span>
                </div>
              </div>
            </div>
          </div> <!-- End Member Item -->

          <!-- Button trigger modal -->

          <!-- Modal -->
          <div class="modal fade" id="exampleModal{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Data Pengurus</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <center>
                    <img src="{{ asset('assets/img/pengurus/'.$p->foto) }}" class="mx-auto mb-3" style="max-width: 300px; border-radius:10px"
                    alt="">
                  </center>
                  <div class="form-control">
                    <label for=""><b>Nama : </b></label>
                    <p class="text-xs font-weight-bold mb-0">{{ $p->namaPengurus }}</p>
                  </div>
                  <div class="form-control">
                    <label for=""><b>Category : </b></label>
                    <p class="text-xs font-weight-bold mb-0">{{ $p->category }}</p>
                  </div>
                  <div class="form-control">
                    <label for=""><b>Jabatan : </b></label>
                    <p class="text-xs font-weight-bold mb-0">{{ $p->Jabatan }}</p>
                  </div>
                  <div class="form-control">
                    <label for=""><b>Deskripsi : </b></label>
                    <p class="text-xs font-weight-bold mb-0">{{ $p->deskripsi }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach

          {{-- <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets-fe/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets-fe/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div> --}}
          <!-- End portfolio item -->

        </div>
      </div>

    </div>

  </div>
</section><!-- End Portfolio Section -->


@endsection

@section('script-fe')

@endsection
