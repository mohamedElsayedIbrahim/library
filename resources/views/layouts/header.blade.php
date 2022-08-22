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
                      <a class="nav-link active" aria-current="page" href="{{ route('Home') }}">Home</a>
                    </li>
                    
                    <x-navbar></x-navbar>
                    
                  </ul>

            </div>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('Auth.login') }}">login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('Auth.register') }}">Register</a>
                </li>
                @endguest

                @auth
                <li class="nav-item">
                    <a class="nav-link">Welcome, {{Auth::user()->name}}</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Auth.logout') }}">logout</a>
                </li> 
                @endauth
                

            </ul>
        </div>
    </nav>

