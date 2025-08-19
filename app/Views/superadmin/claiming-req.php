<div class="admin-claim-req-page content-page">
            <div class="content">
                <div class="container-xxl">
                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                            <h4 class="fs-18 fw-semibold m-0 page-title fs-2">Claiming Request</h4>
                        <div class="col-auto d-flex gap-2">
                            <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                                <i class="bi bi-download me-1"></i> Export to CSV
                            </button>
                        <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#claimingRequestModal">
                            <i class="bi bi-plus-lg me-1"></i> New Claiming Request
                        </button>
                       </div>
                </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow-sm mt-4 p-4">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="datatable">
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
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade" id="claimingRequestModal" tabindex="-1" aria-labelledby="claimingRequestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4">
                <form action="#" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="claimingRequestModalLabel">Claiming Request Form</h5>
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
                            <input type="text" class="form-control rounded-pill p-3" id="upc" name="upc" placeholder="Enter ISRC" required>
                        </div>
                        <div class="mb-4">
                            <label for="instagramLink" class="form-label">Instagram Profile Link</label>
                            <input type="url" class="form-control rounded-pill p-3" id="instagramLink" name="instagramLink" placeholder="https://instagram.com/username">
                        </div>
                        <div class="mb-4">
    <label for="instagramAudio" class="form-label">Instagram Audio Link</label>
    <input type="url" class="form-control rounded-pill p-3" id="instagramAudioLink" name="instagramAudioLink" placeholder="https://instagram.com/audio/...">
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
