<?php
    class Feedback{
        private $id;
        private $subject;
        private $feedback;
        private $fk_customer_id;
        private $created_at;
        private $is_active;

        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getSubject(){
            return $this->subject;
        }
    
        public function setSubject($subject){
            $this->subject = $subject;
        }
    
        public function getFeedback(){
            return $this->feedback;
        }
    
        public function setFeedback($feedback){
            $this->feedback = $feedback;
        }
    
        public function getFk_customer_id(){
            return $this->fk_customer_id;
        }
    
        public function setFk_customer_id($fk_customer_id){
            $this->fk_customer_id = $fk_customer_id;
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