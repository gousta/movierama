<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="/">MovieRama</a>

    <ul class="navbar-nav flex-row ml-md-auto d-md-flex">

        @if(Auth::check())
            <li class="nav-item dropdown">
                <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="movieDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="movieDropdown">
                    <h6 class="dropdown-header">Movies</h6>
                    <a class="dropdown-item {{ \Request::route()->getName() === 'user.show' ? 'active':'' }}" href="{{ route('user.show', ['nickname' => Auth::user()->nickname]) }}">My movies</a>
                    <a class="dropdown-item {{ \Request::route()->getName() === 'movie.create' ? 'active':'' }}" href="{{ route('movie.create') }}">Add a movie</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout">Log out</a>
                </div>
            </li>
        @else
            <li><a href="{{ route('login') }}">Sign in with Github</a></li>
        @endif

    </ul>
</nav>
