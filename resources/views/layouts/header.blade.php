    <nav class="navbar navbar-expand-sm navbar-light bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Library</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{ route('Home') }}">@lang('site.home')</a>
                    </li>
                    
                    <x-navbar></x-navbar>
                    
                  </ul>

            </div>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('Auth.login') }}">@lang('site.login')</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('Auth.register') }}">@lang('site.register')</a>
                </li>
                @endguest

                @auth
                <li class="nav-item">
                    <a class="nav-link">@lang('site.welcome'), {{Auth::user()->name}}</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Auth.logout') }}">@lang('site.logout')</a>
                </li> 
                @endauth
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      @lang('site.lang')
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('Lang.en')}}">En</a></li>
                        <li><a class="dropdown-item" href="{{ route('Lang.ar') }}">Ar</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>

