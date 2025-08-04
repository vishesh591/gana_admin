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

    <?= $this->include('superadmin/' . $file_name) ?>

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
            series: [25, 20, 30, 25, ],
            chart: {
                height: 320,
                type: 'donut',
            },
            labels: ["Uploaded", "Approved", "Rejected", "Pending"],
            colors: ['#3b76e1', '#90EE90', '#ff6b35', '#ffbe0b'],
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
</body>

</html>