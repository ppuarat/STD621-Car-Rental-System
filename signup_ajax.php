<?php
	include 'models/MySQLConnection.php';
    $conn_obj = new MySQLConnection;
    $conn = $conn_obj->getConnection();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//Grab the form variables stored in the POST global variable i.e. the POST Request object

        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
		$email = $_POST['email'];
		$password = $_POST['password'];


		if(empty($email) or empty($password)){
			//print "<h3>PLease ensure name and email are both correctly entered</h3>"; //Full refresh
			//This array will be a response sent to your client in the form of a JSON string
			$results = array(
				'result' => false,
				'message' => 'Please ensure email and password are both correctly entered'
			);
			//converts the above array into a JSON string and sends it as a response to the client
			echo json_encode($results); //This will be partial refresh
        }

		else{
			//write code here which adds them as a new record to my database
			$sql_stmt = "INSERT INTO USERS (first_name, last_name, email, password)
				VALUES ('" . $first_name . "', '" . $last_name . "', '" . $email . "', '" . $password . "')";
			//echo $sql_stmt; //just checking if syntax is correct

			if ($conn->query($sql_stmt) === TRUE) {
				//echo "New record created successfully"; //Old way with Full refresh
				//This array will be a response sent to your client in the form of a JSON string
				$results = array(
					'result' => true,
					'message' => 'Hi, ' . $first_name . ' your registration is successful'
				);
				//converts the above array into a JSON string and sends it as a response to the client
				echo json_encode($results); //Ajax way with partial refresh
            }
            else {
				//echo "Error: " . $sql_stmt . "<br>" . $conn->error; //Old way with Full refresh
				//This is the response being sent back to your client
				$results = array(
					'result' => false,
					'message' => 'Registration failure',
					'sql_error' => $conn->error
				);
				echo json_encode($results); //Ajax way with partial refresh
			}

        //    $conn->close();
        }

    }

?>