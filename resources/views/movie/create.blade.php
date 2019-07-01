@extends('template.base')

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
            @include('components.form-errors')

            <form action="{{ route('movie.store') }}" method="post">
                {{ csrf_field() }}

                <div class="py-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required />
                </div>
                <div class="py-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>

                <div class="text-right">
                    <input type="submit" value="SUBMIT" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>

@stop
