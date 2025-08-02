<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Release</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.css" rel="stylesheet">
    <style>
        .step-indicator-container {
            padding: 0 15px;
            margin-bottom: 30px;
        }

        .step-indicator {
            position: relative;
            counter-reset: step;
            padding-bottom: 20px;
        }

        .step-indicator::before {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #e9ecef;
            top: 18px;
            z-index: 1;
        }

        .step {
            position: relative;
            z-index: 2;
            text-align: center;
            flex: 1;
            padding: 0 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .step-number {
            width: 36px;
            height: 36px;
            line-height: 36px;
            border-radius: 50%;
            background-color: #e9ecef;
            color: #6c757d;
            display: inline-block;
            margin-bottom: 5px;
            font-weight: 600;
            position: relative;
            transition: all 0.3s ease;
        }

        .step.active .step-number {
            background-color: #4361ee;
            color: white;
            transform: scale(1.1);
        }

        .step.completed .step-number {
            background-color: #7209b7;
            color: white;
        }

        /* Progress line animation */
        .progress-line {
            position: absolute;
            height: 2px;
            background-color: #7209b7;
            top: 18px;
            left: 0;
            z-index: 0;
            transition: width 0.5s ease;
        }

        .step-title {
            color: #6c757d;
            font-size: 14px;
            display: block;
            transition: all 0.3s ease;
        }

        .step.active .step-title {
            color: #4361ee;
            font-weight: 600;
        }

        .step.completed .step-title {
            color: #7209b7;
        }

        .step:hover .step-number {
            transform: scale(1.05);
        }

        .step:hover .step-title {
            color: #4361ee;
        }
        
        .form-section {
            background-color: white;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
            border: 1px solid #e9ecef;
        }
        
        .form-section h5 {
            color: #4361ee;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .required-field:after {
            content: " *";
            color: #dc3545;
        }
        
        .file-upload-container {
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .file-upload-container:hover {
            border-color: #4361ee;
            background-color: rgba(67, 97, 238, 0.05);
        }
        
        .file-upload-preview {
            max-width: 200px;
            max-height: 200px;
            margin: 0 auto;
            display: block;
        }
        
        .store-checkbox-group {
            max-height: 300px;
            overflow-y: auto;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 15px;
        }
        
        .store-checkbox-item {
            margin-bottom: 8px;
        }
        
        .step-content {
            display: none;
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.3s ease;
        }
        
        .step-content.active {
            display: block;
            opacity: 1;
            transform: translateX(0);
        }
        
        .current-step-title {
            color: #4361ee;
            font-weight: 600;
        }

        .feather-icon-lg {
            width: 48px;
            height: 48px;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .content-page {
            padding: 20px;
        }

        .container-xxl {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<a href="index.php" 
   class="btn btn-sm btn-danger position-absolute top-0 end-0 m-3 z-3 rounded-circle d-flex align-items-center justify-content-center" 
   style="width: 36px; height: 36px;" 
   title="Close">
    <i data-feather="x"></i>
</a>

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
    <input type="text" class="form-control" id="upcEan" placeholder="Optional">
</div>
                                </div>
                                  <div class="row">
                                     <div class="col-md-6 mb-3">
                                        <label for="language" class="form-label required-field">Language</label>
                                        <select class="form-select" id="language" required>
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
                    <!-- Step 2: Uploads -->
                    <div class="step-content" id="step-2">
                            <div class="form-section">
                                <h5>Track Information</h5>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="trackTitle" class="form-label required-field">Title</label>
                                        <input type="text" class="form-control" id="trackTitle" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="secondaryTrackType" class="form-label required-field">Secondary Track Type</label>
                                        <select class="form-select" id="secondaryTrackType" required>
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
                                            <label class="form-check-label" for="instrumentalYes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="instrumental" id="instrumentalNo" value="no" checked>
                                            <label class="form-check-label" for="instrumentalNo">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
        <label for="upcEan" class="form-label mb-0">ISRC</label>
    </div>
    <input type="text" class="form-control" id="upcEan" placeholder="Optional">
</div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h5>Credits</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="author" class="form-label required-field">Author</label>
                                        <input type="text" class="form-control" id="author" placeholder="Comma separated names" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="composer" class="form-label required-field">Composer</label>
                                        <input type="text" class="form-control" id="composer" placeholder="Comma separated names" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="remixer" class="form-label">Remixer</label>
                                        <input type="text" class="form-control" id="remixer" placeholder="Comma separated names">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="arranger" class="form-label">Arranger</label>
                                        <input type="text" class="form-control" id="arranger" placeholder="Comma separated names">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="producer" class="form-label">Music Producer</label>
                                        <input type="text" class="form-control" id="producer" placeholder="Comma separated names">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="publisher" class="form-label">Publisher</label>
                                        <input type="text" class="form-control" id="publisher">
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h5>Copyright Information</h5>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="cLineYear" class="form-label required-field">© Line Year</label>
                                        <select class="form-select" id="cLineYear" required>
                                            <option value="" selected disabled>Select year</option>
                                            <?php for ($year = date('Y'); $year >= 1900; $year--): ?>
                                                <option value="<?= $year ?>"><?= $year ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="cLine" class="form-label">© Line</label>
                                        <input type="text" class="form-control" id="cLine">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="pLineYear" class="form-label required-field">℗ Line Year</label>
                                        <select class="form-select" id="pLineYear" required>
                                            <option value="" selected disabled>Select year</option>
                                            <?php for ($year = date('Y'); $year >= 1900; $year--): ?>
                                                <option value="<?= $year ?>"><?= $year ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="pLine" class="form-label">℗ Line</label>
                                        <input type="text" class="form-control" id="pLine">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="productionYear" class="form-label required-field">Production Year</label>
                                        <select class="form-select" id="productionYear" required>
                                            <option value="" selected disabled>Select year</option>
                                            <?php for ($year = date('Y'); $year >= 1900; $year--): ?>
                                                <option value="<?= $year ?>"><?= $year ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="trackLanguage" class="form-label required-field">Track Title Language</label>
                                        <select class="form-select" id="trackLanguage" required>
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
                                    <select class="form-select" id="explicit" required>
                                        <option value="" selected disabled>Select option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="lyrics" class="form-label">Lyrics</label>
                                    <textarea class="form-control" id="lyrics" rows="5"></textarea>
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
                                    <input type="file" id="audioFile" accept="audio/*" class="d-none">
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-secondary prev-step" data-prev="1">Previous</button>
                                <button type="button" class="btn btn-primary next-step" data-next="3">Next: Stores</button>
                            </div>
                        </div>


                    <!-- Step 3: Stores -->
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
        <input class="form-check-input" type="checkbox" id="store-24-7-entertainment" value="24-7-entertainment" checked>
        <label class="form-check-label" for="store-24-7-entertainment">24-7 Entertainment</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-7digital" value="7digital" checked>
        <label class="form-check-label" for="store-7digital">7digital</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-amazon-music" value="amazon-music" checked>
        <label class="form-check-label" for="store-amazon-music">Amazon Music</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-ami-entertainment" value="ami-entertainment" checked>
        <label class="form-check-label" for="store-ami-entertainment">AMI Entertainment</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-anghami" value="anghami" checked>
        <label class="form-check-label" for="store-anghami">Anghami</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-aspiro-tidal-wimp" value="aspiro-tidal-wimp" checked>
        <label class="form-check-label" for="store-aspiro-tidal-wimp">Aspiro (Tidal / WiMP)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-audible-magic" value="audible-magic" checked>
        <label class="form-check-label" for="store-audible-magic">Audible Magic</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-audiomack" value="audiomack" checked>
        <label class="form-check-label" for="store-audiomack">Audiomack</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-awa" value="awa" checked>
        <label class="form-check-label" for="store-awa">AWA</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-bmat" value="bmat" checked>
        <label class="form-check-label" for="store-bmat">BMAT</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-boomplay" value="boomplay" checked>
        <label class="form-check-label" for="store-boomplay">Boomplay</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-deezer" value="deezer" checked>
        <label class="form-check-label" for="store-deezer">Deezer</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-disco-virgin-music-group" value="disco-virgin-music-group" checked>
        <label class="form-check-label" for="store-disco-virgin-music-group">DISCO (Virgin Music Group)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-flo" value="flo" checked>
        <label class="form-check-label" for="store-flo">FLO</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-facebook" value="facebook" checked>
        <label class="form-check-label" for="store-facebook">Facebook</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-fit-radio" value="fit-radio" checked>
        <label class="form-check-label" for="store-fit-radio">Fit Radio</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-fizy" value="fizy" checked>
        <label class="form-check-label" for="store-fizy">Fizy</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-gaana" value="gaana" checked>
        <label class="form-check-label" for="store-gaana">Gaana</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-genie-music" value="genie-music" checked>
        <label class="form-check-label" for="store-genie-music">Genie Music</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-gracenote" value="gracenote" checked>
        <label class="form-check-label" for="store-gracenote">Gracenote</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-claro-musica" value="claro-musica" checked>
        <label class="form-check-label" for="store-claro-musica">Claro Música</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-apple-itunes-apple-music" value="apple-itunes-apple-music" checked>
        <label class="form-check-label" for="store-apple-itunes-apple-music">Apple (iTunes / Apple Music)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-jaxsta" value="jaxsta" checked>
        <label class="form-check-label" for="store-jaxsta">Jaxsta</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-joox" value="joox" checked>
        <label class="form-check-label" for="store-joox">Joox</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-melon" value="melon" checked>
        <label class="form-check-label" for="store-melon">Melon</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-kantar-france" value="kantar-france" checked>
        <label class="form-check-label" for="store-kantar-france">Kantar (France)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-kkbox" value="kkbox" checked>
        <label class="form-check-label" for="store-kkbox">KKBox</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-kuack-media-group" value="kuack-media-group" checked>
        <label class="form-check-label" for="store-kuack-media-group">Kuack Media Group</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-mdundo" value="mdundo" checked>
        <label class="form-check-label" for="store-mdundo">mdundo</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-medianet" value="medianet" checked>
        <label class="form-check-label" for="store-medianet">MediaNet</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-kantar-uk" value="kantar-uk" checked>
        <label class="form-check-label" for="store-kantar-uk">Kantar (UK)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-mood-media-playnetwork" value="mood-media-playnetwork" checked>
        <label class="form-check-label" for="store-mood-media-playnetwork">Mood Media/Playnetwork</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-moov" value="moov" checked>
        <label class="form-check-label" for="store-moov">MOOV</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-muud" value="muud" checked>
        <label class="form-check-label" for="store-muud">muud</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-vibe" value="vibe" checked>
        <label class="form-check-label" for="store-vibe">VIBE</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-nct-nhaccuatui" value="nct-nhaccuatui" checked>
        <label class="form-check-label" for="store-nct-nhaccuatui">NCT (NhacCuaTui)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-netease" value="netease" checked>
        <label class="form-check-label" for="store-netease">NetEase</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-bugs" value="bugs" checked>
        <label class="form-check-label" for="store-bugs">Bugs</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-line-music" value="line-music" checked>
        <label class="form-check-label" for="store-line-music">Line Music</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-pandora" value="pandora" checked>
        <label class="form-check-label" for="store-pandora">Pandora</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-rx-music" value="rx-music" checked>
        <label class="form-check-label" for="store-rx-music">RX Music</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-peloton" value="peloton" checked>
        <label class="form-check-label" for="store-peloton">Peloton</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-pex" value="pex" checked>
        <label class="form-check-label" for="store-pex">Pex</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-phononet" value="phononet" checked>
        <label class="form-check-label" for="store-phononet">Phononet</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-qishui-yinyue" value="qishui-yinyue" checked>
        <label class="form-check-label" for="store-qishui-yinyue">Qishui Yinyue</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-qobuz" value="qobuz" checked>
        <label class="form-check-label" for="store-qobuz">Qobuz</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-tencent-kugou-kowu-qq-music" value="tencent-kugou-kowu-qq-music" checked>
        <label class="form-check-label" for="store-tencent-kugou-kowu-qq-music">Tencent (KuGou / Kowu / QQ Music)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-recochoku" value="recochoku" checked>
        <label class="form-check-label" for="store-recochoku">RecoChoku</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-napster" value="napster" checked>
        <label class="form-check-label" for="store-napster">Napster</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-jiosaavn" value="jiosaavn" checked>
        <label class="form-check-label" for="store-jiosaavn">JioSaavn</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-liveone-livexlive" value="liveone-livexlive" checked>
        <label class="form-check-label" for="store-liveone-livexlive">LiveOne (LiveXLive)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-soundcloud-content-id" value="soundcloud-content-id" checked>
        <label class="form-check-label" for="store-soundcloud-content-id">SoundCloud (Content ID)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-soundcloud-go" value="soundcloud-go" checked>
        <label class="form-check-label" for="store-soundcloud-go">SoundCloud Go</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-soundexchange" value="soundexchange" checked>
        <label class="form-check-label" for="store-soundexchange">SoundExchange</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-spotify" value="spotify" checked>
        <label class="form-check-label" for="store-spotify">Spotify</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-iim-starlux" value="iim-starlux" checked>
        <label class="form-check-label" for="store-iim-starlux">IIM / Starlux</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-stellarentertainment" value="stellarentertainment" checked>
        <label class="form-check-label" for="store-stellarentertainment">StellarEntertainment</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-supernatural" value="supernatural" checked>
        <label class="form-check-label" for="store-supernatural">Supernatural</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-cubomusica" value="cubomusica" checked>
        <label class="form-check-label" for="store-cubomusica">Cubomusica</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-iheartradio" value="iheartradio" checked>
        <label class="form-check-label" for="store-iheartradio">iHeartRadio</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-tiktok" value="tiktok" checked>
        <label class="form-check-label" for="store-tiktok">TikTok</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-tivo" value="tivo" checked>
        <label class="form-check-label" for="store-tivo">TiVo</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-touchtunes" value="touchtunes" checked>
        <label class="form-check-label" for="store-touchtunes">TouchTunes</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-trebel" value="trebel" checked>
        <label class="form-check-label" for="store-trebel">Trebel</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-tunedglobal" value="tunedglobal" checked>
        <label class="form-check-label" for="store-tunedglobal">TunedGlobal</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-audible-magic-for-twitch-dj" value="audible-magic-for-twitch-dj" checked>
        <label class="form-check-label" for="store-audible-magic-for-twitch-dj">Audible Magic for Twitch DJ</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-vervelife" value="vervelife" checked>
        <label class="form-check-label" for="store-vervelife">VerveLife</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-yango-play" value="yango-play" checked>
        <label class="form-check-label" for="store-yango-play">Yango Play</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-youtube-content-id" value="youtube-content-id" checked>
        <label class="form-check-label" for="store-youtube-content-id">YouTube (Content ID)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-youtube-music" value="youtube-music" checked>
        <label class="form-check-label" for="store-youtube-music">YouTube Music</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-zing-mp3" value="zing-mp3" checked>
        <label class="form-check-label" for="store-zing-mp3">Zing MP3</label>
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
                                                <input class="form-check-input" type="checkbox" id="rights1" value="youtube_id">
                                                <label class="form-check-label" for="rights1">YouTube Content ID</label>
                                            </div>
                                        </div>
                                        <div class="store-checkbox-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="rights2" value="facebook">
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
                    <!-- Step 4: Date and Price -->
                    <div class="step-content" id="step-4">
                            <div class="form-section">
                                <h5>Release Dates</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="releaseDate" class="form-label required-field">Release Date</label>
                                        <input type="date" class="form-control" id="releaseDate" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="preSaleDate" class="form-label">Pre-Sale Date</label>
                                        <input type="date" class="form-control" id="preSaleDate">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="originalReleaseDate" class="form-label required-field">Original Release Date</label>
                                        <input type="date" class="form-control" id="originalReleaseDate" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h5>Pricing</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="releasePrice" class="form-label required-field">Release Price</label>
                                        <select class="form-select" id="releasePrice" required>
                                            <option value="" selected disabled>Select price</option>
                                            <option value="0.99">0.99 rupee</option>
                                            <option value="1.29">1.29 rupee</option>
                                            <option value="1.49">1.49 rupee</option>
                                            <option value="1.99">1.99 rupee</option>
                                            <option value="2.49">2.49 </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="salePrice" class="form-label">Sale Price</label>
                                        <select class="form-select" id="salePrice">
                                            <option value="" selected disabled>Select sale price</option>
                                            <option value="0.79">0.79 rupee</option>
                                            <option value="0.99">0.99 rupee</option>
                                            <option value="1.19">1.19 rupee</option>
                                            <option value="1.29">1.29 rupee</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-secondary prev-step" data-prev="3">Previous</button>
                                <button type="button" class="btn btn-primary next-step" data-next="5">Next: Terms</button>
                            </div>
                        </div>

                    <!-- Step 5: Terms and Conditions -->
                    <div class="step-content" id="step-5">
                            <div class="form-section">
                                <h5>Terms & Conditions</h5>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="contentGuidelines" required>
                                        <label class="form-check-label required-field" for="contentGuidelines">
                                            I agree and confirm that the song uploaded by me is 100% original and does not infringe on any copyrights or intellectual property rights of any third party.
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="isrcGuidelines" required>
                                        <label class="form-check-label required-field" for="isrcGuidelines">
                                            I understand and agree to the ISRC Terms & Conditions regarding the assignment and use of International Standard Recording Codes.
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="youtubeGuidelines" required>
                                        <label class="form-check-label required-field" for="youtubeGuidelines">
                                            I understand and agree to the YouTube Content Guidelines and confirm that I have all necessary rights to distribute this content on YouTube.
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="audioStoreGuidelines" required>
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
                        <?= $this->include('partials/footer') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script>
        let currentStep = 1;
        const totalSteps = 5;

        // Step titles for updating the header
        const stepTitles = {
            1: 'Metadata',
            2: 'Uploads', 
            3: 'Stores',
            4: 'Date & Price',
            5: 'Terms'
        };

        // Initialize feather icons
        if (typeof feather !== 'undefined') {
            feather.replace();
        }

        // Function to update step indicator
        function updateStepIndicator(step) {
            const steps = document.querySelectorAll('.step');
            const progressLine = document.getElementById('progressLine');
            
            steps.forEach((stepEl, index) => {
                const stepNum = index + 1;
                stepEl.classList.remove('active', 'completed');
                
                if (stepNum < step) {
                    stepEl.classList.add('completed');
                } else if (stepNum === step) {
                    stepEl.classList.add('active');
                }
            });

            // Update progress line width
            const progressWidth = ((step - 1) / (totalSteps - 1)) * 100;
            progressLine.style.width = progressWidth + '%';
        }

        // Function to show specific step content
        function showStep(step) {
            // Hide all step contents
            document.querySelectorAll('.step-content').forEach(content => {
                content.classList.remove('active');
            });
            
            // Show the target step
            setTimeout(() => {
                document.getElementById(`step-${step}`).classList.add('active');
            }, 150);
            
            // Update step indicator
            updateStepIndicator(step);
            
            // Update page title
            document.querySelector('.current-step-title').textContent = stepTitles[step];
            
            currentStep = step;
        }

        // Next step functionality
        document.querySelectorAll('.next-step').forEach(btn => {
            btn.addEventListener('click', function() {
                const nextStep = parseInt(this.dataset.next);
                if (nextStep <= totalSteps) {
                    showStep(nextStep);
                }
            });
        });

        // Previous step functionality
        document.querySelectorAll('.prev-step').forEach(btn => {
            btn.addEventListener('click', function() {
                const prevStep = parseInt(this.dataset.prev);
                if (prevStep >= 1) {
                    showStep(prevStep);
                }
            });
        });

        // Click on step indicator to navigate
        document.querySelectorAll('.step').forEach(step => {
            step.addEventListener('click', function() {
                const stepNum = parseInt(this.dataset.step);
                showStep(stepNum);
            });
        });

        // File upload functionality
        document.getElementById('artworkUpload').addEventListener('click', function() {
            document.getElementById('artworkFile').click();
        });

        document.getElementById('artworkFile').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('artworkPreview');
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        });

        // Form submission
        document.getElementById('releaseForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Release submitted successfully!');
        });

        // Initialize the form
        document.addEventListener('DOMContentLoaded', function() {
            updateStepIndicator(1);
        });
    </script>
     <?= $this->include('partials/vendor-scripts') ?>
</body>
</html>