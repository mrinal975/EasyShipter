<!-- banner -->
<div class="banner-w3ls" id="home">
    <!-- header -->
    <div class="header-w3l-agile">
        <div class="header_left">
            <ul>
                <li><a href="mailto:info@example.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>info@example.com</a></li>
                <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+123 456 7890</li>
            </ul>
        </div>
        <h4 class="text-center" style="color: #9affde;">
            {{Session::get('message')}}
        </h4>
        <div class="header_right">
            <div class="w3ls-social-icons">
                <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                <a class="pinterest" href="#"><i class="fa fa-google-plus"></i></a>
                <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
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

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
    <!-- //header -->
    <div class="container">
        <div class="header-nav">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a  href="index.html"><span class="logo-c">C</span><i class="fa fa-car" aria-hidden="true"></i>Rental</a><p class="sub-cap">Drive to Any where</p></h1>
                </div>
                <!-- navbar-header -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{url('/')}}" class="hvr-underline-from-center active">Home</a></li>
                        <li><a href="#about" class="hvr-underline-from-center scroll">About Us</a></li>
                        <li><a href="#service" class="hvr-underline-from-center scroll">Deals</a></li>
                        @can('isOwner')

                            <li><a href="{{url('/owner')}}" class="hvr-underline-from-center ">Vehicle</a></li>
                        @endcan
                        <li><a href="#contact" class="hvr-underline-from-center scroll">Contact Us</a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </nav>

        </div>
        <div class="clearfix"></div>
        @yield('MainContent')

    </div>


</div>
<!-- //banner -->
