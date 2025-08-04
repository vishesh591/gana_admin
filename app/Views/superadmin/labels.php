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