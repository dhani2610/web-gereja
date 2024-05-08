@extends('layouts-landing.app')

@section('style-fe')
<style>
.gallery .gallery-item{
  border: none;
}
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

@endsection

@section('content')
 
<!-- ======= Team Section ======= -->
<section id="team" class="team">
  <div class="container-fluid">

    <div class="section-title">
      <h2>Warta Jemaat</h2>
      <h3>Warta Jemaat</h3>
    </div>

    <div class="row justify-content-center">
      <div class="col-xl-10">
        <div class="row">

          @foreach ($warta as $w)
          <div class="col-xl-3 col-lg-4 col-md-6">
            <a href="{{ asset('assets/file-warta/'.$w->file) }}" download="{{ asset('assets/file-warta/'.$w->file) }}">
              <div class="member">
                <img src="{{ asset('assets/img/foto-warta/'.$w->foto) }}" class="img-fluid" alt="">
                <div class="member-info">
                  <div class="member-info-content">
                    <h4>{{ $w->judul }}</h4>
                    {{-- <span>Chief Executive Officer</span> --}}
                  </div>
                  {{-- <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div> --}}
                </div>
              </div>
            </a>
          </div> <!-- End Member Item -->
          @endforeach

        </div>
      </div>
    </div>

  </div>
</section><!-- End Team Section -->
@endsection

@section('script-fe')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myDataTable').DataTable();
    });
</script>
@endsection
