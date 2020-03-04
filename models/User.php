<?php
    class User{
        private $id;
        private $first_name;
        private $last_name;
        private $address;
        private $email;
        private $password;
        private $fk_role_id;
        private $created_at;
        private $is_active;

        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getFirst_name(){
            return $this->first_name;
        }
    
        public function setFirst_name($first_name){
            $this->first_name = $first_name;
        }
    
        public function getLast_name(){
            return $this->last_name;
        }
    
        public function setLast_name($last_name){
            $this->last_name = $last_name;
        }
    
        public function getAddress(){
            return $this->address;
        }
    
        public function setAddress($address){
            $this->address = $address;
        }
    
        public function getEmail(){
            return $this->email;
        }
    
        public function setEmail($email){
            $this->email = $email;
        }
    
        public function getPassword(){
            return $this->password;
        }
    
        public function setPassword($password){
            $this->password = $password;
        }
    
        public function getFk_role_id(){
            return $this->fk_role_id;
        }
    
        public function setFk_role_id($fk_role_id){
            $this->fk_role_id = $fk_role_id;
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
