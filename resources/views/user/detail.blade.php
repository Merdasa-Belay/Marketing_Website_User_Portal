@extends('layouts.navbar')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/my_detail.css') }}">

    <div class="container-fluid user-dashboard">
        <h1 class="my-detail">My details</h1>

        <div class="row">
            {{-- left box --}}
            <div class="col-lg-6 left-box">
                {{-- left box header --}}
                <div class="left-header">
                    <p id="personal-detail">Personal details</p>
                    <p id="update-message">Update your personal details here.</p>
                </div>

                <form action="{{ route('customers.update', ['customer' => $customer->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="left-body">
                        {{-- profile picture --}}
                        <div class="profile-picture">
                            <img id="pic-edit" src="{{ asset('assets/image/joseph.jpg') }}" alt="Profile Picture">
                            <div class="change-pic">
                                <i class="fa fa-camera camera-plus"></i>
                            </div>
                            <a class="change" href="#">Change</a>
                        </div>

                        {{-- title --}}
                        <select class="form-select form-select-lg mb-3 name-title" aria-label="Select title" name="title">
                            <option value="Mr" {{ $customer->title === 'Mr' ? 'selected' : '' }}>Mr</option>
                            <option value="Mrs" {{ $customer->title === 'Mrs' ? 'selected' : '' }}>Mrs</option>
                        </select>

                        {{-- Full name --}}
                        <div class="form-group">
                            <label for="fullname" class="form-label register-name">Full name</label>
                            <input type="text" class="form-control" id="fullname" name="fullname"
                                value="{{ old('fullname', $customer->fullname) }}" placeholder="First and last name"
                                required>
                        </div>

                        {{-- Select country --}}
                        <div class="form-group">
                            <label for="country" class="form-label register-name">Country</label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="{{ $customer->country }}" selected>{{ $customer->country }}</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Uganda">Uganda</option>
                            </select>
                        </div>

                        {{-- Phone number --}}
                        <div class="form-group">
                            <label for="phone" class="form-label register-name">Phone number</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                value="{{ old('phone', $customer->phone) }}" placeholder="Phone number" required>
                        </div>

                        {{-- Email address --}}
                        <div class="form-group">
                            <label for="email" class="form-label register-name">Email address</label>
                            <input id="email" type="email" class="form-control" name="email"
                                value="{{ old('email', $customer->email) }}" placeholder="email@example.com" required>
                        </div>

                        {{-- Save Changes button --}}
                        <button id="save-btn1" type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>

            {{-- right box --}}
            <div class="col-lg-6 right-box">
                {{-- right header --}}
                <div class="right-header">
                    <p class="security-detail">Security details</p>
                    <p id="update-message">Update your security details here.</p>
                </div>

                {{-- right body --}}
                <form action="{{ route('customers.updatePassword', ['customer' => $customer->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    <div class="right-body">
                        {{-- Current Password --}}
                        <div class="form-group form-input">
                            <label for="currentpassword" class="form-label register-name">Current password</label>
                            <input id="currentpassword" type="password" class="form-control" name="currentpassword"
                                placeholder="Enter current password" required>
                            <i onclick="currentPassword()" id="toggler" class="far fa-eye"></i>
                            <p id="passwordHelpBlock" class="form-text">Must be at least 8 characters.</p>
                        </div>

                        {{-- New Password --}}
                        <div class="form-group form-input">
                            <label for="newpassword" class="form-label register-name">New password</label>
                            <input id="newpassword" type="password" class="form-control" name="newpassword"
                                placeholder="Enter new password" required>
                            <i onclick="newPassword()" id="newtoggler" class="far fa-eye"></i>
                        </div>

                        {{-- Confirm Password --}}
                        <div class="form-group form-input">
                            <label for="confirmpassword" class="form-label register-name">Confirm password</label>
                            <input id="confirmpassword" type="password" class="form-control"
                                name="newpassword_confirmation" placeholder="Confirm new password" required>
                            <i onclick="confirmPassword()" id="confirmtoggler" class="far fa-eye"></i>
                        </div>

                        {{-- Save Changes button --}}
                        <button id="save-btn2" type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/subscribe.js') }}"></script>
@endsection
