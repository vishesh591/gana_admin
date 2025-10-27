<div class="admin-labels-page content-page">
    <div class="content">
        <div class="container-xxl">
            <!-- Page Header -->
            <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-md-center pt-4 pb-3 border-bottom">
                <div>
                    <h1 class="page-title mb-1">Labels</h1>
                    <p class="page-subtitle mb-0 text-muted">
                        <?php if (in_array($user['role_id'], [1, 2])): ?>
                            Manage label requests and track their releases
                        <?php else: ?>
                            Submit label requests and track their status
                        <?php endif; ?>
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="button-group d-flex gap-2 mt-3 mt-md-0">
                    <button class="btn btn-create d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#createlabelModal">
                        <i data-feather="plus" class="me-1"></i>
                        <?php if (in_array($user['role_id'], [1, 2])): ?>
                            Create Label
                        <?php else: ?>
                            Create Label Request
                        <?php endif; ?>
                    </button>
                </div>
            </div>

            <div class="label-table p-4">
                <div class="table-responsive">
                    <table id="labelTable" class="table">
                        <thead>
                            <tr>
                                <th width="40">
                                    <input type="checkbox" class="form-check-input" id="selectAll">
                                </th>
                                <th>Label</th>
                                <th class="text-center">Releases</th>
                                <th class="text-center">Status</th>
                                <?php if (in_array($user['role_id'], [1, 2])): ?>
                                    <th class="text-center">Actions</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- DataTables will handle rows -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('partials/footer') ?>
</div>

<div class="modal fade" id="createlabelModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <?php if (in_array($user['role_id'], [1, 2])): ?>
                        Create New Label
                    <?php else: ?>
                        Create New Label Request
                    <?php endif; ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div id="labelAlertBox" class="mt-2 w-100"></div>

            <div class="modal-body">
                <form action="<?= base_url('create-label') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Label Name</label>
                        <input type="text" class="form-control" name="label_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Primary Label Name</label>
                        <?php if (in_array($user['role_id'], [1, 2])): ?>
                            <select class="form-control" id="labelName" name="primary_label_name" required>
                                <option value="">Select Label</option>
                                <?php foreach ($primaryLabels as $primaryLabel): ?>
                                    <option value="<?= esc($primaryLabel['primary_label_name']) ?>">
                                        <?= esc($primaryLabel['primary_label_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        <?php else: ?>
                            <!-- Normal user: readonly field -->
                            <input type="text"
                                class="form-control"
                                id="labelName"
                                name="primary_label_name"
                                value="<?= esc($user['primary_label_name']) ?>"
                                readonly>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Profile Image</label>
                        <p class="text-muted mb-1">Click to upload label image</p>
                        <input type="file" class="form-control" id="imageInput" name="logo" accept="image/*">
                        <img id="imagePreview" style="display: none; max-width: 100%; margin-top: 10px;" alt="Image Preview">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-create">
                    <i data-feather="plus" class="me-1"></i>
                    <?php if (in_array($user['role_id'], [1, 2])): ?>
                        Create Label
                    <?php else: ?>
                        Submit Request
                    <?php endif; ?>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
  window.userRole = <?= json_encode($user['role_id']) ?>;
</script>
