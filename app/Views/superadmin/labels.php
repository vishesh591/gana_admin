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
                            <?php if (!empty($data['labels'])): ?>
                                <?php foreach ($data['labels'] as $label): ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox"
                                                class="form-check-input label-checkbox"
                                                value="<?= esc($label['id']) ?>">
                                        </td>
                                        <td>
                                            <div class="label-profile">
                                                <img src="<?= !empty($label['logo']) ? base_url($label['logo']) : '/images/default.png' ?>"
                                                    alt="<?= esc($label['label_name']) ?>"
                                                    class="label-image">
                                                <div>
                                                    <div class="label-name"><?= esc($label['label_name']) ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="releases-badge">
                                                <?= esc($label['release_count'] ?? 0) ?> releases
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center">No labels found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>

                <div class="pagination-wrapper d-flex justify-content-between align-items-center">
                    <span class="text-muted" id="paginationInfo">Showing 1-2 of 2 labels</span>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                            <li class="page-item active">
                                <span class="page-link">1</span>
                            </li>
                            <li class="page-item disabled">
                                <span class="page-link">Next</span>
                            </li>
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
            <div class="modal-body">
                <form action="<?= base_url('superadmin/create-label') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Label Name</label>
                        <input type="text" class="form-control" name="label_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Primary Label Name</label>
                        <input type="text" class="form-control" name="primary_label" value="Your Main Label Name" readonly>
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