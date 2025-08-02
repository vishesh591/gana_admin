<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo view("partials/title-meta", array("title" => "Rights Issues")) ?>
    <?= $this->include('partials/head-css') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f9fafb;
            overflow-x: hidden;
        }
        .content-page {
            margin-left: 0;
            transition: margin-left 0.3s ease;
            padding-top: 70px;
        }
        @media (min-width: 992px) {
            .content-page {
                margin-left: 250px;
            }
        }
        .page-title-box {
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 1rem;
        }
        .nav-tabs {
            border-bottom: none;
        }
        .nav-tabs .nav-link {
            border: none;
            color: #6c757d;
        }
        .nav-tabs .nav-link.active {
            color: var(--bs-primary);
            background-color: transparent;
            border-bottom: 2px solid var(--bs-primary);
        }
        .table th {
            font-weight: 600;
            font-size: 12px;
            color: #6c757d;
            text-transform: uppercase;
            border: none;
            padding: 1rem 1.25rem;
            white-space: nowrap;
            vertical-align: middle;
        }
        .table td {
            padding: 1rem 1.25rem;
            vertical-align: middle;
            border-top: 1px solid #e9ecef;
        }
        .table tbody tr:hover {
            background-color: #f0f8ff;
            cursor: pointer;
        }
        .table .asset-title {
            font-weight: 500;
        }
        .table .asset-subtitle {
            font-size: 0.8rem;
            color: #6c757d;
        }

        /* --- CSS FOR SORTABLE HEADERS --- */
        .sortable-header {
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        .sortable-header:hover {
            background-color: #f8f9fa;
        }
        .sort-icon {
            margin-left: 5px;
            color: #adb5bd;
            transition: color 0.2s ease;
        }
        .sort-icon.active {
            color: var(--bs-primary);
        }
        .sort-icon .bi-arrow-up,
        .sort-icon .bi-arrow-down {
            display: inline-block;
        }
        .sort-icon.active .bi-arrow-up,
        .sort-icon.active .bi-arrow-down {
            color: var(--bs-primary);
        }
        .sort-icon:not(.active) .bi-arrow-up,
        .sort-icon:not(.active) .bi-arrow-down {
            color: #adb5bd;
        }
        
        /* Styles for the Offcanvas Modal */
        #conflictResolutionOffcanvas {
            max-width: 600px;
            width: 90%;
        }
        .notice-box {
            background-color: #f6f3ff;
            border-left: 4px solid #8064ff;
            padding: 1rem;
            display: flex;
            align-items: center;
        }
        .notice-box i {
            color: #8064ff;
        }
        .radio-card-group .radio-card {
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 0.75rem 1rem;
            cursor: pointer;
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }
        .radio-card-group .radio-card:hover {
            background-color: #f8f9fa;
        }
        .radio-card-group .radio-card input[type="radio"] {
            display: none;
        }
        .radio-card-group .radio-card.selected {
            border-color: var(--bs-primary);
            background-color: #eef2ff;
        }
        .album-section-card {
            background-color: #f8f9fa;
        }
        .album-section-card .album-cover {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 4px;
        }
        .offcanvas-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid #e9ecef;
            background-color: #fff;
        }
        .form-step {
            animation: fadeIn 0.3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Updated Territory Accordion Styles */
        .accordion-item {
            border-radius: 6px !important;
            border: 1px solid #e9ecef;
            overflow: hidden;
        }
        .accordion-item:not(:last-child) {
            margin-bottom: 0.5rem;
        }
        .accordion-header {
            font-size: 1rem;
        }
        .accordion-button {
            padding: 0.75rem 1rem;
        }
        .accordion-button:not(.collapsed) {
            color: var(--bs-body-color);
            background-color: #f8f9fa;
            box-shadow: none;
        }
        .accordion-button:focus {
            box-shadow: none;
        }
        .accordion-button::after {
            display: none;
        }
        .accordion-button .form-check {
             margin-bottom: 0;
        }
        .accordion-button .form-check-label {
            cursor: pointer;
        }
        .accordion-body {
             padding: 0;
        }
        .territory-list-inner {
            max-height: 220px;
            overflow-y: auto;
            padding: 0.5rem 1rem 1rem 1rem;
            border-top: 1px solid #e9ecef;
        }
        .territory-list-inner .form-check {
            padding-left: 2.25rem;
        }

        .file-upload-container {
            border: 2px dashed #dee2e6;
            padding: 25px;
            cursor: pointer;
        }
        .file-upload-container:hover {
            border-color: var(--bs-primary);
        }
        .file-input-hidden {
            display: none;
        }
        .selected-file-name {
            color: #28a745;
            font-weight: 500;
        }
    </style>
</head>
<body data-sidebar="default">
    <div id="app-layout">
        <?php include 'partials/sidebar.php'; ?>
        <?php include 'partials/topbar.php'; ?>

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                                 <div>
                                    <h2 class="mb-2 fw-bold">Youtube owner conflict</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0" id="releasesTable">
                                    <thead>
                                        <tr>
                                            <th width="50">Store</th> 
                                            <th class="sortable-header" data-sort="category">Category <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                            <th class="sortable-header" data-sort="assetTitle">Asset Title <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                            <th class="sortable-header" data-sort="artist">Artist / Asset ID <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                            <th class="sortable-header" data-sort="upc">UPC <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                            <th class="sortable-header" data-sort="otherParty">Other Party <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                            <th class="sortable-header" data-sort="dailyViews">Daily Views <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                            <th class="sortable-header" data-sort="expiry">Expiry <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                            <th class="sortable-header" data-sort="status">Status <span class="sort-icon"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></span></th>
                                            <th width="50"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody"></tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer bg-white d-flex align-items-center justify-content-end text-muted py-2">
                            <div class="me-3" id="pagination-text"></div>
                            <div>
                                <button class="btn btn-sm" disabled><i class="bi bi-chevron-left"></i></button>
                                <button class="btn btn-sm ms-1"><i class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'partials/footer.php'; ?>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="conflictResolutionOffcanvas" aria-labelledby="conflictResolutionOffcanvasLabel">
        <div class="offcanvas-header">
            <div>
                <h5 class="offcanvas-title mb-0" id="offcanvasTitle"></h5>
                <small class="text-muted" id="offcanvasSubtitle"></small>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <form id="conflictForm" novalidate>
                <div id="formStep1" class="form-step">
                    <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center">
                        <img src="" class="album-cover" id="modalAlbumCover" alt="Album Art">
                        <div class="ms-3">
                            <div class="fw-bold" id="modalSongName"></div>
                            <div class="small text-muted" id="modalArtistName"></div>
                            <div class="small text-muted"><span id="modalIsrc"></span> - <span id="modalPlatform">YouTube</span></div>
                        </div>
                    </div>
                    <div class="notice-box mb-4"><i class="bi bi-info-circle fs-5 me-3"></i><small>By default, your answer will impact all ISRCs involved in this issue</small></div>
                    
                    <div class="mb-3 radio-card-group">
                        <label class="form-label fw-bold d-block mb-3">Could you please confirm on the type of rights owned</label>
                        <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="original_exclusive"> My content is Original and I own exclusive rights on all or part of the territories</label>
                        <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="non_exclusive"> I own non-exclusive rights only (license granted by a third party)</label>
                        <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="cid_exclusive"> I have granted exclusive license for Content-ID stores only</label>
                        <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="soundalike"> It is soundalike recording (e.g., cover or remix)</label>
                        <label class="radio-card d-block mb-3"><input type="radio" name="rightsOwned" value="public_domain"> It is Public Domain recording</label>
                        <label class="radio-card d-block"><input type="radio" name="rightsOwned" value="no_rights"> I don't own rights for the selected content</label>
                    </div>
                </div>

                <div id="formStep2" class="form-step d-none">
                     <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center">
                        <img src="" class="album-cover" id="modalAlbumCover2" alt="Album Art">
                        <div class="ms-3">
                            <div class="fw-bold" id="modalSongName2"></div>
                            <div class="small text-muted" id="modalArtistName2"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Please confirm the territories on which you have ownership</label>
                        <p class="text-muted small mb-2">Uncheck territories where you don't have ownership</p>
                        <p class="small fw-bold" id="territoryCounter">240 contested countries out of 240 delivered</p>
                        <div id="territoryAccordion" class="accordion">
                            </div>
                    </div>
                </div>

                <div id="formStep3" class="form-step d-none">
                     <div class="p-3 rounded mb-4 album-section-card d-flex align-items-center">
                        <img src="" class="album-cover" id="modalAlbumCover3" alt="Album Art">
                        <div class="ms-3">
                            <div class="fw-bold" id="modalSongName3"></div>
                            <div class="small text-muted" id="modalArtistName3"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Please upload any supporting documents</label>
                        <div class="file-upload-container rounded" id="fileUploadContainer">
                            <label for="formFile" class="file-upload-label text-muted">
                                <i class="bi bi-cloud-arrow-up fs-3"></i><br>Drag & drop or click to browse
                            </label>
                            <input class="file-input-hidden" type="file" id="formFile">
                        </div>
                        <div class="selected-file-name d-none mt-2" id="selectedFileName">
                            <span></span>
                            <button type="button" class="btn-close btn-sm ms-2" aria-label="Remove file"></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="offcanvas-footer d-flex justify-content-end">
            <button type="button" class="btn btn-outline-secondary me-2 d-none" id="backBtn">Back</button>
            <button type="button" class="btn btn-primary" id="nextBtn">Next <i class="bi bi-arrow-right"></i></button>
            <button type="submit" form="conflictForm" class="btn btn-success d-none" id="submitBtn">Submit Resolution</button>
        </div>
    </div>

    <?= $this->include('partials/vendor') ?>
    <script src="/js/app.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- DATA ---
        const conflictRequests = [
    { id: 1, category: 'Ownership conflict', assetTitle: 'Cosmic Drift', artist: 'Astro Beats', assetId: '90736897913', upc: '198009123456', isrc: 'USAT22312345', otherParty: 'The Orchard', dailyViews: '79K', expiry: '2 days', status: 'Action Required', albumCoverUrl: 'https://placehold.co/80x80/3498db/ffffff?text=C' },
    { id: 2, category: 'Policy', assetTitle: 'Ocean Tides', artist: 'Deep Wave', assetId: '3478239381', upc: '198009654321', isrc: 'USAT22354321', otherParty: 'Believe', dailyViews: '3K', expiry: '-', status: 'Resolved', albumCoverUrl: 'https://placehold.co/80x80/1abc9c/ffffff?text=O' },
    { id: 3, category: 'Ownership conflict', assetTitle: 'City Lights', artist: 'Urban Glow', assetId: '3478239381', upc: '198009789012', isrc: 'USAT22398765', otherParty: 'CD Baby', dailyViews: '1.2K', expiry: '15 days', status: 'In Review', albumCoverUrl: 'https://placehold.co/80x80/9b59b6/ffffff?text=C' },
    { id: 4, category: 'Metadata Error', assetTitle: 'Desert Mirage', artist: 'Sahara Echo', assetId: '89321756430', upc: '198001112233', isrc: 'USAT22445566', otherParty: 'TuneCore', dailyViews: '58K', expiry: '5 days', status: 'Action Required', albumCoverUrl: 'https://placehold.co/80x80/e67e22/ffffff?text=D' },
    { id: 5, category: 'Ownership conflict', assetTitle: 'Electric Horizon', artist: 'Volt Squad', assetId: '98574623109', upc: '198002244466', isrc: 'USAT22449900', otherParty: 'The Orchard', dailyViews: '12K', expiry: '7 days', status: 'In Review', albumCoverUrl: 'https://placehold.co/80x80/f39c12/ffffff?text=E' },
    { id: 6, category: 'Policy', assetTitle: 'Rainforest Lullaby', artist: 'Nature Pulse', assetId: '76234589012', upc: '198003333444', isrc: 'USAT22300011', otherParty: 'Believe', dailyViews: '620', expiry: '-', status: 'Resolved', albumCoverUrl: 'https://placehold.co/80x80/2ecc71/ffffff?text=R' },
    { id: 7, category: 'Metadata Error', assetTitle: 'Moonlit Roads', artist: 'Midnight Cruiser', assetId: '67392018376', upc: '198004556677', isrc: 'USAT22556677', otherParty: 'DistroKid', dailyViews: '4.8K', expiry: '10 days', status: 'Action Required', albumCoverUrl: 'https://placehold.co/80x80/34495e/ffffff?text=M' },
    { id: 8, category: 'Ownership conflict', assetTitle: 'Neon Nightfall', artist: 'Retro Blaze', assetId: '38472019487', upc: '198005778899', isrc: 'USAT22668899', otherParty: 'Amuse', dailyViews: '22K', expiry: '3 days', status: 'In Review', albumCoverUrl: 'https://placehold.co/80x80/e74c3c/ffffff?text=N' },
    { id: 9, category: 'Metadata Error', assetTitle: 'Frozen Echo', artist: 'Icy Vibe', assetId: '28476019283', upc: '198006998877', isrc: 'USAT22779900', otherParty: 'RouteNote', dailyViews: '930', expiry: '1 day', status: 'Action Required', albumCoverUrl: 'https://placehold.co/80x80/2980b9/ffffff?text=F' },
    { id: 10, category: 'Policy', assetTitle: 'Golden Skyline', artist: 'Sunset State', assetId: '18723908473', upc: '198007112233', isrc: 'USAT22880011', otherParty: 'Repost by SoundCloud', dailyViews: '9.5K', expiry: '-', status: 'Resolved', albumCoverUrl: 'https://placehold.co/80x80/f1c40f/ffffff?text=G' }
];

        
        const territoriesByRegion = { "Africa": [ {name: "Algeria", code: "DZ"}, {name: "Angola", code: "AO"}, {name: "Benin", code: "BJ"}, {name: "Botswana", code: "BW"}, {name: "Burkina Faso", code: "BF"}, {name: "Burundi", code: "BI"}, {name: "Cabo Verde", code: "CV"}, {name: "Cameroon", code: "CM"}, {name: "Central African Republic", code: "CF"}, {name: "Chad", code: "TD"}, {name: "Comoros", code: "KM"}, {name: "Congo", code: "CG"}, {name: "Congo (DRC)", code: "CD"}, {name: "Côte d'Ivoire", code: "CI"}, {name: "Djibouti", code: "DJ"}, {name: "Egypt", code: "EG"}, {name: "Equatorial Guinea", code: "GQ"}, {name: "Eritrea", code: "ER"}, {name: "Eswatini", code: "SZ"}, {name: "Ethiopia", code: "ET"}, {name: "Gabon", code: "GA"}, {name: "Gambia", code: "GM"}, {name: "Ghana", code: "GH"}, {name: "Guinea", code: "GN"}, {name: "Guinea-Bissau", code: "GW"}, {name: "Kenya", code: "KE"}, {name: "Lesotho", code: "LS"}, {name: "Liberia", code: "LR"}, {name: "Libya", code: "LY"}, {name: "Madagascar", code: "MG"}, {name: "Malawi", code: "MW"}, {name: "Mali", code: "ML"}, {name: "Mauritania", code: "MR"}, {name: "Mauritius", code: "MU"}, {name: "Mayotte", code: "YT"}, {name: "Morocco", code: "MA"}, {name: "Mozambique", code: "MZ"}, {name: "Namibia", code: "NA"}, {name: "Niger", code: "NE"}, {name: "Nigeria", code: "NG"}, {name: "Réunion", code: "RE"}, {name: "Rwanda", code: "RW"}, {name: "Saint Helena", code: "SH"}, {name: "Sao Tome and Principe", code: "ST"}, {name: "Senegal", code: "SN"}, {name: "Seychelles", code: "SC"}, {name: "Sierra Leone", code: "SL"}, {name: "Somalia", code: "SO"}, {name: "South Africa", code: "ZA"}, {name: "South Sudan", code: "SS"}, {name: "Sudan", code: "SD"}, {name: "Tanzania", code: "TZ"}, {name: "Togo", code: "TG"}, {name: "Tunisia", code: "TN"}, {name: "Uganda", code: "UG"}, {name: "Zambia", code: "ZM"}, {name: "Zimbabwe", code: "ZW"} ], "Antarctica": [ {name: "Antarctica", code: "AQ"}, {name: "French Southern Territories", code: "TF"}, {name: "South Georgia and the South Sandwich Islands", code: "GS"} ], "Asia": [ {name: "Afghanistan", code: "AF"}, {name: "Armenia", code: "AM"}, {name: "Azerbaijan", code: "AZ"}, {name: "Bahrain", code: "BH"}, {name: "Bangladesh", code: "BD"}, {name: "Bhutan", code: "BT"}, {name: "British Indian Ocean Territory", code: "IO"}, {name: "Brunei", code: "BN"}, {name: "Cambodia", code: "KH"}, {name: "China", code: "CN"}, {name: "Cyprus", code: "CY"}, {name: "Georgia", code: "GE"}, {name: "Hong Kong", code: "HK"}, {name: "India", code: "IN"}, {name: "Indonesia", code: "ID"}, {name: "Iran", code: "IR"}, {name: "Iraq", code: "IQ"}, {name: "Israel", code: "IL"}, {name: "Japan", code: "JP"}, {name: "Jordan", code: "JO"}, {name: "Kazakhstan", code: "KZ"}, {name: "Kuwait", code: "KW"}, {name: "Kyrgyzstan", code: "KG"}, {name: "Laos", code: "LA"}, {name: "Lebanon", code: "LB"}, {name: "Macao", code: "MO"}, {name: "Malaysia", code: "MY"}, {name: "Maldives", code: "MV"}, {name: "Mongolia", code: "MN"}, {name: "Myanmar", code: "MM"}, {name: "Nepal", code: "NP"}, {name: "North Korea", code: "KP"}, {name: "Oman", code: "OM"}, {name: "Pakistan", code: "PK"}, {name: "Palestine", code: "PS"}, {name: "Philippines", code: "PH"}, {name: "Qatar", code: "QA"}, {name: "Saudi Arabia", code: "SA"}, {name: "Singapore", code: "SG"}, {name: "South Korea", code: "KR"}, {name: "Sri Lanka", code: "LK"}, {name: "Syria", code: "SY"}, {name: "Taiwan", code: "TW"}, {name: "Tajikistan", code: "TJ"}, {name: "Thailand", code: "TH"}, {name: "Timor-Leste", code: "TL"}, {name: "Turkey", code: "TR"}, {name: "Turkmenistan", code: "TM"}, {name: "United Arab Emirates", code: "AE"}, {name: "Uzbekistan", code: "UZ"}, {name: "Vietnam", code: "VN"}, {name: "Yemen", code: "YE"} ], "Europe": [ {name: "Åland Islands", code: "AX"}, {name: "Albania", code: "AL"}, {name: "Andorra", code: "AD"}, {name: "Austria", code: "AT"}, {name: "Belarus", code: "BY"}, {name: "Belgium", code: "BE"}, {name: "Bosnia and Herzegovina", code: "BA"}, {name: "Bulgaria", code: "BG"}, {name: "Croatia", code: "HR"}, {name: "Czechia", code: "CZ"}, {name: "Denmark", code: "DK"}, {name: "Estonia", code: "EE"}, {name: "Faroe Islands", code: "FO"}, {name: "Finland", code: "FI"}, {name: "France", code: "FR"}, {name: "Germany", code: "DE"}, {name: "Gibraltar", code: "GI"}, {name: "Greece", code: "GR"}, {name: "Guernsey", code: "GG"}, {name: "Holy See", code: "VA"}, {name: "Hungary", code: "HU"}, {name: "Iceland", code: "IS"}, {name: "Ireland", code: "IE"}, {name: "Isle of Man", code: "IM"}, {name: "Italy", code: "IT"}, {name: "Jersey", code: "JE"}, {name: "Latvia", code: "LV"}, {name: "Liechtenstein", code: "LI"}, {name: "Lithuania", code: "LT"}, {name: "Luxembourg", code: "LU"}, {name: "Malta", code: "MT"}, {name: "Moldova", code: "MD"}, {name: "Monaco", code: "MC"}, {name: "Montenegro", code: "ME"}, {name: "Netherlands", code: "NL"}, {name: "North Macedonia", code: "MK"}, {name: "Norway", code: "NO"}, {name: "Poland", code: "PL"}, {name: "Portugal", code: "PT"}, {name: "Romania", code: "RO"}, {name: "Russia", code: "RU"}, {name: "San Marino", code: "SM"}, {name: "Serbia", code: "RS"}, {name: "Slovakia", code: "SK"}, {name: "Slovenia", code: "SI"}, {name: "Spain", code: "ES"}, {name: "Svalbard and Jan Mayen", code: "SJ"}, {name: "Sweden", code: "SE"}, {name: "Switzerland", code: "CH"}, {name: "Ukraine", code: "UA"}, {name: "United Kingdom", code: "GB"} ], "North America": [ {name: "Anguilla", code: "AI"}, {name: "Antigua and Barbuda", code: "AG"}, {name: "Aruba", code: "AW"}, {name: "Bahamas", code: "BS"}, {name: "Barbados", code: "BB"}, {name: "Belize", code: "BZ"}, {name: "Bermuda", code: "BM"}, {name: "Bonaire", code: "BQ"}, {name: "Canada", code: "CA"}, {name: "Cayman Islands", code: "KY"}, {name: "Costa Rica", code: "CR"}, {name: "Cuba", code: "CU"}, {name: "Curaçao", code: "CW"}, {name: "Dominica", code: "DM"}, {name: "Dominican Republic", code: "DO"}, {name: "El Salvador", code: "SV"}, {name: "Greenland", code: "GL"}, {name: "Grenada", code: "GD"}, {name: "Guadeloupe", code: "GP"}, {name: "Guatemala", code: "GT"}, {name: "Haiti", code: "HT"}, {name: "Honduras", code: "HN"}, {name: "Jamaica", code: "JM"}, {name: "Martinique", code: "MQ"}, {name: "Mexico", code: "MX"}, {name: "Montserrat", code: "MS"}, {name: "Nicaragua", code: "NI"}, {name: "Panama", code: "PA"}, {name: "Puerto Rico", code: "PR"}, {name: "Saint Barthélemy", code: "BL"}, {name: "Saint Kitts and Nevis", code: "KN"}, {name: "Saint Lucia", code: "LC"}, {name: "Saint Martin", code: "MF"}, {name: "Saint Pierre and Miquelon", code: "PM"}, {name: "Saint Vincent and the Grenadines", code: "VC"}, {name: "Sint Maarten", code: "SX"}, {name: "Trinidad and Tobago", code: "TT"}, {name: "Turks and Caicos Islands", code: "TC"}, {name: "United States", code: "US"}, {name: "U.S. Virgin Islands", code: "VI"} ], "Oceania": [ {name: "American Samoa", code: "AS"}, {name: "Australia", code: "AU"}, {name: "Christmas Island", code: "CX"}, {name: "Cocos (Keeling) Islands", code: "CC"}, {name: "Cook Islands", code: "CK"}, {name: "Fiji", code: "FJ"}, {name: "French Polynesia", code: "PF"}, {name: "Guam", code: "GU"}, {name: "Kiribati", code: "KI"}, {name: "Marshall Islands", code: "MH"}, {name: "Micronesia", code: "FM"}, {name: "Nauru", code: "NR"}, {name: "New Caledonia", code: "NC"}, {name: "New Zealand", code: "NZ"}, {name: "Niue", code: "NU"}, {name: "Norfolk Island", code: "NF"}, {name: "Northern Mariana Islands", code: "MP"}, {name: "Palau", code: "PW"}, {name: "Papua New Guinea", code: "PG"}, {name: "Pitcairn", code: "PN"}, {name: "Samoa", code: "WS"}, {name: "Solomon Islands", code: "SB"}, {name: "Tokelau", code: "TK"}, {name: "Tonga", code: "TO"}, {name: "Tuvalu", code: "TV"}, {name: "U.S. Minor Outlying Islands", code: "UM"}, {name: "Vanuatu", code: "VU"}, {name: "Wallis and Futuna", code: "WF"} ], "South America": [ {name: "Argentina", code: "AR"}, {name: "Bolivia", code: "BO"}, {name: "Brazil", code: "BR"}, {name: "Chile", code: "CL"}, {name: "Colombia", code: "CO"}, {name: "Ecuador", code: "EC"}, {name: "Falkland Islands", code: "FK"}, {name: "French Guiana", code: "GF"}, {name: "Guyana", code: "GY"}, {name: "Paraguay", code: "PY"}, {name: "Peru", code: "PE"}, {name: "Suriname", code: "SR"}, {name: "Uruguay", code: "UY"}, {name: "Venezuela", code: "VE"} ] };
        const totalCountries = Object.values(territoriesByRegion).reduce((sum, region) => sum + region.length, 0);

        let sortState = { key: null, direction: 'asc' };

        // --- RENDER FUNCTIONS ---
        function renderTable(data) {
            const tableBody = document.getElementById('tableBody');
            tableBody.innerHTML = !data || data.length === 0 
                ? `<tr><td colspan="10" class="text-center p-5"><h5>No matching conflicts.</h5></td></tr>`
                : data.map(req => `
                    <tr data-bs-toggle="offcanvas" data-bs-target="#conflictResolutionOffcanvas"
                        data-song-name="${req.assetTitle}" data-artist-name="${req.artist}" data-isrc="${req.isrc}" 
                        data-cover-url="${req.albumCoverUrl}" data-category="${req.category}" data-other-party="${req.otherParty}">
                        
                        <td class="text-center"><i class="bi bi-youtube text-danger fs-5"></i></td>
                        <td>${req.category}</td>
                        <td>${req.assetTitle}</td>
                        <td><div class="fw-bold">${req.artist}</div><small class="text-muted">Asset ID: ${req.assetId}</small></td>
                        <td>${req.upc}</td>
                        <td>${req.otherParty}</td>
                        <td>${req.dailyViews}</td>
                        <td>${req.expiry}</td>
                        <td><span class="badge rounded-pill border bg-danger-subtle text-danger-emphasis">${req.status}</span></td>
                        <td><i class="bi bi-chevron-right text-muted"></i></td>
                    </tr>`).join('');
            document.getElementById('pagination-text').textContent = `${data.length} of ${conflictRequests.length} results`;
        }
        
        function renderTerritoryAccordion() {
            const accordionContainer = document.getElementById('territoryAccordion');
            accordionContainer.innerHTML = Object.entries(territoriesByRegion).map(([region, countries]) => {
                const regionId = region.replace(/[^a-zA-Z0-9]/g, '');
                return `
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-${regionId}">
                        <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${regionId}" aria-expanded="false">
                            <div class="form-check me-auto pe-2">
                                <input class="form-check-input region-checkbox" type="checkbox" id="region-${regionId}" data-region="${region}" checked>
                                <label class="form-check-label fw-bold" for="region-${regionId}">${region}</label>
                            </div>
                            <span class="text-muted small me-2">${countries.length} countries</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>
                    </h2>
                    <div id="collapse-${regionId}" class="accordion-collapse collapse" data-bs-parent="#territoryAccordion">
                        <div class="accordion-body">
                            <div class="territory-list-inner">
                            ${countries.map(country => `
                                <div class="form-check">
                                    <input class="form-check-input country-checkbox" type="checkbox" value="${country.code}" id="country-${country.code}" data-region="${region}" checked>
                                    <label class="form-check-label" for="country-${country.code}">${country.name}</label>
                                </div>
                            `).join('')}
                            </div>
                        </div>
                    </div>
                </div>
                `;
            }).join('');
            addTerritoryEventListeners();
            updateTerritoryCounter();
        }

        // --- SORTING & UPDATE LOGIC ---
        function parseViews(views) {
            if (typeof views !== 'string') return 0;
            const upperViews = views.toUpperCase();
            const num = parseFloat(upperViews);
            if (upperViews.includes('K')) return num * 1000;
            return num;
        }

        function parseExpiry(expiry) {
            if (typeof expiry !== 'string' || expiry === '-') return Infinity;
            return parseInt(expiry);
        }

        function updateTerritoryCounter() {
            const selectedCount = document.querySelectorAll('.country-checkbox:checked').length;
            document.getElementById('territoryCounter').textContent = `${selectedCount} contested countries out of ${totalCountries} delivered`;
        }

        function updateSortIcons() {
            // Reset all icons to inactive state
            document.querySelectorAll('.sort-icon').forEach(icon => {
                icon.classList.remove('active');
            });
            
            // If a sort key is active, highlight the correct icon
            if (sortState.key) {
                const activeHeader = document.querySelector(`.sortable-header[data-sort="${sortState.key}"]`);
                if (activeHeader) {
                    const activeIcon = activeHeader.querySelector('.sort-icon');
                    activeIcon.classList.add('active');
                }
            }
        }

        // --- EVENT HANDLERS & INITIALIZATION ---
        renderTable(conflictRequests);
        renderTerritoryAccordion();

        // Table header click handler for sorting
        document.getElementById('releasesTable').querySelector('thead').addEventListener('click', (e) => {
            const headerCell = e.target.closest('.sortable-header');
            if (!headerCell) return;

            const sortKey = headerCell.dataset.sort;

            // Determine the new sort direction
            if (sortState.key === sortKey) {
                sortState.direction = sortState.direction === 'asc' ? 'desc' : 'asc';
            } else {
                sortState.key = sortKey;
                sortState.direction = 'asc';
            }

            // Sort the data array
            conflictRequests.sort((a, b) => {
                let valA = a[sortState.key];
                let valB = b[sortState.key];

                if (sortState.key === 'dailyViews') {
                    valA = parseViews(valA);
                    valB = parseViews(valB);
                } else if (sortState.key === 'expiry') {
                    valA = parseExpiry(valA);
                    valB = parseExpiry(valB);
                }

                let comparison = 0;
                if (valA === null || valA === undefined) return 1;
                if (valB === null || valB === undefined) return -1;
                
                if (typeof valA === 'string' && typeof valB === 'string') {
                    comparison = valA.localeCompare(valB, undefined, {numeric: true});
                } else {
                    if (valA > valB) comparison = 1;
                    else if (valA < valB) comparison = -1;
                }
                
                return sortState.direction === 'desc' ? comparison * -1 : comparison;
            });

            renderTable(conflictRequests);
            updateSortIcons();
        });

        // --- Offcanvas and Form Logic ---
        const conflictOffcanvas = document.getElementById('conflictResolutionOffcanvas');
        const conflictForm = document.getElementById('conflictForm');
        const steps = Array.from(document.querySelectorAll('.form-step'));
        const nextBtn = document.getElementById('nextBtn');
        const backBtn = document.getElementById('backBtn');
        const submitBtn = document.getElementById('submitBtn');
        let currentStep = 0;

        function showStep(stepIndex) {
            steps.forEach((step, index) => step.classList.toggle('d-none', index !== stepIndex));
            backBtn.classList.toggle('d-none', stepIndex === 0);
            nextBtn.classList.toggle('d-none', stepIndex === steps.length - 1);
            submitBtn.classList.toggle('d-none', stepIndex !== steps.length - 1);
            currentStep = stepIndex;
        }

        nextBtn.addEventListener('click', () => {
            if (currentStep === 0 && !document.querySelector('input[name="rightsOwned"]:checked')) return alert('Please select a rights option.');
            if (currentStep === 1 && !document.querySelector('.country-checkbox:checked')) return alert('Please select at least one territory.');
            if (currentStep < steps.length - 1) showStep(currentStep + 1);
        });

        backBtn.addEventListener('click', () => showStep(currentStep - 1));

        conflictOffcanvas.addEventListener('show.bs.offcanvas', function(event) {
            const data = event.relatedTarget.dataset;
            ['', '2', '3'].forEach(s => {
                const cover = document.getElementById(`modalAlbumCover${s}`);
                const song = document.getElementById(`modalSongName${s}`);
                const artist = document.getElementById(`modalArtistName${s}`);
                if(cover) cover.src = data.coverUrl;
                if(song) song.textContent = data.songName;
                if(artist) artist.textContent = data.artistName;
            });
            document.getElementById('modalIsrc').textContent = `ISRC: ${data.isrc}`;
            document.getElementById('offcanvasTitle').textContent = data.category;
            document.getElementById('offcanvasSubtitle').textContent = `VS. ${data.otherParty}`;
            conflictForm.reset();
            document.querySelectorAll('.radio-card').forEach(c => c.classList.remove('selected'));
            document.getElementById('selectedFileName').classList.add('d-none');
            document.querySelectorAll('#territoryAccordion input[type="checkbox"]').forEach(cb => cb.checked = true);
            updateTerritoryCounter();
            showStep(0);
        });
        
        conflictForm.addEventListener('submit', function(e) {
            e.preventDefault();
            if (!document.getElementById('formFile').files.length) return alert('Please upload a supporting document.');
            alert('Resolution submitted successfully!');
            bootstrap.Offcanvas.getInstance(conflictOffcanvas).hide();
        });

        // UI Interaction Logic
        document.querySelectorAll('.radio-card').forEach(c => c.addEventListener('click', function() {
            document.querySelectorAll('.radio-card').forEach(el => el.classList.remove('selected'));
            this.classList.add('selected');
            this.querySelector('input[type="radio"]').checked = true;
        }));

        function addTerritoryEventListeners() {
            document.querySelectorAll('.region-checkbox').forEach(regionCheckbox => {
                regionCheckbox.addEventListener('change', function() {
                    const region = this.dataset.region;
                    document.querySelectorAll(`.country-checkbox[data-region="${region}"]`).forEach(countryCheckbox => {
                        countryCheckbox.checked = this.checked;
                    });
                    updateTerritoryCounter();
                });
            });

            document.querySelectorAll('.country-checkbox').forEach(countryCheckbox => {
                countryCheckbox.addEventListener('change', function() {
                    const region = this.dataset.region;
                    const allInRegionChecked = Array.from(document.querySelectorAll(`.country-checkbox[data-region="${region}"]`)).every(cb => cb.checked);
                    document.querySelector(`.region-checkbox[data-region="${region}"]`).checked = allInRegionChecked;
                    updateTerritoryCounter();
                });
            });
        }
        
        const fileInput = document.getElementById('formFile');
        const fileDisplay = document.getElementById('selectedFileName');
        document.getElementById('fileUploadContainer').addEventListener('click', () => fileInput.click());
        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                fileDisplay.querySelector('span').textContent = fileInput.files[0].name;
                fileDisplay.classList.remove('d-none');
            }
        });
        fileDisplay.querySelector('.btn-close').addEventListener('click', () => {
            fileInput.value = '';
            fileDisplay.classList.add('d-none');
        });
    });
    </script>
</body>
</html>