<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo view("partials/title-meta", array("title" => "Relocation Data")) ?>
    <?= $this->include('partials/head-css') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        /* General Body and Layout */
        body { background-color: #f8f9fa; font-size: 15px; overflow-x: hidden; }
        .content-page { margin-left: 0; transition: margin-left 0.3s ease; padding-top: 70px; }
        @media (min-width: 992px) { .content-page { margin-left: 250px; } }
        .card { border-radius: 12px; border: none !important; box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,.075); }
        
        /* Filter Tabs (Nav Pills) */
        .nav-pills .nav-link { border-radius: 25px; padding: 0.6rem 1.2rem; font-weight: 500; color: #6c757d; transition: all 0.3s ease; }
        .nav-pills .nav-link.active { background-color: #727cf5; color: white; box-shadow: 0 2px 8px rgba(114, 124, 245, 0.3); }
        .nav-pills .nav-link:hover:not(.active) { background-color: #e9ecef; color: #495057; }

        /* Table Styles */
        .table th { font-weight: 600; font-size: 12px; color: #495057; text-transform: uppercase; border-bottom: 2px solid #e9ecef; padding: 1rem 0.75rem; vertical-align: middle; }
        .table td { padding: 1rem 0.75rem; font-size: 15px; vertical-align: middle; }
        .table-hover tbody tr:hover { background-color: rgba(114, 124, 245, 0.05); }
        .release-title a { font-weight: 500; color: #727cf5; text-decoration: none; cursor: pointer; }
        .release-title a:hover { text-decoration: underline; }
        .link-icon { font-size: 1.3rem; color: #6c757d; text-decoration: none; }
        .link-icon:hover { color: #727cf5; }

        /* Status Badges */
        .status-badge { font-weight: 500; padding: 0.4rem 0.8rem; border-radius: 20px; font-size: 12px; text-transform: uppercase; }
        .status-approved { background-color: rgba(25, 135, 84, 0.1) !important; color: #198754 !important; }
        .status-pending { background-color: rgba(255, 193, 7, 0.1) !important; color: #f57c00 !important; }
        .status-rejected { background-color: rgba(220, 53, 69, 0.1) !important; color: #dc3545 !important; }
        
        /* Empty State */
        .empty-state { text-align: center; padding: 3rem 1rem; color: #6c757d; }
        .empty-state i { font-size: 3rem; margin-bottom: 1rem; opacity: 0.5; }

        /* Details Modal Styles */
        .modal-header-custom { background-color: #2c3e50; position: relative; padding: 2.5rem; color: #fff; overflow: hidden; display: flex; align-items: center; border-top-left-radius: .5rem; border-top-right-radius: .5rem; }
        .bg-image-blurred { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: cover; background-position: center; filter: blur(8px); opacity: 0.2; z-index: 0; }
        .modal-header-custom .d-flex { position: relative; z-index: 1; width: 100%; }
        #releaseAlbumArtwork { width: 130px; height: 130px; object-fit: cover; border-radius: 0.75rem; box-shadow: 0 6px 15px rgba(0,0,0,.3); border: 3px solid rgba(255,255,255,.4); }
        #releaseTitle { font-size: 2.2rem; font-weight: 700; text-shadow: 1px 1px 4px rgba(0,0,0,.6); }
        #releaseArtistHeader { font-size: 1.3rem; color: rgba(255,255,255,.85); text-shadow: 1px 1px 3px rgba(0,0,0,.5); }
        .detail-label { font-size: 0.9rem; font-weight: 500; color: #7f8c8d; margin-bottom: 0.4rem; }
        .detail-value { font-size: 1.1rem; color: #34495e; }
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
                        <h4 class="fs-18 fw-semibold m-0">Relocation Data</h4>
                        <div class="col-auto d-flex gap-2">
                            <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                                <i class="bi bi-download me-1"></i> Export to CSV
                            </button>
                        </div>
                    </div>

                    <div class="card shadow-sm mb-4">
                        <div class="card-body p-3">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                                <ul class="nav nav-pills mb-3 mb-md-0" id="filterTabs">
                                    <li class="nav-item me-2"><a class="nav-link active" href="#" data-filter="all">All</a></li>
                                    <li class="nav-item me-2"><a class="nav-link" href="#" data-filter="pending">Pending</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" data-filter="rejected">Rejected</a></li>
                                </ul>
                                <div class="input-group" style="max-width: 300px;">
                                    <input type="search" class="form-control" placeholder="Search by Song, Artist, ISRC..." id="searchInput">
                                    <button class="btn btn-outline-secondary" type="button" id="searchButton"><i data-feather="search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card shadow-sm">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="relocationTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="50"></th>
                                            <th>Song Name / Artist</th>
                                            <th>ISRC</th>
                                            <th class="text-center">Links</th>
                                            <th class="d-flex justify-content-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                            <div class="mb-2 mb-md-0" id="pagination-text"></div>
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
            <?php include 'partials/footer.php'; ?>
        </div>
    </div>

    <div class="modal fade" id="newClaimRequestModal" tabindex="-1" aria-labelledby="newClaimRequestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4">
                 <form id="newClaimForm">
                    <div class="modal-header"><h5 class="modal-title" id="newClaimRequestModalLabel">New Relocation Request Form</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                    <div class="modal-body p-4">
                        <div class="mb-3"><label for="songNameInput" class="form-label">Song Name</label><input type="text" class="form-control rounded-pill p-3" id="songNameInput" value="Dummy data" readonly></div>
                        <div class="mb-3"><label for="artistInput" class="form-label">Artist</label><input type="text" class="form-control rounded-pill p-3" id="artistInput" value="Dummy data" readonly></div>
                        <div class="mb-3"><label for="isrcInput" class="form-label">ISRC</label><input type="text" class="form-control rounded-pill p-3" id="isrcInput" value="Dummy data" readonly></div>
                        <div class="mb-3"><label for="instagramAudioInput" class="form-label">Instagram Audio Link</label><input type="url" class="form-control rounded-pill p-3" id="instagramAudioInput" value="Dummy data" readonly></div>
                        <div class="mb-3"><label for="reelMergeInput" class="form-label">Reel Merge Link</label><input type="url" class="form-control rounded-pill p-3" id="reelMergeInput" placeholder="https://..." value="Dummy data" readonly></div>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Reject</button><button type="submit" class="btn btn-primary rounded-pill">Approve</button></div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="releaseModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content shadow-lg">
                <div class="modal-header-custom" id="releaseModalHeader">
                    <div class="bg-image-blurred"></div>
                    <div class="d-flex w-100">
                        <img id="releaseAlbumArtwork" src="" alt="Album Artwork" class="me-4">
                        <div class="flex-grow-1">
                            <h2 id="releaseTitle"></h2>
                            <p id="releaseArtistHeader"></p>
                            <div id="releaseStatusBadges"></div>
                        </div>
                         <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body p-4 bg-light">
                    <div class="row justify-content-center">
                       <div class="col-lg-8">
                           <div class="card">
                               <div class="card-body p-4">
                                   <h5 class="card-title mb-4">Request Details</h5>
                                   <div class="row">
                                       <div class="col-md-6 mb-3"><label class="detail-label">ISRC</label><p class="detail-value" id="modal-isrc"></p></div>
                                       <div class="col-md-6 mb-3"><label class="detail-label">Instagram Audio</label><p class="detail-value" id="modal-instagramAudio"></p></div>
                                       <div class="col-md-6 mb-3"><label class="detail-label">Reel Merge</label><p class="detail-value" id="modal-reelMerge"></p></div>
                                   </div>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
                <div class="modal-footer border-0 justify-content-center bg-light py-3">
                    <button type="button" class="btn btn-danger rounded-pill px-4" id="rejectBtn">Reject</button>
                    <button type="button" class="btn btn-success rounded-pill px-4" id="approveBtn">Approve</button>
                </div>
            </div>
        </div>
    </div>
    
    <?= $this->include('partials/vendor') ?>
    <script src="/js/app.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- DATA ---
        let relocationRequests = [
            { id: 1, songName: 'Cosmic Drift', artist: 'Orion Sun', isrc: 'US1232500004', instagramAudio: 'https://instagram.com/audio/123', reelMerge: 'https://instagram.com/reel/xyz', status: 'pending', artwork: 'https://i.scdn.co/image/ab67616d0000b273e6f6a7f1b2b2b2b2b2b2b2b2' },
            { id: 2, songName: 'Neon Tides', artist: 'Cyber Lazer', isrc: 'US1232500005', instagramAudio: 'https://instagram.com/audio/456', reelMerge: 'https://instagram.com/reel/abc', matchingTime: '00:30-01:00', status: 'pending', artwork: 'https://i.scdn.co/image/ab67616d0000b273f4f4f4f4f4f4f4f4f4f4f4f4' },
            { id: 3, songName: 'Lost Signal', artist: 'Ghost FM', isrc: 'US1232500006', instagramAudio: 'https://instagram.com/audio/789', reelMerge: 'https://instagram.com/reel/def', matchingTime: '01:00-01:15', status: 'rejected', artwork: 'https://i.scdn.co/image/ab67616d0000b273a8a8a8a8a8a8a8a8a8a8a8a8' }
        ];
        let currentFilter = 'all';
        let filteredData = [...relocationRequests];

        // --- DOM ELEMENTS ---
        const tableBody = document.getElementById('tableBody');
        const paginationText = document.getElementById('pagination-text');
        const newClaimForm = document.getElementById('newClaimForm');
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const exportCsvBtn = document.getElementById('exportCsvBtn');
        const newClaimModal = new bootstrap.Modal(document.getElementById('newClaimRequestModal'));
        const releaseModalEl = document.getElementById('releaseModal');
        const releaseModal = new bootstrap.Modal(releaseModalEl);

        // --- HELPER FUNCTIONS ---
        const getStatusIcon = (status) => {
            const icons = { 'approved': 'check-circle', 'pending': 'clock', 'rejected': 'x-circle' };
            const colors = { 'approved': 'text-success', 'pending': 'text-warning', 'rejected': 'text-danger' };
            return `<i data-feather="${icons[status] || 'help-circle'}" class="${colors[status] || 'text-muted'}"></i>`;
        };
        const getStatusBadge = (status) => {
            const config = { 'approved': 'status-approved', 'pending': 'status-pending', 'rejected': 'status-rejected' };
            return `<span class="badge status-badge ${config[status] || 'bg-secondary'}">${status.toUpperCase()}</span>`;
        };
        const createLink = (url, iconClass) => url ? `<a href="${url}" target="_blank" class="link-icon me-2"><i class="bi ${iconClass}"></i></a>` : '';

        // --- RENDER & UPDATE FUNCTIONS ---
        function renderTable() {
            if (!filteredData || filteredData.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="6" class="empty-state"><i data-feather="inbox"></i><div><h5 class="mb-2">No Requests Found</h5><p class="mb-0">No requests match the current filter.</p></div></td></tr>`;
            } else {
                tableBody.innerHTML = filteredData.map(req => `
                    <tr>
                        <td class="text-center">${getStatusIcon(req.status)}</td>
                        <td>
                            <div class="release-title">
                                <a type="button"  data-bs-toggle="modal" data-bs-target="#newClaimRequestModal">${req.songName}</a>
                            </div>
                            <div class="text-muted small">${req.artist}</div>
                        </td>
                        <td>${req.isrc || 'N/A'}</td>
                        <td class="text-center">${createLink(req.instagramAudio, 'bi-music-note-beamed')} ${createLink(req.reelMerge, 'bi-camera-reels')}</td>
                        <td ><a class="d-flex justify-content-center">${getStatusBadge(req.status)}</a></td>
                    </tr>
                `).join('');
            }
            feather.replace();
            updatePaginationText(filteredData.length, relocationRequests.length);
        }

        function updatePaginationText(count, total) {
            paginationText.innerHTML = `Showing <strong>${count}</strong> of <strong>${total}</strong> entries`;
        }
        
        function openReleaseModal(id) {
            const req = relocationRequests.find(r => r.id === id);
            if (!req) return;

            document.getElementById('releaseTitle').textContent = req.songName;
            document.getElementById('releaseArtistHeader').textContent = req.artist;
            document.getElementById('releaseAlbumArtwork').src = req.artwork;
            releaseModalEl.querySelector('.bg-image-blurred').style.backgroundImage = `url('${req.artwork}')`;
            document.getElementById('releaseStatusBadges').innerHTML = getStatusBadge(req.status);
            document.getElementById('modal-isrc').textContent = req.isrc;
            document.getElementById('modal-matchingTime').textContent = req.matchingTime;
            document.getElementById('modal-instagramAudio').innerHTML = req.instagramAudio ? `<a href="${req.instagramAudio}" target="_blank">${req.instagramAudio}</a>` : 'N/A';
            document.getElementById('modal-reelMerge').innerHTML = req.reelMerge ? `<a href="${req.reelMerge}" target="_blank">${req.reelMerge}</a>` : 'N/A';

            releaseModalEl.dataset.currentId = req.id;
            releaseModal.show();
        }

        function handleStatusUpdate(status) {
            const requestId = parseInt(releaseModalEl.dataset.currentId, 10);
            const request = relocationRequests.find(r => r.id === requestId);
            if (request) {
                request.status = status;
                filterAndRender();
            }
            releaseModal.hide();
        }
        
        function filterAndRender() {
            let dataToFilter = [...relocationRequests];
            const searchTerm = searchInput.value.toLowerCase().trim();

            if (searchTerm) {
                dataToFilter = dataToFilter.filter(req =>
                    req.songName.toLowerCase().includes(searchTerm) ||
                    req.artist.toLowerCase().includes(searchTerm) ||
                    req.isrc.toLowerCase().includes(searchTerm)
                );
            }

            if (currentFilter !== 'all') {
                dataToFilter = dataToFilter.filter(req => req.status === currentFilter);
            }

            filteredData = dataToFilter;
            renderTable();
        }

        // --- EVENT LISTENERS ---
        document.getElementById('filterTabs').addEventListener('click', (e) => {
            if (e.target.matches('a.nav-link[data-filter]')) {
                e.preventDefault();
                currentFilter = e.target.dataset.filter;
                document.querySelectorAll('#filterTabs .nav-link').forEach(tab => tab.classList.remove('active'));
                e.target.classList.add('active');
                filterAndRender();
            }
        });

        searchButton.addEventListener('click', filterAndRender);
        searchInput.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') filterAndRender();
        });
        searchInput.addEventListener('input', () => {
            if (!searchInput.value) filterAndRender();
        });

        tableBody.addEventListener('click', (e) => {
            const link = e.target.closest('.view-details-link');
            if (link) {
                e.preventDefault();
                openReleaseModal(parseInt(link.dataset.id, 10));
            }
        });

        newClaimForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const newRequest = {
                id: Date.now(),
                songName: document.getElementById('songNameInput').value,
                artist: document.getElementById('artistInput').value,
                isrc: document.getElementById('isrcInput').value,
                instagramAudio: document.getElementById('instagramAudioInput').value,
                reelMerge: document.getElementById('reelMergeInput').value,
                matchingTime: document.getElementById('matchingTimeInput').value,
                status: 'pending',
                artwork: 'https://via.placeholder.com/150/cccccc/FFFFFF?text=New'
            };
            relocationRequests.unshift(newRequest);
            newClaimForm.reset();
            newClaimModal.hide();
            filterAndRender();
        });
        
        document.getElementById('rejectBtn').addEventListener('click', () => handleStatusUpdate('rejected'));

        exportCsvBtn.addEventListener('click', () => {
             const headers = ['ID', 'Song Name', 'Artist', 'ISRC', 'Instagram Audio Link', 'Reel Merge Link', 'Status'];
             const rows = filteredData.map(req => [req.id, req.songName, req.artist, req.isrc, req.instagramAudio, req.reelMerge, req.matchingTime, req.status]);
             const escapeCsvValue = (val) => `"${String(val || '').replace(/"/g, '""')}"`;
             let csvContent = "data:text/csv;charset=utf-8," + headers.join(",") + "\n" + rows.map(r => r.map(escapeCsvValue).join(",")).join("\n");
             const link = document.createElement("a");
             link.setAttribute("href", encodeURI(csvContent));
             link.setAttribute("download", "relocation-requests.csv");
             document.body.appendChild(link);
             link.click();
             document.body.removeChild(link);
        });

        // --- INITIAL RENDER ---
        feather.replace();
        filterAndRender();
    });
    </script>
</body>
</html>