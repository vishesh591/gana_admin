<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo view("partials/title-meta", array("title" => "Music Dashboard")) ?>
    <?= $this->include('partials/head-css') ?>
</head>

<?php echo view('partials/body', array("class" => false)) ?>

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

                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold m-0">Welcome Yash Rajak</h4>
                        </div>
                        <div>
                            <button class="btn btn-primary" onclick="openLabelModal()">
                                <i data-feather="plus" class="me-1"></i> Add New Release
                            </button>
                        </div>
                    </div>

                  <!-- start row - Stats Cards -->
<div class="row mb-4">
    <div class="col-12">
        <div class="row g-3">
            <!-- Card 1 - Total Revenue -->
            <div class="col-md-6 col-xl-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="avatar-lg bg-light-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i data-feather="dollar-sign" class="text-success" style="width: 24px; height: 24px;"></i>
                        </div>
                        <h3 class="mb-1">$12,450</h3>
                        <p class="text-muted mb-0">Total Revenue</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 - Releases Uploaded -->
            <div class="col-md-6 col-xl-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="avatar-lg bg-light-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i data-feather="upload" class="text-primary" style="width: 24px; height: 24px;"></i>
                        </div>
                        <h3 class="mb-1">186</h3>
                        <p class="text-muted mb-0">Releases Uploaded</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 - Releases Approved -->
            <div class="col-md-6 col-xl-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="avatar-lg bg-light-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i data-feather="check-circle" class="text-success" style="width: 24px; height: 24px;"></i>
                        </div>
                        <h3 class="mb-1">142</h3>
                        <p class="text-muted mb-0">Releases Approved</p>
                    </div>
                </div>
            </div>

            <!-- Card 4 - Releases Rejected -->
            <div class="col-md-6 col-xl-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="avatar-lg bg-light-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i data-feather="x-circle" class="text-danger" style="width: 24px; height: 24px;"></i>
                        </div>
                        <h3 class="mb-1">24</h3>
                        <p class="text-muted mb-0">Releases Rejected</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end row -->


                    <div class="row g-3 mb-3">
    <div class="col-xl-8 col-lg-7">
        <div class="card h-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                        <i data-feather="edit" class="widgets-icons"></i>
                    </div>
                    <h5 class="card-title mb-0">Drafts</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Artists</th>
                                <th>Last Modified</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Unfinished Symphony</td>
                                <td>DJ Harmony</td>
                                <td>2023-06-10</td>
                                <td>
                                    <button class="btn btn-sm btn-primary me-1">Edit</button>
                                    <button class="btn btn-sm btn-outline-secondary">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Demo Track 2023</td>
                                <td>The Beats</td>
                                <td>2023-06-05</td>
                                <td>
                                    <button class="btn btn-sm btn-primary me-1">Edit</button>
                                    <button class="btn btn-sm btn-outline-secondary">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Midnight Groove</td>
                                <td>Luna & The Stars</td>
                                <td>2023-05-28</td>
                                <td>
                                    <button class="btn btn-sm btn-primary me-1">Edit</button>
                                    <button class="btn btn-sm btn-outline-secondary">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Summer Vibes</td>
                                <td>Solar Flare</td>
                                <td>2023-05-20</td>
                                <td>
                                    <button class="btn btn-sm btn-primary me-1">Edit</button>
                                    <button class="btn btn-sm btn-outline-secondary">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Urban Dreams</td>
                                <td>City Lights</td>
                                <td>2023-05-15</td>
                                <td>
                                    <button class="btn btn-sm btn-primary me-1">Edit</button>
                                    <button class="btn btn-sm btn-outline-secondary">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5">
        <div class="card h-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                        <i data-feather="pie-chart" class="widgets-icons"></i>
                    </div>
                    <h5 class="card-title mb-0">Genre Distribution</h5>
                </div>
            </div>
            <div class="card-body">
                <div id="genre-distribution" class="apex-charts" style="min-height: 300px;"></div>
            </div>
        </div>
    </div>
</div>
                    <!-- End Analytics Charts -->

                    <!-- Start Pending Releases -->
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                                <i data-feather="clock" class="widgets-icons"></i>
                                            </div>
                                            <h5 class="card-title mb-0">Pending Releases</h5>
                                        </div>
                                        <span class="badge bg-primary rounded-pill">5 new</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Cover</th>
                                                    <th>Title</th>
                                                    <th>Artist</th>
                                                    <th>Release Date</th>
                                                    <th>Genre</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="/images/logo-sm.png" alt="album cover" class="rounded" width="40">
                                                    </td>
                                                    <td>Summer Vibes</td>
                                                    <td>DJ Sunshine</td>
                                                    <td>2023-06-15</td>
                                                    <td>Electronic</td>
                                                    <td><span class="badge bg-warning">Pending</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-success me-1">Approve</button>
                                                        <button class="btn btn-sm btn-danger">Reject</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/images/logo-sm.png" alt="album cover" class="rounded" width="40">
                                                    </td>
                                                    <td>Midnight Dreams</td>
                                                    <td>Luna</td>
                                                    <td>2023-06-18</td>
                                                    <td>R&B</td>
                                                    <td><span class="badge bg-warning">Pending</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-success me-1">Approve</button>
                                                        <button class="btn btn-sm btn-danger">Reject</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/images/logo-sm.png" alt="album cover" class="rounded" width="40">
                                                    </td>
                                                    <td>Urban Flow</td>
                                                    <td>The Streets</td>
                                                    <td>2023-06-20</td>
                                                    <td>Hip Hop</td>
                                                    <td><span class="badge bg-warning">Pending</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-success me-1">Approve</button>
                                                        <button class="btn btn-sm btn-danger">Reject</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Pending Releases -->


                </div> <!-- container-fluid -->
            </div> <!-- content -->

            <?= $this->include('partials/footer') ?>

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
<div id="labelModal" class="modal" tabindex="-1" style="display: none; background-color: rgba(0,0,0,0.6);">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content border-0 rounded-0 shadow-lg bg-white position-relative">

      <!-- Close Button -->
      <button type="button" class="btn-close position-absolute end-0 top-0 m-4 z-3" aria-label="Close" onclick="closeLabelModal()"></button>

      <div class="modal-body d-flex align-items-center justify-content-center p-5">
        <div class="w-100" style="max-width: 520px; margin: auto;">
          
          <!-- Header -->
          <h2 class="text-center fw-bold mb-4"> Create a New Album</h2>

          <!-- Dropdown: Destination Label -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Select Destination Label</label>
            <select class="form-select shadow-sm">
              <option selected disabled>Select a label</option>
              <option value="1">Dummy Records</option>
              <option value="2">Music Studio X</option>
              <option value="3">WaveTone Records</option>
              <option value="4">Night Owl Sounds</option>
            </select>
          </div>

          <!-- Submit Button -->
          <div class="text-center">
            <a class="btn btn-primary px-4 py-2 shadow-sm" href="add-release">Create</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- END wrapper -->

    <?= $this->include('partials/vendor') ?>

    <!-- Apexcharts JS -->
    <script src="/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Music Dashboard Charts Init -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Total Revenue Chart
            var revenueOptions = {
                series: [{
                    name: "Revenue",
                    data: [10, 15, 12, 18, 20, 25, 22]
                }],
                chart: {
                    height: 60,
                    type: 'area',
                    sparkline: {
                        enabled: true
                    },
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#3b76e1'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        inverseColors: false,
                        opacityFrom: 0.45,
                        opacityTo: 0.05,
                        stops: [20, 100, 100, 100]
                    },
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                tooltip: {
                    fixed: {
                        enabled: false
                    },
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function(seriesName) {
                                return ''
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                }
            };
            var revenueChart = new ApexCharts(document.querySelector("#total-revenue"), revenueOptions);
            revenueChart.render();

            // Monthly Revenue Chart
            var monthlyRevenueOptions = {
                series: [{
                    name: "Revenue",
                    data: [1250, 1800, 2100, 1750, 2500, 3100, 2950, 3200, 2800, 3500, 4200, 4800]
                }],
                chart: {
                    height: 350,
                    type: 'area',
                    toolbar: {
                        show: true
                    },
                },
                colors: ['#3b76e1'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        inverseColors: false,
                        opacityFrom: 0.45,
                        opacityTo: 0.05,
                        stops: [20, 100, 100, 100]
                    },
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return "$" + val
                        }
                    }
                }
            };
            var monthlyRevenueChart = new ApexCharts(document.querySelector("#monthly-revenue"), monthlyRevenueOptions);
            monthlyRevenueChart.render();

            // Genre Distribution Chart
            var genreOptions = {
                series: [25, 20, 30, 25,],
                chart: {
                    height: 320,
                    type: 'donut',
                },
                labels: ["Uploaded", "Approved", "Rejected", "Pending"],
                colors: ['#3b76e1', '#90EE90', '#ff6b35','#ffbe0b'],
                legend: {
                    position: 'bottom'
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%'
                        }
                    }
                }
            };
            var genreChart = new ApexCharts(document.querySelector("#genre-distribution"), genreOptions);
            genreChart.render();

            // Uploads vs Approvals Chart
            var uploadsOptions = {
                series: [{
                    name: 'Uploaded',
                    data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
                }, {
                    name: 'Approved',
                    data: [25, 32, 30, 42, 40, 52, 60, 78, 110]
                }],
                chart: {
                    height: 300,
                    type: 'bar',
                    toolbar: {
                        show: true
                    }
                },
                colors: ['#3b76e1', '#10c469'],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                },
                yaxis: {
                    title: {
                        text: 'Number of Releases'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " releases"
                        }
                    }
                }
            };
            var uploadsChart = new ApexCharts(document.querySelector("#uploads-approvals"), uploadsOptions);
            uploadsChart.render();
        });
    </script>

    <!-- App js-->
    <script src="/js/app.js"></script>
<script>
  function openLabelModal() {
    document.getElementById('labelModal').style.display = 'block';
  }

  function closeLabelModal() {
    document.getElementById('labelModal').style.display = 'none';
  }
</script>

</body>


</html>