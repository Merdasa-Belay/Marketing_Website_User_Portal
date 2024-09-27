<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <!-- Bootstrap cdn -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    {{-- login stylesheet --}}
    <link rel="stylesheet" href="{{ asset('assets/css/login_style.css') }}">

</head>

<body>
    {{--  logo --}}
    <div class="logo-image mb-3">
        <img src="{{ asset('assets/profile_pic/dascena.png') }}" class="img-fluid" style="height: 56px">
    </div>

    {{-- login form --}}
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="login-form d-grid justify-center align-items-center">
            {{-- login header --}}
            <div class="login">
                <p class="text-black login-header">Login</p>
                <span id="login-message">Login securely to your account.</span>
            </div>

            <div class="login-forms">
                <!--Email address  -->
                <div id="login-input" class="form-group">
                    <label id="login-name" class="form-label">Email address</label>


                    <input type="text" class="form-control" name="email" aria-describedby="passwordHelpBlock"
                        placeholder="Email address">

                </div>
                <!--  Password -->
                <div class="form-group password-container">
                    <label id="login-name" for="inputPassword5" class="form-label">Password <span
                            id="forget-password">Forgot password</span></label>

                    <input id="password" type="password" class="form-control" name="password"
                        aria-describedby="passwordHelpBlock" required>

                    <i onclick="showPassword()" id="toggler"class=" far fa-eye"></i>


                </div>


            </div>

            <div class="agreement">By logging in, you agree to dascena <span id='terms-policy'>Terms and Privacy
                    Policy.</span>
            </div>
            {{-- Login button --}}

            <button id="login-btn" type="submit" class="btn btn-primary">Login to your account</button>
        </div>

    </form>
    <p class="new-user">New to dascena? <a id="register-link" href="{{ route('register') }}">Register</a>
    </p>


    </div>


</body>

<script src="{{ asset('assets/js/login.js') }}"></script>

</html>
