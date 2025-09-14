<div class="admin-youtube-ownership-page content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h4 class="fs-18 fw-bold m-0">YouTube Ownership Details</h4>
                <small class="text-muted">Click a row to see the submitted resolution.</small>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive mb-4">
                        <table class="table table-hover mb-0 align-middle youtube-datatable" style="width:100%;">
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
                            <tbody class="youtube-data-body"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="youtubeOwnershipDetailsOffcanvas" style="width: 650px;">
    <div class="offcanvas-header border-bottom">
        <div>
            <h5 class="offcanvas-title mb-0" id="youtubeOwnershipOffcanvasTitle">Resolution Details</h5>
            <small class="text-muted" id="youtubeOwnershipOffcanvasSubtitle">VS. Unknown</small>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <!-- Album/Song Information -->
        <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center" style="background-color: #f8f9fa;">
            <img src="https://placehold.co/80x80/FF0000/ffffff?text=YT" class="album-cover rounded" id="youtubeOwnershipAlbumCover" alt="Album Art">
            <div class="ms-3">
                <div class="fw-bold" id="youtubeOwnershipSongName">Song Title</div>
                <div class="small text-muted" id="youtubeOwnershipArtistName">Artist Name</div>
                <div class="small text-muted">
                    <span id="youtubeOwnershipIsrc">ISRC: N/A</span> -
                    <span id="youtubeOwnershipPlatform">YouTube</span>
                </div>
            </div>
        </div>

        <!-- Current Status Display -->
        <div class="status-section">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="fw-bold mb-1">Current Status</h6>
                    <span id="youtubeCurrentStatusBadge" class="badge bg-warning">In Review</span>
                </div>
                <div class="text-end">
                    <small class="text-muted">Last Updated:</small>
                    <div class="small" id="youtubeLastUpdatedDate">-</div>
                </div>
            </div>
        </div>

        <!-- Admin Controls (only visible for admin users) -->
        <div class="admin-controls" id="youtubeAdminControls">
            <h6 class="fw-bold mb-3">
                <i class="bi bi-gear me-2"></i>Administrative Controls
            </h6>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label small fw-bold">Update Status:</label>
                    <select class="form-select" id="youtubeStatusDropdown">
                        <option value="In Review">In Review</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <button type="button" class="btn btn-success btn-sm" id="youtubeUpdateStatusBtn">
                        <i class="bi bi-check-lg me-1"></i>Update Status
                    </button>
                </div>
            </div>

            <!-- Rejection Message (shown when status is Rejected) -->
            <div id="youtubeRejectionMessageSection" class="d-none">
                <label class="form-label small fw-bold">Rejection Reason:</label>
                <textarea class="form-control rejection-textarea" id="youtubeRejectionMessage" placeholder="Please provide a reason for rejection..."></textarea>
            </div>
        </div>

        <!-- Resolution Details -->
        <div class="resolution-details" id="youtubeResolutionDetailsSection">
            <h6 class="fw-bold mb-3">
                <i class="bi bi-info-circle me-2"></i>Resolution Details
            </h6>

            <div class="mb-3">
                <label class="form-label fw-bold small">Rights Ownership:</label>
                <div class="p-2 bg-white rounded border" id="youtubeResolutionRightsOwned">
                    <i class="bi bi-dash-circle text-muted"></i> Loading...
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold small">Supporting Document:</label>
                <div id="youtubeSupportingDocumentInfo" class="document-link">
                    <i class="bi bi-file-earmark-text text-muted me-2"></i>Loading document info...
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold small">Submission Date:</label>
                <div class="p-2 bg-white rounded border" id="youtubeResolutionDate">
                    <i class="bi bi-calendar text-muted me-2"></i>Loading date...
                </div>
            </div>

            <!-- YouTube Specific Details -->
            <div class="mb-3">
                <label class="form-label fw-bold small">Video Details:</label>
                <div class="p-2 bg-white rounded border">
                    <div class="small mb-1">
                        <strong>Video Title:</strong> <span id="youtubeVideoTitle">-</span>
                    </div>
                    <div class="small mb-1">
                        <strong>Channel:</strong> <span id="youtubeChannelName">-</span>
                    </div>
                    <div class="small">
                        <strong>Issue Type:</strong> <span id="youtubeIssueType">-</span>
                    </div>
                </div>
            </div>

            <!-- <div class="mb-3">
                <label class="form-label fw-bold small">Match Information:</label>
                <div class="p-2 bg-white rounded border">
                    <div class="small mb-1">
                        <strong>Duration:</strong> <span id="youtubeDurationSeconds">-</span> seconds
                    </div>
                    <div class="small mb-1">
                        <strong>Reference Coverage:</strong> <span id="youtubeDurationPercentageReference">-</span>%
                    </div>
                    <div class="small">
                        <strong>Video Coverage:</strong> <span id="youtubeDurationPercentageVideo">-</span>%
                    </div>
                </div>
            </div> -->
        </div>

        <!-- Rejection Message Display (shown when status is Rejected) -->
        <div class="rejection-message d-none" id="youtubeRejectionDisplaySection">
            <h6 class="fw-bold mb-3">
                <i class="bi bi-x-circle me-2"></i>Rejection Details
            </h6>
            <p class="mb-0" id="youtubeRejectionDisplayMessage">No rejection message available.</p>
            <hr class="my-2">
            <small class="text-muted">Rejected on: <span id="youtubeRejectionDate">-</span></small>
        </div>
    </div>

    <div class="offcanvas-footer d-flex justify-content-between p-3 bg-light border-top">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">
            <i class="bi bi-x-lg me-1"></i>Close
        </button>
        <div>
            <button type="button" class="btn btn-primary" id="youtubeRefreshDataBtn">
                <i class="bi bi-arrow-clockwise me-1"></i>Refresh
            </button>
        </div>
    </div>
</div>