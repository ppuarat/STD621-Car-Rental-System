<?php 
    class Rental{
        private $id;
        private $rent_from_date;
        private $rent_end_date;
        private $fk_car_id;
        private $fk_customer_id;
        private $fk_staff_id;
        private $total_price;
        private $is_approve;
        private $description;
        private $created_at;
        private $is_active;

        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getRent_from_date(){
            return $this->rent_from_date;
        }
    
        public function setRent_from_date($rent_from_date){
            $this->rent_from_date = $rent_from_date;
        }
    
        public function getRent_end_date(){
            return $this->rent_end_date;
        }
    
        public function setRent_end_date($rent_end_date){
            $this->rent_end_date = $rent_end_date;
        }
    
        public function getFk_car_id(){
            return $this->fk_car_id;
        }
    
        public function setFk_car_id($fk_car_id){
            $this->fk_car_id = $fk_car_id;
        }
    
        public function getFk_customer_id(){
            return $this->fk_customer_id;
        }
    
        public function setFk_customer_id($fk_customer_id){
            $this->fk_customer_id = $fk_customer_id;
        }
    
        public function getFk_staff_id(){
            return $this->fk_staff_id;
        }
    
        public function setFk_staff_id($fk_staff_id){
            $this->fk_staff_id = $fk_staff_id;
        }
    
        public function getTotal_price(){
            return $this->total_price;
        }
    
        public function setTotal_price($total_price){
            $this->total_price = $total_price;
        }
    
        public function getIs_approve(){
            return $this->is_approve;
        }
    
        public function setIs_approve($is_approve){
            $this->is_approve = $is_approve;
        }
    
        public function getDescription(){
            return $this->description;
        }
    
        public function setDescription($description){
            $this->description = $description;
        }
    
        public function getCreated_at(){
            return $this->created_at;
        }
    
        public function setCreated_at($created_at){
            $this->created_at = $created_at;
        }
    
        public function getIs_active(){
            return $this->is_active;
        }
    
        public function setIs_active($is_active){
            $this->is_active = $is_active;
        }
    }
?>