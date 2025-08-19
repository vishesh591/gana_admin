<<<<<<< Updated upstream
<div class="content">
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h2 class="mb-2 fw-bold">Account</h2>
                    </div>
                    <div class="col-auto d-flex gap-2">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                            <i class="bi bi-download me-1"></i> Export to CSV
                        </button>
                        <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#claimingRequestModal">
                            <i class="bi bi-plus-lg me-1"></i>Create New Account
                        </button>
=======
<div class="admin-account-page content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h2 class="fs-50 fw-bold m-0 page-title text-black ">Account</h2>
                <div class="col-auto d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                        <i class="bi bi-download me-1"></i> Export to CSV
                    </button>
                    <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#claimingRequestModal">
                        <i class="bi bi-plus-lg me-1"></i>Create New Account
                    </button>
                </div>
            </div>

            <div class="card shadow-sm mt-4 p-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="claimingTable">
                            <thead>
                                <tr>
                                    <th width="50"></th>
                                    <th>Primary Label Name</th>
                                    <th>Label Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>

>>>>>>> Stashed changes
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="claimingTable">
                        <thead>
                            <!-- UPDATED: Table headers -->
                            <tr>
                                <th width="50"></th>
                                <th class="sortable-header" data-sort="primaryLabelName">Primary Label Name <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                <th class="sortable-header" data-sort="labelName">Label Name <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                <th class="sortable-header" data-sort="startDate">Start Date <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                <th class="sortable-header" data-sort="endDate">End Date <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                <th class="sortable-header" data-sort="status">Status <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                            </tr>
                        </thead>
                        <tbody id="tableBody"></tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                <div class="mb-2 mb-md-0" id="pagination-text">
                    <!-- This will be populated by JS -->
                </div>
                <nav>
                    <ul class="pagination mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>