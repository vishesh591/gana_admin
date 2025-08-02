<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo view("partials/title-meta", array("title" => "Relocation Requests")) ?>
    <?= $this->include('partials/head-css') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
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
        .badge.bg-danger {
            font-size: 0.7em;
            vertical-align: middle;
            padding: 0.3em 0.5em;
            border-radius: 0.25rem;
        }
        .fixed-top-custom {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1030;
            background-color: #f8f9fa;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: left 0.3s ease, width 0.3s ease;
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
        @media (min-width: 992px) {
            .fixed-top-custom {
                left: 250px;
                width: calc(100% - 250px);
            }
        }
        .empty-state {
            text-align: center;
            padding: 4rem;
            color: #6c757d;
        }
        .empty-state i {
            width: 48px;
            height: 48px;
            margin-bottom: 1rem;
            display: inline-block;
        }
        .release-title a {
            font-weight: 500;
            color: var(--bs-primary);
            text-decoration: none;
        }
        .release-title a:hover {
            text-decoration: underline;
        }
        .release-artist {
            font-size: 0.85rem;
            color: #6c757d;
        }
        .social-link {
            font-size: 1.2rem;
            color: #6c757d;
            text-decoration: none;
        }
        .social-link:hover {
            color: var(--bs-primary);
        }
    </style>
</head>
<body data-sidebar="default">
    <div id="app-layout">
        <?php include 'partials/sidebar.php'; ?>
        <?php include 'partials/topbar.php'; ?>

        <div class="content-page">
            <div class="content">
                <div class="container-xxl">
                    <div class="row align-items-center mb-5">
                        <div class="col">
                            <h1 class="page-title fs-2">Relocation Request</h1>
                        </div>
                        <div class="col-auto d-flex gap-2">
                            <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                                <i class="bi bi-download me-1"></i> Export to CSV
                            </button>
                        <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#relocationRequestModal">
                            <i class="bi bi-plus-lg me-1"></i> New Relocation Request
                        </button>
                     </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow-sm">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="relocationTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="60"></th>
                                                    <th>Song / Artist</th>
                                                    <th>ISRC</th>
                                                    <th>Social Profiles</th>
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
                                        Showing <strong>1</strong> to <strong>3</strong> of <strong>3</strong> entries
                                    </div>
                                    <nav>
                                        <ul class="pagination mb-0">
                                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'partials/footer.php'; ?>
    </div>

    <div class="modal fade" id="relocationRequestModal" tabindex="-1" aria-labelledby="relocationRequestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4">
                <form action="#" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="relocationRequestModalLabel">Relocation Request Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-4">
                            <label for="artistName" class="form-label d-flex align-items-center">
                                Artist Name <span class="badge bg-danger ms-2">RE</span>
                            </label>
                            <input type="text" class="form-control rounded-pill p-3" id="artistName" name="artistName" placeholder="Enter artist name" required>
                        </div>
                        <div class="mb-4">
                            <label for="songName" class="form-label d-flex align-items-center">
                                Song Name <span class="badge bg-danger ms-2">RE</span>
                            </label>
                            <input type="text" class="form-control rounded-pill p-3" id="songName" name="songName" placeholder="Enter song name" required>
                        </div>
                        <div class="mb-4">
                            <label for="ISRC" class="form-label d-flex align-items-center">
                                ISRC
                                <span class="badge bg-danger ms-2">RE</span>
                            </label>
                            <input type="text" class="form-control rounded-pill p-3" id="upc" name="upc" placeholder="Enter ISRC" required>
                        </div>
                        <div class="mb-4">
                            <label for="instagramLink" class="form-label">Instagram Profile Link</label>
                            <input type="url" class="form-control rounded-pill p-3" id="instagramLink" name="instagramLink" placeholder="https://instagram.com/username">
                        </div>
                        <div class="mb-4">
                            <label for="instagramAudio" class="form-label">Instagram Audio Link</label>
                            <input type="url" class="form-control rounded-pill p-3" id="instagramLink" name="instagramLink" placeholder="https://instagram.com/username">
                        </div>
                        <div class="mb-4">
                            <label for="facebookLink" class="form-label">Facebook Profile Link</label>
                            <input type="url" class="form-control rounded-pill p-3" id="facebookLink" name="facebookLink" placeholder="https://facebook.com/username">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary rounded-pill">Submit Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/feather-icons"></script>
    <?= $this->include('partials/vendor') ?>
    <script src="/js/app.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sample data for relocation requests
            const relocationRequests = [
                {
                    id: 1,
                    songName: 'Cosmic Drift',
                    artistName: 'Orion Sun',
                    isrc: 'US1232500004',
                    instagram: 'https://instagram.com/orionsun',
                    facebook: 'https://facebook.com/orionsun',
                    status: 'Done'
                },
                {
                    id: 2,
                    songName: 'Neon Tides',
                    artistName: 'Cyber Lazer',
                    isrc: 'US1232500005',
                    instagram: 'https://instagram.com/cyberlazer',
                    facebook: '',
                    status: 'Pending'
                },
                {
                    id: 3,
                    songName: 'Lost Signal',
                    artistName: 'Ghost FM',
                    isrc: 'US1232500006',
                    instagram: '',
                    facebook: 'https://facebook.com/ghostfm',
                    status: 'Rejected'
                }
            ];

            function renderTable(data) {
                const tableBody = document.getElementById('tableBody');
                if (!data || data.length === 0) {
                    tableBody.innerHTML = `
                        <tr>
                            <td colspan="6" class="empty-state">
                                <i data-feather="inbox"></i>
                                <div>
                                    <h5 class="mb-2">No relocation requests found</h5>
                                    <p class="mb-0">Click 'New Relocation Request' to get started.</p>
                                </div>
                            </td>
                        </tr>`;
                } else {
                    tableBody.innerHTML = data.map(request => `
                        <tr>
                            <td class="text-center align-middle">${getStatusIcon(request.status)}</td>
                            <td class="align-middle">
                                <div>
                                    <div class="release-title">
                                        <a href="#" onclick="event.preventDefault(); alert('Viewing ID: ${request.id}')">${request.songName}</a>
                                    </div>
                                    <div class="release-artist">${request.artistName}</div>
                                </div>
                            </td>
                            <td class="align-middle">${request.isrc || 'N/A'}</td>
                            <td class="align-middle">
                                ${request.instagram ? `<a href="${request.instagram}" target="_blank" class="social-link me-2"><i class="bi bi-instagram"></i></a>` : ''}
                                ${request.facebook ? `<a href="${request.facebook}" target="_blank" class="social-link"><i class="bi bi-facebook"></i></a>` : ''}
                            </td>
                            <td class="align-middle">${getStatusBadge(request.status)}</td>
                        </tr>
                    `).join('');
                }
                feather.replace();
            }

            function getStatusIcon(status) {
                const icons = { 'Done': 'check-circle', 'Pending': 'clock', 'Rejected': 'x-circle' };
                const colors = { 'Done': 'text-success', 'Pending': 'text-warning', 'Rejected': 'text-danger' };
                return `<i data-feather="${icons[status] || 'help-circle'}" class="${colors[status] || 'text-muted'}"></i>`;
            }

            function getStatusBadge(status) {
                const badgeClasses = { 'Done': 'success', 'Pending': 'warning', 'Rejected': 'danger' };
                return `<span class="badge bg-${badgeClasses[status] || 'secondary'}">${status}</span>`;
            }

            renderTable(relocationRequests);
        });
    </script>
</body>
</html>