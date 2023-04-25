@extends('layout.user')
@section('content')
    <div style="padding-top: 90px">
        <a href="{{route('transactionHistory', ['id' => auth()->user()->id])}}" class="btn btn-success mx-3"><i class="bi bi-arrow-90deg-left"></i> Go Back</a>
    </div>
    <div class="position-absolute top-0 start-50 translate-middle-x container d-flex justify-content-center rounded-4" style="padding-top: 90px">
        <div class="card shadow rounded-4">
            <div class="card-body rounded-4">
                <div class="mx-5">
                    <h1 class="text-center mt-4">{{ $transaction->nomor_invoice }}</h1>
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Barang</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    @foreach ($tdetails as $tdetail)
                    <tbody class="table-group-divider bg-light">
                        <tr>
                            <td>{{ $tdetail->nama }}</td>
                            <td>{{ $tdetail->kategori }}</td>
                            <td>Rp. {{ $tdetail->harga }}</td>
                            <td>{{ $tdetail->jumlah }}</td>
                            <td class="fw-bold">Rp. {{ $tdetail->jumlah * $tdetail->harga }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row ms-5">
                            <div class="col">
                                <h6>Shipping Address : </h6>
                            </div>
                            <div class="col">
                                <h6 class="fw-bold text-end">{{ $transaction->alamat }}</h6>
                            </div>
                        </div>

                        <div class="row ms-5">
                            <div class="col">
                                <h6>Postal Code : </h6>
                            </div>
                            <div class="col">
                                <h6 class="fw-bold text-end">{{ $transaction->kode_pos }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 d-flex align-items-center justify-content-center">
                        <img class="img-fluid" src="{{ asset( 'storage/user/invoice_illustration.png' ) }}" alt="Error" >
                    </div>
                </div>
                <h3 class="text-end mb-3 me-5 ">Total : Rp. {{ $transaction->total }}</h3>
            </div>
        </div>
    </div>
@stop