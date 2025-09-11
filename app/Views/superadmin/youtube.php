<div class="admin-youtube-page content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h4 class="fs-18 fw-bold m-0">YouTube Owner Conflict</h4>
                    <div>
                        <button class="btn btn-outline-secondary me-2">
                            <i data-feather="plus" id="importYoutubeCsv" class="me-1"></i>Import Conflict
                        </button>
                    </div>
            </div>
  
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle" id="datatable" style="width:100%;">
                            <thead class="table-light">
                                <tr>
                                    <th width="50" class="no-sort">Store</th>
                                    <th>Category</th>
                                    <th>Asset Title</th>
                                    <th>Artist / Asset ID</th>
                                    <th>UPC</th>
                                    <th>Other Party</th>
                                    <th>Daily Views</th>
                                    <th>Expiry</th>
                                    <th>Status</th>
                                    <th width="50" class="no-sort"></th>
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

<div class="offcanvas offcanvas-end" tabindex="-1" id="conflictResolutionOffcanvas" style="width: 600px;">
    <div class="offcanvas-header border-bottom">
        <div>
            <h5 class="offcanvas-title mb-0" id="offcanvasTitle"></h5>
            <small class="text-muted" id="offcanvasSubtitle"></small>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <form id="conflictForm" novalidate>
            <div id="formStep1" class="form-step">
                <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center">
                    <img src="" class="album-cover" id="modalAlbumCover" alt="Album Art">
                    <div class="ms-3">
                        <div class="fw-bold" id="modalSongName"></div>
                        <div class="small text-muted" id="modalArtistName"></div>
                        <div class="small text-muted"><span id="modalIsrc"></span> - <span id="modalPlatform">YouTube</span></div>
                    </div>
                </div>
                <div class="notice-box mb-4"><i class="bi bi-info-circle fs-5 me-3"></i><small>By default, your answer will impact all ISRCs involved in this issue</small></div>
                <div class="mb-3 radio-card-group">
                    <label class="form-label fw-bold d-block mb-3">Could you please confirm on the type of rights owned</label>
                    <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="original_exclusive" class="form-check-input" required> My content is Original and I own exclusive rights on all or part of the territories</label>
                    <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="non_exclusive" class="form-check-input" required> I own non-exclusive rights only (license granted by a third party)</label>
                    <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="cid_exclusive" class="form-check-input" required> I have granted exclusive license for Content-ID stores only</label>
                    <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="soundalike" class="form-check-input" required> It is soundalike recording (e.g., cover or remix)</label>
                    <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="public_domain" class="form-check-input" required> It is Public Domain recording</label>
                    <label class="radio-card d-block"><input type="radio" name="rightsOwned" value="no_rights" class="form-check-input" required> I don't own rights for the selected content</label>
                </div>
            </div>

            <div id="formStep2" class="form-step d-none">
                <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center">
                    <img src="" class="album-cover" id="modalAlbumCover2" alt="Album Art">
                    <div class="ms-3">
                        <div class="fw-bold" id="modalSongName2"></div>
                        <div class="small text-muted" id="modalArtistName2"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Please confirm the territories on which you have ownership</label>
                    <p class="text-muted small mb-2">Uncheck territories where you don't have ownership</p>
                    <p class="small fw-bold" id="territoryCounter"></p>
                    <div id="territoryAccordion" class="accordion"></div>
                </div>
            </div>

            <div id="formStep3" class="form-step d-none">
                <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center">
                    <img src="" class="album-cover" id="modalAlbumCover3" alt="Album Art">
                    <div class="ms-3">
                        <div class="fw-bold" id="modalSongName3"></div>
                        <div class="small text-muted" id="modalArtistName3"></div>
                    </div>
                </div>
                <div class="mb-3">
                   <p class="fw-bold">Please provide supporting documentation.</p>
                   <div id="fileUploadContainer" class="file-upload-box" role="button" tabindex="0">
                        <i class="bi bi-cloud-arrow-up fs-1 text-muted"></i>
                        <p class="mb-0">Click to browse or drag and drop your file</p>
                        <small class="text-muted">PDF, DOC, JPG, PNG accepted</small>
                   </div>
                   <input class="form-control d-none" type="file" id="formFile" required>
                   <div id="selectedFileName" class="alert alert-secondary d-flex align-items-center p-2 mt-2 d-none">
                        <i class="bi bi-file-earmark-text me-2"></i>
                        <span class="flex-grow-1"></span>
                        <button type="button" class="btn-close btn-sm"></button>
                   </div>
                </div>
            </div>
        </form>
    </div>

    <div class="offcanvas-footer d-flex justify-content-between p-3 bg-light border-top">
        <button type="button" class="btn btn-outline-secondary" id="backBtn">Back</button>
        <div>
            <button type="button" class="btn btn-primary" id="nextBtn">Next <i class="bi bi-arrow-right"></i></button>
            <button type="submit" form="conflictForm" class="btn btn-success d-none" id="submitBtn">Submit Resolution</button>
        </div>
    </div>
</div>