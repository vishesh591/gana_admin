<div class="admin-ownership-data-page content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h4 class="fs-18 fw-bold m-0">Facebook Ownership Details</h4>
                <small class="text-muted">Click a row to see the submitted resolution.</small>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive mb-4">
                        <table class="table table-hover mb-0 align-middle datatable" style="width:100%;">
                            <thead class="table-light">
                                <tr>
                                    <th width="50" class="no-sort">Store</th>
                                    <th>Category</th>
                                    <th>Asset Title</th>
                                    <th>Artist / Asset ID</th>
                                    <th>UPC</th>
                                    <th>Other Party</th>
                                    <th>Daily Views</th>
                                    <th>Expiry</th>
                                    <th>Status</th>
                                    <th width="50" class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody class="facebook-data-body"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('partials/footer') ?>
</div>


<div class="offcanvas offcanvas-end" tabindex="-1" id="ownershipDetailsOffcanvas" style="width: 650px;">
    <div class="offcanvas-header border-bottom">
        <div>
            <h5 class="offcanvas-title mb-0" id="ownershipOffcanvasTitle">Resolution Details</h5>
            <small class="text-muted" id="ownershipOffcanvasSubtitle">VS. Unknown</small>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <!-- Album/Song Information -->
        <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center" style="background-color: #f8f9fa;">
            <img src="https://placehold.co/80x80/3b5998/ffffff?text=FB" class="album-cover rounded" id="ownershipAlbumCover" alt="Album Art">
            <div class="ms-3">
                <div class="fw-bold" id="ownershipSongName">Song Title</div>
                <div class="small text-muted" id="ownershipArtistName">Artist Name</div>
                <div class="small text-muted">
                    <span id="ownershipIsrc">ISRC: N/A</span> -
                    <span id="ownershipPlatform">Platform</span>
                </div>
            </div>
        </div>

        <!-- Current Status Display -->
        <div class="status-section">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="fw-bold mb-1">Current Status</h6>
                    <span id="currentStatusBadge" class="badge bg-warning">In Review</span>
                </div>
                <div class="text-end">
                    <small class="text-muted">Last Updated:</small>
                    <div class="small" id="lastUpdatedDate">-</div>
                </div>
            </div>
        </div>

        <!-- Admin Controls (only visible for admin users) -->
        <div class="admin-controls" id="adminControls">
            <h6 class="fw-bold mb-3">
                <i class="bi bi-gear me-2"></i>Administrative Controls
            </h6>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label small fw-bold">Update Status:</label>
                    <select class="form-select" id="statusDropdown">
                        <option value="In Review">In Review</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <button type="button" class="btn btn-success btn-sm" id="updateStatusBtn">
                        <i class="bi bi-check-lg me-1"></i>Update Status
                    </button>
                </div>
            </div>

            <!-- Rejection Message (shown when status is Rejected) -->
            <div id="rejectionMessageSection" class="d-none">
                <label class="form-label small fw-bold">Rejection Reason:</label>
                <textarea class="form-control rejection-textarea" id="rejectionMessage" placeholder="Please provide a reason for rejection..."></textarea>
            </div>
        </div>

        <!-- Resolution Details -->
        <div class="resolution-details" id="resolutionDetailsSection">
            <h6 class="fw-bold mb-3">
                <i class="bi bi-info-circle me-2"></i>Resolution Details
            </h6>

            <div class="mb-3">
                <label class="form-label fw-bold small">Rights Ownership:</label>
                <div class="p-2 bg-white rounded border" id="resolutionRightsOwned">
                    <i class="bi bi-dash-circle text-muted"></i> Loading...
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold small">Selected Territories:</label>
                <div class="territories-display border rounded p-2 small bg-light"
                    id="resolutionCountries"
                    style="max-height: 120px; overflow-y: auto;">
                    <i class="bi bi-globe text-muted me-2"></i>Loading territories...
                </div>
            </div>


            <div class="mb-3">
                <label class="form-label fw-bold small">Supporting Document:</label>
                <div id="supportingDocumentInfo" class="document-link">
                    <i class="bi bi-file-earmark-text text-muted me-2"></i>Loading document info...
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold small">Submission Date:</label>
                <div class="p-2 bg-white rounded border" id="resolutionDate">
                    <i class="bi bi-calendar text-muted me-2"></i>Loading date...
                </div>
            </div>
        </div>

        <!-- Rejection Message Display (shown when status is Rejected) -->
        <div class="rejection-message d-none" id="rejectionDisplaySection">
            <h6 class="fw-bold mb-3">
                <i class="bi bi-x-circle me-2"></i>Rejection Details
            </h6>
            <p class="mb-0" id="rejectionDisplayMessage">No rejection message available.</p>
            <hr class="my-2">
            <small class="text-muted">Rejected on: <span id="rejectionDate">-</span></small>
        </div>

        <!-- Action History -->
        <!-- <div class="mt-4">
            <h6 class="fw-bold mb-3">
                <i class="bi bi-clock-history me-2"></i>Action History
            </h6>
            <div id="actionHistory" class="bg-light rounded p-3">
                <div class="d-flex align-items-center text-muted">
                    <i class="bi bi-hourglass-split me-2"></i>
                    <small>Loading history...</small>
                </div>
            </div>
        </div> -->
    </div>

    <div class="offcanvas-footer d-flex justify-content-between p-3 bg-light border-top">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">
            <i class="bi bi-x-lg me-1"></i>Close
        </button>
        <div>
            <button type="button" class="btn btn-primary" id="refreshDataBtn">
                <i class="bi bi-arrow-clockwise me-1"></i>Refresh
            </button>
        </div>
    </div>
</div>