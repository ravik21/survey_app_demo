<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container px-4">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <ul class="navbar-nav ml-auto">
                @if(Request::segment(1)=='login')
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{route('register')}}">
                        <i class="ni ni-circle-08"></i>
                        <span class="nav-link-inner--text">{{ __('Register') }}</span>
                    </a>
                </li>
                @endif
                @if(Request::segment(1)=='register')
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('login') }}">
                        <i class="ni ni-key-25"></i>
                        <span class="nav-link-inner--text">{{ __('Login') }}</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
