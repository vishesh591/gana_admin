<!DOCTYPE html>
<html lang="en">

    <head>

        <?php echo view("partials/title-meta", array("title" => "Coming Soon")) ?>

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
                            <img src="/images/svg/coming-soon.svg" class="img-fluid" alt="coming-soon">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="text-center">

                            <div class="">
                                <h3 class="mt-4 fw-semibold text-black text-capitalize fs-26">Our website is developing. It will be very soon</h3>
                                <p class="text-muted">Get ready, we are under process of creating something really cool, <br> Our website will be available soon.</p>
                            </div>

                            <div class="row justify-content-center mt-5 mb-5">
                                <div class="col-md-8 text-center">
                                    <div data-countdown="2026/12/31" class="counter-number"></div>
                                </div> <!-- end col-->
                            </div> <!-- end row-->

                            <div class="row d-flex my-4 align-items-center justify-content-center">
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email Address">
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

        <!-- Plugins js-->
        <script src="/libs/jquery-countdown/jquery.countdown.min.js"></script>

        <!-- Countdown js -->
        <script src="/js/pages/coming-soon.init.js"></script>

        <!-- App js-->
        <script src="/js/app.js"></script>

    </body>

</html>