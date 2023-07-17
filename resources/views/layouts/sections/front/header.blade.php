<div class="wheel-menu-wrap ">
    <div class="container-fluid wheel-bg1">
        <div class="row">
            <div class="col-sm-3">
                <div class="wheel-logo">
                    <a href="index.html"><img src="images/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-sm-9 col-xs-12 padd-lr0">
                <div class="wheel-top-menu clearfix">
                    <div class="wheel-top-menu-info">
                        <div class="top-menu-item"><a href=""><i class="fa fa-phone"></i><span>(+61) 3214 546789</span></a></div>
                        <div class="top-menu-item"><a href=""><i class="fa fa-envelope"></i><span>contact@wheel-rental.com</span></a></div>
                    </div>
                    <div class="wheel-top-menu-log">
                        <div class="top-menu-item">
                            @auth('member')
                                <div class="dropdown wheel-user-ico">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ auth()->guard('member')->user()->fullname }}
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><h3 class="text-center text-bg-primary"></h3></li>
                                        <li><a href="{{ route('member.edit', ['member' => auth()->guard('member')->user()->id]) }}">Profil Bilgileri</a></li>
                                        <li>
                                            <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()">
                                                Çıkış Yap
                                            </a>
                                        </li>
                                        <form action="{{ route('auth.member.logout') }}" method="POST" id="logoutForm">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            @else
                                <div class="dropdown wheel-user-ico">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Account
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><h3 class="text-center text-bg-primary"></h3></li>
                                        <li> <a href="{{ route('member.register') }}">Register</a></li>
                                        <li>
                                            <a href="{{ route('auth.member.login') }}">Login</a>
                                        </li>

                                    </ul>
                                </div>
                            @endauth
                        </div>
                        <div class="top-menu-item">
                            <div class="dropdown wheel-lang-ico">
                                <button class="btn btn-default dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Eng
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Brazil</a></li>
                                    <li><a href="#">France</a></li>
                                    <li><a href="#">Germany</a></li>
                                    <li><a href="#">India</a></li>
                                    <li><a href="#">Japan</a></li>
                                    <li><a href="#">Serbia</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="top-menu-item">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    USD
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">JPY</a></li>
                                    <li><a href="#">DKK</a></li>
                                    <li><a href="#">GBP</a></li>
                                    <li><a href="#">CHF</a></li>
                                    <li><a href="#">NZD</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 ">
                <div class="wheel-navigation">
                    <nav id="dl-menu">
                        <!-- class="dl-menu" -->
                        <ul class="main-menu dl-menu">
                            <li class="menu-item   current-menu-parent menu-item-has-children   active-color ">
                                <a href="#">Home</a>
                                <ul class="sub-menu dl-submenu">
                                    <li class="menu-item current-menu-item">
                                        <a href="index.html">Home page 01</a>
                                    </li>
                                    <li class="menu-item current-menu-item">
                                        <a href="index2.html">Home page 02</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item current-menu-parent menu-item-has-children  ">
                                <a href="#"> Listing </a>
                                <!--class=" dl-submenu "-->
                                <ul class="sub-menu dl-submenu">
                                    <li class="menu-item current-menu-item">
                                        <a href="car-list-grid.html">Car Listing - Grid View</a>
                                    </li>
                                    <li class="menu-item current-menu-item">
                                        <a href="car-list-3col2.html">Car Listing - List View</a>
                                    </li>
                                    <li class="menu-item current-menu-item">
                                        <a href="car-listing-details.html">car listing details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item   ">
                                <a href="reservation1.html">Reservation</a>
                            </li>
                            <li class="menu-item menu-item-has-children  ">
                                <a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li class="menu-item "><a href="contact.html">contact</a></li>
                                    <li class="menu-item "><a href="register.html">Register</a></li>
                                    <li class="menu-item "><a href="checkout.html">Ceckout</a></li>
                                    <li class="menu-item "><a href="about.html">About</a></li>
                                    <li class="menu-item "><a href="shopping.html">shopping cart</a></li>
                                    <li class="menu-item menu-item-has-children">
                                        <a href="#">Level 2</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="#">Level 3</a></li>
                                            <li class="menu-item"><a href="#">Level 3</a></li>
                                            <li class="menu-item"><a href="#">Level 3</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children  ">
                                <a href="#">News</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="news.html">News</a></li>
                                    <li class="menu-item"><a href="news-details.html">News details</a></li>
                                </ul>
                            </li>
                            <li class="menu-item ">
                                <a href="#">Features</a>
                            </li>
                        </ul>
                        <div class="nav-menu-icon"><i></i></div>
                    </nav>
                    <a href="" class="wheel-cheader-but">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
