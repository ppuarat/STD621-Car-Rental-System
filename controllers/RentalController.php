<?php 
    require_once("../models/MySQLConnection.php");

    class RentalController{
        private $mySQLConnector;

        public function __construct()
        {
            $this->mySQLConnector = new MySQLConnection;

        }

        public function create(){

        }
        
        public function update(){

        }
        
        public function delete(){
            
        }
        
    }
?>