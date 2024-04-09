@extends('layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Therapists') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Therapists</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card card-widget">
                <div class="card-header">
                    <div class="user-block">
                        <div class="float-right">
                            <button class="btn btn-info" data-toggle="modal" data-target="#therapist-modal"><i class="fa fa-plus"></i> Add Therapist</button>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body">

                    <form id="editTherapists">
                        <input type="hidden" name="therapist_id" id="therapist_id">
                        <div class="form-group">
                            <label for="full_name">Company Name</label>
                            <input class="form-control" name="full_name" id="edit_full_name" placeholder="eg: TruePhysio" type="text" :value="old('full_name')" required autofocus autocomplete="first_name">
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="contactNumber">Contact Number</label>
                                    <input class="form-control" name="contact_number" id="edit_contact_number" placeholder="eg: +44 7911 123456" type="text" required autocomplete="contact_number">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="postCode">Post Code</label>
                                    <input class="form-control" name="post_code" id="edit_post_code" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask placeholder="eg: SW1W 0NY" type="text" required autocomplete="post_code">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="emailAddress">Email Address</label>
                            <input class="form-control" name="email" id="edit_email" placeholder="eg: jamessmith@domain.com" type="text" required autocomplete="email">
                        </div>

                        <!--/.form-group-->
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="edit_status" name="status">
                                        <option>Select status ...</option>
                                        <option value="0">Registered</option>
                                        <option value="1">Inactive</option>
                                        <option value="2">Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>

@push('layout-js')
<script src="{{ asset('assets/back/customers.js') }}"></script>
@endpush

@endsection


<div class="modal fade" id="edit-therapist-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #4ba1e2;">
            <div class="modal-header">
                <h4 class="modal-title">Edit Therapist</h4>
            </div>
            <div class="modal-body">
                <form id="editTherapists">
                    <input type="hidden" name="therapist_id" id="therapist_id">
                    <div class="form-group">
                        <label for="full_name">Company Name</label>
                        <input class="form-control" name="full_name" id="edit_full_name" placeholder="eg: TruePhysio" type="text" :value="old('full_name')" required autofocus autocomplete="first_name">
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="contactNumber">Contact Number</label>
                                <input class="form-control" name="contact_number" id="edit_contact_number" placeholder="eg: +44 7911 123456" type="text" required autocomplete="contact_number">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="postCode">Post Code</label>
                                <input class="form-control" name="post_code" id="edit_post_code" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask placeholder="eg: SW1W 0NY" type="text" required autocomplete="post_code">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="emailAddress">Email Address</label>
                        <input class="form-control" name="email" id="edit_email" placeholder="eg: jamessmith@domain.com" type="text" required autocomplete="email">
                    </div>

                    <!--/.form-group-->
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="edit_status" name="status">
                                    <option>Select status ...</option>
                                    <option value="0">Registered</option>
                                    <option value="1">Inactive</option>
                                    <option value="2">Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light" form="editTherapists"> <i class="fa fa-plus-circle"></i> Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->