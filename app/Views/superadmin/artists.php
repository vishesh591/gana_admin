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
            <div id="artistAlertBox" class="mt-2 w-100"></div>

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
                        <label for="artist_search" class="form-label">Spotify Artist</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" id="artist_search"
                                placeholder="Type artist name to search..." autocomplete="off">
                            <input type="hidden" id="spotify_id" name="spotify_id">

                            <!-- Dropdown for search results -->
                            <div id="spotify_dropdown" class="dropdown-menu w-100" style="display: none; max-height: 300px; overflow-y: auto;">
                                <!-- Search results will appear here -->
                            </div>
                        </div>

                        <div id="selected_artist" class="mt-2" style="display: none;">
                            <div class="card">
                                <div class="card-body py-2">
                                    <div class="d-flex align-items-center">
                                        <img id="selected_artist_image" src="" alt="Artist" class="rounded me-3" width="50" height="50">
                                        <div>
                                            <h6 id="selected_artist_name" class="mb-0"></h6>
                                            <small id="selected_artist_info" class="text-muted"></small>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-danger ms-auto" id="clear_artist">Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-text">
                            Search and select a Spotify artist
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="apple_artist_search" class="form-label">Apple Music Artist</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" id="apple_artist_search"
                                placeholder="Type artist name to search..." autocomplete="off">
                            <input type="hidden" id="apple_id" name="apple_id">

                            <!-- Dropdown for search results -->
                            <div id="apple_dropdown" class="dropdown-menu w-100" style="display: none; max-height: 300px; overflow-y: auto;">
                                <!-- Search results will appear here -->
                            </div>
                        </div>

                        <div id="selected_apple_artist" class="mt-2" style="display: none;">
                            <div class="card">
                                <div class="card-body py-2">
                                    <div class="d-flex align-items-center">
                                        <img id="selected_apple_artist_image" src="" alt="Artist" class="rounded me-3" width="50" height="50">
                                        <div>
                                            <h6 id="selected_apple_artist_name" class="mb-0"></h6>
                                            <small id="selected_apple_artist_info" class="text-muted"></small>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-danger ms-auto" id="clear_apple_artist">Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-text">
                            Search and select an Apple Music artist (optional)
                        </div>
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