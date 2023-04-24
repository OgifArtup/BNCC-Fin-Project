@extends('layout.user')

@section('content')
<div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
            <div class="card-header text-center">{{ __('Transaction History') }} </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                            <tr>
                                <th scope="col">Invoice Number</th>
                                <th scope="col">Address</th>
                                <th scope="col">Postal Code</th>
                                <th scope="col">Date Time</th>
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
                            <td>
                                <form action="{{route('getTransaction', ['id' => $transaction->id])}}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-primary col-md">See Detail</button>
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