<div class="admin-claim-merge-req-page content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h1 class="fs-18 fw-semibold m-0 page-title fs-2">Claim / Reel Merge</h1>
                <div class="col-auto d-flex gap-2">
                    <!-- <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                        <i class="bi bi-download me-1"></i> Export to CSV
                    </button> -->
                    <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#newClaimRequestModal">
                        <i class="bi bi-plus-lg me-1"></i> Create New Request
                    </button>
                </div>
            </div>

<div class="row">
  <div class="col-12">
    <div class="card shadow-sm mt-4 p-4">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover mb-0" id="claimMergeTable">
            <thead class="table-light">
              <tr>
                <th width="50">Status</th>
                <th>Song Name</th>
                <th>ISRC</th>
                <th class="text-center">Instagram Audio Link</th>
                <th class="text-center">Reel Merge Link</th>
                <th>Matching Time</th>
                <th>Status Text</th>
              </tr>
            </thead>
            <tbody>
              <!-- DataTables will inject rows here via AJAX -->
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

<div class="modal fade" id="newClaimRequestModal" tabindex="-1" aria-labelledby="newClaimRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
            <form id="newClaimForm" action="<?= site_url('claim-reel-merge/store')?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="newClaimRequestModalLabel">New Claim/Reel Merge Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">

                    <div class="mb-3">
                        <label for="songName" class="form-label">Song Name</label>
                        <select class="form-select rounded-pill p-3" id="songName" name="release_id" required>
                            <option value="" selected disabled>Select Song</option>
                            <?php foreach ($releases as $release): ?>
                                <option 
                                    value="<?= esc($release['id']) ?>"
                                    data-artist="<?= esc($release['artist_name']) ?>"
                                    data-isrc="<?= esc($release['isrc']) ?>"
                                    data-upc="<?= esc($release['upc_ean']) ?>"
                                >
                                    <?= esc($release['title']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- AUTOFILL FIELDS -->
                    <div class="mb-3">
                        <label for="artistName" class="form-label">Artist Name</label>
                        <input type="text" class="form-control rounded-pill p-3" id="artistName" name="artist_name" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="isrc" class="form-label">ISRC</label>
                        <input type="text" class="form-control rounded-pill p-3" id="isrc" name="isrc" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="upc" class="form-label">UPC Code</label>
                        <input type="text" class="form-control rounded-pill p-3" id="upc" name="upc_ean" readonly>
                    </div>

                    <!-- MANUAL INPUT FIELDS -->
                    <div class="mb-3">
                        <label for="instagramAudio" class="form-label">Instagram Audio Link</label>
                        <input type="url" class="form-control rounded-pill p-3" id="instagramAudio" name="instagram_audio" placeholder="https://www.instagram.com/reels/audio/..." required>
                    </div>

                    <div class="mb-3">
                        <label for="reelMerge" class="form-label">Reel Merge Link</label>
                        <input type="url" class="form-control rounded-pill p-3" id="reelMerge" name="reel_merge" placeholder="https://www.instagram.com/p/..." required>
                    </div>

                    <div class="mb-3">
                        <label for="matchingTime" class="form-label">Matching Time</label>
                        <input type="text" class="form-control rounded-pill p-3" id="matchingTime" name="matching_time" placeholder="e.g., 00:15-00:45" required>
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
    document.addEventListener("DOMContentLoaded", function () {
    const songSelect = document.getElementById("songName");
    const artistInput = document.getElementById("artistName");
    const isrcInput = document.getElementById("isrc");
    const upcInput = document.getElementById("upc");

    if (songSelect) {
        songSelect.addEventListener("change", function () {
            const selected = songSelect.options[songSelect.selectedIndex];
            artistInput.value = selected.dataset.artist || "";
            isrcInput.value = selected.dataset.isrc || "";
            upcInput.value = selected.dataset.upc || "";
        });
    }
});

</script>