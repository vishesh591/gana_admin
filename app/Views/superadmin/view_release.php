<div class="view-release-page content-page mb-5">
    <div class="content">
        <div class="container-xxl">
            <!-- Page Title & Breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Release Details</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Releases</a></li>
                                <li class="breadcrumb-item active">Release Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Release Information Cards -->
            <div class="row">
                <!-- Artwork & Audio Preview Card -->
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Artwork & Audio Preview</h4>
                        </div>
                        <div class="card-body text-center">
                            <div class="artwork-container mb-4">
                                <?php if (!empty($release['artwork'])): ?>
                                    <img src="<?= base_url($release['artwork']) ?>"
                                        alt="Release Artwork"
                                        class="artwork-image img-fluid rounded">
                                <?php else: ?>
                                    <img src="<?= base_url('public/images/gallery/3.jpg') ?>"
                                        alt="Default Artwork"
                                        class="artwork-image img-fluid rounded">
                                <?php endif; ?>
                            </div>
                            <div class="audio-preview-section">
                                <h6 class="mb-3">Audio Preview</h6>
                                <?php if (!empty($release['audio_file'])): ?>
                                    <audio controls class="w-100 mb-3 audio-player">
                                        <source src="<?= base_url($release['audio_file']) ?>" type="audio/wav">
                                        Your browser does not support the audio element.
                                    </audio>
                                    <small class="text-muted">WAV Audio File</small>
                                <?php else: ?>
                                    <p class="text-muted">No audio preview available</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Basic Information Card -->
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Basic Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <label class="form-label text-muted">Release Title</label>
                                    <p class="fw-semibold mb-0"><?= esc($release['title'] ?? 'N/A') ?></p>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label text-muted">Artist</label>
                                    <p class="fw-semibold mb-0"><?= esc($artist['name'] ?? 'N/A') ?></p>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label text-muted">Featuring Artist</label>
                                    <p class="mb-0"><?= esc($artist['name'] ?? '-') ?></p>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label text-muted">Label Name</label>
                                    <p class="mb-0"><?= esc($label['label_name'] ?? 'N/A') ?></p>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label text-muted">Release Type</label>
                                    <p class="mb-0"><?= esc($release['release_type'] ?? 'N/A') ?></p>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label text-muted">Genre</label>
                                    <p class="mb-0"><?= esc($release['genre_type'] ?? 'N/A') ?></p>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label text-muted">Mood</label>
                                    <p class="mb-0"><?= esc($release['mood_type'] ?? 'N/A') ?></p>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label text-muted">Language</label>
                                    <p class="mb-0"><?= esc($release['language'] ?? 'N/A') ?></p>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label text-muted">UPC/EAN</label>
                                    <p class="mb-0"><?= esc($release['upc_ean'] ?? 'N/A') ?></p>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label text-muted">Status</label>
                                    <p class="mb-0">
                                        <span class="badge bg-<?= $release['status'] == 5 ? 'success' : ($release['status'] == 4 ? 'danger' : 'warning') ?>">
                                            <?= esc($statusText) ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Track Information & Credits -->
            <div class="row">
                <!-- Track Information Card -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Track Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">Track Title</label>
                                    <p class="fw-semibold mb-0"><?= esc($release['track_title'] ?? $release['title'] ?? 'N/A') ?></p>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">Secondary Track Type</label>
                                    <p class="mb-0"><?= esc($release['secondary_track_type'] ?? 'Original') ?></p>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label text-muted">Instrumental</label>
                                    <p class="mb-0"><?= isset($release['is_instrumental']) && $release['is_instrumental'] ? 'Yes' : 'No' ?></p>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label text-muted">ISRC</label>
                                    <p class="mb-0"><?= esc($release['isrc'] ?? 'N/A') ?></p>
                                </div>
                                <div class="col-12 mb-0">
                                    <label class="form-label text-muted">Track Title Language</label>
                                    <p class="mb-0"><?= esc($release['track_language'] ?? $release['language'] ?? 'N/A') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Credits Card -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Credits</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">Author</label>
                                    <p class="mb-0"><?= esc($release['author'] ?? '-') ?></p>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">Composer</label>
                                    <p class="mb-0"><?= esc($release['composer'] ?? '-') ?></p>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">Remixer</label>
                                    <p class="mb-0"><?= esc($release['remixer'] ?? '-') ?></p>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">Arranger</label>
                                    <p class="mb-0"><?= esc($release['arranger'] ?? '-') ?></p>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">Music Producer</label>
                                    <p class="mb-0"><?= esc($release['music_producer'] ?? '-') ?></p>
                                </div>
                                <div class="col-12 mb-0">
                                    <label class="form-label text-muted">Publisher</label>
                                    <p class="mb-0"><?= esc($release['publisher'] ?? '-') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright Information -->
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Copyright Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 mb-3">
                                    <label class="form-label text-muted">© Line Year</label>
                                    <p class="mb-0"><?= esc($release['c_line_year'] ?? date('Y')) ?></p>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-3">
                                    <label class="form-label text-muted">© Line</label>
                                    <p class="mb-0"><?= esc($release['c_line'] ?? ($label['name'] ?? 'N/A')) ?></p>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-3">
                                    <label class="form-label text-muted">℗ Line Year</label>
                                    <p class="mb-0"><?= esc($release['p_line_year'] ?? $release['copyright_year'] ?? date('Y')) ?></p>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-3">
                                    <label class="form-label text-muted">℗ Line</label>
                                    <p class="mb-0"><?= esc($release['p_line'] ?? $release['copyright_line'] ?? ($label['name'] ?? 'N/A')) ?></p>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label text-muted">Production Year</label>
                                    <p class="mb-0"><?= esc($release['production_year'] ?? $release['copyright_year'] ?? date('Y')) ?></p>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label class="form-label text-muted">Explicit Song</label>
                                    <p class="mb-0">

                                        <span class="badge bg-<?= ($release['explicit_song'] === 'yes') ? 'danger' : 'success' ?>">
                                            <?= ucfirst($release['explicit_song']) ?>
                                        </span>

                                    </p>
                                </div>
                                <div class="col-12 mb-0">
                                    <label class="form-label text-muted">Lyrics</label>
                                    <div class="bg-light p-3 rounded">
                                        <?php if (!empty($release['lyrics'])): ?>
                                            <p class="mb-0 text-muted small"><?= nl2br(esc($release['lyrics'])) ?></p>
                                        <?php else: ?>
                                            <p class="mb-0 text-muted small">No lyrics available</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Release Dates & Pricing -->
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Release Dates</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">Release Date</label>
                                    <p class="fw-semibold mb-0"><?= esc($release['release_date'] ?? 'N/A') ?></p>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">Pre-Sale Date</label>
                                    <p class="mb-0"><?= esc($release['pre_sale_date'] ?? '-') ?></p>
                                </div>
                                <div class="col-12 mb-0">
                                    <label class="form-label text-muted">Original Release Date</label>
                                    <p class="mb-0"><?= esc($release['original_release_date'] ?? $release['release_date'] ?? 'N/A') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Pricing</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">Release Price</label>
                                    <p class="fw-semibold mb-0">
                                        <?php if (isset($release['release_price'])): ?>
                                            ₹<?= number_format($release['release_price'], 2) ?>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </p>
                                </div>
                                <div class="col-12 mb-0">
                                    <label class="form-label text-muted">Sale Price</label>
                                    <p class="mb-0">
                                        <?php if (isset($release['sale_price'])): ?>
                                            ₹<?= number_format($release['sale_price'], 2) ?>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Distribution Information -->
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Distribution Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <label class="form-label text-muted mb-3">Free Stores</label>
                                <div class="store-badges-container">
                                    <?php if (!empty($storeNames)): ?>
                                        <?php foreach ($storeNames as $store): ?>
                                            <span class="badge bg-primary me-2 mb-2 px-3 py-2 fs-6"><?= esc($store) ?></span>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p class="text-muted">No stores selected</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mb-0">
                                <label class="form-label text-muted mb-3">Rights Management Stores</label>
                                <div class="store-badges-container">
                                    <?php if (!empty($rightsNames)): ?>
                                        <?php foreach ($rightsNames as $right): ?>
                                            <span class="badge bg-info me-2 mb-2 px-3 py-2 fs-6"><?= esc($right) ?></span>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p class="text-muted">No rights management options selected</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Actions</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-2">
                                <?php if (in_array($user['role_id'] ?? 3, [1, 2]) && $release['status'] != 2): ?>
                                    <a href="<?= base_url('releases/edit/' . $release['id']) ?>" class="btn btn-primary">
                                        <i data-feather="edit-3" class="me-2"></i>Edit Release
                                    </a>
                                <?php endif; ?>

                                <?php if ($release['status'] == 2): ?>
                                    <!-- Already taken down -->
                                    <span class="badge bg-danger fs-6 px-3 py-2">
                                        <i data-feather="x-circle" class="me-2"></i>Already Taken Down
                                    </span>
                                <?php elseif ($release['status'] == 6 && !$canTakedown): ?>
                                    <!-- Show badge for non-admin users when status is 6 -->
                                    <span class="badge bg-warning fs-6 px-3 py-2">
                                        <i data-feather="clock" class="me-2"></i>Takedown Requested
                                    </span>
                                <?php else: ?>
                                    <!-- Show takedown button for admin (status 3 or 6) -->
                                    <?php if ($canTakedown && in_array($release['status'], [3, 6])): ?>
                                        <button type="button" class="btn btn-outline-danger" onclick="confirmTakedown(<?= $release['id'] ?>)">
                                            <i data-feather="x-circle" class="me-2"></i>Takedown Release
                                        </button>
                                    <?php elseif ($release['status'] == 3): ?>
                                        <!-- Show request takedown for non-admin users when status is 3 -->
                                        <button type="button" class="btn btn-outline-warning" onclick="confirmTakedownRequest(<?= $release['id'] ?>)">
                                            <i data-feather="alert-triangle" class="me-2"></i>Request Takedown
                                        </button>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <a href="<?= base_url('releases') ?>" class="btn btn-outline-secondary">
                                    <i data-feather="arrow-left" class="me-2"></i>Back to Releases
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- content -->
    </div>

    <script>
        function confirmTakedown(releaseId) {
            if (confirm('Are you sure you want to takedown this release? This will change the status to "Takedown" and remove it from distribution.')) {
                submitTakedownForm(releaseId);
            }
        }

        function confirmTakedownRequest(releaseId) {
            if (confirm('Are you sure you want to request takedown for this release? This will submit a takedown request for admin approval.')) {
                submitTakedownForm(releaseId);
            }
        }

        function submitTakedownForm(releaseId) {
            // Create a form and submit it for takedown request
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?= base_url('releases/takedown/') ?>' + releaseId;

            // Add CSRF token
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '<?= csrf_token() ?>';
            csrfInput.value = '<?= csrf_hash() ?>';
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }
    </script>