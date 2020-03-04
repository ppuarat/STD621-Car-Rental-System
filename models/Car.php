<?php

    class Car{
        private $id;
        private $name;
        private $detail;
        private $brand;
        private $model;
        private $transmission;
        private $door;
        private $seat;
        private $daily_rate;
        private $is_available;
        private $created_at;
        private $is_active;
        private $images = array();

        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getName(){
            return $this->name;
        }
    
        public function setName($name){
            $this->name = $name;
        }
    
        public function getDetail(){
            return $this->detail;
        }
    
        public function setDetail($detail){
            $this->detail = $detail;
        }
    
        public function getBrand(){
            return $this->brand;
        }
    
        public function setBrand($brand){
            $this->brand = $brand;
        }
    
        public function getModel(){
            return $this->model;
        }
    
        public function setModel($model){
            $this->model = $model;
        }
    
        public function getTransmission(){
            return $this->transmission;
        }
    
        public function setTransmission($transmission){
            $this->transmission = $transmission;
        }
    
        public function getDoor(){
            return $this->door;
        }
    
        public function setDoor($door){
            $this->door = $door;
        }
    
        public function getSeat(){
            return $this->seat;
        }
    
        public function setSeat($seat){
            $this->seat = $seat;
        }
    
        public function getDaily_rate(){
            return $this->daily_rate;
        }
    
        public function setDaily_rate($daily_rate){
            $this->daily_rate = $daily_rate;
        }
    
        public function getIs_available(){
            return $this->is_available;
        }
    
        public function setIs_available($is_available){
            $this->is_available = $is_available;
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

        public function setImages($images){
            $this->images = $images;
        }
        public function getImages(){
            return $this->images;
        }
    }
?>