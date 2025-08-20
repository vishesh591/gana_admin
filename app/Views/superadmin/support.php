<div class="admin-support-dashboard content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h2 class="fs-50 fw-bold m-0 page-title text-black">Support Center</h2>
                <div class="col-auto d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                        <i class="bi bi-download me-1"></i> Export to CSV
                    </button>
                </div>
            </div>

            <div class="card shadow-sm mt-4 p-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th width="50">ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#101</td>
                                    <td>John Doe</td>
                                    <td>john@example.com</td>
                                    <td>Login Issue</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>2025-08-18</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary rounded-pill px-3">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#102</td>
                                    <td>Jane Smith</td>
                                    <td>jane@example.com</td>
                                    <td>Password Reset</td>
                                    <td><span class="badge bg-success">Resolved</span></td>
                                    <td>2025-08-17</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary rounded-pill px-3">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>