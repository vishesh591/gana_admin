<div class="admin-claim-req-page content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="row align-items-center mb-5">
                <div class="col">
                    <h1 class="page-title fs-2">Claiming Request</h1>
                </div>
                <div class="col-auto d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                        <i class="bi bi-download me-1"></i> Export to CSV
                    </button>
                    <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#relocationRequestModal">
                        <i class="bi bi-plus-lg me-1"></i> New Claiming Request
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="relocationTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="60"></th>
                                            <th>Song / Artist</th>
                                            <th>ISRC</th>
                                            <th>Social Profiles</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        <tr>
                                            <td class="text-center align-middle">
                                                <i data-feather="clock" class="text-warning"></i>
                                            </td>
                                            <td class="align-middle">
                                                <div>
                                                    <div class="release-title">
                                                        <a href="/approve-req">Cosmic Drift</a>
                                                    </div>
                                                    <div class="release-artist">Orion Sun</div>
                                                </div>
                                            </td>
                                            <td class="align-middle">US1232500004</td>
                                            <td class="align-middle">
                                                <a href="https://instagram.com/orionsun" target="_blank" class="social-link me-2"><i class="bi bi-instagram"></i></a>
                                                <a href="https://facebook.com/orionsun" target="_blank" class="social-link"><i class="bi bi-facebook"></i></a>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge bg-warning">Pending</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center align-middle">
                                                <i data-feather="clock" class="text-warning"></i>
                                            </td>
                                            <td class="align-middle">
                                                <div>
                                                    <div class="release-title">
                                                        <a href="/approve-req">Neon Tides</a>
                                                    </div>
                                                    <div class="release-artist">Cyber Lazer</div>
                                                </div>
                                            </td>
                                            <td class="align-middle">US1232500005</td>
                                            <td class="align-middle">
                                                <a href="https://instagram.com/cyberlazer" target="_blank" class="social-link me-2"><i class="bi bi-instagram"></i></a>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge bg-warning">Pending</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center align-middle">
                                                <i data-feather="x-circle" class="text-danger"></i>
                                            </td>
                                            <td class="align-middle">
                                                <div>
                                                    <div class="release-title">
                                                        <a href="/approve-req">Lost Signal</a>
                                                    </div>
                                                    <div class="release-artist">Ghost FM</div>
                                                </div>
                                            </td>
                                            <td class="align-middle">US1232500006</td>
                                            <td class="align-middle">
                                                <a href="https://facebook.com/ghostfm" target="_blank" class="social-link"><i class="bi bi-facebook"></i></a>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge bg-danger">Rejected</span>
                                            </td>
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

<div class="modal fade" id="relocationRequestModal" tabindex="-1" aria-labelledby="relocationRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
            <form action="#" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="relocationRequestModalLabel">Claiming Request Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <label for="artistName" class="form-label d-flex align-items-center">
                            Artist Name <span class="badge bg-danger ms-2">RE</span>
                        </label>
                        <input type="text" class="form-control rounded-pill p-3" id="artistName" name="artistName" placeholder="Enter artist name" required>
                    </div>
                    <div class="mb-4">
                        <label for="songName" class="form-label d-flex align-items-center">
                            Song Name <span class="badge bg-danger ms-2">RE</span>
                        </label>
                        <input type="text" class="form-control rounded-pill p-3" id="songName" name="songName" placeholder="Enter song name" required>
                    </div>
                    <div class="mb-4">
                        <label for="upc" class="form-label d-flex align-items-center">
                            UPC
                            <span class="badge bg-danger ms-2">RE</span>
                        </label>
                        <input type="text" class="form-control rounded-pill p-3" id="upc" name="upc" placeholder="Enter UPC/EAN" required>
                    </div>
                    <div class="mb-4">
                        <label for="instagramLink" class="form-label">Instagram Profile Link</label>
                        <input type="url" class="form-control rounded-pill p-3" id="instagramLink" name="instagramLink" placeholder="https://instagram.com/username">
                    </div>
                    <div class="mb-4">
                        <label for="instagramAudio" class="form-label">Instagram Audio Link</label>
                        <input type="url" class="form-control rounded-pill p-3" id="instagramAudio" name="instagramAudio" placeholder="https://www.instagram.com/reels/audio/...">
                    </div>
                    <div class="mb-4">
                        <label for="facebookLink" class="form-label">Facebook Profile Link</label>
                        <input type="url" class="form-control rounded-pill p-3" id="facebookLink" name="facebookLink" placeholder="https://facebook.com/username">
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
