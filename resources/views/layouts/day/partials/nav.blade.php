<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <button class="btn btn-link" id="menu-toggle">
        <i class="fa fa-list"></i>
    </button>

<button class="navbar-toggler" type="button" data-toggle="collapse"
    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                    href="#"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fa fa-user"></i>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">{{ __('Profile') }}</a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}"
                    method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        @endauth
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{  route('login') }}">Login</a>
            </li>
        @endguest
    </ul>
</div>
</nav>
