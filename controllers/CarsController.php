<?php

require_once(dirname(__DIR__)."/models/MySQLConnection.php");
require_once(dirname(__DIR__)."/controllers/CrudRepository.php");
require_once(dirname(__DIR__)."/models/Car.php");
require_once(dirname(__DIR__)."/models/CarImage.php");
class CarsController
{
    private $mySQLConnector;
    private $crudRepo;

    public function __construct()
    {
        $this->mySQLConnector = new MySQLConnection;
        $this->crudRepo = new CrudRepository;

    }

    public function findAll(){
        
        $cars = array();

        $conn = $this->mySQLConnector->getConnection();
        $sql = "select C.*,ci.image_src  
        from cars c 
        inner join car_images ci on c.id = ci.fk_car_id";
        $cars = array();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                array_push($cars, $this->mapper($row));
            }
        }
        
        return $cars;
    }
    public function findAvailableCars()
    {
        $conn = $this->mySQLConnector->getConnection();
        $sql = "select C.*,ci.image_src  
        from cars c 
        inner join car_images ci on c.id = ci.fk_car_id
        where c.is_active = 1";
        $cars = array();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                array_push($cars, $this->mapper($row));
            }
        } else {
            
        }
        
        return $cars;
    }

    public function findCarImage($carId){
        $conn = $this->mySQLConnector->getConnection();
        $sql = "Select * from car_images where fk_car_id=?;";
        $carImages = array();

        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("i",$carId);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) {
                    array_push($carImages, $this->imagesMapper($row));
                }
            }
        }
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

    public function update($id){

        
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

    public function delete($id){

        return $this->crudRepo->toggle("cars",$id);
      
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
        $car->setIs_active($row['is_active']);
        $car->setCreated_at($row['created_at']);
        $car->setImage($row['image_src']);

        return $car;
    }

    public function imagesMapper($row){
        $image = new CarImage();
        $image->setId($row['id']);
        $image->setCaption($row['caption']);
        $image->setImage_src($row['image_src']);
        return $image;
    }
}
// $test = new CarsController();
// $test->findAvailableCars();
// $test->create();
// $test->update();
