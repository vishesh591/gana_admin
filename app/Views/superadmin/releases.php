<div class="admin-releases-page content-page">
    <div class="content">
        <div class="container-xxl">
            <!-- Page Header: Title and Action Buttons -->
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <div class="flex-grow-1 d-flex justify-content-between align-items-center gap-3">
                    <h4 class="fs-18 fw-semibold m-0">Releases Management</h4>
                    <div class="col-auto d-flex gap-2">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                            <i class="bi bi-download me-1"></i> Export CSV
                        </button>
                        <button class="btn btn-primary" onclick="openLabelModal()">
                            <i class="bi bi-plus-lg me-1"></i> Add New Release
                        </button>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="row g-3">
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
    <i data-feather="music" class="text-primary" style="width: 24px; height: 24px;"></i>
</div>

                                    <h3 class="mb-1" id="totalReleasesCount">0</h3>
                                    <p class="text-muted mb-0">Total Releases</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
    <i data-feather="check-circle" class="text-success" style="width: 24px; height: 24px;"></i>
</div>

                                    <h3 class="mb-1" id="publishedReleasesCount">0</h3>
                                    <p class="text-muted mb-0">Published</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
    <i data-feather="search" class="text-warning" style="width: 24px; height: 24px;"></i>
</div>

                                    <h3 class="mb-1" id="reviewReleasesCount">0</h3>
                                    <p class="text-muted mb-0">In Review</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                        <i data-feather="x-circle" class="text-danger" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <h3 class="mb-1" id="rejectedReleasesCount">0</h3>
                                    <p class="text-muted mb-0">Rejected</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Table Card -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 align-middle" id="datatable" style="width:100%;">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="60" class="text-center"></th>
                                            <th>Title / Artist</th>
                                            <th class="ps-3">Submitted Date</th>
                                            <th class="ps-3">UPC</th>
                                            <th class="ps-3">ISRC</th>
                                            <th class="ps-3">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>