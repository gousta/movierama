@extends('template')

@push('styles')
    <style>
        .divider {
            border-bottom: 1px solid #f2f2f2;
            margin: 16px 0;
        }
    </style>
@endpush

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">MovieRama</a></li>
            <li class="breadcrumb-item active" aria-current="page">API Documentation</li>
        </ol>
    </nav>

    <div class="mt-4">
        <div class="alert alert-info">
            For security reasons and to prevent abuse (without having proper safety mechanisms) this API supports only READ operations
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h3>Introduction</h3>
                <p class="mb-0">Welcome to the MovieRama API!</p>
                <p>You can use our API to access MovieRama API endpoints, which can get information on movies in our database.</p>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h3>Authentication</h3>
                <p>Free! We do not currently require any kind of authentication for you to use our API. Please bear in mind that we limit requests to 60 attempts per minute, and disable access for a single minute if you hit the limit.</p>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h3 class="mb-4">API</h3>

                <h4 class="mb-2">Get All Movies</h4>
                <h6>HTTP Request</h6>
                <p><code>GET {{ route('api.movie.index') }}</code></p>

                <div class="divider"></div>

                <h4 class="mb-2">Get A Specific Movie</h4>
                <h6>HTTP Request</h6>
                <p><code>GET {{ route('api.movie.show', ['id' => '1']) }}</code></p>
            </div>
        </div>

    </div>

@stop
