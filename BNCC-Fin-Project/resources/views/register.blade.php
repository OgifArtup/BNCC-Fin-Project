<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body class="bg-primary">
    <div class="position-absolute top-50 start-50 translate-middle justify-content-center rounded-4" style="padding-top: 20px">
        <div class="card shadow rounded-4">
            <div class="card-body rounded-4">
                <div class="row">
                    <h1 class="text-center mt-4">Register</h1>
                    <div class="col-lg-7">
                        <form action="{{ route('registerUser') }}" method="POST" enctype="multipart/form-data" class="m-5">
                            @csrf
                            <div class="form-row mb-1">
                                <div class="p-2">
                                    <label for="nama" class="mb-1">Nama Lengkap</label>
                                    <input name="nama" type="text" class="form-control" id="formGroupExampleInput" autofocus placeholder="Insert your full name" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-row mb-1">
                                <div class="p-2">
                                    <label for="email" class="mb-1">Email</label>
                                    <input name="email" type="text" class="form-control" id="formGroupExampleInput" value="{{ old('email') }}" placeholder="Insert your Email">
                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-row mb-1">
                                <div class="p-2">
                                    <label for="password" class="mb-1">Password</label>
                                    <input name="password" type="text" class="form-control" id="formGroupExampleInput" value="{{ old('password') }}" placeholder="Insert Password">
                                    @error('password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-row mb-4">
                                <div class="p-2">
                                    <label for="nomor" class="mb-1">Phone Number</label>
                                    <input name="nomor" type="text" class="form-control" id="formGroupExampleInput" value="{{ old('nomor') }}" placeholder="Insert your Phone Number (ex : 081234567890)">
                                    @error('nomor')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-row mb-4 d-grid p-2">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
            
                            <p class="">Already have an account? <a href="/">Sign In</a></p>
                        </form>
                    </div>
                    <div class="col-lg-5 d-flex align-items-center justify-content-center">
                        <img class="img-fluid" src="{{ asset( 'storage/user/signup_illustration.png' ) }}" alt="Error" >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>