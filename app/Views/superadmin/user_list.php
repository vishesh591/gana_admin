<div class="admin-account-page content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                <h2 class="fs-50 fw-bold m-0 page-title text-black ">Account</h2>
                <div class="col-auto d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" id="exportCsvBtn">
                        <i class="bi bi-download me-1"></i> Export to CSV
                    </button>
                    <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#claimingRequestModal">
                        <i class="bi bi-plus-lg me-1"></i>Create New Account
                    </button>
                </div>
            </div>

            <div class="card shadow-sm mt-4 p-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="claimingTable">
                            <thead>
                                <tr>
                                    <th width="50"></th>
                                    <th>Primary Label Name</th>
                                    <th>Label Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
                <!-- <div class="card-footer bg-white d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
                    <div class="mb-2 mb-md-0" id="pagination-text">
                        Showing <strong>1</strong> to <strong>5</strong> of <strong>5</strong> entries
                    </div>
                    <nav>
                        <ul class="pagination mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="claimingRequestModal" tabindex="-1" aria-labelledby="claimingRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content rounded-4">

            <form action="<?= base_url('superadmin/register') ?>" method="POST" enctype="multipart/form-data" id="claimingRequestForm">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="claimingRequestModalLabel">New Account Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">

                    <!-- Basic Information -->
                    <h6 class="text-primary fw-bold mb-3">Basic Information</h6>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="basicName" class="form-label">Name</label>
                            <input
                                type="text"
                                class="form-control rounded-pill p-3"
                                id="basicName"
                                name="name"
                                placeholder="Enter full name"
                                pattern="^[A-Za-z\s]+$"
                                oninput="this.value = this.value.replace(/[0-9]/g, '')"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="companyName" class="form-label">Company Name</label>
                            <input type="text" class="form-control rounded-pill p-3" id="companyName" name="company_name" placeholder="Enter company name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="labelName" class="form-label">Primary Label Name</label>
                            <input type="text" class="form-control rounded-pill p-3" id="labelName" name="primary_label_name" placeholder="Enter label name">
                        </div>
                        <!-- <div class="col-md-12 mb-3">
                            <label for="profileImage" class="form-label">Profile Image</label>
                            <input
                                type="file"
                                class="form-control p-2 rounded-pill"
                                id="profileImage"
                                name="profile_image"
                                accept="image/*">
                            <div class="form-text">Upload JPG, PNG, or GIF (Max size 1MB).</div>
                        </div> -->

                        <div class="col-md-6 mb-3">
                            <label for="emailId" class="form-label">Email Id</label>
                            <input type="email" class="form-control rounded-pill p-3" id="emailId" name="email" placeholder="example@email.com" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input
                                type="tel"
                                class="form-control rounded-pill p-3"
                                id="phoneNumber"
                                name="phone"
                                placeholder="e.g. 9876543210"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,15)"
                                required>
                            <div class="invalid-feedback">
                                Please enter a valid phone number (digits only).
                            </div>
                        </div>



                        <div class="col-12 mb-4">
                            <label class="form-label mb-2">Which describes you best?</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="typeArtist" value="artist" checked>
                                    <label class="form-check-label" for="typeArtist">Artist</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="typeLabel" value="label">
                                    <label class="form-check-label" for="typeLabel">Label</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="typeDistributor" value="distributor">
                                    <label class="form-check-label" for="typeDistributor">Distributor</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Login Credentials -->
                    <h6 class="text-primary fw-bold mb-3">Login Credentials</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control rounded-pill p-3" id="username" name="user_name" placeholder="Create a username" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input
                                    type="password"
                                    class="form-control rounded-start-pill p-3"
                                    id="password"
                                    name="password"
                                    placeholder="Create a password"
                                    required
                                    style="border-right: none;">
                                <button
                                    class="btn btn-outline-secondary rounded-end-pill"
                                    type="button"
                                    id="togglePassword"
                                    style="border-left: none;">
                                    <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Bank Details -->
                    <h6 class="text-primary fw-bold mb-3 pt-2">Bank Details</h6>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="accountHolderName" class="form-label">Account Holder Name</label>
                            <input type="text" class="form-control rounded-pill p-3" id="accountHolderName" name="holder_name" placeholder="Enter name as per bank records" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="accountNumber" class="form-label">Account Number</label>
                            <input type="number" class="form-control rounded-pill p-3" id="accountNumber" name="account_number" placeholder="Enter bank account number" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ifscCode" class="form-label">IFSC Code</label>
                            <input type="text" class="form-control rounded-pill p-3" id="ifscCode" name="ifsc_code" placeholder="Enter IFSC code" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="branchName" class="form-label">Branch Name</label>
                            <input type="text" class="form-control rounded-pill p-3" id="branchName" name="branch_name" placeholder="Enter bank branch name" required>
                        </div>
                    </div>

                    <!-- Agreement Period -->
                    <h6 class="text-primary fw-bold mb-3 pt-2">Agreement Period</h6>
                    <div class="row">
                        <!-- Agreement Start Date -->
                        <div class="col-md-6 mb-3">
                            <label for="startDate" class="form-label">Agreement Start Date</label>
                            <input type="date" class="form-control rounded-pill p-3" id="startDate" name="agreement_start_date" required>
                            <div class="invalid-feedback" id="startDateFeedback">Start date must be before end date.</div>
                        </div>

                        <!-- Agreement End Date -->
                        <div class="col-md-6 mb-3">
                            <label for="endDate" class="form-label">Agreement End Date</label>
                            <input type="date" class="form-control rounded-pill p-3" id="endDate" name="agreement_end_date" required>
                            <div class="invalid-feedback" id="endDateFeedback">End date must be after start date.</div>
                        </div>
                    </div>

                    <!-- Upload Agreement (optional) -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="agreementFile" class="form-label">Upload Agreement (if any)</label>
                            <div class="input-group">
                                <input
                                    type="file"
                                    class="form-control rounded-pill p-3"
                                    id="agreementFile"
                                    name="agreement_file"
                                    accept=".pdf,.doc,.docx,.jpg,.png">
                            </div>
                            <small class="form-text text-muted">Allowed formats: PDF, DOC, DOCX, JPG, PNG</small>
                        </div>
                    </div>

                </div>
                <div id="labelAlertBox" class="mt-2 w-100"></div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary rounded-pill">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>