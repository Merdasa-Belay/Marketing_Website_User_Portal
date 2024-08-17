@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/subscriber.css') }}">

    @foreach ($customers as $customer)
        {{-- Profile Detail --}}
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- If updating the customer --}}
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
                                    <img id="pic-edit" src="{{ asset('assets/image/joseph.jpg') }}" alt="Profile Picture">
                                    <div class="change-pic">
                                        <!-- SVG icon -->
                                        <i class="fa fa-camera camera-plus"></i>
                                    </div>
                                    <a class="change" href="#">Change</a>
                                </div>
                                <select class="form-select form-select-lg mb-3 name-title" aria-label="Large select example"
                                    name="title">
                                    <option class="title-option" selected>{{ $customer->title }}</option>
                                    <option class="title-option">Mr</option>
                                    <option class="title-option">Mrs</option>
                                </select>
                                <!-- Full name -->
                                <div class="form-group">
                                    <label for="fullname" id="login-name" class="form-label register-name">Full name</label>
                                    <input type="text" class="form-control form-placehoder" id="fullname"
                                        name="fullname" value="{{ $customer->name }}" placeholder="First and last name">
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
                                    <input type="text" class="form-control form-placehoder" id="phone" name="phone"
                                        value="{{ $customer->phone }}" placeholder="Phone number">
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
                                    <label for="currentpassword" class="form-label register-name">Current password</label>
                                    <input id="currentpassword" type="password" class="form-control" name="password"
                                        placeholder="Enter current password">
                                    <i onclick="currentPassword()" id="toggler" class="far fa-eye"></i>
                                    <div id="passwordHelpBlock" class="form-text">
                                        Must be at least 8 characters.
                                    </div>
                                </div>
                                <!-- New Password -->
                                <div class="form-group form-input">
                                    <label for="newpassword" class="form-label register-name">New password</label>
                                    <input id="newpassword" type="password" class="form-control" name="newpassword"
                                        placeholder="Enter new password">
                                    <i onclick="newPassword()" id="newtoggler" class="far fa-eye"></i>
                                </div>
                                <!-- Confirm Password -->
                                <div class="form-group form-input">
                                    <label for="confirmpassword" class="form-label register-name">Confirm password</label>
                                    <input id="confirmpassword" type="password" class="form-control"
                                        name="confirmpassword" placeholder="Confirm new password">
                                    <i onclick="confirmPassword()" id="confirmtoggler" class="far fa-eye"></i>
                                </div>
                                <!-- Save Changes button -->
                                <button id="save-btn" type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach

    <script src="{{ asset('assets/js/subscribe.js') }}"></script>
@endsection
