<?php
    class CarImage{
        private $id;
        private $fk_car_id;
        private $caption;
        private $image_src;

        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getFk_car_id(){
            return $this->fk_car_id;
        }
    
        public function setFk_car_id($fk_car_id){
            $this->fk_car_id = $fk_car_id;
        }
    
        public function getCaption(){
            return $this->caption;
        }
    
        public function setCaption($caption){
            $this->caption = $caption;
        }
    
        public function getImage_src(){
            return $this->image_src;
        }
    
        public function setImage_src($image_src){
            $this->image_src = $image_src;
        }
    }
?>