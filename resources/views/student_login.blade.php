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
    {{-- Datadudu logo --}}
    <div class="logo-image mb-3">
        <img src="{{ asset('assets/image/DataDudu 3.png') }}" class="img-fluid" style="width: 224.49px" ">
    </div>

    {{-- login form --}}
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


    <input type="text" class="form-control" aria-describedby="passwordHelpBlock"
        placeholder="Email address">

</div>
 <!--  Password -->
 <div class="form-group password-container">
    <label id="login-name" for="inputPassword5" class="form-label">Password <span id="forget-password">Forgot password</span></label>

    <input type="password" class="form-control" aria-describedby="passwordHelpBlock" required>

    <i id="toggler"class=" far fa-eye"></i>


    </div>


    </div>

    <div class="agreement">By logging in, you agree to DataDudu <span id='terms-policy'>Terms and Privacy Policy.</span>
    </div>
    {{-- Login button --}}

    <button id="login-btn" type="button" class="btn btn-primary">Login to your account</button>
    </div>

    <p class="new-user">New to DataDudu? <span id="signup">Register</span></p>


    </div>


</body>

</html>
