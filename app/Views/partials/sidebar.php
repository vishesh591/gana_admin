<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/images/logo-light.png" alt="" height="24">
                    </span>
                </a>
                <a href="/" class="logo logo-dark">
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
                    <a href="/" class="tp-link">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="menu-title">Submisson</li>

                <li>
                    <a href="/claiming-data" class="tp-link">
                        <i data-feather="check-circle"></i>
                        <span>Claiming Data</span>
                    </a>
                </li>
                <li>
                    <a href="/relocation-data" class="tp-link">
                        <i data-feather="refresh-cw"></i>
                        <span>Relocation Data</span>
                    </a>
                </li>
                <li>
                    <a href="/merge-data" class="tp-link">
                        <i data-feather="tag"></i>
                        <span> Claim/Reel Data </span>
                    </a>
                </li>
                <li>
                    <a href="/ownership-data" class="tp-link">
                        <i data-feather="user"></i>
                        <span> Ownership Data </span>
                    </a>
                </li>
                </li>

                <li class="menu-title mt-2">Music Distribution</li>

                <li>
                    <a href="/releases">
                        <i data-feather="music"></i>
                        <span class="menu-text"> Releases </span>
                    </a>
                </li>


                <li>
                    <a href="/artists" class="tp-link">
                        <i data-feather="user"></i>
                        <span> Artists </span>
                    </a>
                </li>

                <li>
                    <a href="/labels" class="tp-link">
                        <i data-feather="tag"></i>
                        <span> Labels </span>
                    </a>
                </li>

                <li>
                    <a href="/sales-report">
                        <i data-feather="bar-chart-2"></i>
                        <span> Sales Reports </span>
                    </a>

                </li>


                <li class="menu-title mt-2">Requests</li>

                <li>
                    <a href="/claiming-request" class="tp-link">
                        <i data-feather="check-circle"></i>
                        <span> Claiming Requests </span>
                    </a>
                </li>

                <li>
                    <a href="/relocation-request" class="tp-link">
                        <i data-feather="refresh-cw"></i>
                        <span> Relocation Requests </span>
                    </a>
                </li>
                <li>
                    <a href="/merge-request" class="tp-link">
                        <i data-feather="git-merge"></i>
                        <span>Claim/Reel Merge</span>
                    </a>
                </li>

                <li class="menu-title mt-2">Ownership Conflict</li>

                <li>
                    <a href="/youtube" class="tp-link">
                        <i data-feather="youtube"></i>
                        <span> Youtube </span>
                    </a>
                </li>

                <li>
                    <a href="/facebook" class="tp-link">
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
                    <a href="/support" class="tp-link">
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