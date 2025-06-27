<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PPSDM</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #b6e0ef, #ffffff);
            font-family: 'Arial', sans-serif;
        }

        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            gap: 50px;
            padding: 20px;
            flex-wrap: wrap;
        }

        .register-box {
            background-color: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .tab-switch {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .tab-switch button {
            padding: 10px 30px;
            border: none;
            font-weight: bold;
            border-radius: 20px;
        }

        .tab-login {
            background-color: transparent;
            border: 2px dashed #333;
            color: #333;
        }

        .tab-register {
            background-color: white;
            color: black;
            border: 2px solid #ccc;
            margin-left: 10px;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            background: linear-gradient(to right, #8fd1e7, #3e717a);
            border: none;
            border-radius: 10px;
        }

        .text-muted a {
            text-decoration: underline;
        }

        .side-info {
            text-align: center;
            background-color: #d9f1f8;
            border-radius: 25px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }

        .side-info h2 {
            font-weight: bold;
            color: #031f4b;
        }

        .side-info img {
            width: 100%;
            max-width: 300px;
            border-radius: 25px;
            margin-top: 20px;
            object-fit: cover;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-group label i {
            margin-right: 8px;
            color: #8fd1e7;
        }

        .alert {
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="register-container">
        <div class="register-box">
            <div class="tab-switch">
                <button class="tab-login" onclick="window.location.href='{{ url('/') }}'">Login</button>
                <button class="tab-register">Register</button>
            </div>

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form action="{{ route('actionregister') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                    @error('email')
                        <div class="invalid-feedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <input id="email" type="text" name="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email"
                        required="">
                </div>

                <div class="form-group">
                    <label for="password"><i class="fa fa-key"></i> Password</label>
                    @error('password')
                        <div class="invalid-feedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <input id="password" type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Enter Your Password"
                        required="">
                </div>

                <div class="form-group">
                    <label><i class="fa fa-address-book"></i> Role</label>
                    <input type="text" name="role" class="form-control" value="Guest" readonly>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-user"></i> Register
                </button>
                
                <p class="text-center text-muted mt-2">Do you have an account? <a href="{{ url('/') }}">Please Login</a></p>
            </form>
        </div>

        <div class="side-info">
            <h2><b>PPSDM</b></h2>
            <p><strong>Pengelolaan & Pebelajaran<br>Sumber Daya Manusia</strong></p>
            <img src="{{ asset('assets/images/logo-login.jpg') }}" alt="Logo Register">
        </div>
    </div>

</body>

</html>
