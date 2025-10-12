<div class="admin-claim-req-page content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h4 class="fs-18 fw-semibold m-0 page-title fs-2">Claiming Request</h4>
                <div class="col-auto d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                        <i class="bi bi-download me-1"></i> Export to CSV
                    </button>
                    <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#claimingRequestModal">
                        <i class="bi bi-plus-lg me-1"></i> New Claiming Request
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm mt-4 p-4">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <!-- ID should be on TABLE not TBODY -->
                                <table class="table table-hover mb-0" id="claimingRequestTableBody">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="60"></th>
                                            <th>Song / Artist</th>
                                            <th>ISRC</th>
                                            <th>UPC</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DataTables will auto-fill this -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="claimingRequestModal" tabindex="-1" aria-labelledby="claimingRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
            <form id="claimRequestForm" action="<?= base_url('claiming-requests') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="claimingRequestModalLabel">Claim Removal Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">

                    <!-- Song Name Dropdown -->
                    <div class="mb-4">
                        <label for="songName" class="form-label d-flex align-items-center">
                            Song Name <span class="badge bg-danger ms-2">RE</span>
                        </label>
                        <select class="form-select rounded-pill p-3" id="songName" name="songName" required>
                            <option value="">-- Select Song --</option>
                            <?php foreach ($releases as $release): ?>
                                <option value="<?= esc($release['id']) ?>"
                                    data-artist="<?= esc($release['artist_name']) ?>"
                                    data-upc="<?= esc($release['upc_ean']) ?>"
                                    data-isrc="<?= esc($release['isrc']) ?>">
                                    <?= esc($release['title']) ?> (<?= esc($release['artist_name']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Artist Name (Auto Fetch) -->
                    <div class="mb-4">
                        <label for="artistName" class="form-label">Artist Name</label>
                        <input type="text" class="form-control rounded-pill p-3" id="artistName" name="artistName" readonly>
                    </div>

                    <!-- UPC (Auto Fetch) -->
                    <div class="mb-4">
                        <label for="upc" class="form-label">UPC</label>
                        <input type="text" class="form-control rounded-pill p-3" id="upc" name="upc" readonly>
                    </div>

                    <!-- ISRC (Auto Fetch) -->
                    <div class="mb-4">
                        <label for="isrc" class="form-label">ISRC</label>
                        <input type="text" class="form-control rounded-pill p-3" id="isrc" name="isrc" readonly>
                    </div>

                    <!-- Claim Removal Video Link -->
                    <div class="mb-4">
                        <label for="videoLink" class="form-label">
                            Claim Removal Video Link <small class="text-muted">(comma separated if multiple)</small>
                        </label>
                        <input type="text" class="form-control rounded-pill p-3" id="videoLink" name="videoLink"
                            placeholder="https://youtube.com/..., https://youtu.be/...">
                    </div>

                    <!-- Reason for Removing Claim -->
                    <div class="mb-4">
                        <label for="reason" class="form-label">Reason for Removing the Claim</label>
                        <input type="text" class="form-control rounded-pill p-3" id="reason" name="reason" placeholder="Enter reason">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary rounded-pill">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const songSelect = document.getElementById("songName");
        const artistInput = document.getElementById("artistName");
        const upcInput = document.getElementById("upc");
        const isrcInput = document.getElementById("isrc");

        songSelect.addEventListener("change", function() {
            const option = this.options[this.selectedIndex];
            artistInput.value = option.getAttribute("data-artist") || "";
            upcInput.value = option.getAttribute("data-upc") || "";
            isrcInput.value = option.getAttribute("data-isrc") || "";
        });
    });
</script>