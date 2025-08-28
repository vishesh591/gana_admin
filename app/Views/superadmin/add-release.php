<div class="admin-add-releases-form content-page mb-4">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">
                        <?= isset($isEdit) && $isEdit ? 'Edit Release' : 'Add New Release' ?> -
                        <span class="current-step-title">Metadata</span>
                    </h4>
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

            <?php
            // Set form action and method based on edit mode
            if (isset($isEdit) && $isEdit && isset($release)) {
                $formAction = base_url("superadmin/releases/update/{$release['id']}");
                $formMethod = 'post';
            } else {
                $formAction = base_url('superadmin/releases/store');
                $formMethod = 'post';
            }
            ?>

            <form id="releaseForm" action="<?= $formAction ?>" method="<?= $formMethod ?>" enctype="multipart/form-data" novalidate>
                <!-- Step 1 -->
                <div class="step-content active" id="step-1">
                    <div class="form-section">
                        <h5>Artwork</h5>
                        <div class="mb-3">
                            <label class="form-label <?= (!isset($isEdit) || !$isEdit) ? 'required-field' : '' ?>">Update Artwork</label>
                            <div class="file-upload-container" id="artworkUpload">
                                <i data-feather="upload" class="feather-icon-lg mb-2"></i>
                                <p class="mb-1">Drag & drop your artwork here or click to browse</p>
                                <small class="text-muted">Recommended size: 3000x3000px, JPG/PNG</small>

                                <?php if (isset($release) && !empty($release['artwork'])): ?>
                                    <img id="artworkPreview" class="file-upload-preview mt-3" src="<?= base_url($release['artwork']) ?>" alt="Current Artwork">
                                <?php else: ?>
                                    <img id="artworkPreview" class="file-upload-preview mt-3 d-none" src="" alt="Artwork Preview">
                                <?php endif; ?>
                            </div>
                            <input type="file" id="artworkFile" name="artworkFile" accept="image/*" class="d-none" <?= (!isset($isEdit) || !$isEdit) ? 'required' : '' ?>>
                            <div class="invalid-feedback" id="artworkFileError"></div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5>Basic Information</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="releaseTitle" class="form-label required-field">Title</label>
                                <input type="text" class="form-control" id="releaseTitle" name="releaseTitle"
                                    value="<?= isset($release) ? esc($release['title']) : '' ?>" required>
                                <div class="invalid-feedback" id="releaseTitleError"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="labelName" class="form-label required-field">Label Name</label>

                                <?php if (in_array($user['role_id'], [1, 2])): ?>
                                    <!-- Admin/Superadmin: Searchable Dropdown -->
                                    <select class="form-select searchable-select" id="labelName" name="label_id" required
                                        data-placeholder="Search and select a label...">
                                        <option value="">Select Label</option>
                                        <?php foreach ($labels as $label): ?>
                                            <option value="<?= esc($label['id']) ?>"
                                                <?= (isset($release) && $release['label_id'] == $label['id']) ? 'selected' : '' ?>>
                                                <?= esc($label['label_name']) ?> (<?= esc($label['primary_label_name']) ?>)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback" id="labelNameError"></div>
                                <?php else: ?>
                                    <!-- Normal user: readonly field -->
                                    <?php if (!empty($labels)): ?>
                                        <input type="text"
                                            class="form-control"
                                            id="labelName"
                                            name="labelName"
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
                                <select class="form-select searchable-select" id="artist" name="artist" required
                                    data-placeholder="Search and select a label...">
                                    <option value="">Select Artist</option>
                                    <?php foreach ($artists as $artist): ?>
                                        <option value="<?= esc($artist['id']) ?>"
                                            <?= (isset($release) && $release['artist_id'] == $artist['id']) ? 'selected' : '' ?>>
                                            <?= esc($artist['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback" id="artistError"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="featuringArtist" class="form-label required-field">Artist</label>
                                <select class="form-select searchable-select" id="featuringArtist" name="featuringArtist" required
                                    data-placeholder="Search and select a label...">
                                    <option value="">Featuring Artist</option>
                                    <?php foreach ($artists as $artist): ?>
                                        <option value="<?= esc($artist['id']) ?>"
                                            <?= (isset($release) && $release['artist_id'] == $artist['id']) ? 'selected' : '' ?>>
                                            <?= esc($artist['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback" id="featuringArtistError"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required-field">Release Type</label>
                                <div class="release-type-container">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="releaseType" id="single" value="single"
                                            <?= (!isset($release) || $release['release_type'] == 'single') ? 'checked' : '' ?> required>
                                        <label class="form-check-label" for="single">Single</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="releaseType" id="ep" value="ep"
                                            <?= (isset($release) && $release['release_type'] == 'ep') ? 'checked' : '' ?> required>
                                        <label class="form-check-label" for="ep">EP</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="releaseType" id="album" value="album"
                                            <?= (isset($release) && $release['release_type'] == 'album') ? 'checked' : '' ?> required>
                                        <label class="form-check-label" for="album">Album</label>
                                    </div>
                                </div>
                                <div class="invalid-feedback" id="releaseTypeError"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mood" class="form-label required-field">Mood</label>
                                <select class="form-select" id="mood" name="mood" required>
                                    <option value="" <?= !isset($release) ? 'selected' : '' ?> disabled>Select mood</option>
                                    <option value="happy" <?= (isset($release) && $release['mood_type'] == 'happy') ? 'selected' : '' ?>>Happy</option>
                                    <option value="energetic" <?= (isset($release) && $release['mood_type'] == 'energetic') ? 'selected' : '' ?>>Energetic</option>
                                    <option value="romantic" <?= (isset($release) && $release['mood_type'] == 'romantic') ? 'selected' : '' ?>>Romantic</option>
                                    <option value="melancholic" <?= (isset($release) && $release['mood_type'] == 'melancholic') ? 'selected' : '' ?>>Melancholic</option>
                                    <option value="chill" <?= (isset($release) && $release['mood_type'] == 'chill') ? 'selected' : '' ?>>Chill</option>
                                </select>
                                <div class="invalid-feedback" id="moodError"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="genre" class="form-label required-field">Genre</label>
                                <select class="form-select" id="genre" name="genre" required>
                                    <option value="" <?= !isset($release) ? 'selected' : '' ?> disabled>Select genre</option>
                                    <option value="pop" <?= (isset($release) && $release['genre_type'] == 'pop') ? 'selected' : '' ?>>Pop</option>
                                    <option value="rock" <?= (isset($release) && $release['genre_type'] == 'rock') ? 'selected' : '' ?>>Rock</option>
                                    <option value="hiphop" <?= (isset($release) && $release['genre_type'] == 'hiphop') ? 'selected' : '' ?>>Hip Hop</option>
                                    <option value="electronic" <?= (isset($release) && $release['genre_type'] == 'electronic') ? 'selected' : '' ?>>Electronic</option>
                                    <option value="jazz" <?= (isset($release) && $release['genre_type'] == 'jazz') ? 'selected' : '' ?>>Jazz</option>
                                    <option value="classical" <?= (isset($release) && $release['genre_type'] == 'classical') ? 'selected' : '' ?>>Classical</option>
                                </select>
                                <div class="invalid-feedback" id="genreError"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="upcEan" class="form-label mb-0">UPC/EAN</label>
                                <input type="text" class="form-control" id="upcEan" name="upcEan"
                                    value="<?= isset($release) ? esc($release['upc_ean']) : '' ?>" placeholder="Optional">
                                <div class="invalid-feedback" id="upcEanError"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="language" class="form-label required-field">Language</label>
                                <select class="form-select" id="language" name="language" required>
                                    <option value="" <?= !isset($release) ? 'selected' : '' ?> disabled>Select language</option>
                                    <option value="english" <?= (isset($release) && $release['language'] == 'english') ? 'selected' : '' ?>>English</option>
                                    <option value="spanish" <?= (isset($release) && $release['language'] == 'spanish') ? 'selected' : '' ?>>Spanish</option>
                                    <option value="french" <?= (isset($release) && $release['language'] == 'french') ? 'selected' : '' ?>>French</option>
                                    <option value="german" <?= (isset($release) && $release['language'] == 'german') ? 'selected' : '' ?>>German</option>
                                    <option value="hindi" <?= (isset($release) && $release['language'] == 'hindi') ? 'selected' : '' ?>>Hindi</option>
                                </select>
                                <div class="invalid-feedback" id="languageError"></div>
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
                                <input type="text" class="form-control" id="trackTitle" name="trackTitle"
                                    value="<?= isset($release) ? esc($release['track_title']) : '' ?>" required>
                                <div class="invalid-feedback">Please enter a track title.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="secondaryTrackType" class="form-label required-field">Secondary Track Type</label>
                                <select class="form-select" id="secondaryTrackType" name="secondaryTrackType" required>
                                    <option value="" <?= !isset($release) ? 'selected' : '' ?> disabled>Select type</option>
                                    <option value="original" <?= (isset($release) && $release['secondary_track_type'] == 'original') ? 'selected' : '' ?>>Original</option>
                                    <option value="karaoke" <?= (isset($release) && $release['secondary_track_type'] == 'karaoke') ? 'selected' : '' ?>>Karaoke</option>
                                    <option value="movie" <?= (isset($release) && $release['secondary_track_type'] == 'movie') ? 'selected' : '' ?>>Movie Sound Track</option>
                                    <option value="medley" <?= (isset($release) && $release['secondary_track_type'] == 'medley') ? 'selected' : '' ?>>Medley</option>
                                    <option value="cover" <?= (isset($release) && $release['secondary_track_type'] == 'cover') ? 'selected' : '' ?>>Cover</option>
                                    <option value="cover_band" <?= (isset($release) && $release['secondary_track_type'] == 'cover_band') ? 'selected' : '' ?>>Cover by cover band</option>
                                </select>
                                <div class="invalid-feedback">Please select a secondary track type.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required-field">Instrumental</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="instrumental" id="instrumentalYes" value="yes"
                                        <?= (isset($release) && $release['instrumental'] === 'yes') ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="instrumentalYes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="instrumental" id="instrumentalNo" value="no"
                                        <?= (!isset($release) || $release['instrumental'] === 'no' || $release['instrumental'] !== 'yes') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="instrumentalNo">No</label>
                                </div>
                                <div class="invalid-feedback d-block" style="display: none;">Please select an option.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="isrc" class="form-label mb-0">ISRC</label>
                                <input type="text" class="form-control" id="isrc" name="isrc"
                                    value="<?= isset($release) ? esc($release['isrc']) : '' ?>" placeholder="Optional">
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5>Credits</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="author" class="form-label required-field">Author</label>
                                <input type="text" class="form-control" id="author" name="author"
                                    value="<?= isset($release) ? esc($release['author']) : '' ?>"
                                    placeholder="Comma separated names" required>
                                <div class="invalid-feedback">Please provide the author's name(s).</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="composer" class="form-label required-field">Composer</label>
                                <input type="text" class="form-control" id="composer" name="composer"
                                    value="<?= isset($release) ? esc($release['composer']) : '' ?>"
                                    placeholder="Comma separated names" required>
                                <div class="invalid-feedback">Please provide the composer's name(s).</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="remixer" class="form-label">Remixer</label>
                                <input type="text" class="form-control" id="remixer" name="remixer"
                                    value="<?= isset($release) ? esc($release['remixer']) : '' ?>"
                                    placeholder="Comma separated names">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="arranger" class="form-label">Arranger</label>
                                <input type="text" class="form-control" id="arranger" name="arranger"
                                    value="<?= isset($release) ? esc($release['arranger']) : '' ?>"
                                    placeholder="Comma separated names">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="producer" class="form-label">Music Producer</label>
                                <input type="text" class="form-control" id="producer" name="producer"
                                    value="<?= isset($release) ? esc($release['music_producer']) : '' ?>"
                                    placeholder="Comma separated names">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="publisher" class="form-label">Publisher</label>
                                <input type="text" class="form-control" id="publisher" name="publisher"
                                    value="<?= isset($release) ? esc($release['publisher']) : '' ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5>Copyright Information</h5>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cLineYear" class="form-label required-field">© Line Year</label>
                                <select class="form-select" id="cLineYear" name="cLineYear" required>
                                    <option value="" <?= !isset($release) ? 'selected' : '' ?> disabled>Select year</option>
                                    <option value="2025" <?= (isset($release) && $release['c_line_year'] == '2025') ? 'selected' : '' ?>>2025</option>
                                    <option value="2024" <?= (isset($release) && $release['c_line_year'] == '2024') ? 'selected' : '' ?>>2024</option>
                                    <option value="2023" <?= (isset($release) && $release['c_line_year'] == '2023') ? 'selected' : '' ?>>2023</option>
                                </select>
                                <div class="invalid-feedback">Please select a © Line Year.</div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cLine" class="form-label">© Line</label>
                                <input type="text" class="form-control" id="cLine" name="cLine"
                                    value="<?= isset($release) ? esc($release['c_line']) : '' ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="pLineYear" class="form-label required-field">℗ Line Year</label>
                                <select class="form-select" id="pLineYear" name="pLineYear" required>
                                    <option value="" <?= !isset($release) ? 'selected' : '' ?> disabled>Select year</option>
                                    <option value="2025" <?= (isset($release) && $release['p_line_year'] == '2025') ? 'selected' : '' ?>>2025</option>
                                    <option value="2024" <?= (isset($release) && $release['p_line_year'] == '2024') ? 'selected' : '' ?>>2024</option>
                                    <option value="2023" <?= (isset($release) && $release['p_line_year'] == '2023') ? 'selected' : '' ?>>2023</option>
                                </select>
                                <div class="invalid-feedback">Please select a ℗ Line Year.</div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="pLine" class="form-label">℗ Line</label>
                                <input type="text" class="form-control" id="pLine" name="pLine"
                                    value="<?= isset($release) ? esc($release['p_line']) : '' ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="productionYear" class="form-label required-field">Production Year</label>
                                <select class="form-select" id="productionYear" name="productionYear" required>
                                    <option value="" <?= !isset($release) ? 'selected' : '' ?> disabled>Select year</option>
                                    <option value="2025" <?= (isset($release) && $release['production_year'] == '2025') ? 'selected' : '' ?>>2025</option>
                                    <option value="2024" <?= (isset($release) && $release['production_year'] == '2024') ? 'selected' : '' ?>>2024</option>
                                    <option value="2023" <?= (isset($release) && $release['production_year'] == '2023') ? 'selected' : '' ?>>2023</option>
                                </select>
                                <div class="invalid-feedback">Please select the production year.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="trackLanguage" class="form-label required-field">Track Title Language</label>
                                <select class="form-select" id="trackLanguage" name="trackLanguage" required>
                                    <option value="" <?= !isset($release) ? 'selected' : '' ?> disabled>Select language</option>
                                    <option value="english" <?= (isset($release) && $release['track_title_language'] == 'english') ? 'selected' : '' ?>>English</option>
                                    <option value="spanish" <?= (isset($release) && $release['track_title_language'] == 'spanish') ? 'selected' : '' ?>>Spanish</option>
                                    <option value="french" <?= (isset($release) && $release['track_title_language'] == 'french') ? 'selected' : '' ?>>French</option>
                                    <option value="german" <?= (isset($release) && $release['track_title_language'] == 'german') ? 'selected' : '' ?>>German</option>
                                    <option value="hindi" <?= (isset($release) && $release['track_title_language'] == 'hindi') ? 'selected' : '' ?>>Hindi</option>
                                </select>
                                <div class="invalid-feedback">Please select the track title language.</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="explicit" class="form-label required-field">Explicit Song</label>
                            <select class="form-select" id="explicit" name="explicit" required>
                                <option value="" <?= !isset($release) ? 'selected' : '' ?> disabled>Select option</option>
                                <option value="yes" <?= (isset($release) && $release['explicit_song'] == 'yes') ? 'selected' : '' ?>>Yes</option>
                                <option value="no" <?= (isset($release) && $release['explicit_song'] == 'no') ? 'selected' : '' ?>>No</option>
                            </select>
                            <div class="invalid-feedback">Please specify if the song is explicit.</div>
                        </div>
                        <div class="mb-3">
                            <label for="lyrics" class="form-label">Lyrics</label>
                            <textarea class="form-control" id="lyrics" name="lyrics" rows="5"><?= isset($release) ? esc($release['lyrics']) : '' ?></textarea>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5>Audio File</h5>
                        <div class="mb-3">
                            <label class="form-label <?= (!isset($isEdit) || !$isEdit) ? 'required-field' : '' ?>">Upload Audio</label>
                            <div class="file-upload-container" id="audioUpload">
                                <i data-feather="upload" class="feather-icon-lg mb-2"></i>
                                <p class="mb-1">Drag & drop your WAV audio file here or click to browse</p>
                                <small class="text-muted">⚠️ Only WAV format accepted - Max 50MB</small>

                                <!-- Audio Preview Section -->
                                <div id="audioPreviewContainer" class="mt-3 <?= (!isset($release) || empty($release['audio_file'])) ? 'd-none' : '' ?>">
                                    <div class="audio-preview-wrapper">
                                        <?php if (isset($release) && !empty($release['audio_file'])): ?>
                                            <audio id="audioPreview" controls class="w-100" style="max-width: 100%;">
                                                <source src="<?= base_url($release['audio_file']) ?>" type="audio/wav">
                                                Your browser does not support the audio element.
                                            </audio>
                                            <div class="audio-info mt-2">
                                                <small class="text-success">
                                                    <i data-feather="check-circle" class="feather-sm me-1"></i>
                                                    <span id="audioFileName">Current WAV file</span>
                                                </small>
                                            </div>
                                        <?php else: ?>
                                            <audio id="audioPreview" controls class="w-100" style="max-width: 100%;">
                                                Your browser does not support the audio element.
                                            </audio>
                                            <div class="audio-info mt-2">
                                                <small class="text-success">
                                                    <i data-feather="check-circle" class="feather-sm me-1"></i>
                                                    <span id="audioFileName">WAV file loaded</span>
                                                </small>
                                                <br>
                                                <small class="text-muted" id="audioFileSize">Size: 0 MB</small>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <input type="file" id="audioFile" name="audioFile" accept=".wav,audio/wav" class="d-none" <?= (!isset($isEdit) || !$isEdit) ? 'required' : '' ?>>
                            <div id="audioFileError" class="invalid-feedback" style="display: none;"></div>
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
                                <?php
                                // Convert stores string to array if needed
                                $selectedStores = [];
                                if (isset($release) && !empty($release['stores_ids'])) {
                                    $selectedStores = json_decode($release['stores_ids'], true) ?: [];
                                }

                                $storesList = [
                                    '24-7-entertainment' => '24-7 Entertainment',
                                    '7digital' => '7digital',
                                    'amazon-music' => 'Amazon Music',
                                    'anghami' => 'Anghami',
                                    'apple-itunes-apple-music' => 'Apple (iTunes / Apple Music)',
                                    'audiomack' => 'Audiomack',
                                    'boomplay' => 'Boomplay',
                                    'deezer' => 'Deezer',
                                    'facebook' => 'Facebook',
                                    'gaana' => 'Gaana',
                                    'iheartradio' => 'iHeartRadio',
                                    'jiosaavn' => 'JioSaavn',
                                    'joox' => 'Joox',
                                    'kkbox' => 'KKBox',
                                    'napster' => 'Napster',
                                    'pandora' => 'Pandora',
                                    'qobuz' => 'Qobuz',
                                    'soundcloud-go' => 'SoundCloud Go',
                                    'spotify' => 'Spotify',
                                    'tencent-kugou-kowu-qq-music' => 'Tencent (KuGou / Kowu / QQ Music)',
                                    'tiktok' => 'TikTok',
                                    'youtube-music' => 'YouTube Music'
                                ];
                                ?>
                                <?php foreach ($storesList as $storeValue => $storeLabel): ?>
                                    <div class="store-checkbox-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="store-<?= $storeValue ?>"
                                                name="stores[]" value="<?= $storeValue ?>"
                                                <?= in_array($storeValue, $selectedStores) ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="store-<?= $storeValue ?>"><?= $storeLabel ?></label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div id="storesError" class="invalid-feedback">Please select at least one store for distribution.</div>
                        </div>

                        <div class="mb-4">
                            <h6 class="mb-3">Rights Management Stores</h6>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-medium">Select rights management options</span>
                                <button type="button" class="btn btn-sm btn-outline-primary toggle-all" data-target="rightsStores">Toggle All</button>
                            </div>
                            <div class="store-checkbox-group" id="rightsStores">
                                <?php
                                $selectedRights = isset($release) && !empty($release['rights']) ? $release['rights'] : [];
                                ?>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rights1" name="rights[]" value="youtube_id"
                                            <?= in_array('youtube_id', $selectedRights) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="rights1">YouTube Content ID</label>
                                    </div>
                                </div>
                                <div class="store-checkbox-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rights2" name="rights[]" value="facebook"
                                            <?= in_array('facebook', $selectedRights) ? 'checked' : '' ?>>
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

                <!-- Step 4 -->
                <div class="step-content" id="step-4">
                    <div class="form-section">
                        <h5>Release Dates</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="releaseDate" class="form-label required-field">Release Date</label>
                                <input type="date" class="form-control" id="releaseDate" name="release_date"
                                    value="<?= isset($release) ? $release['release_date'] : '' ?>" required>
                                <div class="invalid-feedback">Please select a valid release date.</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="preSaleDate" class="form-label">Pre-Sale Date</label>
                                <input type="date" class="form-control" id="preSaleDate" name="pre_sale_date"
                                    value="<?= isset($release) ? $release['pre_sale_date'] : '' ?>">
                                <div class="invalid-feedback">Pre-sale date must be before the release date.</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="originalReleaseDate" class="form-label required-field">Original Release Date</label>
                                <input type="date" class="form-control" id="originalReleaseDate" name="original_release_date"
                                    value="<?= isset($release) ? $release['original_release_date'] : '' ?>" required>
                                <div class="invalid-feedback">Original release date is required and cannot be after the release date.</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5>Pricing</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="releasePrice" class="form-label required-field">Release Price</label>
                                <select class="form-select" id="releasePrice" name="release_price" required>
                                    <option value="" <?= !isset($release) ? 'selected' : '' ?> disabled>Select price</option>
                                    <option value="0.99" <?= (isset($release) && $release['release_price'] == '0.99') ? 'selected' : '' ?>>₹0.99</option>
                                    <option value="1.29" <?= (isset($release) && $release['release_price'] == '1.29') ? 'selected' : '' ?>>₹1.29</option>
                                    <option value="1.49" <?= (isset($release) && $release['release_price'] == '1.49') ? 'selected' : '' ?>>₹1.49</option>
                                    <option value="1.99" <?= (isset($release) && $release['release_price'] == '1.99') ? 'selected' : '' ?>>₹1.99</option>
                                    <option value="2.49" <?= (isset($release) && $release['release_price'] == '2.49') ? 'selected' : '' ?>>₹2.49</option>
                                </select>
                                <div class="invalid-feedback">Please select a release price.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="salePrice" class="form-label">Sale Price</label>
                                <select class="form-select" id="salePrice" name="sale_price">
                                    <option value="" <?= (!isset($release) || empty($release['sale_price'])) ? 'selected' : '' ?> disabled>Select sale price</option>
                                    <option value="0.79" <?= (isset($release) && $release['sale_price'] == '0.79') ? 'selected' : '' ?>>₹0.79</option>
                                    <option value="0.99" <?= (isset($release) && $release['sale_price'] == '0.99') ? 'selected' : '' ?>>₹0.99</option>
                                    <option value="1.19" <?= (isset($release) && $release['sale_price'] == '1.19') ? 'selected' : '' ?>>₹1.19</option>
                                    <option value="1.29" <?= (isset($release) && $release['sale_price'] == '1.29') ? 'selected' : '' ?>>₹1.29</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary prev-step" data-prev="3">Previous</button>
                        <button type="button" class="btn btn-primary next-step" data-next="5">Next: Terms</button>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="step-content" id="step-5">
                    <div class="form-section">
                        <h5>Terms & Conditions</h5>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="contentGuidelines" name="content_guidelines"
                                    <?= (!isset($isEdit) || !$isEdit) ? 'required' : '' ?>>
                                <label class="form-check-label <?= (!isset($isEdit) || !$isEdit) ? 'required-field' : '' ?>" for="contentGuidelines">
                                    I agree and confirm that the song uploaded by me is 100% original and does not infringe on any copyrights or intellectual property rights of any third party.
                                </label>
                                <div class="invalid-feedback">You must agree to the content guidelines.</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="isrcGuidelines" name="isrc_guidelines"
                                    <?= (!isset($isEdit) || !$isEdit) ? 'required' : '' ?>>
                                <label class="form-check-label <?= (!isset($isEdit) || !$isEdit) ? 'required-field' : '' ?>" for="isrcGuidelines">
                                    I understand and agree to the ISRC Terms & Conditions regarding the assignment and use of International Standard Recording Codes.
                                </label>
                                <div class="invalid-feedback">You must agree to the ISRC terms.</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="youtubeGuidelines" name="youtube_guidelines"
                                    <?= (!isset($isEdit) || !$isEdit) ? 'required' : '' ?>>
                                <label class="form-check-label <?= (!isset($isEdit) || !$isEdit) ? 'required-field' : '' ?>" for="youtubeGuidelines">
                                    I understand and agree to the YouTube Content Guidelines and confirm that I have all necessary rights to distribute this content on YouTube.
                                </label>
                                <div class="invalid-feedback">You must agree to the YouTube guidelines.</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="audioStoreGuidelines" name="audio_store_guidelines"
                                    <?= (!isset($isEdit) || !$isEdit) ? 'required' : '' ?>>
                                <label class="form-check-label <?= (!isset($isEdit) || !$isEdit) ? 'required-field' : '' ?>" for="audioStoreGuidelines">
                                    I understand and agree to the Gaana Distribution Content Delivery Guidelines for digital music distribution.
                                </label>
                                <div class="invalid-feedback">You must agree to the content delivery guidelines.</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary prev-step" data-prev="4">Previous</button>

                        <?php if (isset($isEdit) && $isEdit): ?>
                            <?php if (isset($release) && $release['status'] == 5): ?>
                                <!-- Approved status: Show Delivered and Reject buttons -->
                                <div>
                                    <button type="submit" name="status" value="3" class="btn btn-success me-2">
                                        <i data-feather="truck" class="me-1"></i> Mark as Delivered
                                    </button>
                                    <button type="button" class="btn btn-danger" id="rejectBtn">
                                        <i data-feather="x" class="me-1"></i> Reject
                                    </button>
                                </div>
                            <?php else: ?>
                                <!-- Other statuses: Show Approve and Reject buttons -->
                                <div>
                                    <button type="submit" name="status" value="5" class="btn btn-success me-2">
                                        <i data-feather="check" class="me-1"></i> Approve
                                    </button>
                                    <button type="button" class="btn btn-danger" id="rejectBtn">
                                        <i data-feather="x" class="me-1"></i> Reject
                                    </button>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <button type="submit" name="status" value="1" class="btn btn-success">
                                <i data-feather="check" class="me-1"></i> Submit Release
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="rejectionModal" tabindex="-1" aria-labelledby="rejectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="rejectionModalLabel">
                    <i data-feather="x-circle" class="me-2"></i>Reject Release
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="rejectionMessage" class="form-label fw-bold">
                        Rejection Reason <span class="text-danger">*</span>
                    </label>
                    <textarea
                        class="form-control"
                        id="rejectionMessage"
                        name="rejectionMessage"
                        rows="5"
                        placeholder="Please provide a detailed reason for rejecting this release. This message will be sent to the user."
                        maxlength="1000"
                        required></textarea>
                    <div class="form-text">
                        <small class="text-muted">
                            <span id="charCount">0</span>/1000 characters
                        </small>
                    </div>
                    <div class="invalid-feedback" id="rejectionMessageError">
                        Please provide a rejection reason (minimum 10 characters).
                    </div>
                </div>

                <div class="alert alert-warning d-flex align-items-start" role="alert">
                    <i data-feather="alert-triangle" class="me-2 mt-1 flex-shrink-0"></i>
                    <div>
                        <strong>Important:</strong> This action will:
                        <ul class="mb-0 mt-2">
                            <li>Set the release status to "Rejected"</li>
                            <li>Send an email notification to the user</li>
                            <li>Include your message in the notification</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i data-feather="arrow-left" class="me-1"></i> Cancel
                </button>
                <button type="button" class="btn btn-danger" id="confirmRejectBtn">
                    <i data-feather="x" class="me-1"></i> Confirm Rejection
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Add this script to handle edit mode initialization
    document.addEventListener('DOMContentLoaded', function() {
        // Check if we're in edit mode and initialize fields accordingly
        const isEditMode = <?= json_encode(isset($isEdit) && $isEdit) ?>;

        if (isEditMode) {
            // Initialize Feather icons
            if (typeof feather !== 'undefined') {
                feather.replace();
            }

            // Pre-check terms and conditions in edit mode (optional)
            <?php if (isset($isEdit) && $isEdit): ?>
                document.getElementById('contentGuidelines').checked = true;
                document.getElementById('isrcGuidelines').checked = true;
                document.getElementById('youtubeGuidelines').checked = true;
                document.getElementById('audioStoreGuidelines').checked = true;
            <?php endif; ?>
        }
    });
</script>