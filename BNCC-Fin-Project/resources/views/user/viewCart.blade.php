@extends('layout.user')

@section('content')
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>{{ session('success') }}!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
            <div class="card-body">
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($carts as $cart)
                    <tbody>
                        <tr>
                            <td><img src="{{ asset( 'storage/Image/'.$cart->barang->foto ) }}" alt="Error" style="height: 90px" ></td>
                            <td>{{ $cart->barang->nama }}</td>
                            <td>{{ $cart->barang->kategori->nama_kategori }}</td>
                            <td>Rp. {{ $cart->barang->harga }}</td>
                            <td>{{ $cart->jumlah }}</td>
                            <td>Rp. {{ $cart->jumlah * $cart->barang->harga }}</td>
                            <td>
                                <form action="{{route('deleteItem', ['id' => $cart->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger col-md">Remove Item</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop