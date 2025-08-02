<!DOCTYPE html>
<html lang="en">
    <head>

        <?php echo view("partials/title-meta", array("title" => "Maintenance")) ?>

        <?= $this->include('partials/head-css') ?>

    </head>

    <body class="bg-white">
        <!-- Begin page -->
        <div class="maintenance-pages">
            <div class="container">
                
                <div class="row justify-content-center align-items-center">
                    <div class="mb-4 text-center">
                        <a href="/" class="auth-logo">
                            <img src="/images/logo-dark.png" alt="logo-dark" class="mx-auto" height="28" />
                        </a>
                    </div>
                </div>

                <div class="row justify-content-center align-items-center">

                    <div class="col-md-6">
                        <div class="coming-soon-img text-center">
                            <img src="/images/svg/maintenance-1.svg" class="img-fluid" alt="maintenance-image">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="text-center">

                            <h3 class="mt-4 fw-semibold text-black text-capitalize fs-26">Our website is currently under construction.</h3>
                            <p class="text-muted mt-3 mb-4">We sincerely apologize for the inconvenience <br>
                                Our site currently undergoing scheduled maintenance and upgrades, but will return shortly.</p>
                            
                            <h5 class="fs-14 text-stat">Don’t want to miss update? Subscribe now</h5>
                            
                            <div class="row d-flex my-4 align-items-center justify-content-center">
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="example@gmail.com">
                                </div>
                                <div class="col-auto">
                                    <div class="d-grid sm:mt-2">
                                        <button class="btn btn-primary d-flex align-items-center">
                                            <i class="mdi mdi-bell-ring-outline me-2"></i>Notify Me
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <?= $this->include('partials/vendor') ?>

        <!-- App js-->
        <script src="/js/app.js"></script>
        
    </body>
</html>