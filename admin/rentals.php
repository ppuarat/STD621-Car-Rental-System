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

                <h2>Rentals</h2>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Car Detail</th>
                                <th>Rent From Date</th>
                                <th>Rent To Date</th>
                                <th>Customer Detail</th>
                                <th>Total Price</th>
                                <th>Aprroval Status</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody class="pointer">
                            <?php
                            require_once(dirname(__DIR__) . "/controllers/RentalController.php");
                            $rentalController = new RentalController;
                            $requests = $rentalController->findAll();

                            ?>
                            <?php if ($requests->num_rows <= 0) { ?>
                                <tr>
                                    <td colspan="8">
                                        No waiting request
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <?php while ($row = $requests->fetch_array()) { ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['car_detail'] ?></td>
                                        <td><?= $row['rent_from_date'] ?></td>
                                        <td><?= $row['rent_end_date'] ?></td>
                                        <td><?= $row['customer_detail'] ?></td>
                                        <td><?= $row['total_price'] ?></td>
                                        <td><?= $row['is_approve'] ? "Approved" : "Rejected" ?></td>
                                        <td>
                                            <?= $row['description'] ?>
                                        </td>
                                    </tr>
                            <?php } //end loop
                            } //end else 
                            ?>
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