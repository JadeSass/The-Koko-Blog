<header class="navbar-fixed">
    <nav class="white black-text">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo left">TKB</a>
            <ul class="right">
                @guest
                    <li>
                        <a href="#" class="black-text dropdown-trigger" data-target='dropdown1'><i class="fa fa-user-circle-o black-text"></i></a>
                    </li>
                    <!-- Dropdown Structure -->
                    <ul id='dropdown1' class='dropdown-content nosh boardered-dv'>
                        <div class="item-bd">
                            <h6 class="lnht">Join the koko blog</h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit in, molestiae voluptatem maiores facilis blanditiis!</p>
                        </div>
                        <li class="divider" tabindex="-1"></li>
                        <div class="row">
                            <li>
                                <a class="waves-effect" href="{{ route('login') }}">{{ __('Login') }} </a>
                            </li>
                                @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="waves-effect">{{ __('Register') }}</a>
                            </li>
                                @endif
                        </div>
                    </ul>
                    @else
                    <li class="white-text">
                        <a href="#" class="white-text"><i class="fa fa-user-circle-o"></i> {{ Auth::user()->name }}</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="white-text waves-effect waves-light"><i class="fa fa-sign-out"></i></a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                @endguest
            </ul>
        </div>
    </nav>
</header>
