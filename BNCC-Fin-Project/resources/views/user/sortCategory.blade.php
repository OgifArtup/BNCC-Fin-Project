@extends('layout.user')

@section('content')
    <table class="table">
    <div class="dropdown" style="padding-top: 90px">
        <button class="btn btn-success dropdown-toggle ms-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sort by Kategori
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/view-barang">All Kategori</a></li>
            @foreach ($kategori2 as $kategori)
            <li><a class="dropdown-item" href="{{ url('sort-by-category/'. $kategori->id) }}">{{ $kategori->nama_kategori }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="container text-center">
        <h2 class="text-light">{{ $kategoris->nama_kategori }}</h2>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>{{ session('success') }}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('failed'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>{{ session('failed') }}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
        @foreach ($barangs as $barang)
        <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
            <form action="{{route('createCart', ['id' => $barang->id])}}" method="POST" enctype="multipart/form-data" class="mt-3">
                @csrf
                <div class="col">
                    <h4>{{ $barang->nama }}</h6>
                    <img src="{{ asset( 'storage/Image/'.$barang->foto ) }}" alt="Error" style="height: 150px" >
                    @if ($barang->jumlah > 0)
                        <p class="text-primary">{{ $barang->jumlah }} in Stock!</p>
                    @elseif (($barang->jumlah === 0))
                        <p class="text-danger">Item is Out of Stock!</p>
                    @endif
                    <h5>Rp. {{ $barang->harga }}</h5>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Quantity</span>
                    <input name="jumlah" type="number" class="form-control" min="1" max="{{ $barang->jumlah }}" required>
                    <input name="id_barang" type="hidden" value="{{ $barang->id }}">
                    @if ($barang->jumlah > 0)
                        <button type="submit" class="btn btn-success">Add to Cart</button>
                    @elseif (($barang->jumlah === 0))
                        <button type="button" class="btn btn-secondary" disabled>Add to Cart</button>
                    @endif
                </div>
            </form>
        </div>
        </div>
        @endforeach
        </div>
    </div>
    </table>
@stop