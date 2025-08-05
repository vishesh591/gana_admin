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
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input label-checkbox" value="1">
                                </td>
                                <td>
                                    <div class="label-profile">
                                        <img src="/images/rocket.png" alt="Mohit Jadhav" class="label-image">
                                        <div>
                                            <div class="label-name">Mohit Jadhav</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="releases-badge">12 releases</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input label-checkbox" value="2">
                                </td>
                                <td>
                                    <div class="label-profile">
                                        <img src="/images/rocket.png" alt="Sarah Johnson" class="label-image">
                                        <div>
                                            <div class="label-name">Sarah Johnson</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="releases-badge">8 releases</span>
                                </td>
                            </tr>
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
                <form id="createlabelForm">
                    <div class="mb-3">
                        <label class="form-label">Label Name</label>
                        <input type="text" class="form-control" id="labelName" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Primary Label Name</label>
                        <input type="text" class="form-control" id="primaryLabelName" value="Your Main Label Name" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Profile Image</label>
                        <div class="image-upload-area">
                            <i data-feather="camera" style="font-size: 2rem; color: #6c757d;"></i>
                            <p class="mb-0 mt-2 text-muted">Click to upload label image</p>
                            <img id="imagePreview" class="image-preview" style="display: none;" alt="Label Preview">
                        </div>
                        <input type="file" id="imageInput" accept="image/*" style="display: none;">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-create">
                    <i data-feather="plus" class="me-1"></i>
                    Create label request
                </button>
            </div>
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