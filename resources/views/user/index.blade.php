@extends('template.base')

{{-- @push('styles')
    <style>

    </style>
@endpush --}}

@section('content')

    <div class="row mt-4">
        <div class="col-sm">
            <h3 class="mb-4">{{ $user->name }} Movies</h3>
            @foreach($user->movies as $movie)
                @include('components.movie', ['movie' => $movie])
            @endforeach
        </div>
    </div>

@stop
