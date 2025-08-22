<div class="admin-labels-page content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="page-header pt-4 pb-2">
                <h1 class="page-title">Labels</h1>
                <p class="page-subtitle">Manage your labels and track their releases</p>
            </div>

            <div class="header-controls">
                <div class="d-flex justify-content-between align-items-center controls-row">
                    <div class="search-container flex-grow-1 me-3">
                        <input type="search" class="form-control search-input" placeholder="Search label..." id="searchInput">
                    </div>

                    <div class="button-group d-flex gap-2">
                        <button class="btn btn-create" data-bs-toggle="modal" data-bs-target="#createlabelModal">
                            <i data-feather="plus" class="me-1"></i>
                            Create label Request
                        </button>
                    </div>
                </div>
            </div>

            <div class="label-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="40">
                                    <input type="checkbox" class="form-check-input" id="selectAll">
                                </th>
                                <th>Label</th>
                                <th class="text-center">Releases</th>
                            </tr>
                        </thead>
                        <tbody id="labelTableBody">
                            <!-- Rows will be inserted by JS -->
                        </tbody>
                    </table>
                </div>

                <div class="pagination-wrapper d-flex justify-content-between align-items-center">
                    <span class="text-muted" id="paginationInfo">Showing 0-0 of 0 labels</span>
                    <nav>
                        <ul class="pagination pagination-sm mb-0" id="paginationLinks">
                            <!-- Pagination injected by JS -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createlabelModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New label</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div id="labelAlertBox" class="mt-2 w-100"></div>

            <div class="modal-body">
                <form action="<?= base_url('superadmin/create-label') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Label Name</label>
                        <input type="text" class="form-control" name="label_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Primary Label Name</label>
                        <?php if (in_array($user['role_id'], [1, 2])): ?>
                            <select class="form-control" id="labelName" name="primary_label_name">
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
                    Create label request
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteConfirmModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the selected label(s)?</p>
                <p class="text-danger small mb-0">This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">
                    <i data-feather="trash-2" class="me-1"></i>
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>