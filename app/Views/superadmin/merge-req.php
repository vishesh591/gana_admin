<div class="admin-claim-merge-req-page content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="row align-items-center mb-5">
                <div class="col">
                    <h1 class="page-title fs-2">Claim / Reel Merge</h1>
                </div>
                <div class="col-auto d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                        <i class="bi bi-download me-1"></i> Export to CSV
                    </button>
                    <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#newClaimRequestModal">
                        <i class="bi bi-plus-lg me-1"></i> New Claiming Request
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="claimingTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="50"></th>
                                            <th>Song Name</th>
                                            <th>ISRC</th>
                                            <th class="text-center">Instagram Audio Link</th>
                                            <th class="text-center">Reel Merge Link</th>
                                            <th>Matching Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        <tr>
                                            <td class="text-center">
                                                <i data-feather="check-circle" class="text-success"></i>
                                            </td>
                                            <td>
                                                <div class="release-title">
                                                    <a href="#">Cosmic Drift</a>
                                                </div>
                                            </td>
                                            <td>US1232500004</td>
                                            <td class="text-center">
                                                <a href="https://instagram.com/audio/123" target="_blank" class="link-icon" title="Instagram Audio"><i class="bi bi-music-note-beamed"></i>Insta link</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="https://instagram.com/reel/xyz" target="_blank" class="link-icon" title="Reel Merge"><i class="bi bi-camera-reels"></i>Merge Link</a>
                                            </td>
                                            <td>00:15-00:45</td>
                                            <td>
                                                <span class="badge bg-success">Approved</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <i data-feather="clock" class="text-warning"></i>
                                            </td>
                                            <td>
                                                <div class="release-title">
                                                    <a href="#">Neon Tides</a>
                                                </div>
                                            </td>
                                            <td>US1232500005</td>
                                            <td class="text-center">
                                                <a href="https://instagram.com/audio/456" target="_blank" class="link-icon" title="Instagram Audio"><i class="bi bi-music-note-beamed"></i>Insta link</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="https://instagram.com/reel/abc" target="_blank" class="link-icon" title="Reel Merge"><i class="bi bi-camera-reels"></i>Merge Link</a>
                                            </td>
                                            <td>00:30-01:00</td>
                                            <td>
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <i data-feather="x-circle" class="text-danger"></i>
                                            </td>
                                            <td>
                                                <div class="release-title">
                                                    <a href="#">Lost Signal</a>
                                                </div>
                                            </td>
                                            <td>US1232500006</td>
                                            <td class="text-center">
                                                <a href="https://instagram.com/audio/789" target="_blank" class="link-icon" title="Instagram Audio"><i class="bi bi-music-note-beamed"></i>Insta link</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="https://instagram.com/reel/def" target="_blank" class="link-icon" title="Reel Merge"><i class="bi bi-camera-reels"></i>Merge Link</a>
                                            </td>
                                            <td>01:00-01:15</td>
                                            <td>
                                                <span class="badge bg-danger">Rejected</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                            <div class="mb-2 mb-md-0" id="pagination-text">
                                Showing <strong>1</strong> to <strong>3</strong> of <strong>3</strong> entries
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
        </div>
    </div>
</div>

<div class="modal fade" id="newClaimRequestModal" tabindex="-1" aria-labelledby="newClaimRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
            <form id="newClaimForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="newClaimRequestModalLabel">New Claiming Request Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="songName" class="form-label">Song Name</label>
                        <input type="text" class="form-control rounded-pill p-3" id="songName" required>
                    </div>
                    <div class="mb-3">
                        <label for="isrc" class="form-label">ISRC</label>
                        <input type="text" class="form-control rounded-pill p-3" id="isrc" required>
                    </div>
                    <div class="mb-3">
                        <label for="instagramAudio" class="form-label">Instagram Audio Link</label>
                        <input type="url" class="form-control rounded-pill p-3" id="instagramAudio" placeholder="https://www.instagram.com/reels/audio/..." required>
                    </div>
                    <div class="mb-3">
                        <label for="reelMerge" class="form-label">Reel Merge Link</label>
                        <input type="url" class="form-control rounded-pill p-3" id="reelMerge" placeholder="https://www.instagram.com/p/..." required>
                    </div>
                    <div class="mb-3">
                        <label for="matchingTime" class="form-label">Matching Time</label>
                        <input type="text" class="form-control rounded-pill p-3" id="matchingTime" placeholder="e.g., 00:15-00:45" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary rounded-pill">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>