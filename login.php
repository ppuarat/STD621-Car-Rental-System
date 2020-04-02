<?php

session_start();


	include 'models/MySQLConnection.php';
	include 'models/User.php';


    $conn_obj = new MySQLConnection;
    $conn = $conn_obj->getConnection();

    $password = "";
    $email = "";


   //Extract or grab the data from the form
    // and store those values in these two variables
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//Grab the form variables stored in the POST global variable i.e. the POST Request object
		$password = $_POST['password'];
        $email = $_POST['email'];
        $table_name = 'users';

        //write code here which adds them as a new record to my database
        $sql_stmt = "SELECT * FROM " . $table_name . " WHERE
         email = '" . $email . "' AND password = '" . $password . "' Limit 1";

        //echo $sql_stmt; //Check if my statement is correct as per sql syntax
        $result = $conn->query($sql_stmt);

        if ($result->num_rows > 0) {
            // get the first record from the results array
           if($row = $result->fetch_array()){
               //echo "user first name: " . $row['first_name'];
               // store the database values of this record into session
               $_SESSION['first_name'] = $row['first_name'];
               $_SESSION['last_name'] = $row['last_name'];
               $_SESSION['email'] = $row['email'];
               $_SESSION['id'] = $row['id'];

               print_r($_SESSION); //prints all session variables

               //redirect to customer's home page after seting session variables
               header("location: index.php");
               exit;
           }

        }
        else {
            echo "Sorry, your email or password maybe incorrect";
        }

        $conn->close();

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