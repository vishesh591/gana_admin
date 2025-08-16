<div class="admin-releases-page content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <div class="flex-grow-1 d-flex justify-content-between align-items-center gap-3">
                    <h4 class="fs-18 fw-semibold m-0">Releases Management</h4>
                    <div class="col-auto d-flex gap-2">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                            <i class="bi bi-download me-1"></i> Export table CSV
                        </button>
                        <a href="<?= base_url('superadmin/add-release') ?>" class="btn btn-primary">
                            <i data-feather="plus" class="me-1"></i> Add New Release
                        </a>
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
                                        <a class="nav-link active" href="#">All</a>
                                    </li>
                                    <li class="nav-item me-2">
                                        <a class="nav-link" href="#">Takedown</a>
                                    </li>
                                    <li class="nav-item me-2">
                                        <a class="nav-link" href="#">Delivered</a>
                                    </li>
                                    <li class="nav-item me-2">
                                        <a class="nav-link" href="#">In Review</a>
                                    </li>
                                    <li class="nav-item me-2">
                                        <a class="nav-link" href="#">Rejected</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Approved</a>
                                    </li>
                                </ul>

                                <div class="search-container">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search releases..." id="searchInput">
                                        <button class="btn btn-outline-secondary" type="button">
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
                                        <tr>
                                            <td class="text-center">
                                                <i class="bi bi-check-circle-fill text-success" title="Delivered"></i>
                                            </td>
                                            <td>
                                                <div>
                                                    <div class="release-title">
                                                        <a href="#" class="text-primary text-decoration-none" data-bs-toggle="modal" data-bs-target="#releaseModal">
                                                            Swapnil Dada Kartoy Raj
                                                        </a>
                                                    </div>
                                                    <div class="release-artist">Mohit Jadhav</div>
                                                </div>
                                            </td>
                                            <td>7th July 2025</td>
                                            <td>5863544729375</td>
                                            <td>INH722302515</td>
                                            <td><span class="badge status-badge status-delivered">DELIVERED</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <i class="bi bi-hourglass-split text-warning" title="In Review"></i>
                                            </td>
                                            <td>
                                                <div>
                                                    <div class="release-title">
                                                        <a href="#" class="text-primary text-decoration-none" data-bs-toggle="modal" data-bs-target="#releaseModal">
                                                            Dream Chaser
                                                        </a>
                                                    </div>
                                                    <div class="release-artist">Sarah Johnson</div>
                                                </div>
                                            </td>
                                            <td>5th July 2025</td>
                                            <td>5863544729376</td>
                                            <td>INH722302516</td>
                                            <td><span class="badge status-badge status-review">IN REVIEW</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <i class="bi bi-check-circle-fill text-success" title="Approved"></i>
                                            </td>
                                            <td>
                                                <div>
                                                    <div class="release-title">
                                                        <a href="#" class="text-primary text-decoration-none" data-bs-toggle="modal" data-bs-target="#releaseModal">
                                                            Midnight Blues
                                                        </a>
                                                    </div>
                                                    <div class="release-artist">Alex Rodriguez</div>
                                                </div>
                                            </td>
                                            <td>3rd July 2025</td>
                                            <td>5863544729377</td>
                                            <td>INH722302517</td>
                                            <td><span class="badge status-badge status-approved">APPROVED</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                            <div class="mb-2 mb-md-0">
                                Showing <strong>1</strong> to <strong>3</strong> of <strong>3</strong> entries
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

<div id="releaseModal" class="modal fade" tabindex="-1" aria-labelledby="releaseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-3 shadow-lg">

            <div class="modal-header-custom position-relative overflow-hidden" id="releaseModalHeader">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-image-blurred" style="background-image: url('/images/rocket.png');"></div>

                <div class="d-flex align-items-center position-relative z-1 w-100">
                    <img id="releaseAlbumArtwork" src="/images/rocket.png" alt="Album Artwork" class="rounded shadow-sm me-4">
                    <div class="flex-grow-1">
                        <h2 class="modal-title text-white fw-bold" id="releaseTitle">Swapnil Dada Kartoy Raj</h2>
                        <p class="text-white mb-3" id="releaseArtistHeader">Mohit Jadhav</p>
                        <div id="releaseStatusBadges" class="d-flex align-items-center">
                            <span class="badge bg-success me-2">DELIVERED</span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-takedown-header" id="takedownButton">
                        <i class="bi bi-trash me-2"></i>Request Takedown
                    </button>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>

            <div class="modal-body p-4 modal-body-centered" id="releaseModalContent">
                <div class="modal-content-wrapper">
                    <div class="modal-content-card">
                        <h5 class="card-title">Release Details</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Artist</label>
                                <p class="form-control-plaintext fw-bold">Mohit Jadhav</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Submitted Date</label>
                                <p class="form-control-plaintext">7th July 2025</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Cat. No</label>
                                <p class="form-control-plaintext">MJ-001</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">UPC/EAN</label>
                                <p class="form-control-plaintext">5863544729375</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Record Label</label>
                                <p class="form-control-plaintext">Music Dreams</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Featuring Artist</label>
                                <p class="form-control-plaintext">None</p>
                            </div>
                            <div class="col-12 mb-0">
                                <label class="form-label">Lyricist(s)</label>
                                <p class="form-control-plaintext">Mohit Jadhav, Priya Sharma</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-content-card">
                        <h5 class="card-title">Track List</h5>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle track-list-table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">ISRC</th>
                                        <th scope="col">Language</th>
                                        <th scope="col" class="text-center">Tags</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Swapnil Dada Kartoy Raj</td>
                                        <td>3:45</td>
                                        <td>INH722302515</td>
                                        <td>Marathi</td>
                                        <td class="text-center">
                                            <span class="track-tag-clean badge text-white">Clean</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>Jai Maharashtra</td>
                                        <td>4:10</td>
                                        <td>INH722302516</td>
                                        <td>Marathi</td>
                                        <td class="text-center">
                                            <span class="track-tag-clean badge text-white">Clean</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer border-0 d-flex justify-content-end bg-light py-3">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<div id="labelModal" class="modal" tabindex="-1" style="display: none; background-color: rgba(0,0,0,0.6);">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content border-0 rounded-0 shadow-lg bg-white position-relative">

            <button type="button" class="btn-close position-absolute end-0 top-0 m-4 z-3" aria-label="Close"></button>

            <div class="modal-body d-flex align-items-center justify-content-center p-5">
                <div class="w-100" style="max-width: 520px; margin: auto;">

                    <h2 class="text-center fw-bold mb-4"> Create a New Album</h2>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Select Destination Label</label>
                        <select id="destinationLabelSelect" class="form-select shadow-sm">
                            <option value="" selected disabled>Select a label</option>
                            <option value="1">Dummy Records</option>
                            <option value="2">Music Studio X</option>
                            <option value="3">WaveTone Records</option>
                            <option value="4">Night Owl Sounds</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <a href="add-release.php" id="createAlbumBtn" class="btn btn-primary px-4 py-2 shadow-sm">Create</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>