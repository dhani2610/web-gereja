@extends('layouts-landing.app')

@section('style-fe')

@endsection

@section('content')
 <!-- ======= About Section ======= -->
 <section id="about" class="about">
  <div class="container-fluid">

    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
        {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a> --}}
        @if (isset($about))
            @if ($about->image != null)
                <br>
                <img src="{{ asset('assets/img/about/'.$about->image) }}" style="max-width: 500px" alt="">
                <br>
            @endif
        @endif
      </div>

      <div class="col-xl-5 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
        {!! $about->content !!}
      </div>
    </div>

  </div>
</section><!-- End About Section -->

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts section-bg">
  <div class="container-fluid">

    <div class="row counters mx-auto">
      <div class="col-lg-3 col-6 text-center">
        <span data-purecounter-start="0" data-purecounter-end="{{ count($pengurus) }}" data-purecounter-duration="1" class="purecounter"></span>
        <p>Pengurus</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-purecounter-start="0" data-purecounter-end="{{ count($warta) }}" data-purecounter-duration="1" class="purecounter"></span>
        <p>Warta Jemaat</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-purecounter-start="0" data-purecounter-end="{{ count($jemaat) }}" data-purecounter-duration="1" class="purecounter"></span>
        <p>Data Jemaat</p>
      </div>
      <div class="col-lg-3 col-6 text-center">
        <span data-purecounter-start="0" data-purecounter-end="{{ count($donasi) }}" data-purecounter-duration="1" class="purecounter"></span>
        <p>Data Donasi</p>
      </div>
    </div>

  </div>
</section><!-- End Counts Section -->

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts section-bg" style="background: black;color:white">
  <div class="container-fluid">
    <div class="section-title">
      <h1 style="font-weight: 800">Jadwal Ibadah</h1>
    </div>

    <div class="row counters mx-auto">

      @foreach ($jadwal as $jd)
      <div class="col-lg-4 col-6 text-center">
        <span >{{ $jd->waktu }}</span>
        <div class="mx-auto mb-2" style="border: 2px solid white !important;
        opacity: 11;width:20%"></div>
        <p>{{ $jd->namaIbadah }}</p>
      </div>
      @endforeach

    </div>

  </div>
</section><!-- End Counts Section -->



<section id="faq" class="faq section-bg">
  <div class="container">

    <div class="section-title">
      <h2 style="font-size: 40px">Frequently Asked Questions</h2>
    </div>

    <div class="faq-list">
      <ul>
        @php
            $No = 0;
        @endphp
        @foreach ($faq as $fq)
        @php
          $current = $loop->iteration;
        @endphp
        <li data-aos="fade-up" data-aos-delay="{{  $current }}00">
          <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-{{  $current }}">{{ $fq->pertanyaan }}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
          <div id="faq-list-{{  $current }}" class="collapse {{  $current == 1 ? 'show' : '' }}" data-bs-parent=".faq-list-{{  $current }}">
            <p>
              {{ $fq->jawaban }}
            </p>
          </div>
        </li>
        @endforeach
      </ul>
    </div>

  </div>
</section>

@endsection

@section('script-fe')

@endsection
