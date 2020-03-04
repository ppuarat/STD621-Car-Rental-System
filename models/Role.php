<?php 
class Role{
    private $id;
    private $name;
    private $description;
    private $created_at;
    private $is_active;
    
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