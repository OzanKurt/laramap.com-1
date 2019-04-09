<div class="header py-4">
    <div class="container">
        <div class="d-flex">
            <a class="header-brand" href="/">
                <img src="{{ asset('static/laramap_logo.svg') }}" class="header-brand-img" alt="Laramap.com Logo">
            </a>

            @auth
                <div class="d-flex order-lg-2 ml-auto">
                    {{--<user-notifications-bar></user-notifications-bar>--}}

                    <div class="dropdown">
                        <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                            <span class="avatar" style="background-image: url({!! auth()->user()->avatar !!})"></span>
                            <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">{{ auth()->user()->name }}</span>
                      <small class="text-muted d-block mt-1">{{ auth()->user()->username }}</small>

                    </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            @if(auth()->user()->is_admin)
                                <a class="dropdown-item" href="{{ url('/admin') }}">
                                    <i class="fal fa-toolbox"></i> Admin
                                </a>

                                <a class="dropdown-item" href="{{ url('/horizon') }}">
                                    <i class="fal fa-server"></i> Horizon
                                </a>
                                <div class="dropdown-divider"></div>
                            @endif
                            <a class="dropdown-item" href="{{ url('@' . auth()->user()->username) }}">
                                <i class="dropdown-icon fe fe-user"></i> Profile
                            </a>

                            <a class="dropdown-item" href="{{ url('/account') }}">
                                <i class="dropdown-icon fe fe-settings"></i> Account
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://laramapcom.nolt.io">
                                <i class="dropdown-icon fe fe-help-circle"></i> Feedback
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="dropdown-icon fe fe-log-out"></i> Sign out
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse"
                   data-target="#headerMenuCollapse">
                    <span class="header-toggler-icon"></span>
                </a>
            @else
                <div class="d-flex order-lg-2 ml-auto">
                    <div class="nav-item d-none d-md-flex">
                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Login</a>
                    </div>

                    <div class="nav-item d-none d-md-flex">
                        <a href="{{ route('register') }}" class="btn btn-sm btn-outline-primary">Register</a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>

<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 ml-auto">
                <form class="input-icon my-3 my-lg-0" method="post" action="{{ url('/search') }}">
                    @csrf
                    <input type="search" class="form-control header-search" name="query" placeholder="Search&hellip;"
                           tabindex="1">
                    <div class="input-icon-addon">
                        <i class="fal fa-search"></i>
                    </div>
                </form>
            </div>

            <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/users') }}" class="nav-link">Users</a>
                    </li>

                    {{--<li class="nav-item">--}}
                        {{--<a href="{{ url('/articles') }}" class="nav-link">Articles</a>--}}
                    {{--</li>--}}

                    <li class="nav-item">
                        <a href="{{ url('/forums') }}" class="nav-link">Forums</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/resources') }}" class="nav-link">Resources</a>
                    </li>

                    {{--<li class="nav-item">--}}
                        {{--<a href="{{ url('/events') }}" class="nav-link">Events</a>--}}
                    {{--</li>--}}

                    {{--<li class="nav-item">--}}
                        {{--<a href="{{ url('/usergroups') }}" class="nav-link">Usergroups</a>--}}
                    {{--</li>--}}

                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">Connect</a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a href="https://t.me/joinchat/AAAAAE16XDv-NO3kZzGooA" target="_blank" class="dropdown-item">Telegram Channel</a>
                            <a href="https://t.me/laravel_worldwide" target="_blank" class="dropdown-item">Telegram Group</a>
                            <a href="https://discordapp.com/invite/mPZNm7A" target="_blank" class="dropdown-item">Discord</a>
                            <a href="https://larachat.co/" target="_blank" class="dropdown-item">Slack</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">About</a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a href="{{ url('/about') }}" class="dropdown-item">About</a>
                            <a href="{{ url('/sponsors') }}" class="dropdown-item">Sponsors</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
