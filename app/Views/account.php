<!DOCTYPE html>
<html lang="en">
<head>
    <?php $title = "Settings"; include 'partials/title-meta.php'; ?>
    <?php include 'partials/head-css.php'; ?>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Font Awesome for Icons (Cart Icon, Profile Icon placeholder) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            background-color: #f0f2f5; /* Slightly off-white background for depth */
        }
        .content-page {
            margin-left: 0;
            transition: margin-left 0.3s ease;
            padding-top: 70px; /* Space for the fixed topbar */
        }
        @media (min-width: 992px) {
            .content-page {
                margin-left: 250px;
            }
        }
        .fixed-top-custom {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1030;
            background-color: #ffffff; /* Pure white topbar */
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: left 0.3s ease, width 0.3s ease;
        }
        @media (min-width: 992px) {
            .fixed-top-custom {
                left: 250px;
                width: calc(100% - 250px);
            }
        }
        .profile-icon-container {
            width: 90px; /* Slightly larger */
            height: 90px; /* Slightly larger */
            border-radius: 50%;
            background: linear-gradient(135deg, #dc3545, #c82333); /* Red gradient for Movie Mistakes theme */
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 3.5rem; /* Larger icon */
            color: #ffffff; /* White icon */
            margin: 0 auto 1.5rem; /* Center and add more margin below */
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.15); /* More pronounced shadow */
            border: 3px solid #f8d7da; /* Light red border */
        }
        .account-menu-item {
            display: flex;
            align-items: center;
            padding: 1rem 1.25rem; /* More padding */
            color: #495057; /* Slightly darker text */
            text-decoration: none;
            border-radius: 0.5rem;
            transition: background-color 0.2s ease, transform 0.2s ease; /* Add transform for subtle animation */
            border-bottom: 1px solid #e9ecef; /* Subtle separator */
        }
        .account-menu-item:last-child {
            border-bottom: none; /* No border on the last item */
        }
        .account-menu-item:hover {
            background-color: #e9ecef; /* Lighter hover background */
            color: #212529; /* Darker text on hover */
            transform: translateX(5px); /* Slide effect on hover */
        }
        .account-menu-item i {
            margin-right: 1.2rem; /* More space for icon */
            font-size: 1.4rem; /* Larger icon */
            color: #6c757d; /* Consistent icon color */
        }
        .footer-links a {
            color: #6c757d;
            text-decoration: none;
            font-size: 0.9em;
            transition: color 0.2s ease, transform 0.2s ease;
            padding: 0 0.5rem; /* Add some horizontal padding */
        }
        .footer-links a:not(:last-child)::after {
            content: "|"; /* Add a separator */
            margin-left: 1rem;
            color: #dee2e6;
        }
        .footer-links a:hover {
            color: #343a40;
            transform: translateY(-2px); /* Subtle lift on hover */
        }
        .card {
            border: none; /* Remove default card border */
        }
        .btn-danger { /* Ensure the upgrade button matches the theme */
            background-color: #dc3545; /* Bootstrap red */
            border-color: #dc3545;
            transition: background-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
        }
        .btn-danger:hover {
            background-color: #c82333; /* Darker red on hover */
            border-color: #bd2130;
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important; /* More shadow on hover */
        }
    </style>
</head>
<body data-sidebar="default">
    <div id="app-layout">
        <!-- Include Sidebar -->
        <?php include 'partials/sidebar.php'; ?>

        <!-- Include Topbar -->
        <?php $pageTitle = "Settings"; $rightButtonText = "Movie Mistakes"; include 'partials/topbar.php'; ?>

        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 col-sm-10" style="max-width: 500px;">
                            <div class="card shadow-lg rounded-3 p-4 p-md-5 my-5">
                                <!-- Top Section -->
                                <div class="text-center mb-4">
                                    <div class="profile-icon-container">
                                        <i class="fas fa-user"></i> <!-- Profile icon placeholder -->
                                    </div>
                                    <h3 class="mb-1">Bhavesh Patil</h3>
                                    <span class="badge bg-dark text-white rounded-pill px-3 py-2">Since 20 June, 2025</span>
                                </div>

                                <hr class="my-4">

                                <!-- Account Menu List -->
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action account-menu-item">
                                        <i class="fas fa-user"></i> Account
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action account-menu-item">
                                        <i class="fas fa-file-alt"></i> Agreements
                                    </a>
                                   
                                </div>
                

                                <hr class="my-4">

                                <!-- Footer Links -->
                                <div class="d-flex flex-wrap justify-content-center gap-3 footer-links">
                                    <a href="#">Terms & Conditions</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Include Footer -->
        <?php include 'partials/footer.php'; ?>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Feather Icons for potential use if needed in other partials -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            feather.replace(); // Initializes Feather icons
        });
    </script>
     <?= $this->include('partials/vendor') ?>
<script src="/js/app.js"></script>
</body>
</html>