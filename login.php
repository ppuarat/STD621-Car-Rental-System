<?php

session_start();

}

	include 'models/MySQLConnection.php';
	include 'models/User.php';
    include 'controllers/UserController.php';

    $conn_obj = new MySQLConnection;
    $conn = $conn_obj->getConnection();

    $email = "";
    $password = "";


    //Extract or grab the data from the form
    // and store those values in these two variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userDao = new UserDao();
    // username and password sent from form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $userController->find($email);

    // If user with such username does not exist or
    // has different password
    if (!$user || $user->getPassword() !== $password) {
        $error = "Invalid credentials";
    } else {
        $_SESSION['user'] = serialize($user);
        if ($user->getFk_role_id() == 1) {
            header("location: admin.php");
            exit;
        } else {
            header("location: index.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<?php include './views/header.php' ?>

<body>

    <?php include './views/navbar.php' ?>

    <div class="container">

                      <div class="logo" style="text-align: center;">
                          <img src="views/img/cars/logo.jpg" alt="logo"/>
                      </div>
           // <div class = "d-flex justify-content-center border_si">
                    <form method="POST" action="" style="padding : 0% 25% 15%" >
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name "password" id="password" placeholder="Password"><br>
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
</html>