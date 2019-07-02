<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">MovieRama</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">

            @if(Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="movieDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="movieDropdown">
                        <h6 class="dropdown-header">Movies</h6>
                        <a class="dropdown-item" href="{{ route('user.show', ['nickname' => Auth::user()->nickname]) }}">My movies</a>
                        <a class="dropdown-item" href="{{ route('movie.create') }}">New movie</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Log out</a>
                    </div>
                </li>
            @else
                <a href="{{ route('login.github') }}">Sign in</a>
            @endif

        </ul>
    </div>
</nav>
