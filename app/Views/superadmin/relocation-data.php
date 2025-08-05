<div class="admin-reloc-data-page content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h4 class="fs-18 fw-semibold m-0">Relocation Data</h4>
                <div class="col-auto d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                        <i class="bi bi-download me-1"></i> Export to CSV
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
                        <table class="table table-hover mb-0" id="relocationTable">
                            <thead class="table-light">
                                <tr>
                                    <th width="50"></th>
                                    <th>Song Name / Artist</th>
                                    <th>ISRC</th>
                                    <th class="text-center">Links</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <tr>
                                    <td class="text-center"><i data-feather="clock" class="text-warning"></i></td>
                                    <td>
                                        <div class="release-title">
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#newClaimRequestModal">Cosmic Drift</a>
                                        </div>
                                        <div class="text-muted small">Orion Sun</div>
                                    </td>
                                    <td>US1232500004</td>
                                    <td class="text-center">
                                        <a href="https://instagram.com/audio/123" target="_blank" class="link-icon me-2"><i class="bi bi-music-note-beamed"></i></a>
                                        <a href="https://instagram.com/reel/xyz" target="_blank" class="link-icon me-2"><i class="bi bi-camera-reels"></i></a>
                                    </td>
                                    <td class="text-center"><span class="badge status-badge status-pending">PENDING</span></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><i data-feather="clock" class="text-warning"></i></td>
                                    <td>
                                        <div class="release-title">
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#newClaimRequestModal">Neon Tides</a>
                                        </div>
                                        <div class="text-muted small">Cyber Lazer</div>
                                    </td>
                                    <td>US1232500005</td>
                                    <td class="text-center">
                                        <a href="https://instagram.com/audio/456" target="_blank" class="link-icon me-2"><i class="bi bi-music-note-beamed"></i></a>
                                        <a href="https://instagram.com/reel/abc" target="_blank" class="link-icon me-2"><i class="bi bi-camera-reels"></i></a>
                                    </td>
                                    <td class="text-center"><span class="badge status-badge status-pending">PENDING</span></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><i data-feather="x-circle" class="text-danger"></i></td>
                                    <td>
                                        <div class="release-title">
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#newClaimRequestModal">Lost Signal</a>
                                        </div>
                                        <div class="text-muted small">Ghost FM</div>
                                    </td>
                                    <td>US1232500006</td>
                                    <td class="text-center">
                                        <a href="https://instagram.com/audio/789" target="_blank" class="link-icon me-2"><i class="bi bi-music-note-beamed"></i></a>
                                        <a href="https://instagram.com/reel/def" target="_blank" class="link-icon me-2"><i class="bi bi-camera-reels"></i></a>
                                    </td>
                                    <td class="text-center"><span class="badge status-badge status-rejected">REJECTED</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                    <div class="mb-2 mb-md-0" id="pagination-text">Showing <strong>3</strong> of <strong>3</strong> entries</div>
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

<div class="modal fade" id="newClaimRequestModal" tabindex="-1" aria-labelledby="newClaimRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
             <form id="newClaimForm">
                <div class="modal-header"><h5 class="modal-title" id="newClaimRequestModalLabel">New Relocation Request Form</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body p-4">
                    <div class="mb-3"><label for="songNameInput" class="form-label">Song Name</label><input type="text" class="form-control rounded-pill p-3" id="songNameInput" value="Cosmic Drift" readonly></div>
                    <div class="mb-3"><label for="artistInput" class="form-label">Artist</label><input type="text" class="form-control rounded-pill p-3" id="artistInput" value="Orion Sun" readonly></div>
                    <div class="mb-3"><label for="isrcInput" class="form-label">ISRC</label><input type="text" class="form-control rounded-pill p-3" id="isrcInput" value="US1232500004" readonly></div>
                    <div class="mb-3"><label for="instagramAudioInput" class="form-label">Instagram Audio Link</label><input type="url" class="form-control rounded-pill p-3" id="instagramAudioInput" value="https://instagram.com/audio/123" readonly></div>
                    <div class="mb-3"><label for="reelMergeInput" class="form-label">Reel Merge Link</label><input type="url" class="form-control rounded-pill p-3" id="reelMergeInput" placeholder="https://..." value="https://instagram.com/reel/xyz" readonly></div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Reject</button><button type="submit" class="btn btn-primary rounded-pill">Approve</button></div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="releaseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content shadow-lg">
            <div class="modal-header-custom" id="releaseModalHeader">
                <div class="bg-image-blurred" style="background-image: url('https://i.scdn.co/image/ab67616d0000b273e6f6a7f1b2b2b2b2b2b2b2b2');"></div>
                <div class="d-flex w-100">
                    <img id="releaseAlbumArtwork" src="https://i.scdn.co/image/ab67616d0000b273e6f6a7f1b2b2b2b2b2b2b2b2" alt="Album Artwork" class="me-4">
                    <div class="flex-grow-1">
                        <h2 id="releaseTitle">Cosmic Drift</h2>
                        <p id="releaseArtistHeader">Orion Sun</p>
                        <div id="releaseStatusBadges"><span class="badge status-badge status-pending">PENDING</span></div>
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
                                    <div class="col-md-6 mb-3"><label class="detail-label">ISRC</label><p class="detail-value" id="modal-isrc">US1232500004</p></div>
                                    <div class="col-md-6 mb-3"><label class="detail-label">Matching Time</label><p class="detail-value" id="modal-matchingTime">00:15-00:45</p></div>
                                    <div class="col-md-6 mb-3"><label class="detail-label">Instagram Audio</label><p class="detail-value" id="modal-instagramAudio"><a href="https://instagram.com/audio/123" target="_blank">https://instagram.com/audio/123</a></p></div>
                                    <div class="col-md-6 mb-3"><label class="detail-label">Reel Merge</label><p class="detail-value" id="modal-reelMerge"><a href="https://instagram.com/reel/xyz" target="_blank">https://instagram.com/reel/xyz</a></p></div>
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