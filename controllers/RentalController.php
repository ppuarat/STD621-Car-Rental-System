<?php
require_once(dirname(__DIR__)."/models/Rental.php");
require_once(dirname(__DIR__)."/models/MySQLConnection.php");
require_once(dirname(__DIR__)."/controllers/CrudRepository.php");

class RentalController
{
    private $mySQLConnector;
    private $crudRepo;

    public function __construct()
    {
        $this->mySQLConnector = new MySQLConnection;
        $this->crudRepo = new CrudRepository;
    }

    public function findAll()
    {
        
        $rentals = array();

        $result = $this->crudRepo->findAll("rentals");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                array_push($rentals, $this->mapper($row));
            }
        } else {
        }

        return $rentals;
    }

    public function create()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    private function mapper($row){
        $rental = new Rental();

        return $rental;
    }
}
