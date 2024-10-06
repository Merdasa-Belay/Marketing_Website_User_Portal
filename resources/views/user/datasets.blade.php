<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('assets/css/datasets.css') }}">
    <!-- Include any other CSS links -->
</head>

<body>
    @include('layouts.navbar')
    <div class="container datasets">
        @include('layouts.card')
    </div>
</body>

</html>
