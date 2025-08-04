<div class="content-page">
            <div class="content">
                <div class="container-xxl">
                    <div class="row align-items-center mb-5">
                        <div class="col">
                            <h1 class="page-title fs-2">Claim / Reel Merge</h1>
                        </div>
                        <div class="col-auto d-flex gap-2">
                            <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                                <i class="bi bi-download me-1"></i> Export to CSV
                            </button>
                            <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#newClaimRequestModal">
                                <i class="bi bi-plus-lg me-1"></i> New Claiming Request
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow-sm">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="claimingTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="50"></th>
                                                    <th>Song Name</th>
                                                    <th>ISRC</th>
                                                    <th class="text-center">Instagram Audio Link</th>
                                                    <th class="text-center">Reel Merge Link</th>
                                                    <th>Matching Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableBody">
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                                    <div class="mb-2 mb-md-0" id="pagination-text">
                                    </div>
                                    <nav>
                                        <ul class="pagination mb-0">
                                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'partials/footer.php'; ?>
            </div>
        </div>