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
    <div class="position-absolute top-0 start-50 translate-middle-x container d-flex justify-content-center rounded-4" style="padding-top: 90px">
        <div class="card shadow rounded-4">
            <div class="card-body rounded-4">
                <div class="mx-5">
                    <h1 class="text-center mt-4">Checkout</h1>
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
                                <td>Rp. {{ number_format($cart->barang->harga, 2) }}</td>
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
                                <td>Rp. {{ number_format($cart->jumlah * $cart->barang->harga, 2) }}</td>
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
                    <h3 class="text-end mb-3 me-3 ">Total : Rp. {{ number_format($total, 2) }}</h3>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data" class="m-5">
                            @csrf
                            <div class="form-row mb-1">
                                <div class="p-2">
                                    <label for="alamat" class="mb-1">Shipping Address</label>
                                    <input name="alamat" type="text" class="form-control" id="formGroupExampleInput" value="{{ old('alamat') }}" placeholder="Insert your full address">
                                    @error('alamat')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row mb-1">
                                <div class="p-2">
                                    <label for="kode_pos" class="mb-1">Postal Cord</label>
                                    <input name="kode_pos" type="text" class="form-control" id="formGroupExampleInput" value="{{ old('kode_pos') }}" placeholder="Insert your Postal Code">
                                    @error('kode_pos')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input name="total" type="hidden" value="{{ $total }}">
                                </div>
                            </div>
            
                            <div class="form-row mb-4 d-grid p-2">
                                <button type="submit" class="btn btn-primary">Checkout</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 d-flex align-items-center justify-content-center">
                        <img class="img-fluid" src="{{ asset( 'storage/user/checkout_illustration.png' ) }}" alt="Error" >
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop