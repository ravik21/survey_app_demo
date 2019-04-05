@auth()
    @include('includes.navbars.navs.auth', ['title' => $title])
@endauth

@guest()
    @include('includes.navbars.navs.guest')
@endguest
