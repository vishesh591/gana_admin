<div class="admin-ownership-data-page content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h4 class="fs-18 fw-bold m-0">YouTube Ownership Details</h4>
                <small class="text-muted">Click a row to see the submitted resolution.</small>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive mb-4">
                        <table class="table table-hover mb-0 align-middle datatable" style="width:100%;">
                            <thead class="table-light">
                                <tr>
                                    <th width="50" class="no-sort">Store</th>
                                    <th>Asset Title</th>
                                    <th>Artist / Asset ID</th>
                                    <th>UPC</th>
                                    <th>Other Party</th>
                                    <th>Status</th>
                                    <th width="50" class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody class="youtube-data-body">
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="ownershipDetailsOffcanvas" style="width: 600px;">
    <div class="offcanvas-header border-bottom">
        <div>
            <h5 class="offcanvas-title mb-0" id="ownershipOffcanvasTitle"></h5>
            <small class="text-muted" id="ownershipOffcanvasSubtitle"></small>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center">
            <img src="" class="album-cover" id="ownershipAlbumCover" alt="Album Art">
            <div class="ms-3">
                <div class="fw-bold" id="ownershipSongName"></div>
                <div class="small text-muted" id="ownershipArtistName"></div>
                <div class="small text-muted"><span id="ownershipIsrc"></span> - <span id="ownershipPlatform"></span></div>
            </div>
        </div>

        <div id="ownershipDetailsContent"></div>
    </div>
    <div class="offcanvas-footer p-3 bg-light border-top">
         <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="offcanvas">Close</button>
    </div>
</div>