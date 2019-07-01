@push('styles')
    <style>
        .movie {
            margin-bottom: 16px;
            background: #f2f2f2;
            border-radius: 4px;
            padding: 16px;
        }
        .movie small { color: #999;}
        .movie p { margin: 8px 0 0 0;}
    </style>
@endpush

<div class="movie">
    <h2>{{ $movie->title }}</h2>
    <small>
        Posted by <a href="{{ route('user.show', ['nickname' => $movie->user->nickname]) }}">{{ $movie->user->name }}</a>
        &mdash;
        {{ $movie->created_at->diffForHumans() }}
    </small>
    <p>{{ $movie->description }}</p>
</div>
