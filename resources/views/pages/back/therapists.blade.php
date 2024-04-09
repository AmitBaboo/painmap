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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                    <div class="table responsive">
                        <table id="therapistsTable" class="table table-hover">
                            <thead>
                                <th>Company Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Post Code</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @if (count($therapists) > 0 )
                                @foreach($therapists ?? '' as $therapist)
                                <tr>
                                    <td>{{$therapist->full_name ?? "" }}</td>
                                    <td>{{$therapist->contact_number ?? '' }}</td>
                                    <td>{{$therapist->email ?? "" }}</td>
                                    <td>{{$therapist->post_code ?? "" }}</td>
                                    <td>
                                        <span class="badge badge-success">{{ $therapist->status_name }}</span>
                                    </td>
                                    <td>
                                        <button onclick="showTherapistEditModal('{{ $therapist->id }}')" class="btn btn-sm btn-primary">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end row of content-->
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="therapist-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #4ba1e2;">
            <div class="modal-header">
                <h4 class="modal-title">Add Therapist</h4>
            </div>
            <div class="modal-body">
                <form id="addTherapistsBack">
                    @csrf
                    <div class="form-group">
                        <label for="full_name">Company Name</label>
                        <input type="hidden" name="status" id="status" value="1" />
                        <input class="form-control" name="full_name" id="full_name" placeholder="eg: TruePhysio" type="text" :value="old('full_name')" required autofocus autocomplete="first_name">
                    </div>


                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="contactNumber">Contact Number</label>
                                <input class="form-control" name="contact_number" id="contact_number" placeholder="eg: +44 7911 123456" type="text" required autocomplete="contact_number">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="postCode">Post Code</label>
                                <input class="form-control" name="post_code" id="post_code" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask placeholder="eg: SW1W 0NY" type="text" required autocomplete="post_code">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="emailAddress">Email Address</label>
                        <input class="form-control" name="email" id="email" placeholder="eg: jamessmith@domain.com" type="text" required autocomplete="email">
                    </div>

                    <!--/.form-group-->
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" name="password" id="password" placeholder="Type your password" type="password" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <input class="form-control" name="password_confirmation" id="confirmPassword" placeholder="Confirm password" type="password" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light" form="addTherapistsBack"> <i class="fa fa-plus-circle"></i> Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Update User Modal -->
<div class="modal fade" id="edit-therapist-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="background-color: #4ba1e2;">
            <div class="modal-header">
                <h4 class="modal-title">User Information</h4>
            </div>
            <div class="modal-body">
                <form id="editTherapists">

                    <div class="user-image mt-1">
                        <img width="128px" class="brand-image img-circle elevation-2" id="user_image" src="" alt="">
                        <input type="file" class="d-none" accept="image/*" name="user_photo" id="user_photo" />
                    </div>

                    <hr style="border-color: white;">

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
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
                                <label>Company Website</label>
                                <input class="form-control" name="website" type="text" id="info_website" placeholder="Company Website" value="" required />
                            </div>

                            <div class="form-group">
                                <label for="emailAddress">Email Address</label>
                                <input class="form-control" name="email" id="edit_email" placeholder="eg: jamessmith@domain.com" type="text" required autocomplete="email">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Company Bio</label>
                                <textarea class="form-control" name="company_bio" rows="8" id="company_bio" placeholder="Company Bio" required style="height: 210px;">{{ $user->company_bio ?? '' }}</textarea>
                            </div>


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

                    <div class="form-group">
                        <button class="btn btn-outline-light float-left ml-2" id="load_photo" type="button">Load Photo</button>
                        <button type="button" class="btn btn-outline-light ml-2 float-right" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light float-right" form="editTherapists"> <i class="fa fa-plus-circle"></i> Save</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@push('layout-js')
<script src="{{ asset('assets/back/customers.js') }}"></script>
<script src="{{ asset('assets/back/profile.js') }}"></script>
@endpush

@endsection