@extends('setup')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card card-outline card-primary mt-3">
                <div class="card-body">
                    <h5 class="login-box-msg font-weight-light">
                        {{ __('Please choose your subscription plan. This can be changed any time after the first month.') }}
                    </h5>
                    <div class="table-responsive">
                        <table id="plan" class="table table-hover table-width">
                            @csrf
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Cost</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($plans) > 0)
                                @foreach($plans as $plan)
                                <tr>
                                    <td>{{$plan->name}}</td>
                                    <td>{{$plan->description}}</td>
                                    <td>{{ number_format($plan->cost, 2) }}</td>
                                    <td><a href="#" class="btn btn-danger" onclick="assignPlanToUser('{{$plan->id}}')">Choose</a></td>
                                </tr>
                                @endforeach
                                @else
                                <p> No plans loaded yet. </p>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        @endsection