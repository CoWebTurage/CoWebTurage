<header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
             data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
             data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static"
             data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px"
             data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                        <!-- RD Navbar Toggle-->
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span>
                        </button>
                        <!-- RD Navbar Brand-->
                        <div class="rd-navbar-brand"><a href="{{route('home')}}">
                                <image class="brand-logo-light"
                                       src="/images/logo-default1-140x57.png"
                                       alt="" width="140"
                                       height="57"
                                       srcset="/images/logo-default-280x113.png 2x"></image>
                            </a>
                        </div>
                    </div>
                    <div class="rd-navbar-main-element">
                        <div class="rd-navbar-nav-wrap">
                            <!-- RD Navbar Nav-->
                            <ul class="rd-navbar-nav">
                                <li class="rd-nav-item active">
                                    <a class="rd-nav-link" href="{{route('home')}}">{{ __('Home') }}</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="{{ route('landing_page') }}">{{ __('About Us') }}</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="{{ route('map') }}">{{ __('Map') }}</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="{{ route('trips.index') }}">{{ __('My trips') }}</a>
                                </li>

                                @if(($user = Auth::user()) !== null)

                                    <li class="rd-nav-item">
                                        <a class="button button-white button-sm"
                                           href="{{ route('messages.chat') }}">{{ __('Chat with users') }}</a>
                                    </li>
                                    <li class="rd-nav-item">
                                        <a class="button button-white button-sm"
                                           href="{{ route('profile.show') }}">{{ $user->firstname." ".$user->lastname }}</a>
                                    </li>
                                    <li class="rd-nav-item">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="button button-white button-sm"
                                               href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </a>
                                        </form>
                                    </li>

                                @else
                                    <li class="rd-nav-item">
                                        <a class="button button-white button-sm"
                                           href="{{ route('login') }}">{{ __('Log In') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

