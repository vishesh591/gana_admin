<div class="admin-facebook-page content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h4 class="fw-semibold m-0 page-title fs-2">Facebook Owner Conflict</h4>

                <div>
                    <button class="btn btn-outline-secondary me-2" id="importFacebookCsv">
                        <i data-feather="plus" class="me-1"></i>Import Conflict
                    </button>
                </div>
            </div>

            <div class="card shadow-sm mt-4">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle" id="facebookDatatable" style="width:100%;">
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
                                <!-- Data will be populated via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Conflict Resolution Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="facebookConflictOffcanvas" style="width: 600px;">
    <div class="offcanvas-header border-bottom">
        <div>
            <h5 class="offcanvas-title mb-0" id="offcanvasTitle">Ownership Conflict</h5>
            <small class="text-muted" id="offcanvasSubtitle">VS. Unknown</small>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <form id="facebookConflictForm" novalidate>
            <!-- Step 1: Rights Ownership -->
            <div id="formStep1" class="form-step">
                <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center" style="background-color: #f8f9fa;">
                    <img src="https://placehold.co/80x80/3b5998/ffffff?text=FB" class="album-cover rounded" id="modalAlbumCover" alt="Album Art" style="width: 60px; height: 60px;">
                    <div class="ms-3">
                        <div class="fw-bold" id="modalSongName">Song Title</div>
                        <div class="small text-muted" id="modalArtistName">Artist Name</div>
                        <div class="small text-muted">
                            <span id="modalIsrc">ISRC: N/A</span> - 
                            <span id="modalPlatform">Facebook</span>
                        </div>
                    </div>
                </div>
                
                <div class="notice-box mb-4 p-3 rounded" style="background-color: #e3f2fd; border-left: 4px solid #2196f3;">
                    <i class="bi bi-info-circle fs-5 me-3 text-info"></i>
                    <small>By default, your answer will impact all ISRCs involved in this issue</small>
                </div>
                
                <div class="mb-3 radio-card-group">
                    <label class="form-label fw-bold d-block mb-3">Could you please confirm on the type of rights owned</label>
                    
                    <label class="radio-card d-block mb-3 p-3 border rounded cursor-pointer" style="cursor: pointer;">
                        <input type="radio" name="rightsOwned" value="original_exclusive" class="form-check-input me-2" required> 
                        My content is Original and I own exclusive rights on all or part of the territories
                    </label>
                    
                    <label class="radio-card d-block mb-3 p-3 border rounded cursor-pointer" style="cursor: pointer;">
                        <input type="radio" name="rightsOwned" value="non_exclusive" class="form-check-input me-2" required> 
                        I own non-exclusive rights only (license granted by a third party)
                    </label>
                    
                    <label class="radio-card d-block mb-3 p-3 border rounded cursor-pointer" style="cursor: pointer;">
                        <input type="radio" name="rightsOwned" value="cid_exclusive" class="form-check-input me-2" required> 
                        I have granted exclusive license for Content-ID stores only
                    </label>
                    
                    <label class="radio-card d-block mb-3 p-3 border rounded cursor-pointer" style="cursor: pointer;">
                        <input type="radio" name="rightsOwned" value="soundalike" class="form-check-input me-2" required> 
                        It is soundalike recording (e.g., cover or remix)
                    </label>
                    
                    <label class="radio-card d-block mb-3 p-3 border rounded cursor-pointer" style="cursor: pointer;">
                        <input type="radio" name="rightsOwned" value="public_domain" class="form-check-input me-2" required> 
                        It is Public Domain recording
                    </label>
                    
                    <label class="radio-card d-block p-3 border rounded cursor-pointer" style="cursor: pointer;">
                        <input type="radio" name="rightsOwned" value="no_rights" class="form-check-input me-2" required> 
                        I don't own rights for the selected content
                    </label>
                </div>
            </div>

            <!-- Step 2: Territory Selection -->
            <div id="formStep2" class="form-step d-none">
                <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center" style="background-color: #f8f9fa;">
                    <img src="https://placehold.co/80x80/3b5998/ffffff?text=FB" class="album-cover rounded" id="modalAlbumCover2" alt="Album Art" style="width: 60px; height: 60px;">
                    <div class="ms-3">
                        <div class="fw-bold" id="modalSongName2">Song Title</div>
                        <div class="small text-muted" id="modalArtistName2">Artist Name</div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Please confirm the territories on which you have ownership</label>
                    <p class="text-muted small mb-2">Uncheck territories where you don't have ownership</p>
                    <p class="small fw-bold text-info" id="territoryCounter">0 contested countries out of 0 delivered</p>
                    
                    <div id="territoryAccordion" class="accordion">
                        <!-- Territory accordion will be populated by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Step 3: Supporting Documentation -->
            <div id="formStep3" class="form-step d-none">
                <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center" style="background-color: #f8f9fa;">
                    <img src="https://placehold.co/80x80/3b5998/ffffff?text=FB" class="album-cover rounded" id="modalAlbumCover3" alt="Album Art" style="width: 60px; height: 60px;">
                    <div class="ms-3">
                        <div class="fw-bold" id="modalSongName3">Song Title</div>
                        <div class="small text-muted" id="modalArtistName3">Artist Name</div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <p class="fw-bold">Please provide supporting documentation.</p>
                    
                    <div id="fileUploadContainer" class="file-upload-box border rounded p-4 text-center" role="button" tabindex="0" style="cursor: pointer; background-color: #f8f9fa; border-style: dashed !important;">
                        <i class="bi bi-cloud-arrow-up fs-1 text-muted d-block mb-2"></i>
                        <p class="mb-1">Click to browse or drag and drop your file</p>
                        <small class="text-muted">PDF, DOC, JPG, PNG accepted</small>
                    </div>
                    
                    <input class="form-control d-none" type="file" id="formFile" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" required>
                    
                    <div id="selectedFileName" class="alert alert-secondary d-flex align-items-center p-2 mt-2 d-none">
                        <i class="bi bi-file-earmark-text me-2"></i>
                        <span class="flex-grow-1">filename.pdf</span>
                        <button type="button" class="btn-close btn-sm" aria-label="Remove file"></button>
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
            <button type="submit" form="facebookConflictForm" class="btn btn-success d-none" id="submitBtn">
                <i class="bi bi-check-lg me-1"></i> Submit Resolution
            </button>
        </div>
    </div>
</div>