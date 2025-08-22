<div class="admin-add-releases-form content-page mb-4">
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

            <div class="step-indicator-container">
                <div class="step-indicator d-flex justify-content-between position-relative">
                    <div class="progress-line" id="progressLine" style="width: 0%;"></div>
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

            <form id="releaseForm" action="<?= base_url('superadmin/releases/store') ?>" method="post" enctype="multipart/form-data" novalidate>
                <!-- Step 1 -->
                <div class="step-content active" id="step-1">
                    <div class="form-section">
                        <h5>Artwork</h5>
                        <div class="mb-3">
                            <label class="form-label required-field">Update Artwork</label>
                            <div class="file-upload-container" id="artworkUpload">
                                <i data-feather="upload" class="feather-icon-lg mb-2"></i>

                                <p class="mb-1">Drag & drop your artwork here or click to browse</p>
                                <small class="text-muted">Recommended size: 3000x3000px, JPG/PNG</small>
                                <img id="artworkPreview" class="file-upload-preview mt-3 d-none" src="" alt="Artwork Preview">
                            </div>
                            <input type="file" id="artworkFile" name="artworkFile" accept="image/*" class="d-none">
                        </div>
                    </div>

                    <div class="form-section">
                        <h5>Basic Information</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="releaseTitle" class="form-label required-field">Title</label>
                                <input type="text" class="form-control" id="releaseTitle" name="releaseTitle" required>
                            </div>
                            <!-- <div class="col-md-6 mb-3">
                                <label for="labelName" class="form-label required-field">Label Name</label>
                                <input type="text" class="form-control" id="labelName" name="labelName" value="<?= session()->get('user')['primary_label_name'] ?>" readonly>
                            </div> -->
                            <div class="col-md-6 mb-3">
                                <label for="labelName" class="form-label required-field">Label Name</label>

                                <?php if (in_array($user['role_id'], [1, 2])): ?>
                                    <!-- Admin/Superadmin: Dropdown -->
                                    <select class="form-control" id="labelName" name="label_id">
                                        <option value="">Select Label</option>
                                        <?php foreach ($labels as $label): ?>
                                            <option value="<?= esc($label['id']) ?>">
                                                <?= esc($label['label_name']) ?> (<?= esc($label['primary_label_name']) ?>)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php else: ?>
                                    <!-- Normal user: readonly field -->
                                    <?php if (!empty($labels)): ?>
                                        <input type="text"
                                            class="form-control"
                                            value="<?= esc($labels[0]['label_name']) ?> (<?= esc($labels[0]['primary_label_name']) ?>)"
                                            readonly>
                                        <input type="hidden" name="label_id" value="<?= esc($labels[0]['id']) ?>">
                                    <?php endif; ?>
                                <?php endif; ?>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="artist" class="form-label required-field">Artist</label>
                                <input type="text" class="form-control" id="artist" name="artist" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="featuringArtist" class="form-label">Featuring Artist</label>
                                <input type="text" class="form-control" id="featuringArtist" name="featuringArtist">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required-field">Release Type</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="releaseType" id="single" value="single" checked>
                                    <label class="form-check-label" for="single">Single</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="releaseType" id="ep" value="ep">
                                    <label class="form-check-label" for="ep">EP</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="releaseType" id="album" value="album">
                                    <label class="form-check-label" for="album">Album</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mood" class="form-label required-field">Mood</label>
                                <select class="form-select" id="mood" name="mood" required>
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
                                <select class="form-select" id="genre" name="genre" required>
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
                                <label for="upcEan" class="form-label mb-0">UPC/EAN</label>
                                <input type="text" class="form-control" id="upcEan" name="upcEan" placeholder="Optional">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="language" class="form-label required-field">Language</label>
                                <select class="form-select" id="language" name="language" required>
                                    <option value="" selected disabled>Select language</option>
                                    <option value="english">English</option>
                                    <option value="spanish">Spanish</option>
                                    <option value="french">French</option>
                                    <option value="german">German</option>
                                    <option value="hindi">Hindi</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary disabled">Previous</button>
                        <button type="button" class="btn btn-primary next-step" data-next="2">Next: Uploads</button>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="step-content" id="step-2">
                    <div class="form-section">
                        <h5>Track Information</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="trackTitle" class="form-label required-field">Title</label>
                                <input type="text" class="form-control" id="trackTitle" name="trackTitle" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="secondaryTrackType" class="form-label required-field">Secondary Track Type</label>
                                <select class="form-select" id="secondaryTrackType" name="secondaryTrackType" required>
                                    <option value="" selected disabled>Select type</option>
                                    <option value="original">Original</option>
                                    <option value="karaoke">Karaoke</option>
                                    <option value="movie">Movie Sound Track</option>
                                    <option value="medley">Medley</option>
                                    <option value="cover">Cover</option>
                                    <option value="cover_band">Cover by cover band</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required-field">Instrumental</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="instrumental" id="instrumentalYes" value="yes" required>
                                    <label class="form-check-label" for="instrumentalYes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="instrumental" id="instrumentalNo" value="no" checked>
                                    <label class="form-check-label" for="instrumentalNo">No</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="isrc" class="form-label mb-0">ISRC</label>
                                <input type="text" class="form-control" id="isrc" name="isrc" placeholder="Optional">
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5>Credits</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="author" class="form-label required-field">Author</label>
                                <input type="text" class="form-control" id="author" name="author" placeholder="Comma separated names" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="composer" class="form-label required-field">Composer</label>
                                <input type="text" class="form-control" id="composer" name="composer" placeholder="Comma separated names" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="remixer" class="form-label">Remixer</label>
                                <input type="text" class="form-control" id="remixer" name="remixer" placeholder="Comma separated names">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="arranger" class="form-label">Arranger</label>
                                <input type="text" class="form-control" id="arranger" name="arranger" placeholder="Comma separated names">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="producer" class="form-label">Music Producer</label>
                                <input type="text" class="form-control" id="producer" name="producer" placeholder="Comma separated names">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="publisher" class="form-label">Publisher</label>
                                <input type="text" class="form-control" id="publisher" name="publisher">
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5>Copyright Information</h5>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cLineYear" class="form-label required-field">© Line Year</label>
                                <select class="form-select" id="cLineYear" name="cLineYear" required>
                                    <option value="" selected disabled>Select year</option>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cLine" class="form-label">© Line</label>
                                <input type="text" class="form-control" id="cLine" name="cLine">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="pLineYear" class="form-label required-field">℗ Line Year</label>
                                <select class="form-select" id="pLineYear" name="pLineYear" required>
                                    <option value="" selected disabled>Select year</option>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="pLine" class="form-label">℗ Line</label>
                                <input type="text" class="form-control" id="pLine" name="pLine">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="productionYear" class="form-label required-field">Production Year</label>
                                <select class="form-select" id="productionYear" name="productionYear" required>
                                    <option value="" selected disabled>Select year</option>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="trackLanguage" class="form-label required-field">Track Title Language</label>
                                <select class="form-select" id="trackLanguage" name="trackLanguage" required>
                                    <option value="" selected disabled>Select language</option>
                                    <option value="english">English</option>
                                    <option value="spanish">Spanish</option>
                                    <option value="french">French</option>
                                    <option value="german">German</option>
                                    <option value="hindi">Hindi</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="explicit" class="form-label required-field">Explicit Song</label>
                            <select class="form-select" id="explicit" name="explicit" required>
                                <option value="" selected disabled>Select option</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="lyrics" class="form-label">Lyrics</label>
                            <textarea class="form-control" id="lyrics" name="lyrics" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5>Audio File</h5>
                        <div class="mb-3">
                            <label class="form-label required-field">Upload Audio</label>
                            <div class="file-upload-container" id="audioUpload">
                                <i data-feather="upload" class="feather-icon-lg mb-2"></i>
                                <p class="mb-1">Drag & drop your audio file here or click to browse</p>
                                <small class="text-muted">Accepted formats: WAV, FLAC, AIFF, MP3 (320kbps)</small>
                            </div>
                            <input type="file" id="audioFile" name="audioFile" accept="audio/*" class="d-none">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary prev-step" data-prev="1">Previous</button>
                        <button type="button" class="btn btn-primary next-step" data-next="3">Next: Stores</button>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="step-content" id="step-3">
                    <div class="form-section">
                        <h5>Music Stores</h5>
                        <div class="mb-4">
                            <h6 class="mb-3">Free Stores <span class="text-danger">*</span></h6>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-medium">Select stores for distribution</span>
                                <button type="button" class="btn btn-sm btn-outline-primary toggle-all" data-target="freeStores">Toggle All</button>
                            </div>
                            <div class="store-checkbox-group" id="freeStores">
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-24-7-entertainment" name="stores[]" value="24-7-entertainment" checked>
                                        <label class="form-check-label" for="store-24-7-entertainment">24-7 Entertainment</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-7digital" name="stores[]" value="7digital" checked>
                                        <label class="form-check-label" for="store-7digital">7digital</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-amazon-music" name="stores[]" value="amazon-music" checked>
                                        <label class="form-check-label" for="store-amazon-music">Amazon Music</label>
                                    </div>
                                </div>

                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-anghami" name="stores[]" value="anghami" checked>
                                        <label class="form-check-label" for="store-anghami">Anghami</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-apple-itunes-apple-music" name="stores[]" value="apple-itunes-apple-music" checked>
                                        <label class="form-check-label" for="store-apple-itunes-apple-music">Apple (iTunes / Apple Music)</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-audiomack" name="stores[]" value="audiomack" checked>
                                        <label class="form-check-label" for="store-audiomack">Audiomack</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-boomplay" name="stores[]" value="boomplay" checked>
                                        <label class="form-check-label" for="store-boomplay">Boomplay</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-deezer" name="stores[]" value="deezer" checked>
                                        <label class="form-check-label" for="store-deezer">Deezer</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-facebook" name="stores[]" value="facebook" checked>
                                        <label class="form-check-label" for="store-facebook">Facebook</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-gaana" name="stores[]" value="gaana" checked>
                                        <label class="form-check-label" for="store-gaana">Gaana</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-iheartradio" name="stores[]" value="iheartradio" checked>
                                        <label class="form-check-label" for="store-iheartradio">iHeartRadio</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-jiosaavn" name="stores[]" value="jiosaavn" checked>
                                        <label class="form-check-label" for="store-jiosaavn">JioSaavn</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-joox" name="stores[]" value="joox" checked>
                                        <label class="form-check-label" for="store-joox">Joox</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-kkbox" name="stores[]" value="kkbox" checked>
                                        <label class="form-check-label" for="store-kkbox">KKBox</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-napster" name="stores[]" value="napster" checked>
                                        <label class="form-check-label" for="store-napster">Napster</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-pandora" name="stores[]" value="pandora" checked>
                                        <label class="form-check-label" for="store-pandora">Pandora</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-qobuz" name="stores[]" value="qobuz" checked>
                                        <label class="form-check-label" for="store-qobuz">Qobuz</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-soundcloud-go" name="stores[]" value="soundcloud-go" checked>
                                        <label class="form-check-label" for="store-soundcloud-go">SoundCloud Go</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-spotify" name="stores[]" value="spotify" checked>
                                        <label class="form-check-label" for="store-spotify">Spotify</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-tencent-kugou-kowu-qq-music" name="stores[]" value="tencent-kugou-kowu-qq-music" checked>
                                        <label class="form-check-label" for="store-tencent-kugou-kowu-qq-music">Tencent (KuGou / Kowu / QQ Music)</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-tiktok" name="stores[]" value="tiktok" checked>
                                        <label class="form-check-label" for="store-tiktok">TikTok</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="store-youtube-music" name="stores[]" value="youtube-music" checked>
                                        <label class="form-check-label" for="store-youtube-music">YouTube Music</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="mb-3">Rights Management Stores</h6>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-medium">Select rights management options</span>
                                <button type="button" class="btn btn-sm btn-outline-primary toggle-all" data-target="rightsStores">Toggle All</button>
                            </div>
                            <div class="store-checkbox-group" id="rightsStores">
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rights1" name="rights[]" value="youtube_id">
                                        <label class="form-check-label" for="rights1">YouTube Content ID</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rights2" name="rights[]" value="facebook">
                                        <label class="form-check-label" for="rights2">Facebook Rights Manager</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary prev-step" data-prev="2">Previous</button>
                        <button type="button" class="btn btn-primary next-step" data-next="4">Next: Date & Price</button>
                    </div>
                </div>


                <div class="step-content" id="step-4">
                    <div class="form-section">
                        <h5>Release Dates</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="releaseDate" class="form-label required-field">Release Date</label>
                                <input type="date" class="form-control" id="releaseDate" name="release_date" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="preSaleDate" class="form-label">Pre-Sale Date</label>
                                <input type="date" class="form-control" id="preSaleDate" name="pre_sale_date">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="originalReleaseDate" class="form-label required-field">Original Release Date</label>
                                <input type="date" class="form-control" id="originalReleaseDate" name="original_release_date" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5>Pricing</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="releasePrice" class="form-label required-field">Release Price</label>
                                <select class="form-select" id="releasePrice" name="release_price" required>
                                    <option value="" selected disabled>Select price</option>
                                    <option value="0.99">₹0.99</option>
                                    <option value="1.29">₹1.29</option>
                                    <option value="1.49">₹1.49</option>
                                    <option value="1.99">₹1.99</option>
                                    <option value="2.49">₹2.49</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="salePrice" class="form-label">Sale Price</label>
                                <select class="form-select" id="salePrice" name="sale_price">
                                    <option value="" selected disabled>Select sale price</option>
                                    <option value="0.79">₹0.79</option>
                                    <option value="0.99">₹0.99</option>
                                    <option value="1.19">₹1.19</option>
                                    <option value="1.29">₹1.29</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary prev-step" data-prev="3">Previous</button>
                        <button type="button" class="btn btn-primary next-step" data-next="5">Next: Terms</button>
                    </div>
                </div>

                <div class="step-content" id="step-5">
                    <div class="form-section">
                        <h5>Terms & Conditions</h5>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="contentGuidelines" name="content_guidelines" required>
                                <label class="form-check-label required-field" for="contentGuidelines">
                                    I agree and confirm that the song uploaded by me is 100% original and does not infringe on any copyrights or intellectual property rights of any third party.
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="isrcGuidelines" name="isrc_guidelines" required>
                                <label class="form-check-label required-field" for="isrcGuidelines">
                                    I understand and agree to the ISRC Terms & Conditions regarding the assignment and use of International Standard Recording Codes.
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="youtubeGuidelines" name="youtube_guidelines" required>
                                <label class="form-check-label required-field" for="youtubeGuidelines">
                                    I understand and agree to the YouTube Content Guidelines and confirm that I have all necessary rights to distribute this content on YouTube.
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="audioStoreGuidelines" name="audio_store_guidelines" required>
                                <label class="form-check-label required-field" for="audioStoreGuidelines">
                                    I understand and agree to the HarDan Content Delivery Guidelines for digital music distribution.
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary prev-step" data-prev="4">Previous</button>
                        <button type="submit" class="btn btn-success">
                            <i data-feather="check" class="me-1"></i> Submit Release
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>