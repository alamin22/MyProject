<?php
include"main.php";

class studentManagement extends mainFile{
         protected $table="std_tbl";
         private $name;
         private $id;
         private $dept;
         private $cgpa;
         private $address;
      
	
	public function setName($name){
        $this->name=$name;
	}
	public function setId($id){
        $this->id=$id;
	}
	public function setDept($dept){
        $this->dept=$dept;
	}
	public function setCgpa($cgpa){
        $this->cgpa=$cgpa;
	}
	public function setAddress($address){
        $this->address=$address;
	}
	public function setUpdateId($updateId){
        $this->updateId=$updateId;
	}


	public function insert(){
        $DB=new database();
		$sql="insert into $this->table (name,std_id,dept,cgpa,address)value(?,?,?,?,?)";
		$stmt=$DB->connection()->prepare($sql);
		$arr=array($this->name,$this->id,$this->dept, $this->cgpa,$this->address);
		return $stmt->execute($arr);
	}
    
	
	public function update(){
		$DB=new database();
		$sql="update $this->table set name=?,std_id=?,dept=?,cgpa=?,address=? where id=?";
		$stmt=$DB->connection()->prepare($sql);
		$arr=array($this->name,$this->id,$this->dept, $this->cgpa,$this->address,$this->updateId);
		return $stmt->execute($arr);
	
	}
}

?>