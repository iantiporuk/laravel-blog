<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.index') }}">
            {{ __('Laravel Admin') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{Route::currentRouteNamed('admin.posts.index') ? 'active' : '' }}"
                       href="{{route('admin.posts.index')}}">{{__('Posts')}}</a>
                </li>
                <li class="nav-item"><a class="nav-link {{Route::currentRouteNamed('admin.categories.index') ? 'active' : '' }}"
                                        href="{{route('admin.categories.index')}}">{{__('Categories')}}</a></li>
{{--                <li class="nav-item"><a class="nav-link {{request()->is('admin-about') ? 'active' : '' }}"--}}
{{--                                        href="{{route('admin-about')}}">{{__('About Us')}}</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link {{request()->is('admin-contact') ? 'active' : '' }}"--}}
{{--                                        href="{{route('admin-contact')}}">{{__('Contact Us')}}</a></li>--}}

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="btn btn-outline-primary mr-md-3 ml-md-1"
                           href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-outline-success mt-2 mt-md-0"
                               href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('index') }}">{{ __('Back to site') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

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
