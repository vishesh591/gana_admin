<div class="admin-youtube-page content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h2 class="mb-2 fw-bold">Youtube owner conflict</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="releasesTable">
                            <thead>
                                <tr>
                                    <th width="50">Store</th> 
                                    <th class="sortable-header" data-sort="category">Category <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                    <th class="sortable-header" data-sort="assetTitle">Asset Title <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                    <th class="sortable-header" data-sort="artist">Artist / Asset ID <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                    <th class="sortable-header" data-sort="upc">UPC <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                    <th class="sortable-header" data-sort="otherParty">Other Party <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                    <th class="sortable-header" data-sort="dailyViews">Daily Views <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                    <th class="sortable-header" data-sort="expiry">Expiry <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                    <th class="sortable-header" data-sort="status">Status <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                    <th width="50"></th>
                                </tr>
                            </thead>
                            <tbody id="youtubeTableBody">
                                </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer bg-white d-flex align-items-center justify-content-end text-muted py-2">
                    <div class="me-3" id="pagination-text"></div>
                    <div id="pagination-controls">
                         <button class="btn btn-sm" disabled><i class="bi bi-chevron-left"></i></button>
                         <button class="btn btn-sm ms-1"><i class="bi bi-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="conflictResolutionOffcanvas" aria-labelledby="conflictResolutionOffcanvasLabel">
    <div class="offcanvas-header">
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
                    <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="original_exclusive"> My content is Original and I own exclusive rights on all or part of the territories</label>
                    <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="non_exclusive"> I own non-exclusive rights only (license granted by a third party)</label>
                    <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="cid_exclusive"> I have granted exclusive license for Content-ID stores only</label>
                    <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="soundalike"> It is soundalike recording (e.g., cover or remix)</label>
                    <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="public_domain"> It is Public Domain recording</label>
                    <label class="radio-card d-block"><input type="radio" name="rightsOwned" value="no_rights"> I don't own rights for the selected content</label>
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
                    <div id="territoryAccordion" class="accordion">
                        </div>
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
                    <label class="form-label fw-bold">Please upload any supporting documents</label>
                    <div class="file-upload-container rounded" id="fileUploadContainer">
                        <label for="formFile" class="file-upload-label text-muted">
                            <i class="bi bi-cloud-arrow-up fs-3"></i><br>Drag & drop or click to browse
                        </label>
                        <input class="file-input-hidden" type="file" id="formFile">
                    </div>
                    <div class="selected-file-name d-none mt-2" id="selectedFileName">
                        <span></span>
                        <button type="button" class="btn-close btn-sm ms-2" aria-label="Remove file"></button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="offcanvas-footer d-flex justify-content-end">
        <button type="button" class="btn btn-outline-secondary me-2 d-none" id="backBtn">Back</button>
        <button type="button" class="btn btn-primary" id="nextBtn">Next <i class="bi bi-arrow-right"></i></button>
        <button type="submit" form="conflictForm" class="btn btn-success d-none" id="submitBtn">Submit Resolution</button>
    </div>
</div>