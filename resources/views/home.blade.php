@extends('template.base')

@push('styles')
    <style>

    </style>
@endpush

@section('content')

    <div class="row">
        <div class="col-sm">
            @include('components.logo')
        </div>
        <div class="col-sm text-right">
            @include('components.user')
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-sm">
            @foreach($movies as $movie)
                @include('components.movie', ['movie' => $movie])
            @endforeach
        </div>
    </div>

@stop
