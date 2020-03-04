<?php

class MySQLConnection
{
    public function getConnection()
    {

        $servername = "localhost";
        $username = "crs_app";
        $password = "phpphpphp";
        $db = "std621";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db);
        $conn->set_charset("utf8");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}
?>