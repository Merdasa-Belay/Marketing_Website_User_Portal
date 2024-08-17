<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subscriber</title>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Custom Stylesheet --}}
    <link rel="stylesheet" href="{{ asset('assets/css/subscriber.css') }}">

    {{-- Inter Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
</head>

<body>
    @foreach ($customers as $customer)
        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/image/DataDudu_3.png') }}" alt="Logo" width="200" height="50"
                        class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">My Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">My Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Datasets</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i id="toggle" class="fa-solid fa-gear"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i id="toggle" class="fa-regular fa-bell"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ $customer->name }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <img id="profile-pic" src="{{ asset('assets/image/joseph.jpg') }}"
                                        alt="Profile Picture">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        {{-- Profile Detail --}}
        <form action="{{ route('customers.show', $customer->id) }}" method="POST">
            @csrf
            <div id="dashboard" class="container min-vh-100">
                <div class="container-fluid">
                    <div class="detail-profile">
                        <h1 id="detail">My detail</h1>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="left-box">
                            <div class="left-header">
                                <p id="detail2">Personal details</p>
                                <p id="update-message">Update your personal details here.</p>
                            </div>
                            <div class="left-body">
                                <div class="profile-picture">
                                    <img id="pic-edit" src="{{ asset('assets/image/joseph.jpg') }}"
                                        alt="Profile Picture">
                                    <div class="change-pic">
                                        <svg class="camera-plus" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M324.3 64c3.3 0 6.3 2.1 7.5 5.2l22.1 58.8H464c8.8 0 16 7.2 16 16v288c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V144c0-8.8 7.2-16 16-16h110.2l20.1-53.6c2.3-6.2 8.3-10.4 15-10.4h131m0-32h-131c-20 0-37.9 12.4-44.9 31.1L136 96H48c-26.5 0-48 21.5-48 48v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V144c0-26.5-21.5-48-48-48h-88l-14.3-38c-5.8-15.7-20.7-26-37.4-26zM256 408c-66.2 0-120-53.8-120-120s53.8-120 120-120 120 53.8 120 120-53.8 120-120 120zm0-208c-48.5 0-88 39.5-88 88s39.5 88 88 88 88-39.5 88-88-39.5-88-88-88z" />
                                        </svg>
                                    </div>
                                    <a class="change" href="#">Change</a>
                                </div>
                                <select class="form-select form-select-lg mb-3 name-title"
                                    aria-label="Large select example" name="title">
                                    <option class="title-option" selected>{{ $customer->title }}</option>
                                    <option class="title-option">Mr</option>
                                    <option class="title-option">Mrs</option>
                                </select>
                                <!-- Full name -->
                                <div class="form-group">
                                    <label for="fullname" id="login-name" class="form-label register-name">Full
                                        name</label>
                                    <input type="text" class="form-control form-placehoder" id="fullname"
                                        name="fullname" value="{{ $customer->name }}"
                                        placeholder="First and last name">
                                </div>
                                <!-- Select country -->
                                <div class="form-group">
                                    <label for="country" class="form-label register-name">Country</label>
                                    <select class="form-select" id="country" name="country">
                                        <option selected class="selected">{{ $customer->country }}</option>
                                        <option>Ethiopia</option>
                                        <option>Kenya</option>
                                        <option>Uganda</option>
                                    </select>
                                </div>
                                {{-- Phone number --}}
                                <div class="form-group">
                                    <label for="phone" id="login-name" class="form-label register-name">Phone
                                        number</label>
                                    <input type="text" class="form-control form-placehoder" id="phone"
                                        name="phone" value="{{ $customer->phone }}" placeholder="Phone number">
                                </div>
                                {{-- Email address --}}
                                <div class="form-group">
                                    <label for="email" class="form-label register-name">Email address</label>
                                    <input id="email-field" type="email" class="form-control form-placehoder"
                                        id="email" name="email" value="{{ $customer->email }}"
                                        placeholder="email@example.com">
                                </div>
                                <!-- Save Changes button -->
                                <button id="save-btn" type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                        <div class="right-box">
                            <div class="right-header">
                                <p id="security-detail">Security details</p>
                                <p id="update-message">Update your personal details here.</p>
                            </div>
                            <div class="right-body">
                                <!-- Current Password -->
                                <div class="form-group form-input">
                                    <label for="currentpassword" class="form-label register-name">Current
                                        password</label>
                                    <input id="currentpassword" type="password" class="form-control" name="password"
                                        value="{{ $customer->password }}">
                                    <i onclick="currentPassword()" id="toggler" class="far fa-eye"></i>
                                    <div id="passwordHelpBlock" class="form-text">
                                        Must be at least 8 characters.
                                    </div>
                                </div>
                                <!-- New Password -->
                                <div class="form-group form-input">
                                    <label for="newpassword" class="form-label register-name">New password</label>
                                    <input id="newpassword" type="password" class="form-control" name="newpassword"
                                        value="{{ $customer->newpassword }}">
                                    <i onclick="newPassword()" id="newtoggler" class="far fa-eye"></i>
                                </div>
                                <!-- Confirm Password -->
                                <div class="form-group form-input">
                                    <label for="confirmpassword" class="form-label register-name">Confirm
                                        password</label>
                                    <input id="confirmpassword" type="password" class="form-control"
                                        name="confirmpassword" value="{{ $customer->confirmpassword }}">
                                    <i onclick="confirmPassword()" id="confirmtoggler" class="far fa-eye"></i>
                                    <!-- Save Changes button -->
                                    <button id="save-btn" type="submit" class="btn btn-primary">Save
                                        Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
</body>
{{-- Bootstrap script --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="{{ asset('assets/js/subscribe.js') }}"></script>

</html>
