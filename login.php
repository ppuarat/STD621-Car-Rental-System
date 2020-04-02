<?php

session_start();

	include 'models/MySQLConnection.php';
    $conn_obj = new MySQLConnection;
    $conn = $conn_obj->getConnection();

    //Extract or grab the data from the form
    // and store those values in these two variables
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//Grab the form variables stored in the POST global variable i.e. the POST Request object
		$email = $_POST['email'];
		$password = $_POST['password'];
        $table_name = 'users';

        //write code here which adds them as a new record to my database
        $sql_stmt = "SELECT * FROM " . $table_name . " WHERE
            email = '" . $email . "' AND password = '" . $password . "' Limit 1";

        //echo $sql_stmt; //Check if my statement is correct as per sql syntax
        $result = $conn->query($sql_stmt);

        if ($result->num_rows > 0) {
            // get the first record from the results array
           if($row = $result->fetch_array()){

               // store the database values of this record into session
               $_SESSION['id'] = $row['id'];
               $_SESSION['first_name'] = $row['first_name'];
               $_SESSION['last_name'] = $row['last_name'];
               $_SESSION['email'] = $row['email'];
               $_SESSION['password'] = $row['password'];


               print_r($_SESSION); //prints all session variables


               header("location: index.php");
               exit;
           }

        }
        else {
            echo "Sorry, your email or password maybe incorrect";
        }

        //close Connection
        $conn->close();

    }
?>

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