<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="formBox">
        <h1>Login</h1>
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
        <a href="/">Don't have an account yet? Register</a>
        <button type="submit" class="loginBttn">Login</button>
    </div>
</body>
</html>