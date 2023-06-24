
<div class="header-area">
    <div class="main-header header-sticky">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-xl-2 col-lg-2 col-md-1">
                    <div class="logo">
                        <a href="{{ route('dashboard') }}"><img src="{{ asset('homepagefrontend/assets/img/logo/logo.png') }}"  alt="Evento Logo"></a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-10">
                    <div class="menu-main d-flex align-items-center justify-content-end">
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="{{ route('dashboard1') }}"><i class="fa fa-home" style="padding-right: 10px;"></i>Home</a></li>
                                    <li><a href="#about"><i class="fa fa-solid fa-info" style="padding-right: 10px;"></i>About</a></li>
                                    <li><a href="#speaker" class="nav-link"><i class="fas fa-solid fa-user-tie" style="padding-right: 10px;"></i>Spakers</a></li>
                                    <li><a href="#schedule"><i class="fas fa-regular fa-calendar-check" style="padding-right: 10px;"></i>Schedule</a></li>
                                    @auth

                                    <li><a href="{{ route('ticket_view',['user_id' => Auth::id()])}}"><i class="fas fa-ticket-alt" style="padding-right: 10px;"></i>My Tickets</a></li>
                                    @endauth
                                    <li><a href="#price"><i class="fa fa-rupee" aria-hidden="true" style="padding-right: 10px;"></i>Price</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right-btn f-right d-none d-lg-block ml-30">

                            @auth
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                            <button type='submit' class="btn header-btn" style="border-radius: 20px">Logout</button>
                            </form>
                            @else
                            <a href="{{ route('login') }}" class="btn header-btn" style="border-radius: 20px">Login / Register</a>
                            @endauth

                        </div>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>
