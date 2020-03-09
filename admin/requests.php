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

                <h2>Rental Requests</h2>

                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
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
                        <tbody>
                            <?php
                            require_once(dirname(__DIR__) . "/controllers/RentalController.php");
                            $rentalController = new RentalController;
                            $requests = $rentalController->findWaiting();
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
                                        <td><?= $row['cars.id'] ?></td>
                                        <td><?= $row['rent_from_date'] ?></td>
                                        <td><?= $row['rent_end_date'] ?></td>
                                        <td><?= $row['fk_customer_id'] ?></td>
                                        <td><?= $row['total_price'] ?></td>
                                        <td>Waiting</td>
                                        <td>
                                            <textarea name="description" id="description">
                                              <?= $row['description'] ?>
                                            </textarea>
                                            <br>
                                            <button type="button" class="btn btn-success btn-sm"> Approve</button>
                                            <button type="button" class="btn btn-danger btn-sm"> Reject</button>
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