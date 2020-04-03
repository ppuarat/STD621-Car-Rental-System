<?php
require_once(dirname(__DIR__) . "/models/MySQLConnection.php");

class ReportController
{
    private $mySQLConnector;

    public function __construct()
    {
        $this->mySQLConnector = new MySQLConnection;
    }

    public function findMostRentedCars()
    {
        $rentedCount = [];
        $brand = [];
        $conn = $this->mySQLConnector->getConnection();
        $sql = "select count(r.id) as rented_count, CONCAT('CarID:', c.id, ' ',  c.brand, ' ', c.model) as brand
        from rentals r 
        left join cars c on r.fk_car_id = c.id 
        where is_approve = 1
        group by r.fk_car_id
        order by rented_count;";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                array_push($rentedCount, $row['rented_count']);
                array_push($brand, $row['brand']);
            }
        }
        $report = [
            'rentedCount' => $rentedCount,
            'brand' => $brand
        ];
        return $report;
    }

    public function findAvailableCar()
    {
        $available = [];
        $notAvailable = [];
        $conn = $this->mySQLConnector->getConnection();
        $sql = "select sum(c.is_active = 1) as available, sum(c.is_active = 0) as not_available
        from cars c;";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                array_push($available, $row['available']);
                array_push($notAvailable, $row['not_available']);
            }
        }
        $report = [
            'available' => $available,
            'notAvailable' => $notAvailable
        ];
        return $report;
    }

    public function findRentalPerformance()
    {
        $totalDay = [];
        $earning = [];
        $customers = [];
        $cars = [];
        $conn = $this->mySQLConnector->getConnection();
        $sql = "select sum(rent_end_date - rent_from_date) as total_day, 
        sum(total_price) as total_earning,
        count(r.fk_customer_id) as total_customer ,
        CONCAT('ID:', c.id, ' ',  c.brand, ' ', c.model) as car
        from rentals r
        left join cars c on r.fk_car_id = c.id 
        group by r.fk_car_id
        order by total_day asc,total_earning desc;";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                array_push($totalDay, $row['total_day']);
                array_push($earning, $row['total_earning']);
                array_push($customers, $row['total_customer']);
                array_push($cars, $row['car']);
            }
        }
        $report = [
            'totalDay' => $totalDay,
            'earning' => $earning,
            'customers' => $customers,
            'cars' => $cars
        ];
        return $report;
    }
}
