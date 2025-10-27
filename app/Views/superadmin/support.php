<div class="admin-support-dashboard content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h2 class="fs-50 fw-bold m-0 page-title text-black">Support Center</h2>
                <div class="col-auto d-flex gap-2">
                    <!-- <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                        <i class="bi bi-download me-1"></i> Export to CSV
                    </button> -->
                </div>
            </div>

            <div class="card shadow-sm mt-4 p-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div id="alertBox" class="mt-3"></div>

                        <table class="table table-hover mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th width="50">ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('partials/footer') ?>
</div>

<!-- Support Modal -->
<div class="modal fade" id="supportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-header">
                <h5 class="modal-title">Support Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Message:</strong></p>
                <p id="supportMessage" class="border p-3 rounded bg-light"></p>

                <div class="mt-3">
                    <label for="supportStatus" class="form-label">Update Status</label>
                    <select id="supportStatus" name="Status" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="in_review">In Review</option>
                        <option value="resolved">Resolved</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="saveSupportStatus">Save Changes</button>
            </div>
        </div>
    </div>
</div>