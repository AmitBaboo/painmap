@extends('layout')
@section('content')
<style>
    .table-row:hover {
        background-color: blue;
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
                    <h1>{{ __('Contact Us Information') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Contact Us</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">

        <div class="container-fluid">
            <div class="card card-widget">
                <!-- <div class="card-header">
                    <div class="user-block">
                        <div class="float-right">
                            <button class="btn btn-info" data-toggle="modal" data-target="#therapist-modal"><i class="fa fa-plus"></i> Create Email</button>
                        </div>
                    </div>
                </div> -->
                <!-- /.card-header -->

                <div class="card-body">
                    <div class="table responsive">
                        <!-- @csrf -->
                        <table id="therapistsTable" class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date Sent</th>
                                <!-- <th>Actions</th> -->
                            </thead>
                            <tbody>
                                @if (count($contact_us_data) > 0 )
                                @foreach($contact_us_data ?? '' as $data)
                                <tr>
                                    <td>{{ $data->name ?? "" }}</td>
                                    <td>{{ $data->email ?? '' }}</td>
                                    <td>{{ $data->message ?? '' }}</td>
                                    <td>{{ $data->created_at->format('j M, Y') ?? "" }}</td>
                                    <!-- <td>
                                        <button class="btn btn-sm btn-primary rounded-circle edit mx-3 mt-n1">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </td> -->
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

@push('layout-js')
<script src="{{ asset('assets/back/customers.js') }}"></script>
@endpush

@endsection