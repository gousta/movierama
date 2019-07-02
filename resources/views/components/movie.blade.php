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
            <a class="control control-action-like" data-id="{{ $movie->id }}" href="#"><i class="fas fa-smile"></i></a>
            <span class="divider" />
            {{ $movie->hates->count() }}
            <a class="control control-action-hate" data-id="{{ $movie->id }}"href="#"><i class="far fa-frown"></i></a>
        </div>
        <div class="col-sm text-right">
            text
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function act(action, movieId) {
            console.log(action, '=>', movieId);

            $.get("{{ route('movie.act', ['id' => $movie->id]) }}?action=" + action)
                .done(function(res) {
                    console.log('done', res);
                })
                .fail(function(res) {
                    $.snackbar({ content: "Failed" });
                })
                .always(function(res) {
                    console.log('always', res);
                });
        }

        $(document).ready(function() {
            $(document).on('click', '.control-action-like', function(e) {
                e.preventDefault();
                act('like', $(this).data('id'));
            });
            $(document).on('click', '.control-action-hate', function(e) {
                e.preventDefault();
                act('hate', $(this).data('id'));
            });
        });
    </script>
@endpush
