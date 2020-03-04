<?php

require_once(dirname(__DIR__)."/models/MySQLConnection.php");
require_once(dirname(__DIR__)."/models/Car.php");
require_once(dirname(__DIR__)."/models/CarImage.php");

class CarsController
{
    private $mySQLConnector;

    public function __construct()
    {
        $this->mySQLConnector = new MySQLConnection;
    }

    public function findAvailableCars()
    {
        $conn = $this->mySQLConnector->getConnection();
        $sql = "Select * from cars where is_available = true and is_active = true;";
        $cars = array();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                array_push($cars, $this->mapper($row));
            }
        } else {
            
        }
        
        $conn->close();
        return $cars;
    }

    public function findCarImages($carId){
        $conn = $this->mySQLConnector->getConnection();
        $sql = "Select * from car_images where is_active = true and fk_car_id=?;";
        $carImages = array();

        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("i",$carId);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) {
                    array_push($carImages, $this->imagesMapper($row));
                }
            } else {
                
            }
        }
        
        $conn->close();
        return $carImages;
    }

    public function create(){
        $conn = $this->mySQLConnector->getConnection();
        $sql = "INSERT INTO cars (name, detail, brand, model, transmission, "
        ."door, seat, daily_rate, is_available, created_at, is_active)"
        ."VALUES(?, ?, ?, ?, ?, ?, ?, ?, 1, current_timestamp(), 1);";

        try {
            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("sssssiid","");
                $stmt->execute();
                echo "Success!";
            }
        } catch (Exception  $e) {
            echo $e->getMessage();
        }
    }
    public function update(){
        $conn = $this->mySQLConnector->getConnection();
        $sql = "UPDATE cars SET name=?, detail=?, brand=?, model=?, "
        ."transmission=?, door=?, seat=?, daily_rate=?, "
        ." WHERE id=?;";

        try {
            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("sssssiidi","");
                $stmt->execute();
                echo "Success!";
            }
        } catch (Exception  $e) {
            echo $e->getMessage();
        }
    }
    public function delete(){

    }

    public function mapper($row)
    {
        $car = new Car();
        $car->setId($row['id']);
        $car->setName($row['name']);
        $car->setDetail($row['detail']);
        $car->setBrand($row['brand']);
        $car->setModel($row['model']);
        $car->setTransmission($row['transmission']);
        $car->setDoor($row['door']);
        $car->setSeat($row['seat']);
        $car->setDaily_rate($row['daily_rate']);
        $car->setIs_available($row['is_available']);
        $car->setCreated_at($row['created_at']);
        $car->setImages($this->findCarImages($car->getId()));

        return $car;
    }

    public function imagesMapper($row){
        $images = new CarImage();
        $images->setId($row['id']);
        $images->setCaption($row['caption']);
        $images->setImage_src($row['image_src']);
    }
}
// $test = new CarsController();
// $test->findAvailableCars();
// $test->create();
// $test->update();
?>
