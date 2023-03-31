@extends('layout.admin')

@section('content')
    <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('Add Barang') }} </div>
            <div class="card-body">
                <form action="{{ route('createBook') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Barang Category</label>
                        <input name="kategori" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Barang Category">
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Barang</label>
                        <input name="harga" type="numeric" class="form-control" id="formGroupExampleInput" placeholder="Input Harga Barang">
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Barang</label>
                        <input name="jumlah" type="numeric" class="form-control" id="formGroupExampleInput" placeholder="Input Jumlah Barang">
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image Barang</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>


                    <button type="submit" class="btn btn-success">Insert</button>
                </form>
            </div>
        </div>
    </div>
@stop