<div class="admin-ownership-data-page content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h4 class="fs-18 fw-bold m-0">YouTube Owner Conflict</h4>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle" id="datatable" style="width:100%;">
                            <thead class="table-light">
                                <tr>
                                    <th width="50">Store</th>
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
            <h5 class="offcanvas-title" id="offcanvasTitle"></h5>
            <small class="text-muted" id="offcanvasSubtitle"></small>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form id="conflictForm">
            <div class="form-step">
                <div class="d-flex align-items-center mb-3">
                    <img id="modalAlbumCover" src="" class="rounded me-3" style="width:60px; height:60px;">
                    <div>
                        <h6 class="mb-0" id="modalSongName"></h6>
                        <small class="text-muted" id="modalArtistName"></small>
                    </div>
                </div>
                <hr>
                <p class="fw-bold">Do you own the rights to this content?</p>
                <div class="row g-2">
                    <div class="col-6"><label class="radio-card"><input type="radio" name="rightsOwned" value="yes" class="form-check-input"> Yes, I do</label></div>
                    <div class="col-6"><label class="radio-card"><input type="radio" name="rightsOwned" value="no" class="form-check-input"> No, I don't</label></div>
                </div>
            </div>

            <div class="form-step d-none">
                <p class="fw-bold">In which territories do you own these rights?</p>
                <p class="text-muted small" id="territoryCounter"></p>
                <div class="accordion" id="territoryAccordion">
                </div>
            </div>

            <div class="form-step d-none">
                <div class="d-flex align-items-center mb-3">
                    <img id="modalAlbumCover2" src="" class="rounded me-3" style="width:60px; height:60px;">
                    <div>
                        <h6 class="mb-0" id="modalSongName2"></h6>
                        <small class="text-muted" id="modalArtistName2"></small>
                    </div>
                </div>
                <p class="fw-bold">Please provide supporting documentation.</p>
                <div id="fileUploadContainer" class="file-upload-box">
                    <i class="bi bi-cloud-arrow-up fs-1 text-muted"></i>
                    <p class="mb-0">Click to browse or drag and drop your file</p>
                    <small class="text-muted">PDF, DOC, JPG, PNG accepted</small>
                </div>
                <input class="form-control d-none" type="file" id="formFile">
                <div id="selectedFileName" class="alert alert-secondary d-flex align-items-center p-2 mt-2 d-none">
                    <i class="bi bi-file-earmark-text me-2"></i>
                    <span class="flex-grow-1"></span>
                    <button type="button" class="btn-close btn-sm"></button>
                </div>
            </div>
            <div class="form-step d-none">
                <div class="d-flex align-items-center mb-3">
                    <img id="modalAlbumCover3" src="" class="rounded me-3" style="width:60px; height:60px;">
                    <div>
                        <h6 class="mb-0" id="modalSongName3"></h6>
                        <small class="text-muted" id="modalArtistName3"></small>
                    </div>
                </div>
                <h5 class="mb-3">Review your dispute</h5>
                <p>Please review the details of your dispute before submitting.</p>
            </div>
        </form>
    </div>
    <div class="offcanvas-footer p-3 bg-light border-top">
        <button type="button" class="btn btn-secondary" id="backBtn">Back</button>
        <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
        <button type="submit" form="conflictForm" class="btn btn-success d-none" id="submitBtn">Submit Dispute</button>
    </div>
</div>