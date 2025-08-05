<div class="admin-ownership-data-page content-page">
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
                            <tbody id="tableBody">
                                <tr data-bs-toggle="modal" data-bs-target="#relocationRequestModal">
                                    <td class="text-center"><i class="bi bi-youtube text-danger fs-5"></i></td>
                                    <td>Ownership conflict</td>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#relocationRequestModal">Cosmic Drift</a></td>
                                    <td><div class="fw-bold">Astro Beats</div><small class="text-muted">Asset ID: 90736897913</small></td>
                                    <td>198009123456</td>
                                    <td>The Orchard</td>
                                    <td>79K</td>
                                    <td>2 days</td>
                                    <td><span class="badge rounded-pill border bg-danger-subtle text-danger-emphasis">Action Required</span></td>
                                    <td><i class="bi bi-chevron-right text-muted"></i></td>
                                </tr>
                                <tr data-bs-toggle="modal" data-bs-target="#relocationRequestModal">
                                    <td class="text-center"><i class="bi bi-youtube text-danger fs-5"></i></td>
                                    <td>Policy</td>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#relocationRequestModal">Ocean Tides</a></td>
                                    <td><div class="fw-bold">Deep Wave</div><small class="text-muted">Asset ID: 3478239381</small></td>
                                    <td>198009654321</td>
                                    <td>Believe</td>
                                    <td>3K</td>
                                    <td>-</td>
                                    <td><span class="badge rounded-pill border bg-success-subtle text-success-emphasis">Resolved</span></td>
                                    <td><i class="bi bi-chevron-right text-muted"></i></td>
                                </tr>
                                <tr data-bs-toggle="modal" data-bs-target="#relocationRequestModal">
                                    <td class="text-center"><i class="bi bi-youtube text-danger fs-5"></i></td>
                                    <td>Ownership conflict</td>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#relocationRequestModal">City Lights</a></td>
                                    <td><div class="fw-bold">Urban Glow</div><small class="text-muted">Asset ID: 3478239381</small></td>
                                    <td>198009789012</td>
                                    <td>CD Baby</td>
                                    <td>1.2K</td>
                                    <td>15 days</td>
                                    <td><span class="badge rounded-pill border bg-warning-subtle text-warning-emphasis">In Review</span></td>
                                    <td><i class="bi bi-chevron-right text-muted"></i></td>
                                </tr>
                                <tr data-bs-toggle="modal" data-bs-target="#relocationRequestModal">
                                    <td class="text-center"><i class="bi bi-youtube text-danger fs-5"></i></td>
                                    <td>Metadata Error</td>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#relocationRequestModal">Desert Mirage</a></td>
                                    <td><div class="fw-bold">Sahara Echo</div><small class="text-muted">Asset ID: 89321756430</small></td>
                                    <td>198001112233</td>
                                    <td>TuneCore</td>
                                    <td>58K</td>
                                    <td>5 days</td>
                                    <td><span class="badge rounded-pill border bg-danger-subtle text-danger-emphasis">Action Required</span></td>
                                    <td><i class="bi bi-chevron-right text-muted"></i></td>
                                </tr>
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

<div class="modal fade" id="relocationRequestModal" tabindex="-1" aria-labelledby="relocationRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
            <form action="#" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="relocationRequestModalLabel">Review Asset Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="storeCategory" class="form-label">Store/Category</label>
                            <input type="text" class="form-control rounded-pill p-3" id="storeCategory" value="YouTube / Ownership conflict" readonly>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="assetTitle" class="form-label">Asset Title</label>
                            <input type="text" class="form-control rounded-pill p-3" id="assetTitle" value="Cosmic Drift" readonly>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="artistAssetId" class="form-label">Artist / Asset ID</label>
                            <input type="text" class="form-control rounded-pill p-3" id="artistAssetId" value="Astro Beats / 90736897913" readonly>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="upc" class="form-label">UPC</label>
                            <input type="text" class="form-control rounded-pill p-3" id="upc" value="198009123456" readonly>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="otherParty" class="form-label">Other Party</label>
                            <input type="text" class="form-control rounded-pill p-3" id="otherParty" value="The Orchard" readonly>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="dailyViews" class="form-label">Daily Views</label>
                            <input type="text" class="form-control rounded-pill p-3" id="dailyViews" value="79K" readonly>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="expiry" class="form-label">Expiry</label>
                            <input type="text" class="form-control rounded-pill p-3" id="expiry" value="2 days" readonly>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control rounded-pill p-3" id="status" value="Action Required" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal">Reject</button>
                    <button type="submit" class="btn btn-success rounded-pill">Approve</button>
                </div>
            </form>
        </div>
    </div>
</div>