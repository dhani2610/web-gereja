@extends('layouts.user_type.auth')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


    @if($errors->any())
        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
            <span class="alert-text text-white">
            {{$errors->first()}}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
    @endif
    @if(session('success'))
        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
            <span class="alert-text text-white">
            {{ session('success')}}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
    @endif
    @if(session('failed'))
        <div class="m-3  alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert">
            <span class="alert-text text-white">
            {{ session('failed') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 mb-2">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{ $page_title ?? '' }}</h5>
                        </div>
                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal"
                           data-bs-target="#exampleModal">+&nbsp; New {{ $page_title ?? '' }}</a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New {{ $page_title ?? '' }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <form role="form text-left" method="POST" action="{{ route('donasi-store') }}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="">Category</label>
                                                <select name="category" class="form-control" required>
                                                    <option value="Donasi Umum">Donasi Umum</option>
                                                    <option value="Misi dan Penginjilan">Misi dan Penginjilan</option>
                                                    <option value="Pelayanan Sosial">Pelayanan Sosial</option>
                                                    <option value="Pendidikan Agama">Pendidikan Agama</option>
                                                    <option value="Renovasi dan Pembangunan">Renovasi dan Pembangunan</option>
                                                    <option value="Bantuan Kebutuhan Khusus">Bantuan Kebutuhan Khusus</option>
                                                </select>
                                                
                                                @error('category')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Nama Donator</label>
                                                <input type="text" class="form-control" placeholder="Nama Donator" name="nama"
                                                       id="foto" value="{{ old('nama') }}" required>
                                                @error('nama')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Tanggal Donator</label>
                                                <input type="date" class="form-control" placeholder="Tanggal Donator" name="tanggal"
                                                       id="foto" value="{{ old('tanggal') }}" required>
                                                @error('tanggal')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Jumlah Donasi</label>
                                                <input type="number" class="form-control" placeholder="Jumlah Donator" name="jumlah"
                                                       id="foto" value="{{ old('jumlah') }}" required>
                                                @error('tanggal')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Deskripsi Donasi</label>
                                                <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10"></textarea>
                                                @error('deskripsi')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-body px-3 pt-0 pb-2">
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

    @foreach ($donasi as $item2)
        <div class="modal fade" id="modaledit{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $page_title ?? '' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form role="form text-left" method="POST" action="{{ route('donasi-update',$item2->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="">Category</label>
                                <select name="category" class="form-control" required>
                                    <option value="Donasi Umum" {{ $item2->category == 'Donasi Umum' ? 'selected' : '' }}>Donasi Umum</option>
                                    <option value="Misi dan Penginjilan" {{ $item2->category == 'Misi dan Penginjilan' ? 'selected' : '' }}>Misi dan Penginjilan</option>
                                    <option value="Pelayanan Sosial" {{ $item2->category == 'Pelayanan Sosial' ? 'selected' : '' }}>Pelayanan Sosial</option>
                                    <option value="Pendidikan Agama" {{ $item2->category == 'Pendidikan Agama' ? 'selected' : '' }}>Pendidikan Agama</option>
                                    <option value="Renovasi dan Pembangunan" {{ $item2->category == 'Renovasi dan Pembangunan' ? 'selected' : '' }}>Renovasi dan Pembangunan</option>
                                    <option value="Bantuan Kebutuhan Khusus" {{ $item2->category == 'Bantuan Kebutuhan Khusus' ? 'selected' : '' }}>Bantuan Kebutuhan Khusus</option>
                                </select>
                                
                                @error('category')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Nama Donator</label>
                                <input type="text" class="form-control" placeholder="Nama Donator" name="nama"
                                       id="foto" value="{{ old('nama') ?? $item2->nama }}" required>
                                @error('nama')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Tanggal Donator</label>
                                <input type="date" class="form-control" placeholder="Tanggal Donator" name="tanggal"
                                       id="foto" value="{{ old('tanggal') ?? $item2->tanggal }}" required>
                                @error('tanggal')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Donasi</label>
                                <input type="number" class="form-control" placeholder="Jumlah Donator" name="jumlah"
                                       id="foto" value="{{ old('jumlah') ?? $item2->jumlah }}" required>
                                @error('tanggal')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Deskripsi Donasi</label>
                                <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10">{{ $item2->deskripsi }}</textarea>
                                @error('deskripsi')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    @endforeach



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#myDataTable').DataTable();
        });
    </script>

@endsection
