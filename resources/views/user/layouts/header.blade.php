 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">

      <div class="navbar-translate">
        <a class="navbar-brand" href="/" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom">
          {{ config('app.name', 'Laravel Blog') }}
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="{{ asset('user/assets/img/blurred-image-1.jpg') }})">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/"> Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/post"> Post </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about"> About us </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact"> Contact us </a>
          </li>
          @guest
                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                    <a class="nav-link" href="/login">{{ __('login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                        <a class="nav-link" href="/register">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <a href="/dashboard" class="dropdown-item"> Dashboard </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>
<!-- End Navbar -->