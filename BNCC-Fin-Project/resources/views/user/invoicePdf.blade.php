<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
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
                            <td>Rp. {{ number_format($tdetail->harga, 2) }}</td>
                            <td>{{ $tdetail->jumlah }}</td>
                            <td class="fw-bold">Rp. {{ number_format($tdetail->jumlah * $tdetail->harga, 2) }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="bg-dark">
                    <h6 class="ms-5 text-start">Shipping Address : {{ $transaction->alamat }}</h6>
                    <h6 class="ms-5 text-start">Postal Code : {{ $transaction->kode_pos }}</h6>
                    <h3 class="text-end mb-3 me-5 text-light">Total : Rp. {{ number_format($transaction->total, 2) }}</h3>
                </div>
            </div>
    
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>