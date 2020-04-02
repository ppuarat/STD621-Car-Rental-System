<!DOCTYPE html>
<html>

<?php include './views/header.php' ?>

<body>

    <?php include './views/navbar.php' ?>

    <div class="container">
        <!-- Content here -->
        <!-- page header -->


            <div class = "d-flex justify-content-center border_si">
                    <form method="POST" action="" style="padding : 15% 35% 20%" >
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"><br>
                        <div class = "container text-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <button type="submit" class="btn btn-primary">Forgot password</button><br><br>
                    </div>  
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include './views/footer.php' ?>
    <?php include './views/rentModal.php' ?>

</body>
<script src=""></script>

</html>