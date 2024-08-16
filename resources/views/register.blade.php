<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- inter font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Datadudu image -->
    <div id="image-dudu">
        <img id="datadudu-image" src="{{ asset('assets/image/DataDudu_3.png') }}" alt="">
    </div>

    <!-- Register form -->
    <form method="POST" action="{{ route('customers.store') }}">
        @csrf

        {{-- Header --}}
        <div class="container-fluid" id="register-form">
            <div class="first-line">
                <h2>Register for a DataTree account.</h2>
                <span id="lorem">Lorem ipsum dolor sit amet consectetur.</span>
            </div>

            <!-- Individual and corporate button -->
            <div class="topbuttons">
                <button id="individual" type="button" class="btn btn-primary btn-sm">Individual</button>
                <button id="corporate" type="button" class="btn btn-primary btn-sm">Corporate</button>
            </div>

            <!-- Title form -->
            <div class="form-group register-input">
                <label for="title" class="form-label register-name">Title</label>
                <select class="form-select" id="title" name="title">
                    <option selected>Select title</option>
                    <option>Mr</option>
                    <option>Mrs</option>
                </select>
            </div>

            <!-- Full name -->
            <div class="form-group register-input">
                <label for="fullname" class="form-label register-name">Full name</label>
                <input type="text" id="fullname" class="form-control" placeholder="First and last name"
                    name="fullname">
            </div>

            <!-- Select country -->
            <div class="form-group register-input">
                <label for="country" class="form-label register-name">Country</label>
                <select class="form-select" id="country" name="country">
                    <option selected>Select country</option>
                    <option>Ethiopia</option>
                    <option>Kenya</option>
                    <option>Uganda</option>
                </select>
            </div>

            <!-- Phone number -->
            <div class="form-group register-input">
                <label for="phone" class="form-label register-name">Phone number</label>
                <input type="text" id="phone" class="form-control" placeholder="Phone number" name="phone">
            </div>

            <!-- Email address -->
            <div class="form-group register-input">
                <label for="email" class="form-label register-name">Email address</label>
                <input type="text" id="email" class="form-control" placeholder="Email address" name="email">
            </div>

            <!-- Password -->
            <div class="form-group password-container">
                <label for="password" class="form-label register-name">Password</label>
                <input id="password" type="password" class="form-control" name="password">
                <i onclick="showHide()" id="toggler" class="far fa-eye"></i>
            </div>
            <div id="passwordHelpBlock" class="form-text">
                Must be at least 8 characters.
            </div>

            <!-- Confirm password -->
            <div class="form-group password-container">
                <label for="Confirmpassword" class="form-label register-name">Confirm password</label>
                <input id="Confirmpassword" type="password" class="form-control" name="confirmpassword">
                <i onclick="showPassword()" id="confirmtoggler" class="far fa-eye"></i>
            </div>

            <!-- Terms and policy -->
            <div class="terms-policy">
                By registering, you agree to DataDudu
                <span id="term">Terms and Privacy Policy.</span>
            </div>

            <!-- Register button -->
            <button id="register-btn" type="submit" class="btn btn-primary">Register</button>
        </div>

        <!-- Login link -->
        <div class="login">Already have an account?
            <a id="login-link" href="/customer_login">Login</a>
        </div>
    </form>

</body>

<script src="{{ asset('assets/js/register.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
