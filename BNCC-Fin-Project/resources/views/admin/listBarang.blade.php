@extends('layout.admin')

@section('content')
    <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
            <div class="card-header text-center">{{ __('List Barang') }} </div>
                <div class="card-body">
                    <div class="col-md-6" style="">
                        <form action="" method="GET" class="input-group row">
                            <div class="input-group" style="">
                                <input type="text" class="form-control" name="cari" placeholder="Search" value=""/>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    <br>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $barang->nama }}</td>
                                <td>{{ $barang->kategori->nama_kategori }}</td>
                                <td>Rp. {{ $barang->harga }}</td>
                                <td>{{ $barang->jumlah }}</td>
                                <td><img src="{{ asset( 'storage/Image/'.$barang->foto ) }}" alt="Error" style="height: 90px" ></td>
                                <td>
                                    <a href="/update-barang/{{ $barang->id }}"><button type="submit" class="btn btn-success col-md">Edit</button></a>
                                </td>
                                <td>
                                    <form action="{{route('delete', ['id' => $barang->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button action="/delete-barang" type="submit" class="btn btn-danger col-md">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="/add-barang"><button type="submit" class="btn btn-success">Add New Barang</button></a>
                    
                </div>
        </div>
    </div>

@stop