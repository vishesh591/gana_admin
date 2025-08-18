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
                        <button class="btn btn-create" data-bs-toggle="modal" data-bs-target="#createArtistModal">
                            <i data-feather="plus" class="me-1"></i>
                            Create Artist
                        </button>
                    </div>
                </div>
            </div>

            <div class="artist-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="40">
                                    <input type="checkbox" class="form-check-input" id="selectAll">
                                </th>
                                <th>Artist</th>
                                <th class="text-center">Releases</th>
                            </tr>
                        </thead>
                        <tbody id="artistTableBody">
                            <?php if (!empty($data['artists'])): ?>
                                <?php foreach ($data['artists'] as $artist): ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="form-check-input artist-checkbox" value="<?= esc($artist['id']) ?>">
                                        </td>
                                        <td>
                                            <div class="artist-profile">
                                                <img src="<?= !empty($artist['profile_image']) ? base_url($artist['profile_image']) : '/images/default.png' ?>"
                                                    alt="<?= esc($artist['name']) ?>"
                                                    class="artist-image">
                                                <div>
                                                    <div class="artist-name"><?= esc($artist['name']) ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="releases-badge">
                                                <?= esc($artist['release_count'] ?? 0) ?> releases
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center">No artists found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>

                <div class="pagination-wrapper d-flex justify-content-between align-items-center">
                    <span class="text-muted" id="paginationInfo">Showing 1-3 of 3 artists</span>
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

<div class="modal fade" id="createArtistModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Artist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="createArtistForm"
                    action="<?= base_url('superadmin/create-artist') ?>"
                    method="post"
                    enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Artist Name</label>
                        <input type="text" class="form-control" id="artistName" name="artist_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Spotify Id</label>
                        <input type="text" class="form-control" id="Spotify" name="spotify_id">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apple ID</label>
                        <input type="text" class="form-control" id="Apple" name="apple_id">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Profile Image</label>
                        <p class="text-muted mb-1">Click to upload artist image</p>
                        <input type="file" class="form-control" id="imageInput" name="profile_image" accept="image/*">
                        <img id="imagePreview" style="display: none; max-width: 100%; margin-top: 10px;" alt="Image Preview">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <!-- Submit button -->
                <button type="submit" form="createArtistForm" class="btn btn-create">
                    <i data-feather="plus" class="me-1"></i>
                    Create Artist
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
                <p>Are you sure you want to delete <span id="deleteCount">the</span> selected artist(s)?</p>
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