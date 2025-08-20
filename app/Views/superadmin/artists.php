<div class="admin-artists-page content-page">
    <div class="content">
        <div class="container-xxl">

            <!-- Page Header -->
            <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-md-center pt-4 pb-3 border-bottom">
                <div>
                    <h1 class="page-title mb-1">Artists</h1>
                    <p class="page-subtitle mb-0 text-muted">
                        Manage your artists and track their releases
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="button-group d-flex gap-2 mt-3 mt-md-0">
                    <button class="btn btn-create d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#createArtistModal">
                        <i data-feather="plus" class="me-1"></i>
                        Create Artist
                    </button>

                    <!-- Future delete button -->
                    <!--
                    <button class="btn btn-danger d-flex align-items-center" id="deleteSelectedBtn" style="display: none;">
                        <i data-feather="trash-2" class="me-1"></i>
                        Delete Selected
                    </button>
                    -->
                </div>
            </div>
            <!-- /Page Header -->




            <div class="artist-table p-4">
                <div class="table-responsive">
                    <table id="artistTable" class="table">
                        <thead>
                            <tr>
                                <th width="40">
                                    <input type="checkbox" class="form-check-input" id="selectAll">
                                </th>
                                <th>Artist</th>
                                <th class="text-center">Releases</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- leave empty, DataTables will fill this -->
                        </tbody>
                    </table>
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


<!-- <div class="modal fade" id="createArtistModal" tabindex="-1">
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
</div> -->

<!-- <div class="modal fade" id="deleteConfirmModal" tabindex="-1">
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
</div> -->