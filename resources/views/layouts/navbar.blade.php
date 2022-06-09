<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">

            <div id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @auth
                    <ul class="navbar-nav mr-auto">
                        <li class=" mx-1 nav-item">
                            <a href="{{ route('admin.customers.index') }}"
                                class="nav-link {{ Request::is('admin/customers') ? 'active' : '' }}">Clienti
                            </a>
                        </li>
                        <li class=" mx-1 nav-item">
                            <a href="{{ route('admin.offers.index') }}"
                                class="nav-link {{ Request::is('admin/offers') ? 'active' : '' }}">Offerta</a>
                        </li>
                        <li class=" mx-1 nav-item">
                            <a href="{{ route('admin.quotations.index') }}"
                                class="nav-link {{ Request::is('admin/quotations') ? 'active' : '' }}">Preventivi</a>
                        </li>
                    </ul>
                @endauth
            </div>
            <!-- Right Side Of Navbar -->
            <div class="navbar-nav d-flex justify-content-end">
                <!-- Authentication Links -->
                @guest
                    <div class="nav-item ">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('img/prodigy.png') }}" alt="logo">
                        </a>
                    </div>
                    {{-- <div class="d-flex">
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </div>

                        @if (Route::has('register'))
                            <div class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>
                        @endif

                    </div> --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </div>
        </div>
    </nav>
</div>
