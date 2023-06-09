@extends('layout.user')

@section('content')
    <div class="container col-md-6 rounded-4" style="padding-top: 90px;">
        <div class="card shadow rounded-4" style="border: 0; box-shadow: none;">
            <div class="card-header text-center fw-bold bg-dark text-light border-dark rounded-top-4"><h3>{{ __('Transaction History') }}</h3> </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Invoice Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Postal Code</th>
                            <th scope="col">Date Time</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->nomor_invoice }}</td>
                            <td>{{ $transaction->alamat }}</td>
                            <td>{{ $transaction->kode_pos }}</td>
                            <td>{{ $transaction->created_at }}</td>
                            <td>Rp. {{ number_format($transaction->total, 2) }}</td>
                            <td>
                                <form action="{{route('getTransaction', ['id' => $transaction->id])}}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-primary col-md">See Detail</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('downloadInvoice', ['id' => $transaction->id])}}" class="btn btn-primary col-md"><i class="bi bi-box-arrow-in-down"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop