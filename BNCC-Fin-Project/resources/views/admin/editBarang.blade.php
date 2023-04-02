@extends('layout.admin')

@section('content')
    <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('Update Barang') }} </div>
        <div class="card-body">
            <form action="{{route('updateBarang', ['id' => $barang->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input name="nama" type="text" value="{{$barang->nama}}" class="form-control" id="formGroupExampleInput" placeholder="Input Nama Barang">
                    @error('nama')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="kategori" class="form-label">Barang Category</label>
                    <input name="kategori" type="text" value="{{$barang->kategori}}" class="form-control" id="formGroupExampleInput" placeholder="Input Barang Category">
                    @error('kategori')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Barang</label>
                    <input name="harga" type="numeric" value="{{$barang->harga}}" class="form-control" id="formGroupExampleInput" placeholder="Input Harga Barang">
                    @error('harga')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Barang</label>
                    <input name="jumlah" type="numeric" value="{{$barang->jumlah}}" class="form-control" id="formGroupExampleInput" placeholder="Input Jumlah Barang">
                    @error('jumlah')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Image Barang</label>
                    <input name="foto" type="file" value="{{$barang->foto}}" class="form-control" id="formFile">
                    @error('foto')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="card-body text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>

@stop