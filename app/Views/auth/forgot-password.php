<!DOCTYPE html>
<html lang="en">

<head>

    <?php echo view('partials/title-meta', array('title' =>  'Forgot Password | Gaana Distribution')) ?>

    <?= $this->include('partials/head-css') ?>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>

<body>
    <div class="forgot-password-page">
        <div class="forgot-card">
            <i class="bi bi-lock-fill icon"></i>
            <h4>Forgot Your Password?</h4>
            <p>
                For security reasons, password resets can only be done by the administrator.<br>
                Please contact your system admin to reset your password.
            </p>

            <div class="contact-info mb-4">
                <p class="mb-2">
                    <i class="bi bi-telephone-fill"></i>
                    <strong>Admin Contact:</strong> +91 81044 52388
                </p>
                <p class="mb-0">
                    <i class="bi bi-envelope-fill"></i>
                    <strong>Email:</strong> support@gaanadistribution.in
                </p>
            </div>

            <a href="/login" class="btn btn-primary rounded-pill px-4">
                <i class="bi bi-arrow-left me-2"></i> Back to Login
            </a>
        </div>
    </div>

    <!-- END wrapper -->

    <!-- App js-->
    <?= $this->include('partials/vendor') ?>
</body>

</html>