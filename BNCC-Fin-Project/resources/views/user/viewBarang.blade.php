@extends('layout.user')

@section('content')
    <table class="table">
    <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Sort by Kategori
    </button>
    <ul class="dropdown-menu">
        @foreach ($kategoris as $kategori)
        <li><a class="dropdown-item" href="#">{{ $kategori->nama_kategori }}</a></li>
        @endforeach
    </ul>
    </div>
    <div class="container text-center">
        <div class="row">
        @foreach ($barangs as $barang)
        <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
            <div class="col">
                <h4>{{ $barang->nama }}</h6>
                <img src="{{ asset( 'storage/Image/'.$barang->foto ) }}" alt="Error" style="height: 150px" >
                <p class="text-danger">{{ $barang->jumlah }} in Stock!</p>
                <h5>Rp. {{ $barang->harga }}</h5>
            </div>      
            <form action="" method="">
                @csrf
                @method('')
                <button action="#" type="submit" class="btn btn-success">Add to Cart</button>
            </form>
        </div>
        </div>
        @endforeach
        </div>
    </div>
    </table>
@stop