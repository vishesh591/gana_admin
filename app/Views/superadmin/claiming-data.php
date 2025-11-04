<div class="admin-claim-data-page content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h4 class="fs-18 fw-semibold m-0">Claiming Data</h4>
                <div class="col-auto d-flex gap-2">
                    <!-- <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                        <i class="bi bi-download me-1"></i> Export to CSV
                    </button> -->
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-3 border-bottom">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <ul class="nav nav-pills w-100 justify-content-evenly mb-3 mb-md-0" id="filterTabs">
                            <li class="nav-item"><a class="nav-link active" href="#" data-filter="all">All</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter="pending">Pending</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter="rejected">Rejected</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter="approved">Claim Released</a></li>

                        </ul>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle" id="claimDatatable" style="width:100%;">
                            <thead class="table-light">
                                <tr>
                                    <th width="60" class="text-center">#</th>
                                    <th>Song Name</th>
                                    <th>UPC</th>
                                    <th class="text-center">ISRC</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                    <div class="mb-2 mb-md-0" id="pagination-text"></div>
                    <nav>
                        <ul class="pagination mb-0" id="pagination-controls"></ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('partials/footer') ?>
</div>

<div class="modal fade" id="newClaimRequestModal" tabindex="-1" aria-labelledby="newClaimRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
            <form id="newClaimForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="newClaimRequestModalLabel">Claiming Request Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <div class="modal-body p-4">
                    <div class="mb-3"><label class="form-label">Song Name</label><input type="text" class="form-control" readonly></div>
                    <div class="mb-3"><label class="form-label">Artist</label><input type="text" class="form-control" readonly></div>
                    <div class="mb-3"><label class="form-label">ISRC</label><input type="text" class="form-control" readonly></div>
                    <div class="mb-3"><label class="form-label">Instagram Audio Link</label><input type="url" class="form-control" readonly></div>
                    <div class="mb-3"><label class="form-label">Reel Merge Link</label><input type="url" class="form-control" readonly></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="claimingRequestModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Claiming Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="claimingRequestForm">
          <input type="hidden" id="claimingRequestId">

          <div class="mb-3">
            <label class="form-label">Song</label>
            <input type="text" class="form-control" id="songName" readonly>
          </div>

          <div class="mb-3">
            <label class="form-label">Artist</label>
            <input type="text" class="form-control" id="artistName" readonly>
          </div>

          <div class="mb-3">
            <label class="form-label">ISRC</label>
            <input type="text" class="form-control" id="isrcCode" readonly>
          </div>

          <div class="mb-3">
            <label class="form-label">UPC</label>
            <input type="text" class="form-control" id="upcCode" readonly>
          </div>
          
          <div class="mb-3">
            <label class="form-label">Reason</label>
            <input type="text" class="form-control" id="removalReason" readonly>
          </div>

          <!-- NEW: Video Links Section -->
          <div class="mb-3">
            <label class="form-label fw-bold">Video Links</label>
            <div id="videoLinksContainer" class="border rounded p-3" style="background-color: #f8f9fa;">
              <!-- Video links will be populated here by JavaScript -->
              <p class="text-muted">Loading video links...</p>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select" id="statusDropdown">
              <option value="Pending">Pending</option>
              <option value="Approved">Claim Released</option>
              <option value="Rejected">Rejected</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveClaimingRequest">Save</button>
      </div>
    </div>
  </div>
</div>

