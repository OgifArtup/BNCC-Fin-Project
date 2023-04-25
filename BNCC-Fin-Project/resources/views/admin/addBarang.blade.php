@extends('layout.admin')

@section('content')
    <div class="position-absolute top-0 start-50 translate-middle-x container d-flex justify-content-center rounded-4" style="padding-top: 90px">
        <div class="card shadow rounded-4">
            <div class="card-body rounded-4">
                <div class="row">
                    <h1 class="text-center mt-4">Add New Barang</h1>
                    <div class="col-lg-7">
                        <form action="{{ route('createBarang') }}" method="POST" enctype="multipart/form-data" class="m-5">
                            @csrf
                            <div class="form-row mb-1">
                                <div class="p-2">
                                    <label for="nama" class="mb-1">Nama Barang</label>
                                    <input name="nama" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Nama Barang" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-row mb-1">
                                <div class="p-2">
                                    <label for="id_kategori" class="mb-1">Kategori Barang</label>
                                    <div class="" style="">
                                        @foreach ($kategoris as $kategori)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineCheckbox1" value="<?= $kategori['id'] ?>" name="id_kategori">
                                            <label class="form-check-label" for="inlineCheckbox1"><?= $kategori['nama_kategori'] ?></label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="form-row mb-1">
                                <div class="p-2">
                                    <label for="harga" class="mb-1">Harga Barang</label>
                                    <input name="harga" type="numeric" class="form-control" id="formGroupExampleInput" placeholder="Input Harga Barang" value="{{ old('harga') }}">
                                    @error('harga')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row mb-1">
                                <div class="p-2">
                                    <label for="jumlah" class="mb-1">Jumlah Barang</label>
                                    <input name="jumlah" type="numeric" class="form-control" id="formGroupExampleInput" placeholder="Input Jumlah Barang" value="{{ old('jumlah') }}">
                                    @error('jumlah')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row mb-4">
                                <div class="p-2">
                                    <label for="foto" class="mb-1">Image Barang</label>
                                    <input name="foto" class="form-control" type="file" id="formFile">
                                    @error('foto')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-row mb-4 d-grid p-2">
                                <button type="submit" class="btn btn-primary">Add Barang</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 d-flex align-items-center justify-content-center">
                        <img class="img-fluid" src="{{ asset( 'storage/admin/barang_illustration.png' ) }}" alt="Error" >
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop