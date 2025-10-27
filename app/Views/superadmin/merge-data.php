<div class="admin-merge-data-page content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h4 class="fs-18 fw-semibold m-0">Claim / Reel Merge Data</h4>
                <div class="col-auto d-flex gap-2">
                    <!-- <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                        <i class="bi bi-download me-1"></i> Export to CSV
                    </button> -->
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newRequestModal">
                        <i class="bi bi-plus-lg me-1"></i> New Claiming Request
                    </button> -->
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-3 border-bottom">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <ul class="nav nav-pills w-100 justify-content-evenly mb-3 mb-md-0" id="filterTabs">
                            <li class="nav-item"><a class="nav-link active" href="#" data-filter="all">All</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter="pending">Pending</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter="rejected">Rejected</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter="approved">Approved</a></li>

                        </ul>
                    </div>
                </div>

                <div class="card-body p-4 admin-merge-data-page">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle" id="mergeDataTable" style="width:100%;">
                            <thead class="table-light">
                                <tr>
                                    <th width="60" class="text-center"></th>
                                    <th>Song Name / Artist</th>
                                    <th>ISRC</th>
                                    <th class="text-center">Links</th>
                                    <th>Matching Time</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                    <div class="mb-2 mb-md-0" id="pagination-text"></div>
                    <nav>
                        <ul class="pagination mb-0" id="pagination-controls"></ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('partials/footer') ?>
</div>

<div class="modal fade" id="newRequestModal" tabindex="-1" aria-labelledby="newRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
            <form id="newRequestForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRequestModalLabel">New Claiming Request Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3"><label for="songNameInput" class="form-label">Song Name</label><input type="text" class="form-control" id="songNameInput" required></div>
                    <div class="mb-3"><label for="artistInput" class="form-label">Artist</label><input type="text" class="form-control" id="artistInput" required></div>
                    <div class="mb-3"><label for="isrcInput" class="form-label">ISRC</label><input type="text" class="form-control" id="isrcInput"></div>
                    <div class="mb-3"><label for="instagramAudioInput" class="form-label">Instagram Audio Link</label><input type="url" class="form-control" id="instagramAudioInput"></div>
                    <div class="mb-3"><label for="reelMergeInput" class="form-label">Reel Merge Link</label><input type="url" class="form-control" id="reelMergeInput"></div>
                    <div class="mb-3"><label for="matchingTimeInput" class="form-label">Matching Time</label><input type="text" class="form-control" id="matchingTimeInput" placeholder="e.g., 00:15-00:45"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="mergeDataModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="mergeModalTitle">Request Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="detail-label">Song Name</label>
                        <p class="detail-value" id="modal-songName"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="detail-label">Artist</label>
                        <p class="detail-value" id="modal-artist"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="detail-label">ISRC</label>
                        <p class="detail-value" id="modal-isrc"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="detail-label">Matching Time</label>
                        <p class="detail-value" id="modal-matchingTime"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="detail-label">Instagram Audio</label>
                        <p class="detail-value" id="modal-instagramAudio"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="detail-label">Reel Merge</label>
                        <p class="detail-value" id="modal-reelMerge"></p>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="detail-label">Status</label>
                        <p class="detail-value" id="modal-status"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger rounded-pill px-4" id="rejectBtn">Reject</button>
                <button type="button" class="btn btn-success rounded-pill px-4" id="approveBtn">Approve</button>
            </div>
        </div>
    </div>
</div>