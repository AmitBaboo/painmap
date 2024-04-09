@extends('layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ ucfirst($page_uri) }} Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::to('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
    <section class="content">
  
      <div class="card card-widget">
        <div class="card-header">
          <div class="user-block">
            <div class="float-right">
              Plans Contents
              {{-- <button class="btn btn-info" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-plus"></i></button> --}}
            </div>
          </div>
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

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Plans</div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach($plans as $plan)
                                    <li class="list-group-item clearfix">
                                        <div class="pull-left">
                                            <h5>{{ $plan->name }}</h5>
                                            <h5>${{ number_format($plan->cost, 2) }} monthly</h5>
                                            <h5>{{ $plan->description }}</h5>
                                            <a href="{{ route('plans.show', $plan->slug) }}" class="btn btn-outline-dark pull-right">Choose</a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
  </section>
</div>
@endsection