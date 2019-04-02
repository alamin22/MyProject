<?php
include"connection.php";

abstract class mainFile{
      protected $table;
      protected $id2;
      protected $id3;
      protected $updateId;

    abstract public function insert();
    abstract public function update();

    public function read(){
         $DB=new database();
         $sql="select * from $this->table";
         $stmt=$DB->connection()->prepare($sql);
         $stmt->execute();
         return $stmt->fetchAll();
	}

    public function delete($id2){
		$this->id2=$id2;
		$DB=new database();
		$sql="delete from $this->table where id=?";
		$stmt=$DB->connection()->prepare($sql);
		return $stmt->execute(array($id2));

	}

	public function view($id3){
         $this->id3=$id3;
		 $DB=new database();
		 $sql="select * from $this->table where id=?";
         $stmt=$DB->connection()->prepare($sql);
         $stmt->execute(array($id3));
         return $stmt->fetchAll();
	}


}

?>