<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo view("partials/title-meta", array("title" => "Music Dashboard")) ?>
    <?= $this->include('partials/head-css') ?>
    <style>
        body {
            background-color: #f8f9fa;
            font-size: 15px;
        }
        
        .main-content {
            padding: 2rem 1rem;
        }
        
        .page-header {
            margin-bottom: 2rem;
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #212529;
            margin: 0;
        }
        
        .page-subtitle {
            color: #6c757d;
            font-size: 15px;
            margin-bottom: 0;
            margin-top: 0.25rem;
        }
        
        .card {
            border-radius: 12px;
            border: none !important;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }
        
        .header-controls {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        .search-input {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
            font-size: 15px;
        }
        
        .search-input:focus {
            border-color: #0d6efd;
            background-color: white;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.1);
        }
        
        .btn-create {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: white;
            border-radius: 8px;
            padding: 0.75rem 1.25rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-create:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }
        
        .btn-delete {
            border: 1px solid #dc3545;
            color: #dc3545;
            background: white;
            border-radius: 8px;
            padding: 0.75rem 1.25rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-delete:hover {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }
        
        .btn-delete:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .artist-table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
            font-weight: 600;
            font-size: 14px;
            color: #495057;
            padding: 1.25rem 1rem;
            border-top: none;
        }
        
        .table td {
            padding: 1.25rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f3f4;
        }
        
        .table tbody tr:hover {
            background-color: #f8f9fa;
            transition: background-color 0.2s ease;
        }
        
        .artist-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .artist-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #f1f3f4;
        }
        
        .artist-name {
            font-weight: 600;
            font-size: 16px;
            color: #212529;
            margin: 0;
        }
        
        .releases-count {
            font-size: 15px;
            color: #6c757d;
        }
        
        .releases-badge {
            background-color: #e3f2fd;
            color: #1976d2;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
        }
        
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            opacity: 0.3;
        }
        
        .empty-state h4 {
            color: #495057;
            margin-bottom: 0.5rem;
        }
        
        .pagination-wrapper {
            background: white;
            border-radius: 0 0 12px 12px;
            padding: 1rem;
            border-top: 1px solid #f1f3f4;
        }
        
        .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        
        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .header-controls {
                padding: 1rem;
            }
            
            .controls-row {
                flex-direction: column;
                gap: 1rem;
            }
            
            .search-container {
                order: -1;
            }
            
            .button-group {
                display: flex;
                gap: 0.5rem;
            }
            
            .btn-create, .btn-delete {
                flex: 1;
                padding: 0.6rem 1rem;
                font-size: 14px;
            }
            
            .artist-table {
                font-size: 14px;
            }
            
            .table th, .table td {
                padding: 1rem 0.75rem;
            }
            
            .artist-name {
                font-size: 15px;
            }
            
            .artist-image {
                width: 50px;
                height: 50px;
            }
        }
        
        @media (max-width: 576px) {
            .table-responsive {
                font-size: 13px;
            }
            
            .artist-profile {
                gap: 0.5rem;
            }
            
            .artist-image {
                width: 45px;
                height: 45px;
            }
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 12px;
            border: none;
        }

        .modal-header {
            border-bottom: 1px solid #f1f3f4;
            padding: 1.5rem 1.5rem 1rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.1);
        }

        .image-upload-area {
            border: 2px dashed #e9ecef;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            background-color: #f8f9fa;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .image-upload-area:hover {
            border-color: #0d6efd;
            background-color: #f0f8ff;
        }

        .image-preview {
            max-width: 100px;
            max-height: 100px;
            border-radius: 50%;
            margin-top: 1rem;
        }
    </style>
</head>
<body data-sidebar="default">
  <!-- Begin page -->
  <div id="app-layout">
    <?= $this->include('partials/sidebar') ?>
    <?= $this->include('partials/topbar') ?>

    <div class="content-page">
      <div class="content">
        <div class="container-xxl">
          <!-- Page Header -->
          <div class="page-header pt-4 pb-2">
            <h1 class="page-title">Artists</h1>
            <p class="page-subtitle">Manage your artists and track their releases</p>
          </div>

          <!-- Header Controls -->
          <div class="header-controls">
            <div class="d-flex justify-content-between align-items-center controls-row">
              <div class="search-container flex-grow-1 me-3">
                <input type="search" class="form-control search-input" placeholder="Search artist..." id="searchInput">
              </div>

              <div class="button-group d-flex gap-2">
                <button class="btn btn-create" onclick="openCreateModal()">
                  <i data-feather="plus" class="me-1"></i>
                  Create Artist
                </button>
              </div>
            </div>
          </div>

          <!-- Artists Table -->
          <div class="artist-table">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th width="40">
                      <input type="checkbox" class="form-check-input" id="selectAll">
                    </th>
                    <th>Artist</th>
                    <th class="d-flex justify-content-center">Releases</th>
                  </tr>
                </thead>
                <tbody id="artistTableBody">
                  <!-- Dummy Data -->
                  <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td>
                      <div class="d-flex align-items-center">
                        <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="Artist Image">
                        <div>
                          <strong>John Doe</strong><br>
                          <small class="text-muted">@johndoe</small>
                        </div>
                      </div>
                    </td>
                    <td>5</td>
                    <td><button class="btn btn-sm btn-outline-primary">Edit</button></td>
                  </tr>
                  <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td>
                      <div class="d-flex align-items-center">
                        <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="Artist Image">
                        <div>
                          <strong>Jane Smith</strong><br>
                          <small class="text-muted">@janesmith</small>
                        </div>
                      </div>
                    </td>
                    <td>3</td>
                    <td><button class="btn btn-sm btn-outline-primary">Edit</button></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper d-flex justify-content-between align-items-center">
              <span class="text-muted" id="paginationInfo">Showing 1-2 of 2 artists</span>
              <nav>
                <ul class="pagination pagination-sm mb-0">
                  <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                  </li>
                  <li class="page-item active">
                    <span class="page-link">1</span>
                  </li>
                  <li class="page-item disabled">
                    <span class="page-link">Next</span>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Create Artist Modal -->
  <div class="modal fade" id="createArtistModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create New Artist</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="createArtistForm">
            <div class="mb-3">
              <label class="form-label">Artist Name</label>
              <input type="text" class="form-control" id="artistName" required>
            </div>
           <div class="mb-3">
              <label class="form-label">Spotify Id</label>
              <input type="text" class="form-control" id="Spotify">
            </div>
            <div class="mb-3">
              <label class="form-label">Apple ID</label>
              <input type="text" class="form-control" id="Apple">
            </div>

            <div class="mb-3">
              <label class="form-label">Profile Image</label>
              <div class="image-upload-area" onclick="document.getElementById('imageInput').click()">
                <i data-feather="camera" style="font-size: 2rem; color: #6c757d;"></i>
                <p class="mb-0 mt-2 text-muted">Click to upload artist image</p>
                <img id="imagePreview" class="image-preview" style="display: none;">
              </div>
              <input type="file" id="imageInput" accept="image/*" style="display: none;" onchange="previewImage()">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-create" onclick="createArtist()">
            <i data-feather="plus" class="me-1"></i>
            Create Artist
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="deleteConfirmModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete <span id="deleteCount"></span> selected artist(s)?</p>
          <p class="text-danger small mb-0">This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" onclick="confirmDelete()">
            <i data-feather="trash-2" class="me-1"></i>
            Delete
          </button>
        </div>
      </div>
    </div>
  </div>

  <?php include 'partials/footer.php'; ?>
</body>

<script>
        // Sample data
        let artistsData = [
            {
                id: 1,
                name: "Mohit Jadhav",
                image: "/images/instagram.png",
                releases: 12
            },
            {
                id: 2,
                name: "Sarah Johnson",
                image: "/images/instagram.png",
                releases: 8
            },
            {
                id: 3,
                name: "Alex Rodriguez",
                image: "/images/instagram.png",
                releases: 15
            },
            {
                id: 4,
                name: "Emma Thompson",
                image: "/images/instagram.png",
                releases: 5
            }
        ];

        let filteredData = [...artistsData];
        let selectedArtists = new Set();

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            renderTable();
            feather.replace();
        });

        // Render artists table
        function renderTable() {
            const tableBody = document.getElementById('artistTableBody');
            
            if (filteredData.length === 0) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="4" class="empty-state">
                            <i data-feather="users"></i>
                            <h4>No Artists Found</h4>
                            <p class="mb-0">No artists match your search criteria.</p>
                        </td>
                    </tr>
                `;
            } else {
                tableBody.innerHTML = filteredData.map(artist => `
                    <tr>
                        <td>
                            <input type="checkbox" 
                                   class="form-check-input artist-checkbox" 
                                   value="${artist.id}"
                                   onchange="updateSelection()">
                        </td>
                        <td>
                            <div class="artist-profile">
                                <img src="${artist.image}" alt="${artist.name}" class="artist-image">
                                <div>
                                    <div class="artist-name">${artist.name}</div>
                                </div>
                            </div>
                        </td>
                        <td class="d-flex justify-content-center">
                            <span class="releases-badge">${artist.releases} releases</span>
                        </td>
                    </tr>
                `).join('');
            }
            
            updatePaginationInfo();
            feather.replace();
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase().trim();
            
            if (searchTerm === '') {
                filteredData = [...artistsData];
            } else {
                filteredData = artistsData.filter(artist =>
                    artist.name.toLowerCase().includes(searchTerm)
                );
            }
            
            renderTable();
            selectedArtists.clear();
            updateDeleteButton();
            updateSelectAllCheckbox();
        });

        // Select all functionality
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.artist-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateSelection();
        });

        // Update selection
        function updateSelection() {
            selectedArtists.clear();
            
            document.querySelectorAll('.artist-checkbox:checked').forEach(checkbox => {
                selectedArtists.add(parseInt(checkbox.value));
            });
            
            updateDeleteButton();
            updateSelectAllCheckbox();
        }

        // Update delete button state
        function updateDeleteButton() {
            const deleteBtn = document.getElementById('deleteBtn');
            deleteBtn.disabled = selectedArtists.size === 0;
            
            if (selectedArtists.size > 0) {
                deleteBtn.innerHTML = `
                    <i data-feather="trash-2" class="me-1"></i>
                    Delete (${selectedArtists.size})
                `;
            } else {
                deleteBtn.innerHTML = `
                    <i data-feather="trash-2" class="me-1"></i>
                    Delete Artist
                `;
            }
            feather.replace();
        }

        // Update select all checkbox state
        function updateSelectAllCheckbox() {
            const selectAll = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.artist-checkbox');
            const checkedBoxes = document.querySelectorAll('.artist-checkbox:checked');
            
            if (checkedBoxes.length === 0) {
                selectAll.indeterminate = false;
                selectAll.checked = false;
            } else if (checkedBoxes.length === checkboxes.length) {
                selectAll.indeterminate = false;
                selectAll.checked = true;
            } else {
                selectAll.indeterminate = true;
            }
        }

        // Update pagination info
        function updatePaginationInfo() {
            const info = document.getElementById('paginationInfo');
            const count = filteredData.length;
            info.textContent = `Showing 1-${count} of ${count} artists`;
        }

        // Open create modal
        function openCreateModal() {
            const modal = new bootstrap.Modal(document.getElementById('createArtistModal'));
            document.getElementById('createArtistForm').reset();
            document.getElementById('imagePreview').style.display = 'none';
            modal.show();
        }

        // Preview image
        function previewImage() {
            const input = document.getElementById('imageInput');
            const preview = document.getElementById('imagePreview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Create artist
        function createArtist() {
            const name = document.getElementById('artistName').value.trim();
            const imageInput = document.getElementById('imageInput');
            
            if (!name) {
                alert('Please enter an artist name.');
                return;
            }
            
            const newId = Math.max(...artistsData.map(a => a.id)) + 1;
            let imageUrl = `https://via.placeholder.com/60x60.png?text=${name.charAt(0).toUpperCase()}`;
            
            // In a real application, you would upload the image to a server
            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imageUrl = e.target.result;
                };
                reader.readAsDataURL(imageInput.files[0]);
            }
            
            const newArtist = {
                id: newId,
                name: name,
                image: imageUrl,
                releases: 0
            };
            
            artistsData.push(newArtist);
            filteredData = [...artistsData];
            renderTable();
            
            bootstrap.Modal.getInstance(document.getElementById('createArtistModal')).hide();
            alert(`Artist "${name}" created successfully!`);
        }
        // Individual artist actions
        function viewArtist(id) {
            const artist = artistsData.find(a => a.id === id);
            alert(`Viewing details for: ${artist.name}`);
        }

        function editArtist(id) {
            const artist = artistsData.find(a => a.id === id);
            alert(`Editing: ${artist.name}`);
        }

    </script>
    <script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();
</script>
<?= $this->include('partials/vendor') ?>
    <script src="/js/app.js"></script>
