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


        .movie .actions { margin-top: 8px; }
        .movie .actions .divider { margin: 0 16px; }
        .movie .control { color: #999; }
        .movie .control:hover { color: #000; }
        .movie .control i { font-size: 16px; }
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

    <div class="row actions">
        <div class="col-sm">
            {{ $movie->likes->count() }}
            <a class="control" href="#"><i class="fas fa-smile"></i></a>
            <span class="divider" />
            {{ $movie->hates->count() }}
            <a class="control" href="#"><i class="far fa-frown"></i></a>
        </div>
        <div class="col-sm text-right">
            text
        </div>
    </div>
</div>
