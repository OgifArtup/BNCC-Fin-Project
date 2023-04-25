@extends('layout.admin')

@section('content')
    <div class="container col-md-6 rounded-4" style="padding-top: 90px;">
        <div class="card shadow rounded-4" style="border: 0; box-shadow: none;">
            <div class="card-header text-center fw-bold bg-dark text-light border-dark rounded-top-4"><h3>{{ __('List Barang') }}</h3> </div>
            <div class="card-body">
                <a href="/add-barang"><button type="submit" class="btn btn-success">Add New Barang</button></a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($barangs as $barang)
                        <tr>
                            <td>{{ $barang->nama }}</td>
                            <td>{{ $barang->kategori->nama_kategori }}</td>
                            <td>Rp. {{ number_format($barang->harga, 2) }}</td>
                            <td>{{ $barang->jumlah }}</td>
                            <td><img src="{{ asset( 'storage/Image/'.$barang->foto ) }}" alt="Error" style="height: 90px" ></td>
                            <td>
                                <a href="/update-barang/{{ $barang->id }}"><button type="submit" class="btn btn-success col-md">Edit</button></a>
                            </td>
                            <td>
                                <form action="{{route('delete', ['id' => $barang->id])}}" method="post">
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
@stop