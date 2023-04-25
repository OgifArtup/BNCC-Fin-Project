@extends('layout.admin')

@section('content')
    <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('Add New Barang') }} </div>
            <div class="card-body">
                <form action="{{ route('createBarang') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input name="nama" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Nama Barang" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_kategori" class="form-label">Kategori Barang</label>
                        <div class="" style="">
                            @foreach ($kategoris as $kategori)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineCheckbox1" value="<?= $kategori['id'] ?>" name="id_kategori">
                                <label class="form-check-label" for="inlineCheckbox1"><?= $kategori['nama_kategori'] ?></label>
                            </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Barang</label>
                        <input name="harga" type="numeric" class="form-control" id="formGroupExampleInput" placeholder="Input Harga Barang" value="{{ old('harga') }}">
                        @error('harga')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Barang</label>
                        <input name="jumlah" type="numeric" class="form-control" id="formGroupExampleInput" placeholder="Input Jumlah Barang" value="{{ old('jumlah') }}">
                        @error('jumlah')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Image Barang</label>
                        <input name="foto" class="form-control" type="file" id="formFile">
                        @error('foto')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-success">Add Barang</button>
                </form>
            </div>
        </div>
    </div>
@stop