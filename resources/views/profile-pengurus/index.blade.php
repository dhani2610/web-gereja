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
                                    <form role="form text-left" method="POST" action="{{ route('profile-pengurus-store') }}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="">Category</label>
                                                <select name="category" class="form-control">
                                                    <option value="Pendeta Ressort">Pendeta Ressort</option>
                                                    <option value="Sekertaris">Sekertaris</option>
                                                    <option value="Bendahara">Bendahara</option>
                                                    <option value="Fungsional">Fungsional</option>
                                                    <option value="Pararaton">Pararaton</option>
                                                    <option value="Bestur Ressort">Bestur Ressort</option>
                                                    <option value="Ketua Dewan Diakonia">Ketua Dewan Diakonia</option>
                                                    <option value="Ketua Dewan Koinonia">Ketua Dewan Koinonia</option>
                                                    <option value="Ketua Dewan Marturia">Ketua Dewan Marturia</option>
                                                </select>
                                                @error('category')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Foto</label>
                                                <input type="file" class="form-control" placeholder="Nama Pengurus" name="foto"
                                                       id="foto" value="{{ old('foto') }}" required>
                                                @error('foto')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                           
                                            <div class="mb-3">
                                                <label for="">Nama Pengurus</label>
                                                <input type="text" class="form-control" placeholder="Nama Pengurus" name="namaPengurus"
                                                       id="namaPengurus" value="{{ old('namaPengurus')  }}" required>
                                                @error('namaPengurus')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Jabatan</label>
                                                <input type="text" class="form-control" placeholder="Jabatan" name="jabatan"
                                                       id="jabatan" value="{{ old('jabatan') }}" required>
                                                @error('jabatan')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                             
                                             
                                            <div class="mb-3">
                                                <label for="">Deskripsi</label>
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
                                Foto
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Nama Pengurus
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Category
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Jabatan
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Deskripsi
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Action
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($pengurus as $item)
                            <tr>
                                <td class="ps-4">
                                    <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('assets/img/pengurus/'.$item->foto) }}" style="max-width: 100px"
                                     alt="">
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->namaPengurus }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->category }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->jabatan }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->deskripsi }}</p>
                                </td>
                                <td class="text-center">
                                    <a href="#" type="button" data-bs-toggle="modal"
                                       data-bs-target="#modaledit{{ $item->id }}">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <a href="{{ route('profile-pengurus-delete',$item->id) }}" type="button">
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

    @foreach ($pengurus as $item2)
        <div class="modal fade" id="modaledit{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $page_title ?? '' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form role="form text-left" method="POST" action="{{ route('profile-pengurus-update',$item2->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="">Category</label>
                                <select name="category" class="form-control">
                                    <option value="Pendeta Ressort" {{ $item2->category == 'Pendeta Ressort' ? 'selected' : '' }}>Pendeta Ressort</option>
                                    <option value="Sekertaris" {{ $item2->category == 'Sekertaris' ? 'selected' : '' }}>Sekertaris</option>
                                    <option value="Bendahara" {{ $item2->category == 'Bendahara' ? 'selected' : '' }}>Bendahara</option>
                                    <option value="Fungsional" {{ $item2->category == 'Fungsional' ? 'selected' : '' }}>Fungsional</option>
                                    <option value="Pararaton" {{ $item2->category == 'Pararaton' ? 'selected' : '' }}>Pararaton</option>
                                    <option value="Bestur Ressort" {{ $item2->category == 'Bestur Ressort' ? 'selected' : '' }}>Bestur Ressort</option>
                                    <option value="Ketua Dewan Diakonia" {{ $item2->category == 'Ketua Dewan Diakonia' ? 'selected' : '' }}>Ketua Dewan Diakonia</option>
                                    <option value="Ketua Dewan Koinonia" {{ $item2->category == 'Ketua Dewan Koinonia' ? 'selected' : '' }}>Ketua Dewan Koinonia</option>
                                    <option value="Ketua Dewan Marturia" {{ $item2->category == 'Ketua Dewan Marturia' ? 'selected' : '' }}>Ketua Dewan Marturia</option>
                                </select>
                                @error('category')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Foto</label>
                                <br>
                                <img src="{{ asset('assets/img/pengurus/'.$item2->img) }}" style="max-width: 100px"
                                     alt="">
                                <br>
                                <input type="file" class="form-control" placeholder="Nama Pengurus" name="foto"
                                       id="foto" value="{{ old('foto') ?? $item2->foto }}" required>
                                @error('foto')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                           
                            <div class="mb-3">
                                <label for="">Nama Pengurus</label>
                                <input type="text" class="form-control" placeholder="Nama Pengurus" name="namaPengurus"
                                       id="namaPengurus" value="{{ old('namaPengurus') ?? $item2->namaPengurus }}" required>
                                @error('namaPengurus')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Jabatan</label>
                                <input type="text" class="form-control" placeholder="Jabatan" name="jabatan"
                                       id="jabatan" value="{{ old('jabatan') ?? $item2->jabatan }}" required>
                                @error('jabatan')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                             
                             
                            <div class="mb-3">
                                <label for="">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10">{{ old('deskripsi') ?? $item2->deskripsi }}</textarea>
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
