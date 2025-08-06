<div class="admin-artists-page content-page">
            <div class="content">
                <div class="container-xxl">
                    <div class="page-header pt-4 pb-2">
                        <h1 class="page-title">Artists</h1>
                        <p class="page-subtitle">Manage your artists and track their releases</p>
                    </div>

                    <div class="header-controls">
                        <div class="d-flex justify-content-between align-items-center controls-row">
                            <div class="search-container flex-grow-1 me-3">
                                <input type="search" class="form-control search-input" placeholder="Search artist..." id="searchInput">
                            </div>
                            <div class="button-group d-flex gap-2">
                                <button class="btn btn-danger" id="deleteSelectedBtn" style="display: none;">
                                    <i data-feather="trash-2" class="me-1"></i>
                                    Delete Selected
                                </button>
                                <button class="btn btn-create" data-bs-toggle="modal" data-bs-target="#createArtistModal">
                                    <i data-feather="plus" class="me-1"></i>
                                    Create Artist
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="artist-table shadow-sm">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th width="40">
                                            <input type="checkbox" class="form-check-input" id="selectAllCheckbox">
                                        </th>
                                        <th>Artist</th>
                                        <th class="text-center">Releases</th>
                                        <th width="100">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="artistTableBody">
                                    </tbody>
                            </table>
                        </div>
                        <div class="pagination-wrapper d-flex justify-content-between align-items-center">
                            <span class="text-muted" id="paginationInfo"></span>
                            <nav id="paginationControls"></nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="modal fade" id="createArtistModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Artist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="createArtistForm">
                        <div class="mb-3">
                            <label class="form-label">Artist Name</label>
                            <input type="text" class="form-control" id="artistNameInput" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Spotify ID</label>
                            <input type="text" class="form-control" id="spotifyIdInput">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apple ID</label>
                            <input type="text" class="form-control" id="appleIdInput">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Profile Image</label>
                            <div class="image-upload-area" id="imageUploadArea">
                                <i data-feather="camera" style="font-size: 2rem; color: #6c757d;"></i>
                                <p class="mb-0 mt-2 text-muted">Click to upload image</p>
                                <img id="imagePreview" class="image-preview" style="display: none;" alt="Image Preview">
                            </div>
                            <input type="file" id="imageInput" accept="image/*" style="display: none;">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-create" id="createArtistBtn">
                        <i data-feather="plus" class="me-1"></i> Create Artist
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
                    <p>Are you sure you want to delete <strong id="deleteCount"></strong> selected artist(s)?</p>
                    <p class="text-danger small mb-0">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                        <i data-feather="trash-2" class="me-1"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>