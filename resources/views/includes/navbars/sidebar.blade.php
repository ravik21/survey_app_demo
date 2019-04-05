<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand pt-0" href="#">
          <button type="button" class="navbar-toggler btn" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
              <span><i class="fas fa-bars"></i></span>
          </button>
        </a>
        <a id="" class="nav-link pr-0 user-nav" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ $avatar ? asset($avatar) : asset('assets/img/theme/avatar.png') }}">
                </span>
            </div>
        </a>

        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
            </div>
            <a href="{{ url('dashboard/profile') }}" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>{{ __('My profile') }}</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="" class="dropdown-item"
                onclick="event.preventDefault();
                  document.getElementById('logout-form').submit(); ">
                <i class="ni ni-user-run"></i>{{ __('Logout') }}
            </a>
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-12 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('dashboard/profile') }}">
                        <i class="ni ni-single-02 text-yellow"></i> {{ __('User profile') }}
                    </a>
                </li>
                @role('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('dashboard/users')}}">
                        <i class="ni ni-bullet-list-67 text-red"></i> {{ __('User Management') }}
                    </a>
                </li>
                @endrole
                @auth()
                <li class="nav-item">
                  <a class="nav-link" href=""
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                       <i class="ni ni-key-25 text-info"></i>{{ __('Logout') }}
                  </a>
                </li>
                @endauth

            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Demo</h6>
                @if(session()->exists('adminId'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/users/'.session('adminId').'/login-as') }}">
                        <i class="ni ni-single-02 text-yellow"></i> Back To Admin
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
