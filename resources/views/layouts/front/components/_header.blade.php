<header id="main-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    @isset($setting)
                        <a class="navbar-brand" href="/">
                            <img class="img-fluid" src="{{ $setting->logo() }}" alt="img">
                        </a>
                    @endisset

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu-btn d-inline-block" id="menu-btn">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </span>
                        <span class="ion-navicon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto w-100 justify-content-end">
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" href="#iq-home" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Home
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item active" href="index.html">Home 1</a>
                                    <a class="dropdown-item" href="index-2.html">Home 2</a>
                                    <a class="dropdown-item" href="index-3.html">Home 3</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown-2"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Pages
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown-2">
                                    <a class="dropdown-item" href="about-us.html">About Us</a>
                                    <a class="dropdown-item" href="services.html">Services</a>
                                    <a class="dropdown-item" href="our-team.html">Team</a>
                                    <a class="dropdown-item" href="clients.html">Clients</a>
                                    <a class="dropdown-item" href="faq.html">FAQ</a>
                                    <a class="dropdown-item" href="error-404.html">Error 404</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown-3"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Portfolio
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown-3">
                                    <a class="dropdown-item" href="portfolio-2-columns.html">Portfolio 2 Columns</a>
                                    <a class="dropdown-item" href="portfolio-3-columns.html">Portfolio 3 Columns</a>

                                    <a class="dropdown-item" href="portfolio-details.html">Portfolio Details</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                    id="navbarDropdown-4" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Blog
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown-4">
                                    <a class="dropdown-item" href="one-column-blog.html">One Column Blog</a>
                                    <a class="dropdown-item" href="two-column-blog.html">Two column blog</a>
                                    <a class="dropdown-item" href="three-column-blog.html">Three column blog</a>
                                    <a class="dropdown-item" href="right-column-blog.html">Right column blog</a>
                                    <a class="dropdown-item" href="blog-details.html">Blog Details</a>
                                </div>
                            </li> --}}


                            @each('layouts.front.components._submenu', $menuList, 'menu')
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/login') }}" role="button">
                                        Login
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/register') }}" role="button">
                                        Register
                                    </a>
                                </li>
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest


                        </ul>
                    </div>

                </nav>
            </div>
        </div>
    </div>
</header>
