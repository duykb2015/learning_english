<nav class="navbar header-navbar pcoded-header" >
    <div class="navbar-wrapper">

        <div class="navbar-logo" >
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu"></i>
            </a>
            <a href="<?= base_url() ?>">
                <img class="img-fluid" src="<?= base_url() ?>\templates\libraries\assets\images\logo.png" alt="Theme-Logo">
            </a>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-right">
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= base_url() ?>\templates\libraries\assets\images\avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                            <span><?= session()->get('adminName') ?></span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <a>
                                    <i class="feather icon-user"></i> Thông tin
                                </a>
                            </li>
                            <a href="<?= base_url('logout') ?>">
                                <li>
                                    <i class="feather icon-log-out"></i> Đăng xuất
                                </li>
                            </a>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>