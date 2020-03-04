<!DOCTYPE html>
<html>

<?php include './views/header.php' ?>

<body>
    <div class="container">
        <?php include './views/navbar.php' ?>
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
                <div class="col  mb-4">
                    <div class="card bg-light">
                        <img src="./views/img/cars/honda-jazz.png" class="card-img-top" alt="...">
                        <div class="card-header">
                            <?php echo $car->getName(); ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $car->getBrand() . " " . $car->getModel(); ?></h5>
                            <p class="card-text"><?php echo $car->getDetail(); ?></p>
                            <p class="card-text"><?php echo $car->getTransmission(); ?></p>
                            <p class="card-text">
                                <?php echo $car->getSeat(); ?> seats
                                <?php echo $car->getDoor(); ?> doors
                            </p>

                        </div>
                        <div class="card-footer">
                            <h3 class="inline"> NZD<?php echo $car->getDaily_rate(); ?></h3>
                            <a href="#" class="btn btn-warning floatRight">BOOK NOW</a>
                        </div>
                    </div>
                </div>
            <?php }; ?>

        </div>

        <!-- END-Content -->
        <?php include './views/footer.php' ?>
    </div>


</body>
<script src=""></script>

</html>