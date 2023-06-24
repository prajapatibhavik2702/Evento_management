<div class="dash">
    <div class="dash-nav dash-nav-dark">
        <header>
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
            <a href="index.php" style="margin-top: 10px;"><img src="{{ asset('frontend/logo/logo2_footer.png') }}" alt="Evento Logo"></a>
        </header>

        <nav class="dash-nav-list">
            <a href="{{ route('admin.dashboard') }}" class="dash-nav-item">
                <i class="fas fa-home"></i>Admin Dashboard </a>

            <div class="dash-nav-dropdown">
                <a href="{{ route('admin.organiser.index') }}" class="dash-nav-item">
                    <i class="fas fa-user-tie"></i> Organisers </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ route('admin.users.index') }}" class="dash-nav-item">
                    <i class="far fa-user"></i> Users </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ route('admin.events.index') }}" class="dash-nav-item">
                    <i class="far fa-calendar-plus"></i> Events </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ route('admin.payments') }}" class="dash-nav-item">
                    <i class="fas fa-rupee-sign"></i> Payments </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ route('admin.category.index')}}" class="dash-nav-item">
                    <i class="fas fa-tasks"></i> Category </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ route('admin.speaker.index') }}" class="dash-nav-item">
                    <i class="fas fa-user-friends"></i> Speaker </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ route('admin.profile') }}" class="dash-nav-item">
                    <i class="fas fa-user-circle"></i> Profile </a>
            </div>


            <div class="dash-nav-dropdown">
                <form action="{{ route('admin.logout') }}" method="POST">
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

            <?php if (isset($_SESSION['admin-success'])) { ?>
                <div class="form_group" style="width: 49%; margin-right: 15px">
                    <div class="alert alert-success d-flex align-items-center" role="alert" style="margin: 10px auto 10px 25px;">
                        <svg class=" bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <?php echo $_SESSION['admin-success']; ?>
                    </div>
                </div>
            <?php unset($_SESSION['admin-success']);
            } ?>

            <?php if (isset($_SESSION['admin-danger'])) { ?>
                <div class="form_group" style="width: 49%;margin-right: 15px">
                    <div class="alert alert-danger d-flex align-items-center" role="alert" style="margin: 10px auto 10px 25px;">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <?php echo $_SESSION['admin-danger']; ?>
                    </div>
                </div>
            <?php unset($_SESSION['admin-danger']);
            } ?>

            <form class="searchbox" action="#!" style="border: 1px solid #181f2c; border-radius: 5px; width: 49%">
                <input type="text" class="searchbox-input" placeholder="Type To Search">
                <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
                <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
            </form>
        </header>
