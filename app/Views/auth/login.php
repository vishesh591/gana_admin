<!DOCTYPE html>
<html lang="en">

<head>

    <?php echo view('partials/title-meta', array('title' =>  'Log In')) ?>

    <?= $this->include('partials/head-css') ?>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


</head>

<body class="bg-white">
    <!-- Begin page -->
    <div class="account-page">
        <div class="container-fluid p-0">
            <div class="row align-items-center g-0">
                <div class="col-xl-5">
                    <div class="row">
                        <div class="col-md-7 mx-auto">
                            <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">
                                <div class="mb-4 p-0">
                                    <a href="#" class="auth-logo">
                                        <img src="/images/gaana-logo.png" alt="logo-dark" class="mx-auto" width="200" />
                                    </a>
                                </div>

                                <div class="pt-0">
                                    <form method="POST" action="<?= base_url('loginCheck') ?>" class="my-4">

                                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                                        <?php endif; ?>

                                        <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                                        <?php endif; ?>

                                        <?= csrf_field() ?>

                                        <div class="form-group mb-3">
                                            <label for="emailaddress" class="form-label">Email address</label>
                                            <input class="form-control" type="email" id="emailaddress" name="email"
                                                value="<?= old('email') ?>" required placeholder="Enter your email">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group">
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    id="password"
                                                    name="password"
                                                    required
                                                    placeholder="Enter your password"
                                                    style="border-right: none;">
                                                <button
                                                    class="btn btn-outline-secondary"
                                                    type="button"
                                                    id="togglePassword"
                                                    style="border-left: none;">
                                                    <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                                </button>

                                            </div>
                                        </div>

                                        <div class="form-group d-flex mb-3">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember">
                                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-end">
                                                <a class="text-muted fs-14" href="<?= base_url('forgot-password') ?>">Forgot password?</a>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary" type="submit"> Log In </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7">
                    <div class="account-page-bg p-md-5 p-4">
                        <div class="text-center">
                            <h3 class="text-dark mb-3 pera-title">Manage Your Music Releases with Ease and Precision</h3>
                            <div class="auth-image">
                                <img src="/images/authentication.svg" class="mx-auto img-fluid" alt="images">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END wrapper -->

    <!-- App js-->
    <?= $this->include('partials/vendor') ?>

</body>

</html>