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
<section id="gallery" class="gallery section-bg" >
  <div class="container-fluid">
    <div class="section-title">
      <h1 style="font-weight: 800">Data Donasi</h1>
    </div>

    <div class="row counters mx-auto">

     <div class="card">
        <div class="card-body px-3 pt-3 pb-2">
            <div class="table-responsive p-0">
                <table id="myDataTable" class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            ID
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Category
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Nama Donatur
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Tanggal Donatur
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Jumlah Donasi
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Deskripsi Donasi
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Action
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($donasi as $item)
                        <tr>
                            <td class="ps-4">
                                <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $item->category ?? '-' }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $item->nama }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $item->tanggal }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">@currency($item->jumlah)</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $item->deskripsi }}</p>
                            </td>
                            <td class="text-center">
                                <a href="#" type="button" data-bs-toggle="modal"
                                   data-bs-target="#modaledit{{ $item->id }}">
                                    <i class="fas fa-user-edit text-secondary"></i>
                                </a>
                                <a href="{{ route('donasi-delete',$item->id) }}" type="button">
                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
     </div>

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
