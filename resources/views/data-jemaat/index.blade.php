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
                                    <form role="form text-left" method="POST" action="{{ route('data-jemaat-store') }}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="">Nama</label>
                                                <input type="text" class="form-control" placeholder="Nama" name="nama"
                                                       id="nama" value="{{ old('nama') }}" required>
                                                @error('nama')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                             
                                            <div class="mb-3">
                                                <label for="">Tanggal Lahir</label>
                                                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir"
                                                       id="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                                                @error('tgl_lahir')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Alamat</label>
                                                <input type="text" class="form-control" placeholder="Alamat" name="alamat"
                                                       id="alamat" value="{{ old('alamat') }}" required>
                                                @error('alamat')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Tampat Lahir</label>
                                                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempatLahir"
                                                       id="alamat" value="{{ old('tempatLahir') }}" required>
                                                @error('tempatLahir')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Jenis Kelamin</label>
                                                <select name="jenisKelamin" class="form-control" id="" required>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                @error('jenisKelamin')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Status Baptis</label>
                                                <select name="statusBaptis" class="form-control" id="" required>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Sudah">Sudah</option>
                                                    <option value="Belum">Belum</option>
                                                </select>
                                                @error('jenisKelamin')
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
                                Nama
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Tanggal Lahir
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Alamat
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Jenis Kelamin
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Status Baptis
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Action
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($jemaat as $item)
                            <tr>
                                <td class="ps-4">
                                    <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->nama }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->tgl_lahir }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->alamat }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->jenisKelamin }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->statusBaptis }}</p>
                                </td>
                                <td class="text-center">
                                    <a href="#" type="button" data-bs-toggle="modal"
                                       data-bs-target="#modaledit{{ $item->id }}">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <a href="{{ route('data-jemaat-delete',$item->id) }}" type="button">
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

    @foreach ($jemaat as $item2)
        <div class="modal fade" id="modaledit{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $page_title ?? '' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form role="form text-left" method="POST" action="{{ route('data-jemaat-update',$item2->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" placeholder="Nama" name="nama"
                                       id="nama" value="{{ old('nama') ?? $item2->nama }}" required>
                                @error('nama')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                             
                            <div class="mb-3">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir"
                                       id="tgl_lahir" value="{{ old('tgl_lahir') ?? $item2->tgl_lahir }}" required>
                                @error('tgl_lahir')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" placeholder="Alamat" name="alamat"
                                       id="alamat" value="{{ old('alamat') ?? $item2->alamat }}" required>
                                @error('alamat')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Tampat Lahir</label>
                                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempatLahir"
                                       id="alamat" value="{{ old('tempatLahir') ?? $item2->tempatLahir }}" required>
                                @error('tempatLahir')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenisKelamin" class="form-control" id="" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" {{ $item2->jenisKelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ $item2->jenisKelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenisKelamin')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Status Baptis</label>
                                <select name="statusBaptis" class="form-control" id="" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Sudah" {{ $item2->statusBaptis == 'Sudah' ? 'selected' : '' }}>Sudah</option>
                                    <option value="Belum" {{ $item2->statusBaptis == 'Belum' ? 'selected' : '' }}>Belum</option>
                                </select>
                                @error('statusBaptis')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
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
