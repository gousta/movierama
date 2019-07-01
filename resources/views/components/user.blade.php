@push('styles')
    <style>

    </style>
@endpush

@if(Auth::check())
    <a href="{{ route('user.show', ['nickname' => Auth::user()->nickname]) }}" class="px-3">{{ Auth::user()->name }}</a>

    <a href="{{ route('movie.create') }}" class="btn btn-primary">Add Movie</a>
@else
    <a href="{{ route('login.github') }}">Sign in</a>
@endif
