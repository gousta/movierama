@extends('template.base')

@push('styles')
    <style>

    </style>
@endpush

@section('content')

    <div class="row mt-4">
        <div class="col-sm">
            @foreach($user->movies as $movie)
                @include('components.movie', ['movie' => $movie])
            @endforeach
        </div>
    </div>

@stop
