@extends('layout')
@section('content')
<style>
    .content-row:hover {
        background-color: #ebebeb;
    }

    tr button.edit {
        display: none;
    }

    tr:hover button.edit {
        display: block;
        position: absolute;
        margin: auto;
        z-index: 555555555 !important;
    }

    tr:hover span.badge {
        opacity: 0;
        position: relative;
        /* display: none; */
        z-index: 555;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Assigned Customers') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Customers</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card card-widget">
                <div class="card-header">
                    <!-- <div class="user-block">
                        <div class="float-right">
                            <button class="btn btn-info" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-plus"></i></button>
                        </div>
                    </div> -->
                    <!-- /.user-block -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                            <i class="far fa-circle"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    @csrf
                    <div class="table responsive">
                        <table id="therapistCustomersTable" class="table table-hover">
                            <thead>
                                <th>Full Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Result</th>
                                <th>Post Code</th>
                                <th>Date Created</th>
                                <th>Set Status</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @if(count($customers) > 0 )
                                @foreach($customers as $customer)
                                <tr>
                                    <td>{{$customer->full_name}}</td>
                                    <td>{{ $customer->can_call == 1 ? $customer->contact_number : "" }}</td>
                                    <td>{{ $customer->can_email == 1 ? $customer->email : "" }}</td>
                                    <td>{{ $customer->result }}</td>
                                    <td>{{$customer->post_code}}</td>
                                    <td>{{$customer->created_at->format('j M, Y')}}</td>
                                    <td>
                                        <select id="status_{{ $customer->id }}" class="form-control">
                                            <option>Select status ...</option>
                                            <option value="0">Assigned</option>
                                            <option value="1">Contacted</option>
                                            <option value="2">Met Customer</option>
                                            <option value="3">Non contactable</option>
                                        </select>
                                    </td>
                                    <td>
                                        <span class="badge badge-success mt-n5">{{ $customer->status_name }}</span>
                                        <button onclick="updateStatus('{{ $customer->id }}')" class="btn btn-default rounded-circle edit mx-n2 mt-n4"><i class="far fa-edit"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!--end row of content-->
                </div>
            </div>

        </div>
    </section>

</div>

@push('layout-js')
<script src="{{ asset('assets/back/customers.js') }}"></script>
@endpush

@endsection