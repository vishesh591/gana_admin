<!DOCTYPE html>
<html lang="en">
    <head>
        
        <?php echo view("partials/title-meta", array("title" => "General UI")) ?>

        <?= $this->include('partials/head-css') ?>

    </head>

    <?= $this->include('partials/body') ?>

        <!-- Begin page -->
        <div id="app-layout">


            <?= $this->include('partials/topbar') ?>

            <?= $this->include('partials/sidebar') ?>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
        
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">General UI</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Components</a></li>
                                    <li class="breadcrumb-item active">General UI</li>
                                </ol>
                            </div>
                        </div>
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <?= $this->include('partials/footer') ?>

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <?= $this->include('partials/vendor') ?>

        <!-- App js-->
        <script src="/js/app.js"></script>
        
    </body>
</html>