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
        
        .label-table {
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
        
        .label-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .label-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #f1f3f4;
        }
        
        .label-name {
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
            
            .label-table {
                font-size: 14px;
            }
            
            .table th, .table td {
                padding: 1rem 0.75rem;
            }
            
            .label-name {
                font-size: 15px;
            }
            
            .label-image {
                width: 50px;
                height: 50px;
            }
        }
        
        @media (max-width: 576px) {
            .table-responsive {
                font-size: 13px;
            }
            
            .label-profile {
                gap: 0.5rem;
            }
            
            .label-image {
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
            <h1 class="page-title">Labels</h1>
            <p class="page-subtitle">Manage your labels and track their releases</p>
          </div>

          <!-- Header Controls -->
          <div class="header-controls">
            <div class="d-flex justify-content-between align-items-center controls-row">
              <div class="search-container flex-grow-1 me-3">
                <input type="search" class="form-control search-input" placeholder="Search label..." id="searchInput">
              </div>

              <div class="button-group d-flex gap-2">
                <button class="btn btn-create" onclick="openCreateModal()">
                  <i data-feather="plus" class="me-1"></i>
                  Create label Request
                </button>

                
              </div>
            </div>
          </div>

          <!-- labels Table -->
          <div class="label-table">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th width="40">
                      <input type="checkbox" class="form-check-input" id="selectAll">
                    </th>
                    <th>label</th>
                    <th class="d-flex justify-content-center">Releases</th>
                  </tr>
                </thead>
                <tbody id="labelTableBody">
                  <!-- Dummy Data -->
                  <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td>
                      <div class="d-flex align-items-center">
                        <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="label Image">
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
                        <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="label Image">
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
              <span class="text-muted" id="paginationInfo">Showing 1-2 of 2 labels</span>
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

  <!-- Create label Modal -->
  <div class="modal fade" id="createlabelModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create New label</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="createlabelForm">
            <div class="mb-3">
              <label class="form-label">label Name</label>
              <input type="text" class="form-control" id="labelName" required>
            </div>
             <div class="mb-3">
              <label class="form-label">Primary Label Name</label>
              <input type="text" class="form-control" id="primaryLabelName" value="Label Name" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Profile Image</label>
              <div class="image-upload-area" onclick="document.getElementById('imageInput').click()">
                <i data-feather="camera" style="font-size: 2rem; color: #6c757d;"></i>
                <p class="mb-0 mt-2 text-muted">Click to upload label image</p>
                <img id="imagePreview" class="image-preview" style="display: none;">
              </div>
              <input type="file" id="imageInput" accept="image/*" style="display: none;" onChange="previewImage()">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-create" onclick="createlabel()">
            <i data-feather="plus" class="me-1"></i>
            Create label request
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
          <p>Are you sure you want to delete <span id="deleteCount"></span> selected label(s)?</p>
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
        let labelsData = [
            {
                id: 1,
                name: "Mohit Jadhav",
                image: "/images/rocket.png",
                releases: 12
            },
            {
                id: 2,
                name: "Sarah Johnson",
                image: "/images/rocket.png",
                releases: 8
            },
        ];

        let filteredData = [...labelsData];
        let selectedlabels = new Set();

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            renderTable();
            feather.replace();
        });

        // Render labels table
        function renderTable() {
            const tableBody = document.getElementById('labelTableBody');
            
            if (filteredData.length === 0) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="4" class="empty-state">
                            <i data-feather="users"></i>
                            <h4>No labels Found</h4>
                            <p class="mb-0">No labels match your search criteria.</p>
                        </td>
                    </tr>
                `;
            } else {
                tableBody.innerHTML = filteredData.map(label => `
                    <tr>
                        <td>
                            <input type="checkbox" 
                                   class="form-check-input label-checkbox" 
                                   value="${label.id}"
                                   onchange="updateSelection()">
                        </td>
                        <td>
                            <div class="label-profile">
                                <img src="${label.image}" alt="${label.name}" class="label-image">
                                <div>
                                    <div class="label-name">${label.name}</div>
                                </div>
                            </div>
                        </td>
                        <td class="d-flex justify-content-center">
                            <span class="releases-badge">${label.releases} releases</span>
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
                filteredData = [...labelsData];
            } else {
                filteredData = labelsData.filter(label =>
                    label.name.toLowerCase().includes(searchTerm)
                );
            }
            
            renderTable();
            selectedlabels.clear();
            updateDeleteButton();
            updateSelectAllCheckbox();
        });

        // Select all functionality
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.label-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateSelection();
        });

        // Update selection
        function updateSelection() {
            selectedlabels.clear();
            
            document.querySelectorAll('.label-checkbox:checked').forEach(checkbox => {
                selectedlabels.add(parseInt(checkbox.value));
            });
            
            updateDeleteButton();
            updateSelectAllCheckbox();
        }

        // Update delete button state
        function updateDeleteButton() {
            const deleteBtn = document.getElementById('deleteBtn');
            deleteBtn.disabled = selectedlabels.size === 0;
            
            if (selectedlabels.size > 0) {
                deleteBtn.innerHTML = `
                    <i data-feather="trash-2" class="me-1"></i>
                    Delete (${selectedlabels.size})
                `;
            } else {
                deleteBtn.innerHTML = `
                    <i data-feather="trash-2" class="me-1"></i>
                    Delete label
                `;
            }
            feather.replace();
        }

        // Update select all checkbox state
        function updateSelectAllCheckbox() {
            const selectAll = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.label-checkbox');
            const checkedBoxes = document.querySelectorAll('.label-checkbox:checked');
            
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
            info.textContent = `Showing 1-${count} of ${count} labels`;
        }

        // Open create modal
        function openCreateModal() {
            const modal = new bootstrap.Modal(document.getElementById('createlabelModal'));
            document.getElementById('createlabelForm').reset();
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

        // Create label
        function createlabel() {
            bootstrap.Modal.getInstance(document.getElementById('createlabelModal')).hide();
            alert(`Create label request is sent`);
        }


    </script>
    <script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();
</script>
<?= $this->include('partials/vendor') ?>
    <script src="/js/app.js"></script>
