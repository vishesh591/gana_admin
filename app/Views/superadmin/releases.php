<div class="content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <div class="flex-grow-1 d-flex justify-content-between align-items-center gap-3">
                    <h4 class="fs-18 fw-semibold m-0">Releases Management</h4>
                    <div class="col-auto d-flex gap-2">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                            <i class="bi bi-download me-1"></i> Export table CSV
                        </button>
                        <button class="btn btn-primary" onclick="openLabelModal()">
                            <i data-feather="plus" class="me-1"></i> Add New Release
                        </button>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <div class="row g-3">
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                        <i data-feather="music" class="text-primary" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <h3 class="mb-1">2</h3>
                                    <p class="text-muted mb-0">Total Releases</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                        <i data-feather="upload" class="text-info" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <h3 class="mb-1">1</h3>
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
                                    <h3 class="mb-1">1</h3>
                                    <p class="text-muted mb-0">In Review</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                        <i data-feather="x" class="text-danger" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <h3 class="mb-1">0</h3>
                                    <p class="text-muted mb-0">Rejected</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body p-3">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                                <ul class="nav nav-pills mb-3 mb-md-0" id="filterTabs">
                                    <li class="nav-item me-2">
                                        <a class="nav-link active" href="?filter=all" data-filter="all">All</a>
                                    </li>
                                    <li class="nav-item me-2">
                                        <a class="nav-link" href="?filter=takedown" data-filter="takedown">Takedown</a>
                                    </li>
                                    <li class="nav-item me-2">
                                        <a class="nav-link" href="?filter=delivered" data-filter="delivered">Delivered</a>
                                    </li>
                                    <li class="nav-item me-2">
                                        <a class="nav-link" href="?filter=review" data-filter="review">In
                                            Review</a>
                                    </li>
                                    <li class="nav-item me-2">
                                        <a class="nav-link" href="?filter=rejected" data-filter="rejected">Rejected</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="?filter=approved" data-filter="approved">Approved</a>
                                    </li>
                                </ul>

                                <div class="search-container">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search releases..." id="searchInput">
                                        <button class="btn btn-outline-secondary" type="button" onclick="performSearch()">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="releasesTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="60"></th>
                                            <th>Title / Artist</th>
                                            <th>Submitted Date</th>
                                            <th>UPC</th>
                                            <th>ISRC</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                            <div class="mb-2 mb-md-0">
                                Showing <strong>1</strong> to <strong>2</strong> of <strong>2</strong> entries
                            </div>

                            <nav>
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>