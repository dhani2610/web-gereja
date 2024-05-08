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
 

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts section-bg" style="background: black;color:white">
  <div class="container-fluid">
    <div class="section-title">
      <h1 style="font-weight: 800">Jadwal Ibadah</h1>
    </div>

    <div class="row counters mx-auto">

      @foreach ($jadwal_ibadah as $jd)
      <div class="col-lg-4 col-6 text-center">
        <span >{{ $jd->waktu }}</span>
        <div class="mx-auto mb-2" style="border: 2px solid white !important;
        opacity: 11;width:20%"></div>
        {{-- <hr style="    border: 2px solid white !important; --}}
        {{-- opacity: 11;"> --}}
        <p>{{ $jd->namaIbadah }}</p>
      </div>
      @endforeach

    </div>

  </div>
</section><!-- End Counts Section -->

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
