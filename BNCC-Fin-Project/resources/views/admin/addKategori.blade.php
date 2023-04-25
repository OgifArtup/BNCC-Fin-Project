@extends('layout.admin')

@section('content')
    <div class="position-absolute top-0 start-50 translate-middle-x container d-flex justify-content-center rounded-4" style="padding-top: 90px">
        <div class="card shadow rounded-4">
            <div class="card-body rounded-4">
                <div class="row">
                    <h1 class="text-center mt-4">Add New Barang</h1>
                    <div class="col-lg-7">
                        <form action="{{ route('createKategori') }}" method="POST" enctype="multipart/form-data" class="m-5">
                            @csrf
                            <div class="form-row mb-1">
                                <div class="p-2">
                                    <label for="nama_kategori" class="mb-1">Kategori Barang</label>
                                    <input name="nama_kategori" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Nama Kategori">
                                    @error('nama')
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
                <div class="mx-5">
                    <h2 class="text-center mt-4">Kategori List</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Kategori</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($kategoris as $kategori)
                            <tr>
                                <td>{{ $kategori->nama_kategori }}</td>
                                <td>
                                    <form action="{{route('deleteKategori', ['id' => $kategori->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger col-md">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop