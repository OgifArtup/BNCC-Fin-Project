@extends('layout.user')
@section('content')
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>{{ session('success') }}!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('minusFailed'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>{{ session('minusFailed') }}!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('plusFailed'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>{{ session('plusFailed') }}!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('emptyCart'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>{{ session('emptyCart') }}!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container col-md-6 rounded-top-4" style="padding-top: 20px">
        <div class="card shadow rounded-top-4">
            <div class="card-body bg-dark rounded-top-4">
                </div>
                <div class="card-header text-center text-light bg-secondary"><h1>Cart</h1></div>
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
                    <tbody class="table-group-divider bg-light">
                        <tr>
                            <td><img src="{{ asset( 'storage/Image/'.$cart->barang->foto ) }}" alt="Error" style="height: 90px" ></td>
                            <td>{{ $cart->barang->nama }}</td>
                            <td>{{ $cart->barang->kategori->nama_kategori }}</td>
                            <td>Rp. {{ $cart->barang->harga }}</td>
                            <td>
                                <div class="input-group mb-3">
                                    <form action="{{route('minusJumlah', ['id' => $cart->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <button class="btn btn-outline-secondary fs-4" type="submit" id="button-addon2">-</i></button>
                                    </form>
                                    
                                    <input name="jumlah" type="number" class="form-control" min="1" max="{{ $cart->barang->jumlah }}"required disabled value="{{ $cart->jumlah }}">
                                    <style>
                                    input::-webkit-outer-spin-button,
                                    input::-webkit-inner-spin-button {
                                        -webkit-appearance: none;
                                        margin: 0;
                                    }

                                    input[type="number"] {
                                        -moz-appearance: textfield;
                                    }
                                    </style>

                                    <form action="{{route('plusJumlah', ['id' => $cart->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <button class="btn btn-outline-secondary fs-4" type="submit" id="button-addon2">+</button>
                                    </form>
                                </div>
                            </td>
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
                <h3 class="text-end mb-3 me-3 ">Total : Rp. {{ $total }}</h3>
                <form class="m-3" action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="alamat">Shipping Address</label>
                        <input name="alamat" type="text" class="form-control" id="formGroupExampleInput" value="{{ old('alamat') }}" placeholder="Insert your full address">
                        @error('alamat')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="kode_pos">Postal Code</label>
                        <input name="kode_pos" type="text" class="form-control" id="formGroupExampleInput" value="{{ old('kode_pos') }}" placeholder="Insert your Postal Code">
                        @error('kode_pos')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <input name="total" type="hidden" value="{{ $total }}">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop