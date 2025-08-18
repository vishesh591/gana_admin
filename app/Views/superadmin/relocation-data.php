<div class="admin-reloc-data-page content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h4 class="fs-18 fw-semibold m-0">Relocation Data</h4>
                <div class="col-auto d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                        <i class="bi bi-download me-1"></i> Export to CSV
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newRequestModal">
                        <i class="bi bi-plus-lg me-1"></i> Add New Request
                    </button>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-3 border-bottom">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <ul class="nav nav-pills w-100 justify-content-evenly mb-3 mb-md-0" id="filterTabs">
                            <li class="nav-item"><a class="nav-link active" href="#" data-filter="all">All</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter="pending">Pending</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter="rejected">Rejected</a></li>
                        </ul>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle" id="datatable" style="width:100%;">
                            <thead class="table-light">
                                <tr>
                                    <th width="60" class="text-center"></th>
                                    <th>Song Name / Artist</th>
                                    <th>ISRC</th>
                                    <th class="text-center">Links</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                </tbody>
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
</div>

<div class="modal fade" id="newRequestModal" tabindex="-1" aria-labelledby="newRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
            <form id="newRequestForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRequestModalLabel">New Relocation Request</h5>
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

<div class="modal fade" id="releaseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content shadow-lg">
            <div class="modal-header-custom" id="releaseModalHeader">
                <div class="bg-image-blurred"></div>
                <div class="d-flex w-100">
                    <img id="releaseAlbumArtwork" src="" alt="Album Artwork" class="me-4">
                    <div class="flex-grow-1">
                        <h2 id="releaseTitle"></h2>
                        <p id="releaseArtistHeader"></p>
                        <div id="releaseStatusBadges"></div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body p-4 bg-light">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="card-title mb-4">Request Details</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3"><label class="detail-label">ISRC</label><p class="detail-value" id="modal-isrc"></p></div>
                                    <div class="col-md-6 mb-3"><label class="detail-label">Matching Time</label><p class="detail-value" id="modal-matchingTime"></p></div>
                                    <div class="col-md-6 mb-3"><label class="detail-label">Instagram Audio</label><p class="detail-value" id="modal-instagramAudio"></p></div>
                                    <div class="col-md-6 mb-3"><label class="detail-label">Reel Merge</label><p class="detail-value" id="modal-reelMerge"></p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-center bg-light py-3">
                <button type="button" class="btn btn-danger rounded-pill px-4" id="rejectBtn">Reject</button>
                <button type="button" class="btn btn-success rounded-pill px-4" id="approveBtn">Approve</button>
            </div>
        </div>
    </div>
</div>