<?php

class database
{
	public function connection(){
		try {
			$DB_HOST="mysql:host=localhost;dbname=test";
		    $USER="root";
		    $PASSWORD="";
 
		    $PDO=new pdo($DB_HOST,$USER,$PASSWORD);

		} catch (PDOException $e) {
			echo"connected". $e->getMessage();
		}

		return $PDO;
	}

}
?>