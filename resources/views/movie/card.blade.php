@pushonce('styles:movie')
    <style>
        .movie {
            margin-bottom: 16px;
            background: #e9ecef;
            border-radius: 4px;
            padding: 16px;
        }
        .movie small { color: #999; }
        .movie p { margin: 8px 0 0 0; overflow: hidden; line-height: 22px; }
        .movie .actions .count { margin-right: 8px; }

        .movie .actions { margin-top: 16px; }
        .movie .actions .divider { margin: 0 16px; }
        .movie .control { background: #fff; border-radius: 4px; padding: 4px 8px; border: 1px solid #e9ecef; color: #212121; }
        .movie .control.active { border: 1px solid #666; }
        .movie .control.disabled { color: #ccc; }
        .movie .control:not(.disabled):hover { border: 1px solid #666; cursor: pointer; }
    </style>
@endpushonce

<div class="movie" data-id="{{ $movie->id }}">
    <h2>{{ $movie->title }}</h2>
    <small>
        Posted by <a href="{{ route('user.show', ['nickname' => $movie->user->nickname]) }}">{{ $movie->user->name }}</a>
        &mdash;
        {{ $movie->created_at->diffForHumans() }}
    </small>
    <p>{!! nl2br($movie->description) !!}</p>

    <div class="row actions">
        <div class="col-sm">
            <span class="control control-action {{ Auth::user() && in_array(Auth::user()->id, $movie->likes_users) ? 'active':'' }} {{ Auth::user() && Auth::user()->id === $movie->user_id ? 'disabled':'' }}" data-action="like">
                <span class="count">{{ $movie->likes }}</span>
                <i class="far fa-thumbs-up"></i>
            </span>
            <span class="divider" />
            <span class="control control-action {{ Auth::user() && in_array(Auth::user()->id, $movie->hates_users) ? 'active':'' }} {{ Auth::user() && Auth::user()->id === $movie->user_id ? 'disabled':'' }}" data-action="hate">
                <span class="count">{{ $movie->hates }}</span>
                <i class="far fa-thumbs-down"></i>
            </span>
        </div>
        @if(Auth::user() && Auth::user()->id === $movie->user_id)
        <div class="col-sm text-right">
            <a class="control" href="{{ route('movie.edit', $movie->id) }}"><i class="fas fa-pen"></i></a>
            <a class="control" href="{{ route('movie.delete', $movie->id) }}"><i class="fas fa-trash"></i></a>
        </div>
        @endif
    </div>

</div>

@pushonce('scripts:movie')
    <script src="https://cdn.jsdelivr.net/npm/readmore-js@2.2.1/readmore.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.movie p').readmore();

            $(document).on('click', '.control-action', function() {
                if(!$(this).hasClass('disabled')) {
                    var movieId = $(this).closest('.movie').data('id');
                    var action = $(this).data('action');

                    $.get("{{ route('movie.act') }}?movieId=" + movieId + "&action=" + action)
                        .done(function(res) {
                            if(res && res.status === 'ok') {
                                var movieBlock = $('.movie[data-id="'+movieId+'"]');
                                var likeAction = movieBlock.find('[data-action="like"]');
                                var hateAction = movieBlock.find('[data-action="hate"]');

                                if(res.data.action === 'like') {
                                    likeAction.addClass('active');
                                    hateAction.removeClass('active');
                                } else if(res.data.action === 'hate') {
                                    likeAction.removeClass('active');
                                    hateAction.addClass('active');
                                } else {
                                    likeAction.removeClass('active');
                                    hateAction.removeClass('active');
                                }

                                likeAction.find('.count').text(res.data.likes);
                                hateAction.find('.count').text(res.data.hates);
                            } else {
                                $.snackbar({ content: res.error });
                            }
                        })
                        .fail(function(res) {
                            $.snackbar({ content: "Failed" });
                        });
                }
            });
        });
    </script>
@endpushonce
