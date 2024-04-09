@extends('layout')
@section('content')

<style>
    .user-image {
        left: 50%;
        margin-left: -70px;
        position: relative;
        width: 90px;
        /* top: 80px; */
    }
</style>

@push('layout-css')
<link href="{{ asset('assets/back/profile.css') }}" rel='stylesheet' type='text/css'>
@endpush

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Profile') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user shadow">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header" style="background-color: #00bc8b;">
                            <h1 class="widget-user-username mt-2 text-white">{{ $user->full_name }}</h1>
                            <h5 class="widget-user-desc"></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="brand-image img-circle elevation-2" src="{{ auth()->user()->profilePhoto }}" alt="{{ auth()->user()->full_name }}">
                        </div>
                        <div class="card-footer text-white" style="background-color: #4ba1e2;">
                            <div class="float-left">
                                <h6>Contact Number</h6>
                                <span class="font-weight-light">{{ $user->contact_number }}</span>
                            </div>
                            <div class="float-right">
                                <h6>Post Code</h6>
                                <span class="font-weight-light">{{ $user->post_code }}</span>
                            </div>

                            <hr style="margin-top: 62px; border-color: white;" />

                            <h6>
                                Email <span class="float-right font-weight-light">{{$user->email}}</span>
                            </h6>

                            <hr style="border-color: white;">

                            <h6>
                                Company Website <span class="float-right font-weight-light">{{$user->website}}</span>
                            </h6>

                            <hr style="border-color: white;">

                            <div class="row">
                                <div class="col-sm-12 float-left">
                                    <h6>Company Bio</h6>
                                    <span class="text-justify font-weight-light">{!! $user->company_bio !!}</span>
                                </div>
                            </div>

                            <hr style="border-color: white;">

                            <div class="form-group">
                                <a href="#" class="btn btn-outline-light float-right shadow" data-toggle="modal" data-target="#update_user_modal">Edit</a>
                            </div>

                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>

                <div class="col-lg-6 col-12">
                    <!-- small box -->
                    <!-- DONUT CHART -->
                    <div class="card card-danger shadow">
                        <div class="card-header" style="background-color: #00bc8b;">
                            <h3 class="card-title">Change Password</h3>
                        </div>
                        <div class="card-body" style="background-color: #4ba1e2;">
                            <form id="change_password">
                                @csrf
                                <div class="form-group">
                                    <label class="text-white">Current Password</label>
                                    <input type="password" class="form-control" name="current_password" id="current_password" />
                                </div>
                                <div class="form-group">
                                    <label class="text-white">New Password</label>
                                    <input type="password" class="form-control" name="password" id="password" />
                                </div>
                                <div class="form-group">
                                    <label class="text-white">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" />
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-light float-right" type="submit" form="change_password">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-12">
                    <!-- small box -->
                    <!-- DONUT CHART -->
                    <div class="card card-danger shadow">
                        <div class="card-header" style="background-color: #00bc8b;">
                            <h3 class="card-title">Two Factor Authentication</h3>
                        </div>
                        <div class="card-body" style="background-color: #4ba1e2;">
                            <h4 class="text-white font-weight-light">
                                @if(auth()->user()->two_factor_secret)
                                {{ __('Two factor authentication is enabled.') }}
                                @else
                                {{ __('Two factor authentication is disabled.') }}
                                @endif
                            </h4>

                            <p class="text-white font-weight-light">
                                {{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}
                            </p>

                            @if(auth()->user()->two_factor_secret)
                            <p class="text-white font-weight-light">
                                {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application.') }}
                            </p>
                            <div class="mt-4">
                                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                            </div>

                            <p class="text-white mt-4">
                                {{ __('Please store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost..') }}
                            </p>
                            <div class="bg-light">
                                @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                                <div class="ml-2"><code>{{ trim($code) }}</code></div>
                                @endforeach
                            </div>
                            @endif

                            <form id="two_factor_enable">
                                @csrf
                                @if(auth()->user()->two_factor_secret)
                                @method("DELETE")
                                <button id="two_factor_disable_btn" type="button" class=" mt-2 btn btn-outline-light float-right">
                                    {{ __('Disable') }}
                                </button>
                                @else
                                @method("POST")
                                <button id="two_factor_enable_btn" type="button" class=" mt-2 btn btn-outline-light float-right">
                                    {{ __('Enable') }}
                                </button>
                                @endif

                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <!-- small box -->
                    <!-- DONUT CHART -->
                    <div class="card card-danger shadow">
                        <div class="card-header" style="background-color: #00bc8b;">
                            <h3 class="card-title">Browser Sessions</h3>
                        </div>
                        <div class="card-body" style="background-color: #4ba1e2;">
                            <p class="text-white font-weight-light">
                                {{ __('If necessary, you may logout of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
                            </p>

                            @foreach ($devices as $device)
                            <div class="card device">
                                <div class="card-body pt-0 mt-2">
                                    <h4 class="font-weight-light ml-n2"><b>{{ $device->platform}}</b></h4>
                                    <p class="mt-0 text-sm ml-n2"><b>{{ $device->browser }} -- </b> {{ $device->ip_address}}</p>
                                    <p class="text-muted mt-n2 ml-n2 text-sm">{{ Carbon\Carbon::parse($device->last_activity)->diffForHumans() }}</p>

                                    @if ($current_device == $device->id)
                                    <div class="text-right mb-n3" style="margin-top: -34px;">
                                        <h6 class="font-weight-light ml-n1 text-danger"><b>This device</b></h6>
                                    </div>
                                    @else
                                    <div class="text-right mt-n5">
                                        <a href="/logout-device/{{ $device->id }}" class="btn btn-sm btn-outline-danger">Remove</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="two_factor_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #4ba1e2;">
            <div class="modal-header">
                <h4 class="modal-title">Confirm Your Password</h4>
            </div>
            <div class="modal-body">
                <form id="confirm_password">
                    @csrf
                    <div class="form-group">
                        <label for="fullName">Confirm Password</label>
                        <input type="hidden" id="method" />
                        <input class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" type="password" required autofocus />
                        <p id="error_message" class="text-white"></p>
                    </div>

                </form>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Never Mind</button>
                <button type="submit" class="btn btn-outline-light" id="btn_confirm_password" form="confirm_password">Confirm Password</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Update User Modal -->
<div class="modal fade" id="update_user_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="background-color: #4ba1e2;">
            <div class="modal-header">
                <h4 class="modal-title">User Information</h4>
            </div>
            <div class="modal-body">
                <form id="user_info">
                    @csrf
                    <!-- <div class="card-widget widget-user shadow"> -->
                    <div class="user-image mt-1">
                        <img width="128px" class="brand-image img-circle elevation-2" id="user_image" src="{{ auth()->user()->profilePhoto }}" alt="{{ $user->first_name }}">
                        <input type="file" class="d-none" accept="image/*" name="user_photo" id="user_photo" />
                    </div>

                    <hr style="border-color: white;">

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" name="full_name" type="text" id="info_full_name" placeholder="{{ $user->account_type == 2 ? 'Company Name' : 'Full Name'}}" value="{{ $user->full_name }}" required />
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Contact Number</label>
                                    <input class="form-control" name="contact_number" type="text" id="info_contact" placeholder="Contact Number" value="{{ $user->contact_number }}" required />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Post Code</label>
                                    <input class="form-control" name="post_code" type="text" id="info_post_code" placeholder="Post Code" value="{{ $user->post_code }}" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Company Website</label>
                                <input class="form-control" name="website" type="text" id="info_website" placeholder="Company Website" value="{{ $user->website }}" required />
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" type="email" id="email" placeholder="Email" value="{{ $user->email }}" required />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Company Bio</label>
                                <textarea class="form-control" name="company_bio" rows="12" id="company_bio" placeholder="Company Bio" required>{{ $user->company_bio }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-outline-light float-left" id="load_photo" type="button">Load Photo</button>
                        <button class="btn btn-outline-light float-right" type="submit" form="user_info">Save</button>
                    </div>
                </form>
            </div>

            <!-- <div class="modal-footer justify-content-between">
                <button class="btn btn-outline-light float-left" id="load_photo" type="button">Load Photo</button>
                <button class="btn btn-outline-light float-right" type="submit" form="user_info">Save</button>
            </div> -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@push('layout-js')
<script src="{{ asset('assets/back/profile.js') }}"></script>
@endpush
@endsection