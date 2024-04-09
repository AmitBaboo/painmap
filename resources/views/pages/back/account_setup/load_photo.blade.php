@extends('setup')
@section('content')

<div class="container">

    <div class="login-box img-center">
        <div class="login-logo mt-2">
            <img id="user_image" src="{{ $photo }}" width="200px" height="200px" class="brand-image img-circle elevation-2" alt="PainMap" alt="User Image">
        </div>
        <div class="card card-outline card-primary mt-n1">
            <div class="card-body">

                <h5 class="login-box-msg font-weight-light">
                    {{ __('Please add a profile picture.  This is the picture prospective patients will see when we recommend you.  It can be your logo, your clinic or your smiling face.  Recommended image dimensions 128 x 128px.') }}
                </h5>

                <form id="load_photo">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <input type="file" accept="image/*" class="d-none" name="user_photo" id="user_photo" />
                            <div class="form-group">
                                <button class="btn btn-outline-primary float-left" id="btn_photo" type="button">Upload Photo</button>
                                <a href="/dashboard" class="btn btn-primary float-right disabled" id="next">Next</a>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection