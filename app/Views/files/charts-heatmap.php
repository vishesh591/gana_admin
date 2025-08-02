<!DOCTYPE html>
<html lang="en">
    <head>

        <?php echo view("partials/title-meta", array("title" => "Heatmap Charts")) ?>

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
                                <h4 class="fs-18 fw-semibold m-0">Heatmap Charts</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Charts</a></li>
                                    <li class="breadcrumb-item active">Heatmap Charts</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Scatter Charts -->
                        <div class="row">
                            <!-- Basic Scatter Charts -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Basic Heatmap Charts</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="basic_heatmap_chart" class="apex-charts"></div> 
                                    </div>
                                </div>  
                            </div>

                            <!-- Multiple Colors Charts -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Multiple Colors Chart</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="multiple_color_chart" class="apex-charts"></div> 
                                    </div>
                                </div>  
                            </div>

                            <!-- Color Range Charts -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Range Colors Chart</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="range_colors_chart" class="apex-charts"></div> 
                                    </div>
                                </div>  
                            </div>

                            <!-- Rounded Colors Charts -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Rounded Colors Chart</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="rounded_colors_chart" class="apex-charts"></div> 
                                    </div>
                                </div>  
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

        <!-- Apexcharts JS -->
        <script src="/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Boxplot Charts Init Js -->
        <script src="/js/pages/apexcharts-heatmap.init.js"></script>

        <!-- App js-->
        <script src="/js/app.js"></script>
        
    </body>
</html>