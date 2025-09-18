<div class="admin-dashboard-page content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Welcome <?= session()->get('user')['name'] ?></h4>
                </div>
                <div>
                    <a href="<?= base_url('superadmin/add-release') ?>" class="btn btn-primary">
                        <i data-feather="plus" class="me-1"></i> Add New Release
                    </a>
                </div>
            </div>

            <!-- start row - Stats Cards -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="row g-3">
                        <!-- Card 1 - Total Revenue -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                        <i data-feather="dollar-sign" class="text-success" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <h3 class="mb-1">$12,450</h3>
                                    <p class="text-muted mb-0">Total Revenue</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 - Releases Uploaded -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                        <i data-feather="upload" class="text-primary" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <h3 class="mb-1">186</h3>
                                    <p class="text-muted mb-0">Releases Uploaded</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 - Releases Approved -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                        <i data-feather="check-circle" class="text-success" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <h3 class="mb-1">142</h3>
                                    <p class="text-muted mb-0">Releases Approved</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4 - Releases Rejected -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                        <i data-feather="x-circle" class="text-danger" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <h3 class="mb-1">24</h3>
                                    <p class="text-muted mb-0">Releases Rejected</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->


            <div class="row g-3 mb-3">
                <div class="col-12">
                    <div class="card h-100">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                    <i data-feather="edit" class="widgets-icons"></i>
                                </div>
                                <h5 class="card-title mb-0">Drafts</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Artists</th>
                                            <th>Label Name</th>
                                            <th>Last Modified</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Unfinished Symphony</td>
                                            <td>DJ Harmony</td>
                                            <td>Harmony Records</td>
                                            <td>2023-06-10</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary me-1">
                                                    <i data-feather="edit-3"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary">
                                                    <i data-feather="trash-2"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Demo Track 2023</td>
                                            <td>The Beats</td>
                                            <td>Beat Masters</td>
                                            <td>2023-06-05</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary me-1">
                                                    <i data-feather="edit-3"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary">
                                                    <i data-feather="trash-2"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Midnight Groove</td>
                                            <td>Luna & The Stars</td>
                                            <td>Lunar Sounds</td>
                                            <td>2023-05-28</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary me-1">
                                                    <i data-feather="edit-3"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary">
                                                    <i data-feather="trash-2"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Summer Vibes</td>
                                            <td>Solar Flare</td>
                                            <td>Sun Records</td>
                                            <td>2023-05-20</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary me-1">
                                                    <i data-feather="edit-3"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary">
                                                    <i data-feather="trash-2"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Urban Dreams</td>
                                            <td>City Lights</td>
                                            <td>City Records</td>
                                            <td>2023-05-15</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary me-1">
                                                    <i data-feather="edit-3"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary">
                                                    <i data-feather="trash-2"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Drafts Charts -->

        </div> <!-- container-xxl-->
    </div> <!-- content -->

    <?= $this->include('partials/footer') ?>

</div>