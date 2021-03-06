<?php

require_once(dirname(__DIR__) . "/models/MySQLConnection.php");
require_once(dirname(__DIR__) . "/controllers/CrudRepository.php");
require_once(dirname(__DIR__) . "/models/Car.php");
require_once(dirname(__DIR__) . "/models/CarImage.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carsController = new CarsController();

    if ($_POST['functionName'] == "createCar") {
        $carsController->create();
    }
    if ($_POST['functionName'] == "updateCar") {
        $carsController->update();
    }
    if ($_POST['functionName'] == "deleteCar") {
        $carsController->delete($_POST['carId']);
    }
}
class CarsController
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

        $cars = array();

        $conn = $this->mySQLConnector->getConnection();
        $sql = "select c.*
        from cars c;";
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
        $sql = "select c.*  
        from cars c 
        where c.is_active = 1;";
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

    public function findCarImage($carId)
    {
        $conn = $this->mySQLConnector->getConnection();
        $sql = "Select * from car_images where fk_car_id=?;";
        $carImages = array();

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $carId);
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

    public function create()
    {
        $imageUrl = $_POST['imageUrl'];
        $class = $_POST['class'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $detail = $_POST['detail'];
        $transmission = $_POST['transmission'];
        $door = $_POST['door'];
        $seat = $_POST['seat'];
        $rate = $_POST['rate'];

        $conn = $this->mySQLConnector->getConnection();
        $sql = "INSERT INTO cars (name, detail, brand, model, transmission, "
            . "door, seat, daily_rate, image,is_available, created_at, is_active)"
            . "VALUES(?, ?, ?, ?, ?, ?, ?, ?,?, 1, current_timestamp(), 1);";

        try {
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param(
                    "sssssiids",
                    $class,
                    $detail,
                    $brand,
                    $model,
                    $transmission,
                    $door,
                    $seat,
                    $rate,
                    $imageUrl
                );
                $stmt->execute();
                echo "Your new car is ready!";
            }
        } catch (Exception  $e) {
            echo $e->getMessage();
        }
    }

    public function updateAvailable($id, $status)
    {

        $status = $status ? 1 : 0;

        $conn = $this->mySQLConnector->getConnection();
        $sql = "UPDATE cars SET is_available=?"
            . " WHERE id=?;";
        try {
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param(
                    "ii",
                    $status,
                    $id
                );
                $stmt->execute();
                return true;
            }
        } catch (Exception  $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function update()
    {

        $id = $_POST['carId'];
        $imageUrl = $_POST['imageUrl'];
        $class = $_POST['class'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $detail = $_POST['detail'];
        $transmission = $_POST['transmission'];
        $door = $_POST['door'];
        $seat = $_POST['seat'];
        $rate = $_POST['rate'];

        $conn = $this->mySQLConnector->getConnection();
        $sql = "UPDATE cars SET name=?, detail=?, brand=?, model=?, "
            . "transmission=?, door=?, seat=?, daily_rate=?, image=?"
            . " WHERE id=?;";
        try {
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param(
                    "sssssiidsi",
                    $class,
                    $detail,
                    $brand,
                    $model,
                    $transmission,
                    $door,
                    $seat,
                    $rate,
                    $imageUrl,
                    $id
                );
                $stmt->execute();
                echo "Update Success!";
            }
        } catch (Exception  $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        if($this->crudRepo->toggle("cars", $id)){
            echo "Update success";
        }else{
            echo "Something went wrong!";
        }
         
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
        $car->setImage($row['image']);

        return $car;
    }

    public function imagesMapper($row)
    {
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
