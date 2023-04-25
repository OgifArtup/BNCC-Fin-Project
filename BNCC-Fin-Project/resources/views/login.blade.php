<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body class="bg-primary">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>{{ session('success') }}!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('errorLogin'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>{{ session('errorLogin') }}!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="position-absolute top-50 start-50 translate-middle container d-flex justify-content-center rounded-4" style="padding-top: 20px">
        <div class="card shadow rounded-4">
            <div class="card-body rounded-4">
                <div class="row">
                    <div class="col-lg-7">
                        <form action="{{ route('authenticate') }}" method="POST" enctype="multipart/form-data" class="m-5">
                            <h1 class="text-center">Login</h1>
                            @csrf
                            <div class="form-row mb-1">
                                <div class="p-2">
                                    <label for="email" class="mb-1">Email</label>
                                    <input name="email" type="text" class="form-control" id="formGroupExampleInput" autofocus placeholder="Insert your Email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-row mb-4">
                                <div class="p-2">
                                    <label for="password" class="mb-1">Password</label>
                                    <input name="password" type="password" class="form-control" id="formGroupExampleInput" placeholder="Insert Password">
                                    @error('password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-row mb-4 d-grid p-2">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
            
                            <p class="">Don't have an account yet? <a href="/register">Register Here</a></p>
                        </form>
                    </div>
                    <div class="col-lg-5 d-flex align-items-center justify-content-center">
                        <img class="img-fluid" src="{{ asset( 'storage/user/product_illustration.png' ) }}" alt="Error" >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>