<!DOCTYPE html>
<html>
<?php include './views/header.php' ?>
<body>
    <?php include './views/navbar.php' ?>
    <div class="container">
        <!-- Content here -->
        <!-- page header -->
        <div class="row ">
            <div class="col-12 bgImage">
                <div class="siteTitle">
                    <h1>Rent A Car</h1>
                    <h2>The Right vehicle for All Your Needs</h2>
                </div>
            </div>
        </div>
        <?php
        require_once("./controllers/CarsController.php");
        $carsController = new CarsController;
        $cars = $carsController->findAvailableCars();
        ?>
        <div class="row row-cols-1 row-cols-md-3 pt-5">
            <?php foreach ($cars as $car) { ?>
                <div class="col mb-4">
                    <div class="card bg-light">
                        <img src="<?= $car->getImage(); ?>" class="card-img-top" alt="...">
                        <div class="card-header">
                            <?= $car->getName(); ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $car->getBrand() . " " . $car->getModel(); ?></h5>
                            <p class="card-text"><?= $car->getDetail(); ?></p>
                            <p class="card-text"><?= $car->getTransmission(); ?></p>
                            <p class="card-text">
                                <?= $car->getSeat(); ?> seats
                                <?= $car->getDoor(); ?> doors
                            </p>
                        </div>
                        <div class="card-footer">
                            <h3 class="inline"> NZD<?= $car->getDaily_rate(); ?></h3>
                            <a onclick='rentModal(<?= json_encode($car); ?>)' class="btn btn-warning floatRight">BOOK NOW</a>
                        </div>
                    </div>
                </div>
            <?php }; ?>
        </div>
        <!-- END-Content -->
    </div>
    <?php include './views/rentModal.php' ?>
    <?php include './views/footer.php' ?>
</body>
</html>