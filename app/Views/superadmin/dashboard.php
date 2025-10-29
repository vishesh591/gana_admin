<div class="admin-dashboard-page content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Welcome <?= session()->get('user')['name'] ?></h4>
                </div>
                <div>
                    <a href="<?= base_url('add-release') ?>" class="btn btn-primary">
                        <i data-feather="plus" class="me-1"></i> Add New Release
                    </a>
                </div>
            </div>

            <!-- start row - Stats Cards -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="row g-3">
                        <!-- Card 2 - Releases Uploaded -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                        <i data-feather="upload" class="text-primary" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <h3 class="mb-1"><?= $releaseCounts['total'] ?? 0 ?></h3>
                                    <p class="text-muted mb-0">Total Releases</p>
                                </div>
                            </div>
                        </div>
                        <!-- Card 1 - Total Revenue -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-lg bg-light-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                        <i data-feather="edit" class="text-success" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <h3 class="mb-1"><?= $draftCount ?? '0.00' ?></h3>
                                    <p class="text-muted mb-0">Total Drafts</p>
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
                                <table class="table table-hover mb-0" id="draftsTable">
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
                                        <!-- DataTables will populate this via AJAX -->
                                    </tbody>
                                </table>
                            </div>
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
    document.addEventListener("DOMContentLoaded", function() {
        $("#draftsTable").DataTable({
            destroy: true,
            processing: true,
            serverSide: false,
            ajax: {
                url: "/releases/drafts", // Using your existing route
                type: "GET",
                dataSrc: "data", // Explicitly specify data source
                headers: {
                    'X-Requested-With': 'XMLHttpRequest' // This triggers isAJAX() in your controller
                },
                error: function(xhr, error, thrown) {
                    console.error('DataTables AJAX Error:', error, thrown);
                    console.log('Response:', xhr.responseText);
                    alert('Failed to load drafts data. Please check the console for details.');
                }
            },
            columns: [{
                    data: "title",
                    render: function(data, type, row) {
                        return data || 'Untitled';
                    }
                },
                {
                    data: "draft_name",
                    render: function(data, type, row) {
                        return data || 'Unnamed Draft';
                    }
                },
                {
                    data: "completion_percentage",
                    render: function(data, type, row) {
                        const percentage = data || 0;
                        return `
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-primary" role="progressbar" 
                                 style="width: ${percentage}%">
                            </div>
                        </div>
                        <small class="text-muted">${percentage}% complete</small>
                    `;
                    },
                    orderable: true,
                    type: 'num'
                },
                {
                    data: "updated_at",
                    render: function(data, type, row) {
                        if (!data) return 'N/A';
                        const date = new Date(data);
                        return date.toLocaleDateString('en-US', {
                            year: 'numeric',
                            month: 'short',
                            day: 'numeric'
                        });
                    },
                    type: 'date'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        if (!row.id) return 'No actions available';
                        return `
                        <div class="btn-group" role="group">
                            <a href="/releases/drafts/load/${row.id}" 
                               class="btn btn-sm btn-primary" title="Edit Draft">
                                <i data-feather="edit-3"></i> Edit
                            </a>
                            <button class="btn btn-sm btn-outline-danger delete-draft-btn" 
                                    data-draft-id="${row.id}" title="Delete Draft">
                                <i data-feather="trash-2"></i> Delete
                            </button>
                        </div>
                    `;
                    },
                    orderable: false,
                    searchable: false,
                    className: "text-center"
                }
            ],
            drawCallback: function() {
                feather.replace(); // re-render feather icons

                // Re-attach delete event listeners
                $('.delete-draft-btn').off('click').on('click', function() {
                    const draftId = $(this).data('draft-id');
                    deleteDraft(draftId);
                });
            },
            paging: true,
            searching: true,
            ordering: true,
            pageLength: 10,
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            order: [
                [3, 'desc']
            ], // Order by Last Modified desc
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search drafts...",
                emptyTable: "No drafts found. <a href='/add-release'>Create your first release</a>",
                zeroRecords: "No matching drafts found",
                info: "Showing _START_ to _END_ of _TOTAL_ drafts",
                infoEmpty: "No drafts available",
                infoFiltered: "(filtered from _MAX_ total drafts)",
                lengthMenu: "Show _MENU_ drafts per page",
                loadingRecords: "Loading drafts...",
                processing: "Processing..."
            },
            responsive: true
        });
    });

    // Delete draft function
    function deleteDraft(draftId) {
        if (confirm('Are you sure you want to delete this draft?')) {
            const btn = $(`.delete-draft-btn[data-draft-id="${draftId}"]`);
            const originalHtml = btn.html();
            btn.html('<i data-feather="loader" class="spin"></i> Deleting...').prop('disabled', true);

            fetch(`/releases/drafts/${draftId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        $('#draftsTable').DataTable().ajax.reload(null, false);
                        console.log('Draft deleted successfully');
                    } else {
                        alert('Failed to delete draft: ' + (data.error || 'Unknown error'));
                        btn.html(originalHtml).prop('disabled', false);
                        feather.replace();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to delete draft');
                    btn.html(originalHtml).prop('disabled', false);
                    feather.replace();
                });
        }
    }
</script>