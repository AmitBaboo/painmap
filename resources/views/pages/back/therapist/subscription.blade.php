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
                    <h1>{{ __('Subscription Information') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Subscription Info</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="card card-widget shadow">
                        <div class="card-header" style="background-color: #00bc8b;">
                            <h3 class="card-title">Invoices</h3>
                        </div>
                        <div class="card-body">
                            <div class="table responsive">

                                <table id="therapistsTable" class="table table-hover">
                                    <thead>
                                        <th>Payment Date</th>
                                        <th>Amount Paid</th>
                                        <th>Download</th>
                                    </thead>
                                    <tbody>
                                        @foreach($invoices as $invoice)
                                        <tr>
                                            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                                            <td>{{ $invoice->total() }}</td>
                                            <td><a href="/user/invoice/{{ $invoice->id }}" target="_blank" class="justify-content-center mx-4"><i class="fas fa-download"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end row of content-->
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="card card-danger shadow">
                        <div class="card-header" style="background-color: #00bc8b;">
                            <h3 class="card-title">Plan Information</h3>
                        </div>
                        <div class="card-body">
                            @csrf
                            <h6>
                                Name<span class="float-right font-weight-normal">{{ $plan_details->name }}</span>
                            </h6>
                            <hr />
                            <h6>
                                Current Cost<span class="float-right font-weight-normal">{{ number_format($plan_details->cost, 2) }}</span>
                            </h6>
                            @if($date_due !== null)
                            <hr />
                            <h6>
                                Due date: <span class="float-right text-danger font-weight-normal">{{ $date_due }}</span>
                            </h6>
                            @endif
                            <hr />
                            <div class="row">
                                <div class="col-sm-12 float-left">
                                    <h6>Description</h6>
                                    <span class="text-justify">{!! $plan_details->description !!}</span>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group">
                                <button type="button" class="btn btn-outline-primary float-right shadow" id="cancel_subscription">{{ $button }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('layout-js')
<script src="{{ asset('assets/back/customers.js') }}"></script>
@endpush

@endsection