<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo view("partials/title-meta", array("title" => "Support")) ?>
    <?= $this->include('partials/head-css') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        /* Base styles from your dashboard */
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

        .card {
            border-radius: 0.5rem; /* Consistent with dashboard cards */
        }

        /* --- Modal Specific Styles (copied for completeness, not directly used on support page) --- */
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

        .btn-takedown-header {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: background-color 0.2s ease, border-color 0.2s ease;
            margin-right: 1rem;
        }

        .btn-takedown-header:hover {
            background-color: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.6);
            color: white;
        }


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

        /* Styles specific to the Support Form */
        .support-form-card {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .support-form-card .card-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: #2c3e50;
            border-bottom: 2px solid #e0e6ed;
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }

        .form-label {
            font-size: 0.95rem;
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border: 1px solid #ced4da;
            box-shadow: none;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            border-color: #727cf5;
            box-shadow: 0 0 0 0.25rem rgba(114, 124, 245, 0.25);
        }

        .btn-submit {
            background-color: #727cf5;
            border-color: #727cf5;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            transition: background-color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #5c67d1;
            border-color: #5c67d1;
            box-shadow: 0 4px 10px rgba(114, 124, 245, 0.3);
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
            border-radius: 0.5rem;
        }

        @media (max-width: 768px) {
            .support-form-card {
                margin: 1rem auto;
                padding: 1.5rem;
            }
            .support-form-card .card-title {
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
            }
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
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold m-0">Support Center</h4>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card support-form-card">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-4">How can we help you?</h5>
                                    <p class="text-muted text-center mb-4">
                                        Please fill out the form below with your inquiry, and we'll get back to you as soon as possible.
                                    </p>

                                    <form id="supportForm" action="#" method="POST">
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="fullName" placeholder="Enter your full name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="emailAddress" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="emailAddress" placeholder="Enter your email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" class="form-control" id="subject" placeholder="What is your inquiry about?" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="message" class="form-label">Message</label>
                                            <textarea class="form-control" id="message" rows="5" placeholder="Describe your issue or question in detail" required></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-submit">Submit Request</button>
                                        </div>
                                    </form>

                                    <div id="formSubmissionAlert" class="alert alert-success mt-4 d-none" role="alert">
                                        Thank you for your submission! We have received your request and will get back to you shortly.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'partials/footer.php'; ?>
        </div>
    </div>

    </body>
<?= $this->include('partials/vendor') ?>
<script src="/js/app.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace(); // Initialize feather icons

    // Simple JavaScript for form submission (client-side only for this example)
    document.getElementById('supportForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent actual form submission

        // In a real application, you would collect form data and send it to your backend here
        const fullName = document.getElementById('fullName').value;
        const emailAddress = document.getElementById('emailAddress').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;

        console.log('Form Submitted:');
        console.log('Full Name:', fullName);
        console.log('Email:', emailAddress);
        console.log('Subject:', subject);
        console.log('Message:', message);

        // Simulate successful submission and show alert
        const alertDiv = document.getElementById('formSubmissionAlert');
        alertDiv.classList.remove('d-none'); // Show the alert
        this.reset(); // Clear the form

        // Optionally hide the alert after some time
        setTimeout(() => {
            alertDiv.classList.add('d-none');
        }, 5000); // Hide after 5 seconds
    });
</script>
</html>