<!DOCTYPE html>
<html lang="en">
    <head>
        
        <?php echo view("partials/title-meta", array("title" => "Offline Page")) ?>

        <?= $this->include('partials/head-css') ?>

    </head>

    <body class="bg-white">

        <!-- Begin page -->
        <div class="maintenance-pages">
            <div class="container">
                
                <div class="row justify-content-center">
                    <div class="col-lg-12">

                        <div class="text-center">
                            <div class="mb-4 text-center">
                                <a href="/" class="auth-logo">
                                    <img src="/images/logo-dark.png" alt="logo-dark" class="mx-auto" height="28"/>
                                </a>
                            </div>
    
                            <div class="coming-soon-img">
                                <img src="/images/svg/offline.svg" class="img-fluid" alt="coming-soon">
                            </div>
                            
                            <div class="text-center">
                                <h3 class="mt-4 fw-semibold text-black text-capitalize">You are offline</h3>
                                <p class="text-muted">Internet connection is lost. Try checking the <br> signal and refresh the screen later.</p>
                            </div>

                            <a class="btn btn-primary mt-3 me-1" href="/">Back to Home</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END wrapper -->

        <?= $this->include('partials/vendor') ?>

        <!-- App js-->
        <script src="/js/app.js"></script>
        
    </body>
</html>