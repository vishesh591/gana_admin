<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Profile</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="/images/users/user-11.jpg" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">

                                    <div class="overflow-hidden ms-4">
                                        <h4 class="m-0 text-dark fs-20"><?= esc($user['name']) ?></h4>
                                        <p class="my-1 text-muted fs-16"><?= esc($user['user_name']) ?></p>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active p-2" id="basic_info_tab" data-bs-toggle="tab" href="#basic_info" role="tab">
                                        <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                        <span class="d-none d-sm-block">Basic Information</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-2" id="login_credentials_tab" data-bs-toggle="tab" href="#login_credentials" role="tab">
                                        <span class="d-block d-sm-none"><i class="mdi mdi-key"></i></span>
                                        <span class="d-none d-sm-block">Login Credentials</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-2" id="bank_details_tab" data-bs-toggle="tab" href="#bank_details" role="tab">
                                        <span class="d-block d-sm-none"><i class="mdi mdi-bank"></i></span>
                                        <span class="d-none d-sm-block">Bank Details</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-2" id="agreement_period_tab" data-bs-toggle="tab" href="#agreement_period" role="tab">
                                        <span class="d-block d-sm-none"><i class="mdi mdi-calendar-range"></i></span>
                                        <span class="d-none d-sm-block">Agreement Period</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content text-muted bg-white">
                                <!-- Basic Information Tab -->
                                <div class="tab-pane active show pt-4" id="basic_info" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-md-6 mb-4">
                                            <div class="">
                                                <h5 class="fs-16 text-dark fw-semibold mb-3 text-capitalize">Basic Information</h5>

                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                        <div class="profile-email">
                                                            <h6 class="text-uppercase fs-13">Full Name</h6>
                                                            <p class="fs-14"><?= esc($user['name']) ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                        <div class="profile-email">
                                                            <h6 class="text-uppercase fs-13">Company Name</h6>
                                                            <p class="fs-14"><?= esc($user['company_name']) ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                        <div class="profile-email">
                                                            <h6 class="text-uppercase fs-13">Primary Label Name</h6>
                                                            <p class="fs-14"><?= esc($user['primary_label_name']) ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                        <div class="profile-email">
                                                            <h6 class="text-uppercase fs-13">Email Address</h6>
                                                            <a href="mailto:[email]" class="text-primary fs-14 text-decoration-underline"><?= esc($user['email']) ?></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                        <div class="profile-email">
                                                            <h6 class="text-uppercase fs-13">Phone Number</h6>
                                                            <p class="fs-14"><?= esc($user['phone']) ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                        <div class="profile-email">
                                                            <h6 class="text-uppercase fs-13">Role</h6>
                                                            <span class="badge bg-light px-3 text-dark py-2 fw-semibold text-capitalize"><?= esc($user['role_name']) ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Login Credentials Tab -->

                                <div class="tab-pane pt-4" id="login_credentials" role="tabpanel">

                                    <div class="row">
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="card border mb-0">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h4 class="card-title mb-0">Login Information</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Username</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <input class="form-control" type="text" value="<?= esc($user['user_name']) ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-xl-6">
                                            <div class="card border mb-0">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h4 class="card-title mb-0">Change Password</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body mb-0">
                                                    <div id="passwordAlert"></div> <!-- success/error messages -->

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Old Password</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="input-group">
                                                                <input class="form-control rounded-start-pill p-3" id="old_password" type="password" placeholder="Old Password" style="border-right: none;">
                                                                <button class="btn btn-outline-secondary rounded-end-pill" type="button" id="toggleOldPassword" style="border-left: none;">
                                                                    <i class="bi bi-eye-slash" id="toggleOldIcon"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">New Password</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="input-group">
                                                                <input class="form-control rounded-start-pill p-3" id="new_password" type="password" placeholder="New Password" style="border-right: none;">
                                                                <button class="btn btn-outline-secondary rounded-end-pill" type="button" id="toggleNewPassword" style="border-left: none;">
                                                                    <i class="bi bi-eye-slash" id="toggleNewIcon"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Confirm Password</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="input-group">
                                                                <input class="form-control rounded-start-pill p-3" id="confirm_password" type="password" placeholder="Confirm Password" style="border-right: none;">
                                                                <button class="btn btn-outline-secondary rounded-end-pill" type="button" id="toggleConfirmPassword" style="border-left: none;">
                                                                    <i class="bi bi-eye-slash" id="toggleConfirmIcon"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-12 col-xl-12">
                                                            <button type="button" id="changePasswordBtn" class="btn btn-primary">Change Password</button>
                                                            <button type="button" class="btn btn-danger">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Bank Details Tab -->
                                <div class="tab-pane pt-4" id="bank_details" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <h5 class="fs-16 text-dark fw-semibold mb-3 text-capitalize">Bank Details</h5>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="profile-email mb-3">
                                                    <h6 class="text-uppercase fs-13">Account Holder Name</h6>
                                                    <p class="fs-14"><?= esc($user['holder_name']) ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="profile-email mb-3">
                                                    <h6 class="text-uppercase fs-13">Account Number</h6>
                                                    <p class="fs-14"><?= esc($user['account_number']) ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="profile-email mb-3">
                                                    <h6 class="text-uppercase fs-13">IFSC Code</h6>
                                                    <p class="fs-14"><?= esc($user['ifsc_code']) ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="profile-email mb-3">
                                                    <h6 class="text-uppercase fs-13">Branch Name</h6>
                                                    <p class="fs-14"><?= esc($user['branch_name']) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Agreement Period Tab -->
                                <div class="tab-pane pt-4" id="agreement_period" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <h5 class="fs-16 text-dark fw-semibold mb-3 text-capitalize">Agreement Period</h5>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="profile-email mb-3">
                                                    <h6 class="text-uppercase fs-13">Agreement Start Date</h6>
                                                    <p class="fs-14"><?= esc($user['agreement_start_date']) ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="profile-email mb-3">
                                                    <h6 class="text-uppercase fs-13">Agreement End Date</h6>
                                                    <p class="fs-14"><?= esc($user['agreement_end_date']) ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <div class="card border">
                                                    <div class="card-body">
                                                        <h6 class="text-uppercase fs-13 mb-3">Agreement Status</h6>

                                                        <?php
                                                        $isActive = false;
                                                        $today = date('Y-m-d');

                                                        if (!empty($user['agreement_start_date']) && !empty($user['agreement_end_date'])) {
                                                            $isActive = ($today >= $user['agreement_start_date'] && $today <= $user['agreement_end_date']);
                                                        }
                                                        ?>

                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <p class="mb-1">
                                                                    Current Status:
                                                                    <?php if ($isActive): ?>
                                                                        <span class="badge bg-success">Active</span>
                                                                    <?php else: ?>
                                                                        <span class="badge bg-danger">Inactive</span>
                                                                    <?php endif; ?>
                                                                </p>
                                                                <p class="mb-0 text-muted">
                                                                    Duration:
                                                                    <?= esc($user['agreement_start_date']) ?> → <?= esc($user['agreement_end_date']) ?>
                                                                </p>
                                                            </div>

                                                            <div>
                                                                <?php if (!empty($user['agreement_document'])): ?>
                                                                    <a href="<?= base_url($user['agreement_document']) ?>"
                                                                        class="btn btn-outline-primary btn-sm"
                                                                        target="_blank">
                                                                        View Agreement
                                                                    </a>
                                                                <?php else: ?>
                                                                    <span class="text-muted">No Document</span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- content -->


</div>