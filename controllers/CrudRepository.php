<?php
require_once(dirname(__DIR__) . "/models/MySQLConnection.php");

class CrudRepository
{

    public function __construct()
    {
        $this->mySQLConnector = new MySQLConnection;
    }

    public function findAll($table)
    {
        $conn = $this->mySQLConnector->getConnection();
        $sql = "Select * from " . $table . " where is_active = 1;";

        return $conn->query($sql);
    }

    public function toggle($table, $id)
    {
        $conn = $this->mySQLConnector->getConnection();
        $sql = "UPDATE " . $table . " SET is_active=not is_active WHERE id=?;";
        $success = false;
        try {
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $success = true;
            }
        } catch (Exception  $e) {
            echo $e->getMessage();
        }
        return $success;
    }

}
