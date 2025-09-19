<div class="admin-dashboard-page content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Welcome <?= session()->get('user')['name'] ?></h4>
                </div>
                <div>
                    <a href="<?= base_url('superadmin/add-release') ?>" class="btn btn-primary">
                        <i data-feather="plus" class="me-1"></i> Add New Release
                    </a>
                </div>
            </div>

            <!-- start row - Stats Cards -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="row g-3">
                        <!-- Card 1 - Total Revenue -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                        <i data-feather="dollar-sign" class="text-success" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <h3 class="mb-1">$<?= $totalRevenue ?? '0.00' ?></h3>
                                    <p class="text-muted mb-0">Total Revenue</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 - Releases Uploaded -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                        <i data-feather="upload" class="text-primary" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <h3 class="mb-1"><?= $releaseCounts['total'] ?? 0 ?></h3>
                                    <p class="text-muted mb-0">Releases Uploaded</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 - Releases Approved -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                        <i data-feather="check-circle" class="text-success" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <h3 class="mb-1"><?= $releaseCounts['approved'] ?? 0 ?></h3>
                                    <p class="text-muted mb-0">Releases Approved</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4 - Releases Rejected -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                        <i data-feather="x-circle" class="text-danger" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <h3 class="mb-1"><?= $releaseCounts['rejected'] ?? 0 ?></h3>
                                    <p class="text-muted mb-0">Releases Rejected</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->

            <!-- Drafts Table -->
            <div class="row g-3 mb-3">
                <div class="col-12">
                    <div class="card h-100">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                    <i data-feather="edit" class="widgets-icons"></i>
                                </div>
                                <h5 class="card-title mb-0">Recent Drafts</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Draft Name</th>
                                            <th>Progress</th>
                                            <th>Last Modified</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($drafts)): ?>
                                            <?php foreach ($drafts as $draft): ?>
                                                <tr>
                                                    <td><?= $draft['title'] ?? 'Untitled' ?></td>
                                                    <td><?= $draft['draft_name'] ?? 'Unnamed Draft' ?></td>
                                                    <td>
                                                        <div class="progress" style="height: 6px;">
                                                            <div class="progress-bar bg-primary" role="progressbar" 
                                                                 style="width: <?= $draft['completion_percentage'] ?? 0 ?>%">
                                                            </div>
                                                        </div>
                                                        <small class="text-muted"><?= $draft['completion_percentage'] ?? 0 ?>% complete</small>
                                                    </td>
                                                    <td><?= date('M j, Y', strtotime($draft['updated_at'])) ?></td>
                                                    <td>
                                                        <a href="<?= base_url('superadmin/releases/drafts/load/' . $draft['id']) ?>" 
                                                           class="btn btn-sm btn-primary me-1">
                                                            <i data-feather="edit-3"></i> Edit
                                                        </a>
                                                        <button class="btn btn-sm btn-outline-secondary" 
                                                                onclick="deleteDraft(<?= $draft['id'] ?>)">
                                                            <i data-feather="trash-2"></i> Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center text-muted py-4">
                                                    <i data-feather="file-text" class="me-2"></i>
                                                    No drafts found. <a href="<?= base_url('superadmin/add-release') ?>">Create your first release</a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            <?php if (!empty($drafts) && count($drafts) >= 10): ?>
                                <div class="text-center mt-3">
                                    <a href="<?= base_url('superadmin/releases/drafts') ?>" class="btn btn-outline-primary">
                                        View All Drafts
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Drafts Table -->

        </div> <!-- container-xxl-->
    </div> <!-- content -->

    <?= $this->include('partials/footer') ?>
</div>

<script>
function deleteDraft(draftId) {
    if (confirm('Are you sure you want to delete this draft?')) {
        fetch(`/superadmin/releases/drafts/${draftId}`, {
            method: 'DELETE',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); // Reload the page to update the table
            } else {
                alert('Failed to delete draft: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to delete draft');
        });
    }
}
</script>
