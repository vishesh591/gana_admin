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
                        <a href="<?= base_url('superadmin/add-release') ?>" class="btn btn-primary">
                            <i data-feather="plus" class="me-1"></i> Add New Release
                        </a>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
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

            <div class="card shadow-sm">
                <div class="card-body p-3 border-bottom">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <ul class="nav nav-pills w-100 justify-content-evenly mb-3 mb-md-0">
                            <li class="nav-item"><a class="nav-link active" href="#" data-filter="all">All</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter="delivered">Delivered</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter="approved">Approved</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter="review">In Review</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter="rejected">Rejected</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter="takedown">Takedown</a></li>
                        </ul>
                    </div>
                </div>

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
                            <tbody id="tableBody">
                                        <?php foreach ($data['releases'] as $release): ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php if ($release['status'] == 3): ?>
                                                        <i class="bi bi-check-circle-fill text-success" title="Delivered"></i>
                                                    <?php elseif ($release['status'] == 1): ?>
                                                        <i class="bi bi-hourglass-split text-warning" title="In Review"></i>
                                                    <?php elseif ($release['status'] == 5): ?>
                                                        <i class="bi bi-check-circle-fill text-primary" title="Approved"></i>
                                                    <?php elseif ($release['status'] == 2): ?>
                                                        <i class="bi bi-x-circle-fill text-danger" title="Takedown"></i>
                                                    <?php elseif ($release['status'] == 4): ?>
                                                        <i class="bi bi-slash-circle text-danger" title="Rejected"></i>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="#"
                                                            class="release-link"
                                                            data-id="<?= $release['id'] ?>"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#releaseModal">
                                                            <?= esc($release['title']) ?>
                                                        </a>

                                                        <div class="release-artist"><?= esc($release['author']) ?></div>
                                                    </div>

                                                </td>
                                                <td><?= date('jS F Y', strtotime($release['created_at'])) ?></td>
                                                <td><?= esc($release['upc_ean']) ?></td>
                                                <td><?= esc($release['isrc']) ?></td>
                                                <td>
                                                    <?php if ($release['status'] == 1): ?>
                                                        <span class="badge status-badge status-review">IN REVIEW</span>
                                                    <?php elseif ($release['status'] == 2): ?>
                                                        <span class="badge status-badge status-takedown">TAKEDOWN</span>
                                                    <?php elseif ($release['status'] == 3): ?>
                                                        <span class="badge status-badge status-delivered">DELIVERED</span>
                                                    <?php elseif ($release['status'] == 4): ?>
                                                        <span class="badge status-badge status-rejected">REJECTED</span>
                                                    <?php elseif ($release['status'] == 5): ?>
                                                        <span class="badge status-badge status-approved">APPROVED</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                    <div class="mb-2 mb-md-0" id="pagination-text">
                    </div>
                    <nav>
                        <ul class="pagination mb-0" id="pagination-controls">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="labelSelectModal" tabindex="-1" aria-labelledby="labelSelectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelSelectModalLabel">Create New Release</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Select a destination label to create your new release under.</p>
                <select class="form-select" id="destinationLabelSelect">
                    <option value="" selected>Choose a label...</option>
                    <option value="1">Music Dreams</option>
                    <option value="2">Indie Sounds</option>
                    <option value="3">Jazz Groove</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="createAlbumBtn" disabled>Create Album</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="releaseModal" tabindex="-1" aria-labelledby="releaseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header p-0" id="releaseModalHeader">
                <div class="bg-image-blurred"></div>
                <div class="container-fluid">
                    <div class="d-flex align-items-center">
                        <img src="" id="releaseAlbumArtwork" alt="Album Artwork" class="me-4" style="width: 120px; height: 120px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.25);">
                        <div>
                            <h4 class="mb-1 text-white" id="releaseTitle">Release Title</h4>
                            <p class="mb-0" id="releaseArtist" style="font-weight: 500; color: rgba(255, 255, 255, 0.8);">Artist Name</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body p-4">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Edit Release</button>
            </div>
        </div>
    </div>
</div>