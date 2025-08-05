<div class="content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h4 class="fs-18 fw-semibold m-0">Claim / Reel Merge Data</h4>
                <div class="col-auto d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                        <i class="bi bi-download me-1"></i> Export to CSV
                    </button>
                    <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#newClaimRequestModal">
                        <i class="bi bi-plus-lg me-1"></i> New Claiming Request
                    </button>
                </div>
            </div>
            <div class="card shadow-sm mb-4">
                <div class="card-body p-3">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <ul class="nav nav-pills mb-3 mb-md-0" id="filterTabs">
                            <li class="nav-item me-2"><a class="nav-link active" href="#" data-filter="all">All</a></li>
                            <li class="nav-item me-2"><a class="nav-link" href="#" data-filter="pending">Pending</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter="rejected">Rejected</a></li>
                        </ul>
                        <div class="input-group" style="max-width: 300px;">
                            <input type="search" class="form-control" placeholder="Search by Song, Artist, ISRC..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="button" id="searchButton"><i data-feather="search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="claimingTable">
                            <thead class="table-light">
                                <tr>
                                    <th width="50"></th>
                                    <th>Song Name / Artist</th>
                                    <th>ISRC</th>
                                    <th class="text-center">Links</th>
                                    <th>Matching Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody"></tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                    <div class="mb-2 mb-md-0" id="pagination-text"></div>
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
</div>