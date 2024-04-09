@extends('layout')
@section('content')
<style>
    .content-row:hover {
        background-color: #ebebeb;
    }

    .content-row:hover {
        background-color: #ebebeb;
    }

    /* tr button.edit {
        display: none;
    }

    tr:hover button.edit {
        display: block;
        position: absolute;
        margin: auto;
        z-index: 555555555 !important;
    } */

    /* tr:hover span.badge {
        opacity: 0;
        position: relative;
        z-index: 555;
    } */
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Customers') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Customers</li>
                    </ol>
                </div>
            </div><!-- /.container-fluid -->
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card card-widget">
                <div class="card-header">
                    <div class="user-block">
                        <div class="float-right">
                            <button class="btn btn-info" data-toggle="modal" data-target="#customer-modal"><i class="fa fa-plus"></i> Add Customers</button>
                        </div>
                    </div>
                </div>

                <!-- card body -->
                <div class="card-body">
                    @csrf
                    <div class="table responsive">
                        <table id="customersTable" class="table table-hover">
                            <thead>
                                <th>Full Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Result</th>
                                <th>Post Code</th>
                                <th>Date Created</th>
                                <th>Assigned Therapist</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @if (count($customers) > 0 )
                                @foreach($customers ?? '' as $customer)
                                <tr>
                                    <td>{{ $customer->full_name }}</td>
                                    <td>{{ $customer->can_call == 1 ? $customer->contact_number : "" }}</td>
                                    <td>{{ $customer->can_email == 1 ? $customer->email : "" }}</td>
                                    <td>{{ $customer->result }}</td>
                                    <td>{{ $customer->post_code }}</td>
                                    <td>{{ $customer->created_at->format('j M, Y') }}</td>
                                    <td>{{ $customer->therapist }}</td>
                                    <td><span class="badge badge-success">{{ $customer->status_name }}</span></td>
                                    <td>
                                        @if($customer->therapist_id == 0)
                                        <button onclick="findAndAssignTherapist('{{ $customer->id }}')" class="btn btn-sm btn-primary"><i class="fas fa-user-md"></i></button>
                                        @endif
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

<div class="modal fade" id="customer-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #4ba1e2;">
            <div class="modal-header">
                <h4 class="modal-title">Add Customer</h4>
            </div>
            <div class="modal-body">
                <form id="addCustomers" action="{{ url('/customers') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input class="form-control" name="full_name" id="fullName" placeholder="eg: James Saith" type="text" :value="old('first_name')" required autofocus autocomplete="first_name">
                    </div>

                    <div class="form-group">
                        <label for="emailAddress">Email Address</label>
                        <input class="form-control" name="email" id="emailAddress" placeholder="eg: jamessmith@domain.com" type="text" required autocomplete="email">
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="contactNumber">Contact Number</label>
                            <input class="form-control" name="contact_number" id="contactNumber" placeholder="eg: +44 7911 123456" type="text" required autocomplete="contact_number">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="postCode">Post Code</label>
                            <input class="form-control" name="post_code" id="postCode" placeholder="eg: SW1W 0NY" type="text" required autocomplete="post_code">
                        </div>

                    </div>

                </form>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light" form="addCustomers"> <i class="fa fa-plus-circle"></i> Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('layout-js')
<script src="{{ asset('assets/back/customers.js') }}"></script>
@endpush

@endsection