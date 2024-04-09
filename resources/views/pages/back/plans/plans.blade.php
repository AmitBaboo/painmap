@extends('layout')
@section('content')
<style>
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
    }

    tr:hover span.badge {
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
                    <h1>{{ __('Subscription Plans') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Plans</li>
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
                            <button onclick="showPlan()" class="btn btn-info"><i class="fa fa-plus"></i> Add Plans</button>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    @csrf
                    <div class="table responsive">
                        <table id="plansTable" class="table table-hover">
                            <thead>
                                <th>Plan Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Cost</th>
                                <th>Date Created</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @if(count($plans) > 0 )
                                @foreach($plans as $plan)
                                <tr>
                                    <td>{{ $plan->name }}</td>
                                    <td>{{ $plan->slug }}</td>
                                    <td>{{ $plan->description }}</td>
                                    <td>{{ $plan->cost }}</td>
                                    <td>{{ $plan->created_at ? $plan->created_at->format('j M, Y') : "" }}</td>
                                    <td>
                                        <button onclick="showPlan('{{ $plan->id }}')" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></button>
                                        <button onclick="deletePlan('{{ $plan->id }}')" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
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

<div class="modal fade" id="plans-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #4ba1e2;">
            <div class="modal-header">
                <h4 class="modal-title">Add Plans</h4>
            </div>
            <div class="modal-body">
                <form id="addPlans">
                    @csrf

                    <input type="hidden" id="plan_id" />
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="name">Name</label>
                            <input class="form-control" name="name" id="name" placeholder="eg: Premium" type="text" :value="old('name')" autofocus autocomplete="name">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="postCode">Cost</label>
                            <input class="form-control" name="cost" id="cost" placeholder="eg: 100" type="text" autocomplete="post_code">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="slug">Description</label>
                        <textarea class="form-control" rows="3" name="description" id="description" placeholder="eg: For anual users"></textarea>
                    </div>

                </form>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light" form="addPlans"> <i class="fa fa-plus-circle"></i> Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('layout-js')
<script src="{{ asset('assets/back/plans.js') }}"></script>
@endpush

@endsection