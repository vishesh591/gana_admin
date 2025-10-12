<?php 
helper('auth'); // Load our auth helper
$userRole = get_user_role(); 
?>

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

                <!-- Dashboard - visible to all -->
                <li>
                    <a href="<?= base_url() ?>dashboard" class="tp-link">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <!-- DATA SECTION - Only for superadmin and subadmin -->
                <?php if (user_has_role(['superadmin', 'subadmin'])): ?>
                <li class="menu-title">Data Management</li>

                <li>
                    <a href="<?= base_url() ?>claiming-data" class="tp-link">
                        <i data-feather="check-circle"></i>
                        <span>Claiming Data</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>relocation-data" class="tp-link">
                        <i data-feather="refresh-cw"></i>
                        <span>Relocation Data</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>merge-data" class="tp-link">
                        <i data-feather="tag"></i>
                        <span> Claim/Reel Data </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>facebook-ownership-data" class="tp-link">
                        <i data-feather="facebook"></i>
                        <span> Facebook Ownership Data </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>youtube-ownership-data" class="tp-link">
                        <i data-feather="youtube"></i>
                        <span> Youtube Ownership Data </span>
                    </a>
                </li>
                                <!-- SUPPORT - visible to all -->
                <li>
                    <a href="<?= base_url() ?>support" class="tp-link">
                        <i data-feather="help-circle"></i>
                        <span> Support List</span>
                    </a>
                </li>
                <?php endif; ?>

                <li class="menu-title mt-2">Music Distribution</li>

                <li>
                    <a href="<?= base_url() ?>releases">
                        <i data-feather="music"></i>
                        <span class="menu-text"> Releases </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() ?>artists" class="tp-link">
                        <i data-feather="user"></i>
                        <span> Artists </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() ?>labels" class="tp-link">
                        <i data-feather="tag"></i>
                        <span> Labels </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() ?>sales-report">
                        <i data-feather="bar-chart-2"></i>
                        <span> Sales Reports </span>
                    </a>
                </li>



                <!-- REQUESTS SECTION - Only for superadmin and subadmin -->
                <li class="menu-title mt-2">Requests</li>

                <li>
                    <a href="<?= base_url() ?>claiming-request" class="tp-link">
                        <i data-feather="check-circle"></i>
                        <span> Claiming Requests </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() ?>relocation-request" class="tp-link">
                        <i data-feather="refresh-cw"></i>
                        <span> Relocation Requests </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>merge-request" class="tp-link">
                        <i data-feather="git-merge"></i>
                        <span>Claim/Reel Merge</span>
                    </a>
                </li>

                <li class="menu-title mt-2">Ownership Conflict</li>

                <li>
                    <a href="<?= base_url() ?>youtube" class="tp-link">
                        <i data-feather="youtube"></i>
                        <span> Youtube </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() ?>facebook" class="tp-link">
                        <i data-feather="facebook"></i>
                        <span> Facebook </span>
                    </a>
                </li>

                <!-- USER MANAGEMENT - Only superadmin -->
                <li class="menu-title mt-2">User Management</li>

                <li>
                    <a href="<?= base_url() ?>accounts">
                        <i data-feather="settings"></i>
                        <span> Accounts </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() ?>support_user" class="tp-link">
                        <i data-feather="help-circle"></i>
                        <span> Support</span>
                    </a>
                </li>

             
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
<!-- Left Sidebar End -->
