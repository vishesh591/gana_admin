<div class="admin-facebook-page content-page">
    <div class="content">
        <div class="container-fluid">
                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                            <h4 class=" fw-semibold m-0 page-title fs-2">Facebook owner conflict</h4>
                    </div>

            <div class="card shadow-sm mt-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="facebookConflictTable">
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
                            <tbody id="facebookTableBody">
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer bg-white d-flex align-items-center justify-content-end text-muted py-2">
                    <div class="me-3" id="pagination-text">4 of 10 results</div>
                    <div>
                        <button class="btn btn-sm"><i class="bi bi-chevron-left"></i></button>
                        <button class="btn btn-sm ms-1"><i class="bi bi-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="facebookConflictOffcanvas" aria-labelledby="facebookConflictOffcanvas">
    <div class="offcanvas-header">
        <div>
            <h5 class="offcanvas-title mb-0" id="offcanvasTitle">Ownership conflict</h5>
            <small class="text-muted" id="offcanvasSubtitle">VS. The Orchard</small>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <form id="facebookConflictForm" novalidate>
            <div id="formStep1" class="form-step">
                <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center">
                    <img src="https://placehold.co/80x80/3498db/ffffff?text=C" class="album-cover" id="modalAlbumCover" alt="Album Art">
                    <div class="ms-3">
                        <div class="fw-bold" id="modalSongName">Cosmic Drift</div>
                        <div class="small text-muted" id="modalArtistName">Astro Beats</div>
                        <div class="small text-muted"><span id="modalIsrc">ISRC: USAT22312345</span> - <span id="modalPlatform">facebook</span></div>
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
                    <img src="https://placehold.co/80x80/3498db/ffffff?text=C" class="album-cover" alt="Album Art">
                    <div class="ms-3">
                        <div class="fw-bold">Cosmic Drift</div>
                        <div class="small text-muted">Astro Beats</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Please confirm the territories on which you have ownership</label>
                    <p class="text-muted small mb-2">Uncheck territories where you don't have ownership</p>
                    <p class="small fw-bold" id="territoryCounter">240 contested countries out of 240 delivered</p>
                    <div id="territoryAccordion" class="accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-Africa">
                                <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-Africa" aria-expanded="false">
                                    <div class="form-check me-auto pe-2">
                                        <input class="form-check-input region-checkbox" type="checkbox" id="region-Africa" checked>
                                        <label class="form-check-label fw-bold" for="region-Africa">Africa</label>
                                    </div>
                                    <span class="text-muted small me-2">58 countries</span>
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                            </h2>
                            <div id="collapse-Africa" class="accordion-collapse collapse" data-bs-parent="#territoryAccordion">
                                <div class="accordion-body">
                                    <div class="territory-list-inner">
                                        <div class="form-check"><input class="form-check-input country-checkbox" type="checkbox" value="DZ" id="country-DZ" checked><label class="form-check-label" for="country-DZ">Algeria</label></div>
                                        <div class="form-check"><input class="form-check-input country-checkbox" type="checkbox" value="AO" id="country-AO" checked><label class="form-check-label" for="country-AO">Angola</label></div>
                                        <div class="form-check"><input class="form-check-input country-checkbox" type="checkbox" value="EG" id="country-EG" checked><label class="form-check-label" for="country-EG">Egypt</label></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                         <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-Europe">
                                <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-Europe" aria-expanded="false">
                                    <div class="form-check me-auto pe-2">
                                        <input class="form-check-input region-checkbox" type="checkbox" id="region-Europe" checked>
                                        <label class="form-check-label fw-bold" for="region-Europe">Europe</label>
                                    </div>
                                    <span class="text-muted small me-2">51 countries</span>
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                            </h2>
                            <div id="collapse-Europe" class="accordion-collapse collapse" data-bs-parent="#territoryAccordion">
                                <div class="accordion-body">
                                    <div class="territory-list-inner">
                                        <div class="form-check"><input class="form-check-input country-checkbox" type="checkbox" value="DE" id="country-DE" checked><label class="form-check-label" for="country-DE">Germany</label></div>
                                        <div class="form-check"><input class="form-check-input country-checkbox" type="checkbox" value="FR" id="country-FR" checked><label class="form-check-label" for="country-FR">France</label></div>
                                        <div class="form-check"><input class="form-check-input country-checkbox" type="checkbox" value="GB" id="country-GB" checked><label class="form-check-label" for="country-GB">United Kingdom</label></div>
                                         </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="formStep3" class="form-step d-none">
                 <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center">
                    <img src="https://placehold.co/80x80/3498db/ffffff?text=C" class="album-cover" alt="Album Art">
                    <div class="ms-3">
                        <div class="fw-bold">Cosmic Drift</div>
                        <div class="small text-muted">Astro Beats</div>
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
        <button type="submit" form="facebookConflictForm" class="btn btn-success d-none" id="submitBtn">Submit Resolution</button>
    </div>
</div>