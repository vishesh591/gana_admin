 <div class="content-page">
         
        <div class="content">
            <div class="container-xxl">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Add New Release - <span class="current-step-title">Metadata</span></h4>
                    </div>
                    <div>
                        <button class="btn btn-outline-secondary me-2">
                            <i data-feather="save" class="me-1"></i> Save Draft
                        </button>
                    </div>
                </div>

                <!-- Step Indicator -->
                <div class="step-indicator-container">
                    <div class="step-indicator d-flex justify-content-between position-relative">
                        <div class="progress-line" id="progressLine"></div>
                        <div class="step active" data-step="1">
                            <span class="step-number">1</span>
                            <span class="step-title">Metadata</span>
                        </div>
                        <div class="step" data-step="2">
                            <span class="step-number">2</span>
                            <span class="step-title">Uploads</span>
                        </div>
                        <div class="step" data-step="3">
                            <span class="step-number">3</span>
                            <span class="step-title">Stores</span>
                        </div>
                        <div class="step" data-step="4">
                            <span class="step-number">4</span>
                            <span class="step-title">Date & Price</span>
                        </div>
                        <div class="step" data-step="5">
                            <span class="step-number">5</span>
                            <span class="step-title">Terms</span>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <form id="releaseForm">
                    <!-- Step 1: Metadata -->
                    <div class="step-content active" id="step-1">
                            <div class="form-section">
                                <h5>Artwork</h5>
                                <div class="mb-3">
                                    <label class="form-label required-field">Update Artwork</label>
                                    <div class="file-upload-container" id="artworkUpload">
                                        <i data-feather="upload" class="feather-icon-lg mb-2"></i>
                                        <p class="mb-1">Drag & drop your artwork here or click to browse</p>
                                        <small class="text-muted">Recommended size: 3000x3000px, JPG/PNG</small>
                                        <img id="artworkPreview" class="file-upload-preview mt-3 d-none">
                                    </div>
                                    <input type="file" id="artworkFile" accept="image/*" class="d-none">
                                </div>
                            </div>

                            <div class="form-section">
                                <h5>Basic Information</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="releaseTitle" class="form-label required-field">Title</label>
                                        <input type="text" class="form-control" id="releaseTitle" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="featuringArtist" class="form-label required-field">Label Name</label>
                                        <input type="text" class="form-control" id="featuringArtist" value="Label Name" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="artist" class="form-label required-field">Artist</label>
                                        <input type="text" class="form-control" id="artist" required>
                                    </div>
                                     <div class="col-md-6 mb-3">
                                        <label for="featuringArtist" class="form-label">Featuring Artist</label>
                                        <input type="text" class="form-control" id="featuringArtist">
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-6 mb-3">
                                         <label class="form-label required-field">Release Type</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="releaseType" id="single" value="single" checked>
                                            <label class="form-check-label" for="single">
                                                Single
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="releaseType" id="ep" value="ep">
                                            <label class="form-check-label" for="ep">
                                                EP
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="releaseType" id="album" value="album">
                                            <label class="form-check-label" for="album">
                                                Album
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="mood" class="form-label required-field">Mood</label>
                                        <select class="form-select" id="mood" required>
                                            <option value="" selected disabled>Select mood</option>
                                            <option value="happy">Happy</option>
                                            <option value="energetic">Energetic</option>
                                            <option value="romantic">Romantic</option>
                                            <option value="melancholic">Melancholic</option>
                                            <option value="chill">Chill</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                       <label for="genre" class="form-label required-field">Genre</label>
                                        <select class="form-select" id="genre" required>
                                            <option value="" selected disabled>Select genre</option>
                                            <option value="pop">Pop</option>
                                            <option value="rock">Rock</option>
                                            <option value="hiphop">Hip Hop</option>
                                            <option value="electronic">Electronic</option>
                                            <option value="jazz">Jazz</option>
                                            <option value="classical">Classical</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
        <label for="upcEan" class="form-label mb-0">UPC/EAN</label>
    </div>