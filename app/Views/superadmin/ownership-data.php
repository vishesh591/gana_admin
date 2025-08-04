   <div class="content-page">
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
                                <table class="table mb-0" id="releasesTable">
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
                                    <tbody id="tableBody"></tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer bg-white d-flex align-items-center justify-content-end text-muted py-2">
                            <div class="me-3" id="pagination-text"></div>
                            <div>
                                <button class="btn btn-sm" disabled><i class="bi bi-chevron-left"></i></button>
                                <button class="btn btn-sm ms-1"><i class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'partials/footer.php'; ?>
        </div>