<?php
require_once(dirname(__DIR__) . "/models/Rental.php");
require_once(dirname(__DIR__) . "/models/MySQLConnection.php");
require_once(dirname(__DIR__) . "/controllers/CrudRepository.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rental = new RentalController();

    if ($_POST['functionName'] == "create") {
        $rental->create($_POST['car'], $_POST['fromDate'], $_POST['toDate'], $_POST['total']);
    }
}

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
        }

        return $rentals;
    }

    public function findWaiting()
    {
        $conn = $this->mySQLConnector->getConnection();
        $sql = "select concat('Car ID:',c.id, ' Detail:', c.brand,'-', c.model) as car_detail, 
        concat(u.first_name,' ', u.last_name,' Email: ', u.email) as customer_detail, r.*
        from rentals r
        inner join cars c on r.fk_car_id = c.id
        inner join users u on r.fk_customer_id = u.id
        where r.is_approve is null and r.is_active = true;";

        $result = $conn->query($sql);
        return $result;
    }

    public function create($car, $fromDate, $toDate, $total)
    {
        $fromDate = DateTime::createFromFormat('m/d/Y', $fromDate);
        $toDate = DateTime::createFromFormat('m/d/Y', $toDate);
        $fromDate = $fromDate->format('Y-m-d');
        $toDate = $toDate->format('Y-m-d');

        $carlId = $car['id'];
        //TODO-Get customer id from session
        $customerId = 3;
        //Default Staff ID
        $staffId = 2;
        // return;
        $conn = $this->mySQLConnector->getConnection();
        $sql = "INSERT INTO rentals (rent_from_date, rent_end_date, fk_car_id, fk_customer_id, fk_staff_id,
        total_price, created_at, is_active) 
        VALUES(?, ?, ?, ?, ?, ?, current_timestamp(), 1);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiiid", $fromDate, $toDate, $carlId, $customerId, $staffId, $total);
        if ($stmt->execute() == true) {

            echo "Booking success. Please wait for the confirmation email.";
        } else {
            echo "Somthing went wrong!! Please contact our staff.";
        }
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    private function mapper($row)
    {
        $rental = new Rental();
        $rental->setId($row['id']);
        $rental->setRent_from_date($row['rent_from_date']);
        $rental->setRent_end_date($row['rent_end_date']);
        $rental->setFk_car_id($row['fk_car_id']);
        $rental->setFk_customer_id($row['fk_customer_id']);
        $rental->setFk_staff_id($row['fk_staff_id']);
        $rental->setTotal_price($row['total_price']);
        return $rental;
    }
}
