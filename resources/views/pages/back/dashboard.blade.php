@extends('layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ __('Dashboard') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ URL::to('/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $customers }}</h3>

              <p>Customers</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ auth()->user()->account_type === 1 ? url('/customers') : url('/assigned-customers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        @if(auth()->user()->account_type === 1)
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3 id="users">{{ $contact_us }}</h3>

              <p>Enquiries</p>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-stats-bars"></i> -->
              <i class="far fa-paper-plane"></i>
            </div>
            <a href="/contact-us" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $therapists }}</h3>

              <p>Therapists</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/therapists') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $email_subscribers }}</h3>

              <p>Email Subscribers</p>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-pie-graph"></i> -->
              <!-- <i class="ion ion-ios-email"></i> -->
              <i class="fas fa-at"></i>
              <!-- <ion-icon name="mail-outline"></ion-icon> -->
            </div>
            <a href="/email-subscription" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        @endif

      </div>

      <div class="row">
        <div class="col-lg-6 col-12">
          <!-- small box -->
          <!-- DONUT CHART -->
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Customer Distribution</h3>
            </div>
            <div class="card-body">
              <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        @if(auth()->user()->account_type === 1)
        <div class="col-lg-6 col-12">
          <!-- small box -->
          <!-- DONUT CHART -->
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Therapist Distribution</h3>
            </div>
            <div class="card-body">
              <canvas id="therapistChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        @endif
      </div>

    </div>
  </section>

</div>

@push('layout-js')
<script src="{{ asset('assets/back/dashboard.js') }}"></script>
@endpush

@endsection