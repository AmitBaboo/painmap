@extends('layout')
@section('content')
<style>
    .ctls {
        display: none;
    }

    .content-row:hover .ctls {
        display: block;
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
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#resource-modal"><i class="fa fa-plus"></i> Add Resource</a>
                    <form class="form-inline ml-3 float-right">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" id="search_value" aria-label="Search" name="search_value" placeholder="Search resource" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-search"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                @if(count($resources) > 0)
                <div class="card-body pb-0">
                    <div class="row">
                        @foreach($resources ?? '' as $resource)
                        <div class="col-12 col-xs-4 col-sm-4 col-md-4">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                    {{ $resource->title }}
                                </div>
                                <!-- card-body -->
                                <div class="card-body pt-0">
                                    <iframe class="card-img-top" src="{{ $resource->video_path }}" allowfullscreen></iframe>
                                </div>

                                <div class="card-body pt-0">
                                    <a href="{{ $resource->document_path }}" target="_blank">View Document</a>
                                </div>

                                <!-- /card-body -->
                                <div class="card-footer content-row">
                                    <span class="font-weight-light text-justify">{{ $resource->description }}</span>

                                    <div class="float-right btns ctls">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-info edit-link" onclick="getResource('{{ $resource->id }}')"><i class="far fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger del-link" onclick="deleteResource('{{ $resource->id }}')" id="deleteResource_{{ $resource->id }}"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
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

<div class="modal fade" id="resource-modal">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #4ba1e2;">
            <div class="modal-header">
                <h4 class="modal-title">Add Resource</h4>
            </div>
            <div class="modal-body">
                <form id="addResources" action="{{ url('/resources') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="resource_id" value="">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" name="title" id="title" placeholder="eg: Press up" type="text" :value="old('title')" required autofocus autocomplete="title">
                    </div>

                    <div class="form-group">
                        <label for="video_path">Video Path</label>
                        <input class="form-control" name="video_path" id="videoPath" placeholder="//www.youtube.com/embed/YE7VzlLtp-4" type="text" :value="old('video_path')" autofocus autocomplete="video_path">
                    </div>

                    <div class="form-group">
                        <label for="video_path">Document Path</label>
                        <input class="form-control" name="document_path" id="documentPath" placeholder="https://docs.google.com//..." type="text" :value="old('document_path')" autofocus autocomplete="document_path">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Video description" rows="5" required autocomplete=""></textarea>
                    </div>

                </form>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light" form="addResources"> <i class="fa fa-plus-circle"></i> Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="description-modal">
    <div class="modal-dialog modal-dialog-centered">
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