<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo view("partials/title-meta", array("title" => "Claim / Reel Merge")) ?>
    <?= $this->include('partials/head-css') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
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
        .table th {
            font-weight: 600;
            font-size: 12px;
            color: #495057;
            text-transform: uppercase;
            border-bottom: 2px solid #e9ecef;
            padding: 1rem 0.75rem;
            vertical-align: middle;
        }
        .table td {
            padding: 1rem 0.75rem;
            font-size: 15px;
            vertical-align: middle;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
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
        .link-icon {
            font-size: 1.3rem;
            color: #6c757d;
            text-decoration: none;
        }
        .link-icon:hover {
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
                            <h1 class="page-title fs-2">Claim / Reel Merge</h1>
                        </div>
                        <div class="col-auto d-flex gap-2">
                            <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                                <i class="bi bi-download me-1"></i> Export to CSV
                            </button>
                            <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#newClaimRequestModal">
                                <i class="bi bi-plus-lg me-1"></i> New Claiming Request
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow-sm">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="claimingTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="50"></th>
                                                    <th>Song Name</th>
                                                    <th>ISRC</th>
                                                    <th class="text-center">Instagram Audio Link</th>
                                                    <th class="text-center">Reel Merge Link</th>
                                                    <th>Matching Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableBody">
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                                    <div class="mb-2 mb-md-0" id="pagination-text">
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
                <?php include 'partials/footer.php'; ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="newClaimRequestModal" tabindex="-1" aria-labelledby="newClaimRequestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4">
                 <form id="newClaimForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newClaimRequestModalLabel">New Claiming Request Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label for="songName" class="form-label">Song Name</label>
                            <input type="text" class="form-control rounded-pill p-3" id="songName" required>
                        </div>
                        <div class="mb-3">
                            <label for="isrc" class="form-label">ISRC</label>
                            <input type="text" class="form-control rounded-pill p-3" id="isrc" required>
                        </div>
                        <div class="mb-3">
                            <label for="instagramAudio" class="form-label">Instagram Audio Link</label>
                            <input type="url" class="form-control rounded-pill p-3" id="instagramAudio" placeholder="https://www.instagram.com/reels/audio/..." required>
                        </div>
                        <div class="mb-3">
                            <label for="reelMerge" class="form-label">Reel Merge Link</label>
                            <input type="url" class="form-control rounded-pill p-3" id="reelMerge" placeholder="https://www.instagram.com/p/..." required>
                        </div>
                        <div class="mb-3">
                            <label for="matchingTime" class="form-label">Matching Time</label>
                            <input type="text" class="form-control rounded-pill p-3" id="matchingTime" placeholder="e.g., 00:15-00:45" required>
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
            // --- DATA ---
            let claimingRequests = [
                { id: 1, songName: 'Cosmic Drift', isrc: 'US1232500004', instagramAudio: 'https://instagram.com/audio/123', reelMerge: 'https://instagram.com/reel/xyz', matchingTime: '00:15-00:45', status: 'Approved' },
                { id: 2, songName: 'Neon Tides', isrc: 'US1232500005', instagramAudio: 'https://instagram.com/audio/456', reelMerge: 'https://instagram.com/reel/abc', matchingTime: '00:30-01:00', status: 'Pending' },
                { id: 3, songName: 'Lost Signal', isrc: 'US1232500006', instagramAudio: 'https://instagram.com/audio/789', reelMerge: 'https://instagram.com/reel/def', matchingTime: '01:00-01:15', status: 'Rejected' }
            ];

            const tableBody = document.getElementById('tableBody');
            const paginationText = document.getElementById('pagination-text');
            const claimForm = document.getElementById('newClaimForm');
            const newClaimModal = new bootstrap.Modal(document.getElementById('newClaimRequestModal'));
            const exportCsvBtn = document.getElementById('exportCsvBtn'); // Get the new button

            // --- HELPER FUNCTIONS ---
            function getStatusIcon(status) {
                const icons = { 'Approved': 'check-circle', 'Pending': 'clock', 'Rejected': 'x-circle' };
                const colors = { 'Approved': 'text-success', 'Pending': 'text-warning', 'Rejected': 'text-danger' };
                return `<i data-feather="${icons[status] || 'help-circle'}" class="${colors[status] || 'text-muted'}"></i>`;
            }

            function getStatusBadge(status) {
                const badgeClasses = { 'Approved': 'success', 'Pending': 'warning', 'Rejected': 'danger' };
                const textClass = status === 'Pending' ? 'text-dark' : '';
                return `<span class="badge bg-${badgeClasses[status] || 'secondary'} ${textClass}">${status}</span>`;
            }
            
            // --- NEW CSV EXPORT FUNCTION ---
            function exportToCsv(filename, data) {
                if (!data || data.length === 0) {
                    alert("No data to export.");
                    return;
                }

                const headers = ['ID', 'Song Name', 'ISRC', 'Instagram Audio Link', 'Reel Merge Link', 'Matching Time', 'Status'];
                const rows = data.map(req => [
                    req.id,
                    req.songName,
                    req.isrc,
                    req.instagramAudio,
                    req.reelMerge,
                    req.matchingTime,
                    req.status
                ]);

                // Escape values that contain commas or quotes
                const escapeCsvValue = (value) => {
                    const stringValue = String(value || '');
                    if (stringValue.includes(',') || stringValue.includes('"') || stringValue.includes('\n')) {
                        return `"${stringValue.replace(/"/g, '""')}"`;
                    }
                    return stringValue;
                };

                let csvContent = "data:text/csv;charset=utf-8," 
                    + headers.join(",") + "\n" 
                    + rows.map(r => r.map(escapeCsvValue).join(",")).join("\n");
                
                const encodedUri = encodeURI(csvContent);
                const link = document.createElement("a");
                link.setAttribute("href", encodedUri);
                link.setAttribute("download", filename);
                document.body.appendChild(link); // Required for Firefox
                link.click();
                document.body.removeChild(link);
            }

            // --- RENDER & UPDATE FUNCTIONS ---
            function renderTable(data) {
                if (!data || data.length === 0) {
                    tableBody.innerHTML = `
                        <tr>
                            <td colspan="8" class="empty-state">
                                <i data-feather="inbox"></i>
                                <div>
                                    <h5 class="mb-2">No Claiming Requests Found</h5>
                                    <p class="mb-0">Click 'New Claiming Request' to get started.</p>
                                </div>
                            </td>
                        </tr>`;
                } else {
                    tableBody.innerHTML = data.map(request => `
                        <tr>
                            <td class="text-center">${getStatusIcon(request.status)}</td>
                            <td>
                                <div class="release-title">
                                    <a href="#" onclick="event.preventDefault();">${request.songName}</a>
                                </div>
                            </td>
                            <td>${request.isrc || 'N/A'}</td>
                            <td class="text-center">
                                ${request.instagramAudio ? `<a href="${request.instagramAudio}" target="_blank" class="link-icon" title="Instagram Audio"><i class="bi bi-music-note-beamed"></i></a>` : ''}
                            </td>
                            <td class="text-center">
                                ${request.reelMerge ? `<a href="${request.reelMerge}" target="_blank" class="link-icon" title="Reel Merge"><i class="bi bi-camera-reels"></i></a>` : ''}
                            </td>
                            <td>${request.matchingTime || 'N/A'}</td>
                            <td>${getStatusBadge(request.status)}</td>
                        </tr>
                    `).join('');
                }
                feather.replace();
                updatePaginationText(data.length, data.length);
            }

            function updatePaginationText(end, total) {
                paginationText.innerHTML = `Showing <strong>1</strong> to <strong>${end}</strong> of <strong>${total}</strong> entries`;
            }
            
            // --- EVENT LISTENERS ---
            claimForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const newRequest = {
                    id: Date.now(),
                    songName: document.getElementById('songName').value,
                    isrc: document.getElementById('isrc').value,
                    instagramAudio: document.getElementById('instagramAudio').value,
                    reelMerge: document.getElementById('reelMerge').value,
                    matchingTime: document.getElementById('matchingTime').value,
                    status: 'Pending'
                };
                claimingRequests.push(newRequest);
                renderTable(claimingRequests);
                claimForm.reset();
                newClaimModal.hide();
            });
            // --- INITIAL RENDER ---
            renderTable(claimingRequests);
        });
    </script>
</body>
</html>