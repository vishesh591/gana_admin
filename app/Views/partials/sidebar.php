<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="<?= base_url() ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/images/logo-light.png" alt="" height="24">
                    </span>
                </a>
                <a href="<?= base_url() ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/images/logo-dark.png" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/dashboard" class="tp-link">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="menu-title">Submisson</li>

                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/claiming-data" class="tp-link">
                        <i data-feather="check-circle"></i>
                        <span>Claiming Data</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/relocation-data" class="tp-link">
                        <i data-feather="refresh-cw"></i>
                        <span>Relocation Data</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/merge-data" class="tp-link">
                        <i data-feather="tag"></i>
                        <span> Claim/Reel Data </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/facebook-ownership-data" class="tp-link">
                        <i data-feather="facebook"></i>
                        <span> Facebook Ownership Data </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/youtube-ownership-data" class="tp-link">
                        <i data-feather="youtube"></i>
                        <span> Youtube Ownership Data </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/support" class="tp-link">
                        <i data-feather="help-circle"></i>
                        <span> Support List </span>
                    </a>
                </li>
                </li>

                <li class="menu-title mt-2">Music Distribution</li>

                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/releases">
                        <i data-feather="music"></i>
                        <span class="menu-text"> Releases </span>
                    </a>
                </li>


                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/artists" class="tp-link">
                        <i data-feather="user"></i>
                        <span> Artists </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/labels" class="tp-link">
                        <i data-feather="tag"></i>
                        <span> Labels </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/sales-report">
                        <i data-feather="bar-chart-2"></i>
                        <span> Sales Reports </span>
                    </a>

                </li>


                <li class="menu-title mt-2">Requests</li>

                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/claiming-request" class="tp-link">
                        <i data-feather="check-circle"></i>
                        <span> Claiming Requests </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/relocation-request" class="tp-link">
                        <i data-feather="refresh-cw"></i>
                        <span> Relocation Requests </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/merge-request" class="tp-link">
                        <i data-feather="git-merge"></i>
                        <span>Claim/Reel Merge</span>
                    </a>
                </li>

                <li class="menu-title mt-2">Ownership Conflict</li>

                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/youtube" class="tp-link">
                        <i data-feather="youtube"></i>
                        <span> Youtube </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/facebook" class="tp-link">
                        <i data-feather="facebook"></i>
                        <span> Facebook </span>
                    </a>
                </li>

                <li class="menu-title mt-2">User</li>

                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/accounts">
                        <i data-feather="settings"></i>
                        <span> Account </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() . getUserRoleSlug() ?>/support_user" class="tp-link">
                        <i data-feather="help-circle"></i>
                        <span> Support </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
<!-- Left Sidebar End -->