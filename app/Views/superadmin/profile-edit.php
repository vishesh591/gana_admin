<div class="content-page">
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">User Profile</h4>
                </div>
                <div class="text-end">
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-success" onclick="saveUserProfile()">
                            <i class="bi bi-check-circle"></i> Save All Changes
                        </button>
                        <a href="<?= base_url('accounts') ?>" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back to Accounts
                        </a>
                    </div>
                </div>
            </div>

            <!-- Messages -->
            <div id="profileAlert"></div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="align-items-center">
                                <div class="d-flex align-items-center">
                                    <div id="initialsAvatar" class="rounded-circle avatar-xxl img-thumbnail float-start d-flex align-items-center justify-content-center" style="background-color: #007bff; color: white; font-weight: 600; font-size: 2rem; min-width: 80px; height: 80px;">
                                        VM
                                    </div>
                                    <div class="overflow-hidden ms-4">
                                        <h4 class="m-0 text-dark fs-20"><?= esc($user['name']) ?></h4>
                                        <p class="my-1 text-muted fs-16"><?= esc($user['user_name']) ?></p>
                                        <span class="badge bg-primary">Admin Edit Mode</span>
                                    </div>
                                </div>
                            </div>

                            <ul class="nav nav-underline border-bottom pt-2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active p-2" data-bs-toggle="tab" href="#basic_info" role="tab">
                                        <span class="d-none d-sm-block">Basic Information</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-2" data-bs-toggle="tab" href="#login_credentials" role="tab">
                                        <span class="d-none d-sm-block">Login Credentials</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-2" data-bs-toggle="tab" href="#bank_details" role="tab">
                                        <span class="d-none d-sm-block">Bank Details</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-2" data-bs-toggle="tab" href="#agreement_period" role="tab">
                                        <span class="d-none d-sm-block">Agreement Period</span>
                                    </a>
                                </li>
                            </ul>

                            <form id="userProfileForm">
                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">

                                <div class="tab-content text-muted bg-white">
                                    <!-- Basic Information Tab -->
                                    <div class="tab-pane active show pt-4" id="basic_info">
                                        <h5 class="fs-16 text-dark fw-semibold mb-3">Basic Information</h5>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" class="form-control" name="name" value="<?= esc($user['name']) ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Company Name</label>
                                                <input type="text" class="form-control" name="company_name" value="<?= esc($user['company_name']) ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Primary Label Name</label>
                                                <input type="text" class="form-control" name="primary_label_name" value="<?= esc($user['primary_label_name']) ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Email Address</label>
                                                <input type="email" class="form-control" name="email" value="<?= esc($user['email']) ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" name="phone" value="<?= esc($user['phone']) ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Role</label>
                                                <input type="text" class="form-control" value="<?= esc($user['role_name']) ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Login Credentials Tab -->
                                    <div class="tab-pane pt-4" id="login_credentials">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card border">
                                                    <div class="card-header">
                                                        <h4 class="card-title mb-0">Login Information</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <label class="form-label">Username</label>
                                                        <input class="form-control" type="text" value="<?= esc($user['user_name']) ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="card border">
                                                    <div class="card-header">
                                                        <h4 class="card-title mb-0">Reset Password</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div id="passwordAlert"></div>

                                                        <div class="mb-3">
                                                            <label class="form-label">New Password</label>
                                                            <input class="form-control" id="newPassword" type="password" placeholder="New Password">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Confirm Password</label>
                                                            <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm Password">
                                                        </div>

                                                        <button type="button" onclick="resetPassword()" class="btn btn-primary">Reset Password</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Bank Details Tab -->
                                    <div class="tab-pane pt-4" id="bank_details">
                                        <h5 class="fs-16 text-dark fw-semibold mb-3">Bank Details</h5>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Account Holder Name</label>
                                                <input type="text" class="form-control" name="holder_name" value="<?= esc($user['holder_name']) ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Account Number</label>
                                                <input type="text" class="form-control" name="account_number" value="<?= esc($user['account_number']) ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Bank Name</label>
                                                <input type="text" class="form-control" name="bank_name" value="<?= esc($user['bank_name']) ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">IFSC Code</label>
                                                <input type="text" class="form-control" name="ifsc_code" value="<?= esc($user['ifsc_code']) ?>">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Branch Name</label>
                                                <input type="text" class="form-control" name="branch_name" value="<?= esc($user['branch_name']) ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Agreement Period Tab -->
                                    <div class="tab-pane pt-4" id="agreement_period">
                                        <h5 class="fs-16 text-dark fw-semibold mb-3">Agreement Period</h5>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Agreement Start Date</label>
                                                <input type="date" class="form-control" name="agreement_start_date" value="<?= esc($user['agreement_start_date']) ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Agreement End Date</label>
                                                <input type="date" class="form-control" name="agreement_end_date" value="<?= esc($user['agreement_end_date']) ?>">
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <div class="card border">
                                                <div class="card-body">
                                                    <h6 class="mb-3">Agreement Status</h6>
                                                    <?php
                                                    $isActive = false;
                                                    $today = date('Y-m-d');
                                                    if (!empty($user['agreement_start_date']) && !empty($user['agreement_end_date'])) {
                                                        $isActive = ($today >= $user['agreement_start_date'] && $today <= $user['agreement_end_date']);
                                                    }
                                                    ?>

                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Agreement Status</label>
                                                            <select class="form-select" name="status" id="agreement_status" required>
                                                                <option value="">-- Select Status --</option>
                                                                <option value="active" <?= $isActive ? 'selected' : '' ?>>Active</option>
                                                                <option value="inactive" <?= !$isActive ? 'selected' : '' ?>>Inactive</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6 mb-3 d-flex align-items-center">
                                                            <div>
                                                                <p class="mb-1">
                                                                    Current Status:
                                                                    <span class="badge <?= $isActive ? 'bg-success' : 'bg-danger' ?>">
                                                                        <?= $isActive ? 'Active' : 'Inactive' ?>
                                                                    </span>
                                                                </p>
                                                                <p class="mb-0 text-muted">
                                                                    Duration: <?= esc($user['agreement_start_date']) ?> → <?= esc($user['agreement_end_date']) ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <?php if (!empty($user['agreement_document'])): ?>
                                                            <a href="<?= base_url($user['agreement_document']) ?>" class="btn btn-outline-primary btn-sm" target="_blank">
                                                                View Agreement
                                                            </a>
                                                        <?php else: ?>
                                                            <span class="text-muted">No Document</span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('partials/footer') ?>
</div>


<script>
    // Simple, clean JavaScript - no jQuery conflicts
    function generateInitialsAvatar(fullName, targetElementId = 'initialsAvatar') {
        // Extract initials from full name
        function getInitials(name) {
            if (!name) return 'U'; // Default for empty name

            const names = name.trim().split(' ');
            if (names.length === 1) {
                return names[0].charAt(0).toUpperCase();
            } else if (names.length >= 2) {
                return (names[0].charAt(0) + names[names.length - 1].charAt(0)).toUpperCase();
            }
            return 'U';
        }

        // Generate background color based on name
        function getColorFromName(name) {
            const colors = [
                '#007bff', '#6f42c1', '#e83e8c', '#dc3545', '#fd7e14',
                '#ffc107', '#28a745', '#20c997', '#17a2b8', '#6c757d',
                '#343a40', '#f8f9fa', '#e9ecef', '#dee2e6', '#ced4da'
            ];

            let hash = 0;
            for (let i = 0; i < name.length; i++) {
                hash = name.charCodeAt(i) + ((hash << 5) - hash);
            }

            return colors[Math.abs(hash) % colors.length];
        }

        // Get contrasting text color
        function getContrastColor(backgroundColor) {
            // Convert hex to RGB
            const hex = backgroundColor.replace('#', '');
            const r = parseInt(hex.substr(0, 2), 16);
            const g = parseInt(hex.substr(2, 2), 16);
            const b = parseInt(hex.substr(4, 2), 16);

            // Calculate brightness
            const brightness = ((r * 299) + (g * 587) + (b * 114)) / 1000;
            return brightness > 155 ? '#000000' : '#ffffff';
        }

        const initials = getInitials(fullName);
        const backgroundColor = getColorFromName(fullName);
        const textColor = getContrastColor(backgroundColor);

        const avatarElement = document.getElementById(targetElementId);
        if (avatarElement) {
            avatarElement.textContent = initials;
            avatarElement.style.backgroundColor = backgroundColor;
            avatarElement.style.color = textColor;
        }

        return {
            initials,
            backgroundColor,
            textColor
        };
    }

    // Initialize avatar when page loads
    document.addEventListener('DOMContentLoaded', function() {
        const userName = "<?= esc($user['name']) ?>";
        generateInitialsAvatar(userName);

        // Your existing code...
    });

    // Your existing functions remain the same...
    function saveUserProfile() {
        const form = document.getElementById('userProfileForm');
        const formData = new FormData(form);

        // Show loading
        const saveBtn = event.target;
        const originalText = saveBtn.innerHTML;
        saveBtn.innerHTML = '<i class="spinner-border spinner-border-sm me-1"></i> Saving...';
        saveBtn.disabled = true;

        fetch('/users/update-profile', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    showAlert('success', data.message || 'Profile updated successfully!');
                    window.location.reload();
                    // Update avatar if name changed
                    const newName = formData.get('name');
                    if (newName) {
                        generateInitialsAvatar(newName);
                    }
                } else {
                    showAlert('error', data.message || 'Failed to update profile');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('error', 'Failed to update profile');
            })
            .finally(() => {
                saveBtn.innerHTML = originalText;
                saveBtn.disabled = false;
            });
    }


    function resetPassword() {
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const userId = document.querySelector('input[name="user_id"]').value;

        if (!newPassword || !confirmPassword) {
            showPasswordAlert('error', 'Please fill in both password fields');
            return;
        }

        if (newPassword !== confirmPassword) {
            showPasswordAlert('error', 'Passwords do not match');
            return;
        }

        if (newPassword.length < 6) {
            showPasswordAlert('error', 'Password must be at least 6 characters long');
            return;
        }

        fetch('/users/reset-password', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    user_id: userId,
                    new_password: newPassword,
                    confirm_password: confirmPassword
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    showPasswordAlert('success', data.message || 'Password reset successfully');
                    document.getElementById('newPassword').value = '';
                    document.getElementById('confirmPassword').value = '';
                } else {
                    showPasswordAlert('error', data.message || 'Failed to reset password');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showPasswordAlert('error', 'Failed to reset password');
            });
    }

    function showAlert(type, message) {
        const alertDiv = document.getElementById('profileAlert');
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const icon = type === 'success' ? 'check-circle' : 'x-circle';

        alertDiv.innerHTML = `
        <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
            <i class="bi bi-${icon} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `;

        if (type === 'success') {
            setTimeout(() => {
                const alert = alertDiv.querySelector('.alert');
                if (alert) alert.remove();
            }, 3000);
        }
    }

    function showPasswordAlert(type, message) {
        const alertDiv = document.getElementById('passwordAlert');
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';

        alertDiv.innerHTML = `<div class="alert ${alertClass}">${message}</div>`;

        setTimeout(() => {
            alertDiv.innerHTML = '';
        }, 3000);
    }
</script>