@extends('layout.user')
@section('content')
    <a href="{{route('transactionHistory', ['id' => auth()->user()->id])}}" class="btn btn-primary m-2"><i class="bi bi-arrow-90deg-left"></i> Go Back</a>
    <div class="container col-md-6 rounded-top-4" style="padding-top: 20px">
        <div class="card shadow rounded-top-4">
            <div class="card-body bg-dark rounded-top-4">
                <div class="card-header text-center text-light bg-secondary"><h1>{{ $transaction->nomor_invoice }}</h1></div>
                <table class="table">
                    <thead>
                        <tr class="text-light">
                            <th scope="col">Barang</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    @foreach ($tdetails as $tdetail)
                    <tbody class="table-group-divider bg-light">
                        <tr class="text-light bg-secondary">
                            <td>{{ $tdetail->nama }}</td>
                            <td>{{ $tdetail->kategori }}</td>
                            <td>Rp. {{ $tdetail->harga }}</td>
                            <td>{{ $tdetail->jumlah }}</td>
                            <td class="fw-bold">Rp. {{ $tdetail->jumlah * $tdetail->harga }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="bg-dark">
                    <div class="input-group">
                        <h6 class="input-group-text form-control ms-5 text-start">Shipping Address : </h6>
                        <h6 class="form-control me-5 text-end fw-bold">{{ $transaction->alamat }}</h6>
                    </div>
                    <div class="input-group mb-3">
                        <h6 class="input-group-text form-control ms-5 text-start">Postal Code : </h6>
                        <h6 class="form-control me-5 text-end fw-bold">{{ $transaction->kode_pos }}</h6>
                    </div>
                    <h3 class="text-end mb-3 me-5 text-light">Total : Rp. {{ $transaction->total }}</h3>
                </div>
            </div>
        </div>
    </div>
@stop