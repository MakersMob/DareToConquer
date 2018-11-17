<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title OR 'Dare to Conquer' }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="//js.stripe.com/v3/"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="google-site-verification" content="N6MbNrBPXwIIUB6WpB57yr-mW1kLsQdpdCpsUSw0V9c" />
</head>
<body>
    <div id="left"></div>
    <div id="right"></div>
    <div id="top"></div>
    <div id="bottom"></div>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="@auth {{ url('/home') }} @else {{ url('/') }} @endauth">
                    <span class="d-none d-md-inline">Dare to Conquer</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is('courses*')) active @endif" href="/course">Courses</a>
                        </li>
                        @role('gold')
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is('journey*')) active @endif" href="/journey">Journeys</a>
                        </li>
                        @endhasrole
                        @role('admin')
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('guide*')) active @endif" href="/guide">Guides</a>
                            </li>
                        @endhasrole
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is('bootcamp*')) active @endif" href="/bootcamp">Bootcamps</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link @if(Request::is('headstart*')) active @endif" href="/headstart">60-Day Headstart</a>
                        </li>-->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>-->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Community</a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/exchange">Member Exchange</a>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/service">Member Services</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hi, {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">{{ Auth::user()->points }} Points</a>
                                    <a class="dropdown-item" href="/member/affiliate-program">Affiliate Program</a>
                                    <a class="dropdown-item" href="/member/edit">Edit Profile</a>
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

        <main class="">
            @yield('content')
        </main>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <h4>Helpful Things</h4>
                        <ul>
                            <li><a href="/articles">Articles</a></li>
                            <li><a href="/questions">Online Business FAQ</a></li>
                            <!--<li><a href="/guide">Online Business Help Guides</a></li>-->
                            <li><a href="/archives">Email Archives</a></li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <hr>
                        <p>&copy; Makers Mob LLC. | You create what you dare to conquer.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @yield('footScripts')
    @if (ENV('APP_ENV') == 'production')
    <!-- REFERSION TRACKING: BEGIN -->
    <script src="//billionaireblogclub.refersion.com/tracker/v3/pub_fff12c39e1cee94229d4.js"></script>
    <script>_refersion();</script>
    <!-- REFERSION TRACKING: END -->
    <!-- Drip -->
    <script type="text/javascript">
      var _dcq = _dcq || [];
      var _dcs = _dcs || {};
      _dcs.account = '7512416';

      (function() {
        var dc = document.createElement('script');
        dc.type = 'text/javascript'; dc.async = true;
        dc.src = '//tag.getdrip.com/7512416.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(dc, s);
      })();
    </script>
    <!-- end Drip -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-51364-108"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-51364-108');
    </script>
    @endif
</body>
</html>
