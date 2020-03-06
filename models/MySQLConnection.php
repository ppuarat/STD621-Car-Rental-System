<?php

class MySQLConnection
{
    private $conn;
    public function __construct()
    {
        $servername = "localhost";
        $username = "crs_app";
        $password = "phpphpphp";
        $db = "std621";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $db);
        $this->conn->set_charset("utf8");

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function getConnection()
    {
        return $this->conn;
    }

    public function __destruct()
    {
        mysqli_close($this->conn);
    }
}
