@extends('layout')
@section('content')
<style>
    .content-row:hover {
        background-color: #ebebeb;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Resources') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Resources</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-solid">
                <div class="card-header">
                    <!-- <a href="#" class="btn btn-info" data-toggle="modal" data-target="#resource-modal"><i class="fa fa-plus"></i> Add Resource</a> -->
                </div>
                @if(count($resources) > 0)
                <div class="card-body pb-0">
                    <div class="row">
                        @foreach($resources as $resource)
                        <div class="col-12 col-xs-4 col-sm-4 col-md-4">
                            <div class="card bg-light">
                                <div class="card-header">
                                    {{ $resource->title }}
                                </div>
                                <!-- /.card-header -->

                                <!-- card-body -->
                                <div class="card-body pt-0">
                                    <iframe class="card-img-top" src="{{ $resource->video_path }}" allowfullscreen></iframe>
                                </div>

                                <div class="card-body pt-0">
                                    <a href="{{ $resource->document_path }}" target="_blank">View Document</a>
                                </div>

                                <!-- /card-body -->
                                <div class="card-footer">
                                    <span class="font-weight-light">{{ $resource->description }}</span>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center mb-n3">
                        {{ $resources->links() }}
                    </div>
                </div>
                @else
                <div class="text-left">
                    No resources loaded
                </div>
                @endif
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="description-modal">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #4ba1e2;">
            <div class="modal-header">
                <h4 class="modal-title">Video Description</h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" id="modal_description" rows="8" readonly></textarea>
                </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
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