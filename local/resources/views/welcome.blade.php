@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Welcome to {{ config('app.name', 'SLJ Fiber Networks') }}</div>

                <div class="card-body text-center">
                     <img src="{{ asset('assets/img/logo.png')}}" class="img-fluid rounded" title="{{ config('app.name', 'SLJ Fiber Works') }}" alt="{{ config('app.name', 'SLJ Fiber Works') }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
