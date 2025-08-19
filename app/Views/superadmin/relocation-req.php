<div class="admin-reloc-req-page content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h4 class="fs-18 fw-semibold m-0 page-title fs-2">Relocation Request</h4>
                <div class="col-auto d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                        <i class="bi bi-download me-1"></i> Export to CSV
                    </button>
                    <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#relocationRequestModal">
                        <i class="bi bi-plus-lg me-1"></i> New Relocation Request
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
                                    <tbody id="relocationTableBody">
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

<div class="modal fade" id="relocationRequestModal" tabindex="-1" aria-labelledby="relocationRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
            <form action="#" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="relocationRequestModalLabel">Relocation Request Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <label for="songName" class="form-label d-flex align-items-center">
                            Song Name <span class="badge bg-danger ms-2">RE</span>
                        </label>
                        <select class="form-select rounded-pill p-3" id="songName" name="songName" required>
                            <option value="" selected disabled>Select song</option>
                            <option value="1" data-artist="Artist One" data-isrc="INH722302515">Song One</option>
                            <option value="2" data-artist="Artist Two" data-isrc="INH722302516">Song Two</option>
                            <option value="3" data-artist="Artist Three" data-isrc="INH722302517">Song Three</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="artistName" class="form-label d-flex align-items-center">
                            Artist Name <span class="badge bg-danger ms-2">RE</span>
                        </label>
                        <input type="text" class="form-control rounded-pill p-3" id="artistName" name="artistName" placeholder="Artist name will auto-fill" readonly required>
                    </div>

                    <div class="mb-4">
                        <label for="ISRC" class="form-label d-flex align-items-center">
                            ISRC <span class="badge bg-danger ms-2">RE</span>
                        </label>
                        <input type="text" class="form-control rounded-pill p-3" id="ISRC" name="isrc" placeholder="ISRC will auto-fill" readonly required>
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