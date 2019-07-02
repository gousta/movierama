@pushonce('styles:movie')
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
        .movie .control { background: #fff; border-radius: 4px; padding: 4px 8px; border: 1px solid #f2f2f2; }
        .movie .control.active { border: 1px solid #666; }
        .movie .control.disabled { color: #ccc; }
        .movie .control:not(.disabled):hover { border: 1px solid #666; cursor: pointer; }
        .movie .control i { margin-left: 8px;}
    </style>
@endpushonce

<div class="movie" data-id="{{ $movie->id }}">
    <h2>{{ $movie->title }}</h2>
    <small>
        Posted by <a href="{{ route('user.show', ['nickname' => $movie->user->nickname]) }}">{{ $movie->user->name }}</a>
        &mdash;
        {{ $movie->created_at->diffForHumans() }}
    </small>
    <p>{{ $movie->description }}</p>

    <div class="actions">
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
</div>

@pushonce('scripts:movie')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.control-action', function() {
                if(!$(this).hasClass('disabled')) {
                    var movieId = $(this).closest('.movie').data('id');
                    var action = $(this).data('action');

                    $.get("{{ route('movie.act') }}?movieId=" + movieId + "&action=" + action)
                        .done(function(res) {
                            console.log('done', res);
                        })
                        .fail(function(res) {
                            $.snackbar({ content: "Failed" });
                        })
                        .always(function(res) {
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
                        });
                }
            });
        });
    </script>
@endpushonce
