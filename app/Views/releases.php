<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo view("partials/title-meta", array("title" => "Music Dashboard")) ?>
    <?= $this->include('partials/head-css') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-size: 15px;
        }

        .main-content {
            padding: 2rem 1rem;
        }

        .card {
            border-radius: 12px;
            border: none !important;
        }

        .nav-pills .nav-link {
            border-radius: 25px;
            padding: 0.6rem 1.2rem;
            font-weight: 500;
            color: #6c757d;
            transition: all 0.3s ease;
        }

        .nav-pills .nav-link.active {
            background-color: #0d6efd;
            color: white;
            box-shadow: 0 2px 8px rgba(13, 110, 253, 0.3);
        }

        .nav-pills .nav-link:hover:not(.active) {
            background-color: #e9ecef;
            color: #495057;
        }

        .table th {
            font-weight: 600;
            font-size: 14px;
            color: #495057;
            border-bottom: 2px solid #e9ecef;
            padding: 1rem 0.75rem;
        }

        .table td {
            padding: 1rem 0.75rem;
            font-size: 15px;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .release-title {
            font-weight: 600;
            font-size: 16px;
            color: #212529;
            margin-bottom: 0.25rem;
        }

        .release-artist {
            font-size: 14px;
            color: #6c757d;
        }

        .status-badge {
            font-weight: 500;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 12px;
        }

        .status-delivered {
            background-color: rgba(25, 135, 84, 0.1) !important;
            color: #198754 !important;
        }
        .status-approved {
            background-color: rgba(25, 135, 84, 0.1) !important;
            color: #198754 !important;
        }

        .status-review {
            background-color: rgba(255, 193, 7, 0.1) !important;
            color: #f57c00 !important;
        }

        .status-rejected {
            background-color: rgba(220, 53, 69, 0.1) !important;
            color: #dc3545 !important;
        }

        .status-takedown-table {
            background-color: rgba(108, 117, 125, 0.1) !important;
            color: #6c757d !important;
        }

        .dropdown-toggle::after {
            display: none;
        }

        .btn-link {
            color: #6c757d;
            text-decoration: none;
        }

        .btn-link:hover {
            color: #495057;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .search-container {
            min-width: 280px;
        }

        @media (max-width: 768px) {
            .search-container {
                min-width: 100%;
                margin-top: 1rem;
            }

            .nav-pills {
                flex-wrap: wrap;
            }

            .nav-pills .nav-item {
                margin-bottom: 0.5rem;
            }
        }

        .avatar-lg {
            width: 48px;
            height: 48px;
        }

        .nav-pills .nav-link.active {
            background-color: #727cf5;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(114, 124, 245, 0.05);
        }

        /* Base card styling */
        .card {
            border-radius: 0.5rem;
        }

        /* --- Modal Specific Styles --- */
        .modal-header-custom {
            background-color: #2c3e50;
            position: relative;
            padding: 2.5rem;
            color: #fff;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .bg-image-blurred {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            filter: blur(8px);
            opacity: 0.2;
            transition: background-image 0.5s ease-in-out;
            z-index: 0;
        }

        .modal-header-custom .d-flex {
            position: relative;
            z-index: 1;
            width: 100%;
            align-items: center;
        }

        #releaseAlbumArtwork {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 0.75rem;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            border: 3px solid rgba(255, 255, 255, 0.4);
        }

        #releaseTitle {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 0.4rem;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.6);
            line-height: 1.2;
        }

        #releaseArtistHeader {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.85);
            margin-top: 0;
            margin-bottom: 0.8rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        #releaseStatusBadges .badge {
            font-size: 0.85rem;
            padding: 0.4em 0.8em;
            border-radius: 1.2rem;
            margin-right: 0.6rem;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Specific badge colors for header */
        #releaseStatusBadges .bg-success {
            background-color: #28a745 !important;
        }

        #releaseStatusBadges .bg-warning {
            background-color: #ffc107 !important;
            color: #343a40 !important;
        }

        #releaseStatusBadges .bg-danger {
            background-color: #dc3545 !important;
        }

        #releaseStatusBadges .bg-secondary {
            background-color: #6c757d !important;
        }

        .badge-takedown-glow {
            animation: pulse-red 1.5s infinite;
            background-color: #dc3545 !important;
            color: white !important;
        }

        @keyframes pulse-red {
            0% {
                box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(220, 53, 69, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(220, 53, 69, 0);
            }
        }

        .btn-close-white {
            filter: invert(1) grayscale(100%) brightness(200%);
            opacity: 0.8;
            transition: opacity 0.2s ease;
        }

        .btn-close-white:hover {
            opacity: 1;
        }

        /* Takedown button specific style */
        .btn-takedown-header {
            background-color: red;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: background-color 0.2s ease, border-color 0.2s ease;
            margin-right: 1rem;
            /* Space between takedown and close button */
        }

        .btn-takedown-header:hover {
            background-color: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.6);
            color: white;
        }


        /* Styles for the center-oriented modal content */
        .modal-body-centered {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 2.5rem;
            background-color: #eef2f7;
        }

        .modal-content-wrapper {
            max-width: 900px;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .modal-content-card {
            background-color: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
        }

        .modal-content-card .card-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: #2c3e50;
            border-bottom: 2px solid #e0e6ed;
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }

        .modal-content-card .form-label {
            font-size: 0.9rem;
            font-weight: 500;
            color: #7f8c8d;
            margin-bottom: 0.4rem;
        }

        .modal-content-card .form-control-plaintext {
            font-size: 1.1rem;
            color: #34495e;
            padding-left: 0;
        }

        .modal-content-card .form-control-plaintext.fw-bold {
            font-weight: 700 !important;
        }

        .modal-content-card .badge-container .badge {
            font-size: 0.9rem;
            padding: 0.6em 1em;
            border-radius: 0.5rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            display: inline-flex;
            align-items: center;
        }

        .modal-content-card .badge-primary {
            background-color: #3498db;
            color: white;
        }

        .modal-content-card .badge-info {
            background-color: #9b59b6;
            color: white;
        }

        .modal-content-card .table thead th {
            background-color: #f5f7fa;
            color: #555;
            font-weight: 600;
            border-bottom: 1px solid #e0e6ed;
        }

        .modal-content-card .table tbody tr:nth-child(even) {
            background-color: #fcfcfc;
        }

        .modal-content-card .table td {
            padding: 1rem 1.2rem;
            font-size: 1rem;
            color: #34495e;
        }

        .modal-content-card .track-tag-explicit,
        .modal-content-card .track-tag-clean {
            padding: 0.3em 0.7em;
            font-size: 0.8rem;
            border-radius: 0.4rem;
        }

        .modal-content-card .track-tag-explicit {
            background-color: #e74c3c;
        }

        .modal-content-card .track-tag-clean {
            background-color: #27ae60;
        }
    </style>
</head>

<body data-sidebar="default">
    <div id="app-layout">
        <?= $this->include('partials/sidebar') ?>
        <?= $this->include('partials/topbar') ?>

        <div class="content-page">
            <div class="content">
                <div class="container-xxl">
                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                        <div class="flex-grow-1 d-flex justify-content-between align-items-center gap-3">
                            <h4 class="fs-18 fw-semibold m-0">Releases Management</h4>
                            <div class="col-auto d-flex gap-2">
                            <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                                <i class="bi bi-download me-1"></i> Export table CSV
                            </button>
                            <button class="btn btn-primary" onclick="openLabelModal()">
                                <i data-feather="plus" class="me-1"></i> Add New Release
                            </button>
    </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="row g-3">
                                <div class="col-md-6 col-xl-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body text-center p-4">
                                            <div class="avatar-lg bg-light-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                                <i data-feather="music" class="text-primary" style="width: 24px; height: 24px;"></i>
                                            </div>
                                            <h3 class="mb-1">2</h3>
                                            <p class="text-muted mb-0">Total Releases</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body text-center p-4">
                                            <div class="avatar-lg bg-light-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                                <i data-feather="upload" class="text-info" style="width: 24px; height: 24px;"></i>
                                            </div>
                                            <h3 class="mb-1">1</h3>
                                            <p class="text-muted mb-0">Published</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body text-center p-4">
                                            <div class="avatar-lg bg-light-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                                <i data-feather="search" class="text-warning" style="width: 24px; height: 24px;"></i>
                                            </div>
                                            <h3 class="mb-1">1</h3>
                                            <p class="text-muted mb-0">In Review</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body text-center p-4">
                                            <div class="avatar-lg bg-light-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                                <i data-feather="x" class="text-danger" style="width: 24px; height: 24px;"></i>
                                            </div>
                                            <h3 class="mb-1">0</h3>
                                            <p class="text-muted mb-0">Rejected</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="card shadow-sm">
                                <div class="card-body p-3">
                                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                                        <ul class="nav nav-pills mb-3 mb-md-0" id="filterTabs">
                                            <li class="nav-item me-2">
                                                <a class="nav-link active" href="?filter=all" data-filter="all">All</a>
                                            </li>
                                            <li class="nav-item me-2">
                                                <a class="nav-link" href="?filter=takedown" data-filter="takedown">Takedown</a>
                                            </li>
                                            <li class="nav-item me-2">
                                                <a class="nav-link" href="?filter=delivered" data-filter="delivered">Delivered</a>
                                            </li>
                                            <li class="nav-item me-2">
                                                <a class="nav-link" href="?filter=review" data-filter="review">In
                                                    Review</a>
                                            </li>
                                            <li class="nav-item me-2">
                                                <a class="nav-link" href="?filter=rejected" data-filter="rejected">Rejected</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="?filter=approved" data-filter="approved">Approved</a>
                                            </li>
                                        </ul>

                                        <div class="search-container">
                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="Search releases..." id="searchInput">
                                                <button class="btn btn-outline-secondary" type="button" onclick="performSearch()">
                                                    <i data-feather="search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow-sm">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="releasesTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="60"></th>
                                                    <th>Title / Artist</th>
                                                    <th>Submitted Date</th>
                                                    <th>UPC</th>
                                                    <th>ISRC</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableBody">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                                    <div class="mb-2 mb-md-0">
                                        Showing <strong>1</strong> to <strong>2</strong> of <strong>2</strong> entries
                                    </div>

                                    <nav>
                                        <ul class="pagination mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'partials/footer.php'; ?>
        </div>
    </div>

    <div id="releaseModal" class="modal fade" tabindex="-1" aria-labelledby="releaseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-3 shadow-lg">

                <div class="modal-header-custom position-relative overflow-hidden" id="releaseModalHeader">
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-image-blurred" style="background-image: url('dummy-album-artwork.jpg');"></div>

                    <div class="d-flex align-items-center position-relative z-1 w-100">
                        <img id="releaseAlbumArtwork" src="/images/rocket.png" alt="Album Artwork" class="rounded shadow-sm me-4">
                        <div class="flex-grow-1">
                            <h2 class="modal-title text-white fw-bold" id="releaseTitle">Release Title Here</h2>
                            <p class="text-white mb-3" id="releaseArtistHeader">Artist Name Here</p>
                            <div id="releaseStatusBadges" class="d-flex align-items-center">
                            </div>
                        </div>
                        <button type="button" class="btn btn-takedown-header" id="takedownButton">
                            <i class="bi bi-trash me-2"></i>Request Takedown
                        </button>
                    </div>
                </div>

                <div class="modal-body p-4 modal-body-centered" id="releaseModalContent">
                </div>

                <div class="modal-footer border-0 d-flex justify-content-end bg-light py-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <div id="labelModal" class="modal" tabindex="-1" style="display: none; background-color: rgba(0,0,0,0.6);">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content border-0 rounded-0 shadow-lg bg-white position-relative">

                <button type="button" class="btn-close position-absolute end-0 top-0 m-4 z-3" aria-label="Close" onclick="closeLabelModal()"></button>

                <div class="modal-body d-flex align-items-center justify-content-center p-5">
                    <div class="w-100" style="max-width: 520px; margin: auto;">

                        <h2 class="text-center fw-bold mb-4"> Create a New Album</h2>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Select Destination Label</label>
                            <select id="destinationLabelSelect" class="form-select shadow-sm">
                                <option value="" selected disabled>Select a label</option>
                                <option value="1">Dummy Records</option>
                                <option value="2">Music Studio X</option>
                                <option value="3">WaveTone Records</option>
                                <option value="4">Night Owl Sounds</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button id="createAlbumBtn" type="button" class="btn btn-primary px-4 py-2 shadow-sm" disabled>Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<?= $this->include('partials/vendor') ?>
<script src="/js/app.js"></script>

<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
<script>
    function openLabelModal() {
        document.getElementById('labelModal').style.display = 'block';
    }

    function closeLabelModal() {
        document.getElementById('labelModal').style.display = 'none';
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Find the elements inside the labelModal
        const destinationLabelSelect = document.getElementById('destinationLabelSelect');
        const createAlbumBtn = document.getElementById('createAlbumBtn');

        // Check if both elements were found before adding listeners
        if (destinationLabelSelect && createAlbumBtn) {
            // This function enables/disables the button based on dropdown selection
            destinationLabelSelect.addEventListener('change', function() {
                // The 'disabled' property is a true boolean. 
                // It's set to true if no value is selected, and false if a value exists.
                createAlbumBtn.disabled = !this.value;
            });

            // This function handles the click action (navigation)
            createAlbumBtn.addEventListener('click', function() {
                // A click event will not fire on a disabled button.
                window.location.href = 'add-release';
            });
        }
    });
</script>
<script>
    // Sample data
    const releasesData = [{
        id: 1,
        title: "Swapnil Dada Kartoy Raj",
        artist: "Mohit Jadhav",
        submittedDate: "7th July 2025",
        upc: "5863544729375",
        isrc: "INH722302515",
        status: "delivered",
        isTakedown: false,
        catNo: "MJ-001",
        recordLabel: "Music Dreams",
        featuringArtist: "None",
        lyricists: ["Mohit Jadhav", "Priya Sharma"],
        albumArtwork: "/images/rocket.png", // Dummy image
        stores: ["Spotify", "Apple Music", "Amazon Music", "JioSaavn", "Gaana"],
        copyrightStores: ["Facebook Rights Manager", "YouTube Content ID"],
        tracks: [{
            trackNo: 1,
            title: "Swapnil Dada Kartoy Raj",
            duration: "3:45",
            isrc: "INH722302515",
            language: "Marathi",
            explicit: false
        }, {
            trackNo: 2,
            title: "Jai Maharashtra",
            duration: "4:10",
            isrc: "INH722302516",
            language: "Marathi",
            explicit: false
        }]
    }, {
        id: 2,
        title: "Dream Chaser",
        artist: "Sarah Johnson",
        submittedDate: "5th July 2025",
        upc: "5863544729376",
        isrc: "INH722302516",
        status: "review",
        isTakedown: false,
        catNo: "SJ-002",
        recordLabel: "Indie Sounds",
        featuringArtist: "The Harmonizers",
        lyricists: ["Sarah Johnson"],
        albumArtwork: "/images/rocket.png", // Dummy image
        stores: ["Spotify", "Apple Music", "Amazon Music"],
        copyrightStores: [],
        tracks: [{
            trackNo: 1,
            title: "Stardust",
            duration: "3:20",
            isrc: "US-SJ-25-001",
            language: "English",
            explicit: false
        }, {
            trackNo: 2,
            title: "Open Road",
            duration: "4:00",
            isrc: "US-SJ-25-002",
            language: "English",
            explicit: false
        }, {
            trackNo: 3,
            title: "City Echoes",
            duration: "2:55",
            isrc: "US-SJ-25-003",
            language: "English",
            explicit: true
        }]
    }, {
        id: 3,
        title: "Midnight Blues",
        artist: "Alex Rodriguez",
        submittedDate: "3rd July 2025",
        upc: "5863544729377",
        isrc: "INH722302517",
        status: "delivered",
        isTakedown: false,
        catNo: "AR-003",
        recordLabel: "Jazz Groove",
        featuringArtist: "Smooth Sax Sam",
        lyricists: ["Alex Rodriguez"],
        albumArtwork: "/images/rocket.png", // Dummy image
        stores: ["Spotify", "Apple Music", "Bandcamp"],
        copyrightStores: ["YouTube Content ID"],
        tracks: [{
            trackNo: 1,
            title: "Blue Moon Serenade",
            duration: "5:15",
            isrc: "US-AR-25-004",
            language: "English",
            explicit: false
        }]
    }, {
        id: 4,
        title: "Summer Vibes",
        artist: "Emma Thompson",
        submittedDate: "1st July 2025",
        upc: "5863544729378",
        isrc: "INH722302518",
        status: "rejected",
        isTakedown: false,
        catNo: "ET-004",
        recordLabel: "Pop Hits Inc.",
        featuringArtist: "None",
        lyricists: ["Emma Thompson", "Ben Carter"],
        albumArtwork: "/images/rocket.png", // Dummy image
        stores: [],
        copyrightStores: [],
        tracks: [{
            trackNo: 1,
            title: "Beach Day",
            duration: "3:05",
            isrc: "US-ET-25-005",
            language: "English",
            explicit: false
        }]
    }, {
        id: 5,
        title: "Electronic Dreams",
        artist: "DJ Mike",
        submittedDate: "28th June 2025",
        upc: "5863544729379",
        isrc: "INH722302519",
        status: "review",
        isTakedown: false,
        catNo: "DJM-005",
        recordLabel: "Techno Beat",
        featuringArtist: "Synth Master",
        lyricists: ["DJ Mike"],
        albumArtwork: "/images/rocket.png", // Dummy image
        stores: ["Beatport", "SoundCloud"],
        copyrightStores: [],
        tracks: [{
            trackNo: 1,
            title: "Circuit Breaker",
            duration: "6:00",
            isrc: "US-DJM-25-006",
            language: "Instrumental",
            explicit: false
        }, {
            trackNo: 2,
            title: "Digital Love",
            duration: "5:30",
            isrc: "US-DJM-25-007",
            language: "English",
            explicit: false
        }]
    }, {
        id: 6,
        title: "Midnight Blues",
        artist: "Alex Rodriguez",
        submittedDate: "3rd July 2025",
        upc: "5863544729377",
        isrc: "INH722302517",
        status: "approved",
        isTakedown: false,
        catNo: "AR-003",
        recordLabel: "Jazz Groove",
        featuringArtist: "Smooth Sax Sam",
        lyricists: ["Alex Rodriguez"],
        albumArtwork: "/images/rocket.png", // Dummy image
        stores: ["Spotify", "Apple Music", "Bandcamp"],
        copyrightStores: ["YouTube Content ID"],
        tracks: [{
            trackNo: 1,
            title: "Blue Moon Serenade",
            duration: "5:15",
            isrc: "US-AR-25-004",
            language: "English",
            explicit: false
        }]
    } ];


    let currentFilter = 'all';
    let filteredData = [...releasesData];

    // Initialize page
    document.addEventListener('DOMContentLoaded', function() {
        // Get filter from URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        const filter = urlParams.get('filter') || 'all';

        setActiveTab(filter);
        filterReleases(filter);
        feather.replace(); // Initialize feather icons on page load
    });

    // Set active tab
    function setActiveTab(filter) {
        currentFilter = filter;
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
        });

        const activeLink = document.querySelector(`[data-filter="${filter}"]`);
        if (activeLink) {
            activeLink.classList.add('active');
        }
    }

    // Filter releases based on status
    function filterReleases(filter) {
        if (filter === 'all') {
            filteredData = [...releasesData];
        } else {
            filteredData = releasesData.filter(release => release.status === filter);
        }

        renderTable();
    }

    function getStatusIcon(status) {
        switch (status.toLowerCase()) {
            case 'delivered':
                return `<i class="bi bi-check-circle-fill text-success" title="Delivered"></i>`;
            case 'approved':
                return `<i class="bi bi-check-circle-fill text-success" title="Delivered"></i>`;
            case 'rejected':
                return `<i class="bi bi-x-circle-fill text-danger" title="Rejected"></i>`;
            case 'review':
                return `<i class="bi bi-hourglass-split text-warning" title="In Review"></i>`;
            case 'takedown':
                return `<i class="bi bi-exclamation-circle-fill text-secondary" title="Takedown"></i>`;
            default:
                return `<i class="bi bi-question-circle-fill text-muted" title="Unknown Status"></i>`;
        }
    }

    // Get status badge HTML for the table
    function getStatusBadge(status) {
        const statusConfig = {
            'delivered': {
                class: 'status-delivered',
                text: 'DELIVERED'
            },
            'approved': {
                class: 'status-approved',
                text: 'APPROVED'
            },
            'review': {
                class: 'status-review',
                text: 'IN REVIEW'
            },
            'rejected': {
                class: 'status-rejected',
                text: 'REJECTED'
            },
            'takedown': {
                class: 'status-takedown-table',
                text: 'TAKEDOWN'
            }
        };

        const config = statusConfig[status] || {
            class: 'status-review',
            text: status.toUpperCase()
        };
        return `<span class="badge status-badge ${config.class}">${config.text}</span>`;
    }

    // Render table
    function renderTable() {
        const tableBody = document.getElementById('tableBody');

        if (filteredData.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="7" class="empty-state">
                        <i data-feather="inbox"></i>
                        <div>
                            <h5 class="mb-2">No releases found</h5>
                            <p class="mb-0">No releases found for this category.</p>
                        </div>
                    </td>
                </tr>
            `;
        } else {
            tableBody.innerHTML = filteredData.map(release => `
                <tr>
                    <td class="text-center">
                        ${getStatusIcon(release.status)}
                    </td>
                    <td>
                        <div>
                            <div class="release-title">
                                <a href="#" class="text-primary text-decoration-none" onclick="openReleaseModal(${release.id})">
                                    ${release.title}
                                </a>
                            </div>
                            <div class="release-artist">${release.artist}</div>
                        </div>
                    </td>
                    <td>${release.submittedDate}</td>
                    <td>${release.upc}</td>
                    <td>${release.isrc}</td>
                    <td>${getStatusBadge(release.status)}</td>
                </tr>
            `).join('');
        }

        feather.replace(); // Re-initialize feather icons after rendering table
    }

    // Handle tab clicks
    document.addEventListener('click', function(e) {
        if (e.target.matches('.nav-link[data-filter]')) {
            e.preventDefault();
            const filter = e.target.getAttribute('data-filter');

            // Update URL
            const url = new URL(window.location);
            url.searchParams.set('filter', filter);
            window.history.pushState({}, '', url);

            // Update UI
            setActiveTab(filter);
            filterReleases(filter);
        }
    });

    // Search functionality
    function performSearch() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();

        // If search term is empty, re-render based on current filter
        if (searchTerm.trim() === '') {
            filterReleases(currentFilter);
            return;
        }

        // Filter the *original* data by search term, then apply current filter
        let tempFilteredData = releasesData.filter(release =>
            release.title.toLowerCase().includes(searchTerm) ||
            release.artist.toLowerCase().includes(searchTerm) ||
            (release.upc && release.upc.includes(searchTerm)) || // Check for existence before calling includes
            (release.isrc && release.isrc.includes(searchTerm)) // Check for existence before calling includes
        );

        if (currentFilter !== 'all') {
            tempFilteredData = tempFilteredData.filter(release => release.status === currentFilter);
        }

        filteredData = tempFilteredData; // Update global filteredData
        renderTable();
    }

    // Search on Enter key
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });

    // Reset search when input is cleared
    document.getElementById('searchInput').addEventListener('input', function(e) {
        if (e.target.value.trim() === '') {
            filterReleases(currentFilter);
        }
    });

    // Action functions (placeholders)
    function viewDetails(id) {
        openReleaseModal(id);
    }

    function editRelease(id) {
        alert(`Editing release ID: ${id}`);
    }

    function deleteRelease(id) {
        if (confirm('Are you sure you want to delete this release?')) {
            alert(`Deleted release ID: ${id}`);
            // In a real application, you'd send an API request here
            // and then update `releasesData` and re-render the table.
            // releasesData = releasesData.filter(release => release.id !== id);
            // filterReleases(currentFilter);
        }
    }

    // Function to handle takedown request (placeholder)
    function requestTakedown(releaseId) {
        if (confirm(`Are you sure you want to request a takedown for release ID ${releaseId}? This action cannot be undone.`)) {
            alert(`Takedown requested for release ID: ${releaseId}`);
            // In a real application, you would send an API request here
            // to initiate the takedown process.
            // Example: axios.post('/api/takedown', { releaseId: releaseId });
            // After successful takedown, you might want to update the release status in your data.
        }
    }


    // Function to open the release details modal with comprehensive data
    function openReleaseModal(id) {
        const release = releasesData.find(r => r.id === id);

        if (!release) {
            console.error(`Release with ID ${id} not found.`);
            return;
        }

        const releaseModalHeader = document.getElementById('releaseModalHeader');
        const releaseAlbumArtwork = document.getElementById('releaseAlbumArtwork');
        const releaseTitle = document.getElementById('releaseTitle');
        const releaseArtistHeader = document.getElementById('releaseArtistHeader');
        const releaseStatusBadges = document.getElementById('releaseStatusBadges');
        const releaseModalContent = document.getElementById('releaseModalContent');
        const takedownButton = document.getElementById('takedownButton'); // Get the takedown button

        // Set header background and album artwork
        const artworkUrl = release.albumArtwork || 'https://via.placeholder.com/150/CCCCCC/FFFFFF?text=No+Artwork';
        releaseModalHeader.querySelector('.bg-image-blurred').style.backgroundImage = `url('${artworkUrl}')`;
        releaseAlbumArtwork.src = artworkUrl;
        releaseAlbumArtwork.alt = `${release.title || 'Untitled'} Album Artwork`;
        releaseTitle.textContent = release.title || 'Untitled Release';
        releaseArtistHeader.textContent = release.artist || 'Unknown Artist';

        // Set status badges
        let badgesHtml = '';
        let modalStatusBadgeClass = '';
        let modalStatusBadgeText = '';

        switch (release.status) {
            case 'delivered':
                modalStatusBadgeClass = 'bg-success';
                modalStatusBadgeText = 'DELIVERED';
                break;
            case 'review':
                modalStatusBadgeClass = 'bg-warning text-dark';
                modalStatusBadgeText = 'IN REVIEW';
                break;
            case 'rejected':
                modalStatusBadgeClass = 'bg-danger';
                modalStatusBadgeText = 'REJECTED';
                break;
            case 'takedown':
                modalStatusBadgeClass = 'bg-secondary';
                modalStatusBadgeText = 'TAKEDOWN';
                break;
            default:
                modalStatusBadgeClass = 'bg-secondary';
                modalStatusBadgeText = 'N/A';
        }
        badgesHtml += `<span class="badge ${modalStatusBadgeClass} me-2">${modalStatusBadgeText}</span>`;


        if (release.isTakedown) {
            badgesHtml += `<span class="badge badge-takedown-glow">Takedown Requested</span>`;
            takedownButton.style.display = 'none'; // Hide takedown button if already taken down
        } else {
            takedownButton.style.display = 'inline-block'; // Show takedown button
            takedownButton.onclick = () => requestTakedown(release.id); // Assign click handler
        }
        releaseStatusBadges.innerHTML = badgesHtml;

        // Construct the modal body content
        releaseModalContent.innerHTML = `
            <div class="modal-content-wrapper">
                <div class="modal-content-card">
                    <h5 class="card-title">Release Details</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Artist</label>
                            <p class="form-control-plaintext fw-bold">${release.artist || 'N/A'}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Submitted Date</label>
                            <p class="form-control-plaintext">${release.submittedDate || 'N/A'}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cat. No</label>
                            <p class="form-control-plaintext">${release.catNo || 'N/A'}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">UPC/EAN</label>
                            <p class="form-control-plaintext">${release.upc || 'N/A'}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Record Label</label>
                            <p class="form-control-plaintext">${release.recordLabel || 'N/A'}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Featuring Artist</label>
                            <p class="form-control-plaintext">${release.featuringArtist || 'None'}</p>
                        </div>
                        <div class="col-12 mb-0">
                            <label class="form-label">Lyricist(s)</label>
                            <p class="form-control-plaintext">${release.lyricists && release.lyricists.length > 0 ? release.lyricists.join(', ') : 'N/A'}</p>
                        </div>
                    </div>
                </div>

                <div class="modal-content-card">
                    <h5 class="card-title">Distribution Information</h5>
                    <div class="mb-4">
                        <label class="form-label mb-2">Delivered Stores</label>
                        <div class="p-3 rounded-3 bg-light badge-container">
                            ${release.stores && release.stores.length > 0 ?
                                release.stores.map(store => `<span class="badge badge-primary">${store}</span>`).join('') :
                                '<p class="text-muted mb-0">No stores listed.</p>'
                            }
                        </div>
                    </div>
                    <div>
                        <label class="form-label mb-2">Copyright Protection</label>
                        <div class="p-3 rounded-3 bg-light badge-container">
                            ${release.copyrightStores && release.copyrightStores.length > 0 ?
                                release.copyrightStores.map(store => `<span class="badge badge-info">${store}</span>`).join('') :
                                '<p class="text-muted mb-0">No copyright stores listed.</p>'
                            }
                        </div>
                    </div>
                </div>

                <div class="modal-content-card">
                    <h5 class="card-title">Track List</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle track-list-table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">ISRC</th>
                                    <th scope="col">Language</th>
                                    <th scope="col" class="text-center">Tags</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${release.tracks && release.tracks.length > 0 ?
                                    release.tracks.map((track, index) => `
                                        <tr>
                                            <td class="text-center">${track.trackNo}</td>
                                            <td>${track.title || 'Untitled Track'}</td>
                                            <td>${track.duration || 'N/A'}</td>
                                            <td>${track.isrc || 'N/A'}</td>
                                            <td>${track.language || 'N/A'}</td>
                                            <td class="text-center">
                                                ${track.explicit ? '<span class="track-tag-explicit badge">Explicit</span>' : 
                                                (track.explicit === false ? '<span class="track-tag-clean badge">Clean</span>' : '')}
                                            </td>
                                        </tr>
                                    `).join('') :
                                    `<tr><td colspan="6" class="text-center text-muted py-4">No tracks found for this release.</td></tr>`
                                }
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            `;

        // Initialize Bootstrap Modal
        const releaseModal = new bootstrap.Modal(document.getElementById('releaseModal'));
        releaseModal.show();
    }
</script>

</html>