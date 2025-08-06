    <div class="admin-releases-page content-page">
        <div class="content">
            <div class="container-xxl">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                    <div class="flex-grow-1 d-flex justify-content-between align-items-center gap-3">
                        <h4 class="fs-18 fw-semibold m-0">Releases Management</h4>
                        <div class="col-auto d-flex gap-2">
                            <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                                <i class="bi bi-download me-1"></i> Export CSV
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
                                            <i data-feather="music" class="text-primary"></i>
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
                                            <i data-feather="check-circle" class="text-success"></i>
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
                                            <i data-feather="search" class="text-warning"></i>
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
                                            <i data-feather="x-circle" class="text-danger"></i>
                                        </div>
                                        <h3 class="mb-1" id="rejectedReleasesCount">0</h3>
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
                                        <li class="nav-item me-2"><a class="nav-link active" href="#" data-filter="all">All</a></li>
                                        <li class="nav-item me-2"><a class="nav-link" href="#" data-filter="takedown">Takedown</a></li>
                                        <li class="nav-item me-2"><a class="nav-link" href="#" data-filter="delivered">Delivered</a></li>
                                        <li class="nav-item me-2"><a class="nav-link" href="#" data-filter="review">In Review</a></li>
                                        <li class="nav-item me-2"><a class="nav-link" href="#" data-filter="rejected">Rejected</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#" data-filter="approved">Approved</a></li>
                                    </ul>
                                    <div class="search-container">
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search releases..." id="searchInput">
                                            <button class="btn btn-outline-secondary" type="button" id="searchButton"><i data-feather="search"></i></button>
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
                                    <table class="table table-hover mb-0 align-middle" id="releasesTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th width="60" class="text-center"></th>
                                                <th>Title / Artist</th>
                                                <th>Submitted Date</th>
                                                <th>UPC</th>
                                                <th>ISRC</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody"></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                                <div class="mb-2 mb-md-0" id="pagination-text"></div>
                                <nav id="pagination-nav"></nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <div id="releaseModal" class="modal fade" tabindex="-1" aria-labelledby="releaseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-3 shadow-lg">
                <div class="modal-header-custom position-relative overflow-hidden" id="releaseModalHeader">
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-image-blurred"></div>
                    <div class="d-flex align-items-center position-relative z-1 w-100">
                        <img id="releaseAlbumArtwork" src="" alt="Album Artwork" class="rounded shadow-sm me-4" style="width:120px; height:120px; object-fit:cover;">
                        <div class="flex-grow-1">
                            <h2 class="modal-title text-white fw-bold" id="releaseTitle"></h2>
                            <p class="text-white mb-3" id="releaseArtistHeader"></p>
                            <div id="releaseStatusBadges" class="d-flex align-items-center"></div>
                        </div>
                        <button type="button" class="btn btn-outline-light" id="takedownButton"><i class="bi bi-trash me-2"></i>Request Takedown</button>
                        <button type="button" class="btn-close btn-close-white ms-4" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body p-lg-5 p-4 modal-body-centered" id="releaseModalContent"></div>
                <div class="modal-footer border-0 d-flex justify-content-end bg-light py-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="labelModal" class="modal" tabindex="-1" style="display: none; background-color: rgba(0,0,0,0.6);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-3 shadow-lg bg-white position-relative">
                <button type="button" class="btn-close position-absolute end-0 top-0 m-3 z-3" aria-label="Close" onclick="closeLabelModal()"></button>
                <div class="modal-body d-flex align-items-center justify-content-center p-5">
                    <div class="w-100" style="max-width: 520px; margin: auto;">
                        <h2 class="text-center fw-bold mb-4">Create a New Album</h2>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Select Destination Label</label>
                            <select id="destinationLabelSelect" class="form-select form-select-lg shadow-sm">
                                <option value="" selected disabled>Select a label</option>
                                <option value="1">Dummy Records</option>
                                <option value="2">Music Studio X</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button id="createAlbumBtn" type="button" class="btn btn-primary btn-lg px-5 shadow-sm" disabled>Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
