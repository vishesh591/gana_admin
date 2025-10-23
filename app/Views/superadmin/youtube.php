<div class="admin-youtube-page content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h4 class="fs-18 fw-bold m-0">YouTube Owner Conflict</h4>
                <?php if (in_array($user['role_id'] ?? 3, [1, 2])): ?>
                    <div>
                        <button class="btn btn-outline-secondary me-2" id="importYoutubeCsv">
                            <i data-feather="plus" class="me-1"></i>Import Conflict
                        </button>
                    </div>
                <?php endif; ?>

            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle" id="releasesTable" style="width:100%;">
                            <thead class="table-light">
                                <tr>
                                    <th width="50" class="no-sort">Store</th>
                                    <th class="sortable-header" data-sort="category">
                                        Category
                                        <span class="sort-icon">
                                            <i class="bi bi-chevron-up"></i>
                                            <i class="bi bi-chevron-down"></i>
                                        </span>
                                    </th>
                                    <th class="sortable-header" data-sort="assetTitle">
                                        Asset Title
                                        <span class="sort-icon">
                                            <i class="bi bi-chevron-up"></i>
                                            <i class="bi bi-chevron-down"></i>
                                        </span>
                                    </th>
                                    <th class="sortable-header" data-sort="artist">
                                        Artist / Asset ID
                                        <span class="sort-icon">
                                            <i class="bi bi-chevron-up"></i>
                                            <i class="bi bi-chevron-down"></i>
                                        </span>
                                    </th>
                                    <th class="sortable-header" data-sort="upc">
                                        UPC
                                        <span class="sort-icon">
                                            <i class="bi bi-chevron-up"></i>
                                            <i class="bi bi-chevron-down"></i>
                                        </span>
                                    </th>
                                    <th class="sortable-header" data-sort="otherParty">
                                        Other Party
                                        <span class="sort-icon">
                                            <i class="bi bi-chevron-up"></i>
                                            <i class="bi bi-chevron-down"></i>
                                        </span>
                                    </th>
                                    <th class="sortable-header" data-sort="dailyViews">
                                        Daily Views
                                        <span class="sort-icon">
                                            <i class="bi bi-chevron-up"></i>
                                            <i class="bi bi-chevron-down"></i>
                                        </span>
                                    </th>
                                    <th class="sortable-header" data-sort="expiry">
                                        Expiry
                                        <span class="sort-icon">
                                            <i class="bi bi-chevron-up"></i>
                                            <i class="bi bi-chevron-down"></i>
                                        </span>
                                    </th>
                                    <th class="sortable-header" data-sort="status">
                                        Status
                                        <span class="sort-icon">
                                            <i class="bi bi-chevron-up"></i>
                                            <i class="bi bi-chevron-down"></i>
                                        </span>
                                    </th>
                                    <th width="50" class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody id="youtubeTableBody">
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <span id="pagination-text" class="text-muted small"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="conflictResolutionOffcanvas" style="width: 600px;">
    <div class="offcanvas-header border-bottom">
        <div>
            <h5 class="offcanvas-title mb-0" id="offcanvasTitle"></h5>
            <small class="text-muted" id="offcanvasSubtitle"></small>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <div id="statusMessageBox" class="alert d-none mb-3">
            <div class="d-flex align-items-center">
                <i id="statusIcon" class="me-3 fs-5"></i>
                <div>
                    <div class="fw-bold" id="statusTitle">Status</div>
                    <small id="statusMessage" class="text-muted">Message</small>
                </div>
            </div>
        </div>
        <form id="youtubeConflictForm" novalidate>
            <!-- Step 1: Rights Ownership -->
            <div id="formStep1" class="form-step">
                <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center" style="background-color: #f8f9fa;">
                    <img src="" class="album-cover rounded" id="modalAlbumCover" alt="Album Art" style="width: 60px; height: 60px;">
                    <div class="ms-3">
                        <div class="fw-bold" id="modalSongName"></div>
                        <div class="small text-muted" id="modalArtistName"></div>
                        <div class="small text-muted">
                            <span id="modalIsrc"></span> -
                            <span id="modalPlatform">YouTube</span>
                        </div>
                    </div>
                </div>

                <div class="notice-box mb-4 p-3 rounded" style="background-color: #e3f2fd; border-left: 4px solid #2196f3;">
                    <i class="bi bi-info-circle fs-5 me-3 text-info"></i>
                    <small>By default, your answer will impact all ISRCs involved in this issue</small>
                </div>

                <div class="mb-3 radio-card-group" id="rightsOwnedSection">
                    <label class="form-label fw-bold d-block mb-3">Could you please confirm on the type of rights owned</label>
                    <div id="rightsOwnedOptions">
                        <label class="radio-card d-block mb-3 p-3 border rounded cursor-pointer" style="cursor: pointer;">
                            <input type="radio" name="rightsOwned" value="original_exclusive" class="form-check-input me-2">
                            My content is Original and I own exclusive rights
                        </label>
                        <label class="radio-card d-block mb-3 p-3 border rounded cursor-pointer" style="cursor: pointer;">
                            <input type="radio" name="rightsOwned" value="non_exclusive" class="form-check-input me-2">
                            I own non-exclusive rights only (license granted by a third party)
                        </label>
                        <label class="radio-card d-block mb-3 p-3 border rounded cursor-pointer" style="cursor: pointer;">
                            <input type="radio" name="rightsOwned" value="cid_exclusive" class="form-check-input me-2">
                            I have granted exclusive license for Content-ID stores only
                        </label>
                        <label class="radio-card d-block mb-3 p-3 border rounded cursor-pointer" style="cursor: pointer;">
                            <input type="radio" name="rightsOwned" value="soundalike" class="form-check-input me-2">
                            It is soundalike recording (e.g., cover or remix)
                        </label>
                        <label class="radio-card d-block mb-3 p-3 border rounded cursor-pointer" style="cursor: pointer;">
                            <input type="radio" name="rightsOwned" value="public_domain" class="form-check-input me-2">
                            It is Public Domain recording
                        </label>
                        <label class="radio-card d-block p-3 border rounded cursor-pointer" style="cursor: pointer;">
                            <input type="radio" name="rightsOwned" value="no_rights" class="form-check-input me-2">
                            I don't own rights for the selected content
                        </label>
                    </div>
                    <!-- Readonly container for existing rights -->
                    <div id="rightsOwnedText" class="alert alert-secondary d-none p-3 rounded"></div>
                </div>
            </div>

            <!-- Step 2: Supporting Documentation -->
            <div id="formStep2" class="form-step d-none">
                <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center" style="background-color: #f8f9fa;">
                    <img src="" class="album-cover rounded" id="modalAlbumCover2" alt="Album Art" style="width: 60px; height: 60px;">
                    <div class="ms-3">
                        <div class="fw-bold" id="modalSongName2"></div>
                        <div class="small text-muted" id="modalArtistName2"></div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Please provide supporting documentation.</label>
                    <div id="fileUploadContainer" class="file-upload-box border rounded p-4 text-center" role="button" tabindex="0" style="cursor: pointer; background-color: #f8f9fa; border-style: dashed !important;">
                        <i class="bi bi-cloud-arrow-up fs-1 text-muted d-block mb-2"></i>
                        <p class="mb-1">Click to browse or drag and drop your file</p>
                        <small class="text-muted">PDF, DOC, JPG, PNG accepted</small>
                    </div>
                    <input class="form-control d-none" type="file" id="formFile" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" required>
                    <div id="selectedFileName" class="alert alert-secondary d-flex align-items-center p-2 mt-2 d-none">
                        <i class="bi bi-file-earmark-text me-2"></i>
                        <span class="flex-grow-1"></span>
                        <button type="button" class="btn-close btn-sm" aria-label="Remove file"></button>
                    </div>
                    <!-- Container for existing file link -->
                    <div id="fileLinkBox" class="d-none mt-2"></div>
                </div>
            </div>

            <!-- NEW: Step for In Review Display -->
            <div id="formStepInReview" class="form-step d-none">
                <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center" style="background-color: #f8f9fa;">
                    <img src="" class="album-cover rounded" id="modalAlbumCoverInReview" alt="Album Art" style="width: 60px; height: 60px;">
                    <div class="ms-3">
                        <div class="fw-bold" id="modalSongNameInReview">Song Title</div>
                        <div class="small text-muted" id="modalArtistNameInReview">Artist Name</div>
                        <div class="small text-muted">
                            <span id="modalIsrcInReview">ISRC: N/A</span> -
                            <span>YouTube</span>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold mb-3">Resolution Details:</h6>

                    <div class="mb-3">
                        <label class="form-label fw-bold small">Rights Ownership:</label>
                        <div class="p-2 bg-light rounded" id="resolutionRightsOwned">Loading...</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small">Supporting Document:</label>
                        <div class="p-2 bg-light rounded" id="supportingDocumentInfo">Loading...</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small">Submission Date:</label>
                        <div class="p-2 bg-light rounded" id="resolutionDate">Loading...</div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Offcanvas Footer -->
    <div class="offcanvas-footer d-flex justify-content-between p-3 bg-light border-top">
        <button type="button" class="btn btn-outline-secondary d-none" id="backBtn">
            <i class="bi bi-arrow-left me-1"></i> Back
        </button>
        <div class="ms-auto">
            <button type="button" class="btn btn-primary" id="nextBtn">
                Next <i class="bi bi-arrow-right ms-1"></i>
            </button>
            <button type="submit" form="youtubeConflictForm" class="btn btn-success d-none" id="submitBtn">
                <i class="bi bi-check-lg me-1"></i> Submit Resolution
            </button>
            <button type="button" class="btn btn-secondary d-none" id="closeBtnInReview" data-bs-dismiss="offcanvas">
                <i class="bi bi-x-lg me-1"></i> Close
            </button>
        </div>
    </div>
</div>