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

    <div class="row">
        <div class="col-sm">
            USER MOVIES
        </div>
    </div>

@stop
