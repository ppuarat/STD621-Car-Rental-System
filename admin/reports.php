<!DOCTYPE html>
<html>

<?php include dirname(__DIR__) . '/views/header.php' ?>
<link href="./css/dashboard.css" rel="stylesheet">

<body>
    <?php include dirname(__DIR__) . '/views/navbar.php' ?>
    <div class="container-fluid">
        <div class="row">
            <?php include dirname(__DIR__) . '/admin/adminSideMenu.php' ?>



            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


                <div class="row pb-3">
                    <div class="col-12">
                        <h2>Reports</h2>
                        <hr/>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12">
                        <h5>Most Rented Cars</h5>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-12">
                        <div id="mostRentedCars" style="width:100%;height:100%;"></div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-12">
                        <h5>Available Cars</h5>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-12">
                        <div id="availableCars" style="width:100%;height:100%;"></div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-12">
                        <h5>Performance</h5>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-12">
                        <div id="performance" style="width:100%;height:100%;"></div>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-12">
                        <div id="performance2" style="width:100%;height:100%;"></div>
                    </div>
                </div>

            </main>
        </div>
        <!-- END-Content -->
    </div>
    <?php include dirname(__DIR__) . '/views/footer.php' ?>

</body>

<script>
    <?php
    require_once(dirname(__DIR__) . "/controllers/ReportController.php");
    $reportCon = new ReportController();
    $mostRentedCarsReport = $reportCon->findMostRentedCars();
    $availableCarsReport = $reportCon->findAvailableCar();
    $rentPerformanceReport = $reportCon->findRentalPerformance();
    ?>

    var mostRentedCars = <?= json_encode($mostRentedCarsReport) ?>;
    var availableCars = <?= json_encode($availableCarsReport) ?>;
    var rentPerformance = <?= json_encode($rentPerformanceReport) ?>;
</script>
<script src="<?= SCRIPT_ROOT ?>/admin/report.js"></script>

</html>