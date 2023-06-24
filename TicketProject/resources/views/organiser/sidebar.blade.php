<div class="dash">

    <div class="dash-nav dash-nav-dark">
        <header>
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
            <a href="{{ route('organiser.dashboard') }}"><img src="{{ asset('homepagefrontend/assets/img/logo/logo2_footer.png') }}" alt="Evento Logo"></a>
        </header>
        <nav class="dash-nav-list">
            <a href="{{ route('organiser.dashboard') }}" class="dash-nav-item">
                <i class="fas fa-home"></i>Organiser</a>

            <div class="dash-nav-dropdown">
                <a href="{{ route('organiser.events.index') }}" class="dash-nav-item">
                    <i class="far fa-calendar-plus"></i> Events </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ route('organiser.speaker.index') }}" class="dash-nav-item">
                    <i class="fas fa-user-friends"></i> Speakers </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ route('organiser.payments.index') }}" class="dash-nav-item">
                    <i class="fas fa-rupee-sign"></i> Payments </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ route('organiser.organiserdetails.index') }}" class="dash-nav-item">
                    <i class="fas fa-user-circle"></i> Profile </a>
            </div>

            <div class="dash-nav-dropdown">
                <form action="{{ route('organiser.logout') }}" method="POST">
                    @csrf
                    <button>
                        <a class="dash-nav-item">
                        <i class="fas fa-sign-in-alt"></i> Logout </a>
                        </button>
                </form>
                </div>

        </nav>
    </div>
    <div class="dash-app">
        <header class="dash-toolbar">
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>

            <?php if (isset($_SESSION['org-success'])) { ?>
                <div class="form_group" style="width: 49%;margin-right: 15px">
                    <div class="alert alert-success d-flex align-items-center" role="alert" style="margin: 10px auto 10px 25px;">
                        <svg class=" bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <?php echo $_SESSION['org-success']; ?>
                    </div>
                </div>
            <?php unset($_SESSION['org-success']);
            } ?>

            <?php if (isset($_SESSION['org-danger'])) { ?>
                <div class="form_group" style="width: 49%;margin-right: 15px">
                    <div class="alert alert-danger d-flex align-items-center" role="alert" style="margin: 10px auto 10px 25px;">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <?php echo $_SESSION['org-danger']; ?>
                    </div>
                </div>
            <?php unset($_SESSION['org-danger']);
            } ?>

            <form class="searchbox" action="#!" style="border: 1px solid #181f2c; border-radius: 5px; width: 49%">
                <input type="text" class="searchbox-input" placeholder="Type To Search">
                <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
                <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
            </form>

        </header>
