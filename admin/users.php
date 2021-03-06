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

                <h2>Cars</h2>

                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Class</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Detail</th>
                                <th>Transmission</th>
                                <th>Door</th>
                                <th>Seat</th>
                                <th>Daily Rate</th>
                                <th>Available</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
                require_once(dirname(__DIR__) . "/controllers/CarsController.php");
                $carsController = new CarsController;
                $cars = $carsController->findAll();
                ?>
                            <?php foreach ($cars as $car) { ?>
                                <tr>
                                    <td><?php echo $car->getId(); ?></td>
                                    <td><?php echo $car->getName(); ?></td>
                                    <td><?php echo $car->getBrand(); ?></td>
                                    <td><?php echo $car->getModel(); ?></td>
                                    <td><?php echo $car->getDetail(); ?></td>
                                    <td><?php echo $car->getTransmission(); ?></td>
                                    <td><?php echo $car->getDoor(); ?></td>
                                    <td><?php echo $car->getSeat(); ?></td>
                                    <td><?php echo $car->getDaily_rate(); ?></td>
                                    <td><?php echo $car->getIs_available() ? "True" : "False"; ?></td>
                                    <td><?php echo $car->getIs_active() ? "True" : "False"; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
        <!-- END-Content -->
    </div>
    <?php include dirname(__DIR__) . '/views/footer.php' ?>

</body>
<script src=""></script>

</html>