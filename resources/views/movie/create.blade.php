@extends('template.base')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.show', ['nickname' => $user->nickname]) }}">My Movies</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add a movie</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-sm">
            @include('components.form-errors')

            <h3>Add a movie</h3>

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
