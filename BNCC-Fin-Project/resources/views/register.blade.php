<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="formBox">
        <h1>Register</h1>
        <div class="mb-3">
            <label for="Nama">Nama Lengkap</label>
            <input name="Nama" type="text" class="form-control" id="formGroupExampleInput" placeholder="Insert your full name">
            @error('Nama')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Email">Email</label>
            <input name="Email" type="text" class="form-control" id="formGroupExampleInput" placeholder="Insert your Email">
            @error('Email')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Password">Password</label>
            <input name="Password" type="text" class="form-control" id="formGroupExampleInput" placeholder="Insert Password">
            @error('Password')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Nomor">Handphone Number</label>
            <input name="Nomor" type="text" class="form-control" id="formGroupExampleInput" placeholder="Insert your Phone Number">
            @error('Nomor')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <a href="/Login">Already has an account? Sign In</a>
        <button type="submit" class="submitBttn">Submit</button>
    </div>
</body>
</html>