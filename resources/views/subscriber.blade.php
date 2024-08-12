<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subscriber</title>
    {{-- Bootstraop --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    {{-- stylesheet --}}

    <link rel="stylesheet" href="{{ asset('assets/css/subscriber.css') }}">
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ 'assets/image/DataDudu_3.png' }}" alt="Logo" width="200" height="50"
                    class="d-inline-block align-text-top">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                            <a class="nav-link" href="#">Joe Bloggs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img id="profile-pic" src="{{ asset('assets/image/joseph.jpg') }}" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    {{-- profile detail --}}

    <div id="dashboard" class="container  min-vh-100">
        <div class="container-fluid">
            <div class="detail-profile">
                <h1 id="detail"> My detail</h1>
            </div>

            <div class="d-flex align-items-center justify-center">
                <div id="left-box">

                    <p id="detail2">Personal details</p>
                    <p id="update-message">Update your personal details here.</p>

                </div>
                <div id="right-box">
                    <p id="securty-detail">Security details</p>
                    <p id="update-message">Update your personal details here.</p>
                </div>

            </div>
        </div>
    </div>

</body>
{{-- Bootstrap script --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
