
<?php
include"student_manage.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>crud file</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<section class="header">
    <h2>practice of CRUD</h2>
</section>
<section class="left_portion">
	
   <center>
  	<?php
     	$st_manage=new studentManagement();
       if (isset($_POST['file1'])) {
       	$name=$_POST['name'];
       	$id=$_POST['id'];
       	$dept=$_POST['dept'];
       	$cgpa=$_POST['cgpa'];
       	$address=$_POST['address'];

        $st_manage->setName($name);
        $st_manage->setId($id);
        $st_manage->setDept($dept);
        $st_manage->setCgpa($cgpa);
        $st_manage->setAddress($address);
      
        if ($st_manage->insert()) {
        	
        	echo"<strong style=color:green>insert successfully</strong>";
        }
       	
       }
   	?>
   	<?php
if (isset($_REQUEST['id3'])) {
	$id3=$_REQUEST['id3'];

	if (isset($_POST['update'])) {
		$name=$_POST['name'];
       	$id=$_POST['id'];
       	$dept=$_POST['dept'];
       	$cgpa=$_POST['cgpa'];
       	$address=$_POST['address'];
       	$updateId=$_POST['id3'];

       	$st_manage->setName($name);
        $st_manage->setId($id);
        $st_manage->setDept($dept);
        $st_manage->setCgpa($cgpa);
        $st_manage->setAddress($address);
        $st_manage->setUpdateId($updateId);

        if ($st_manage->update()) {
        	
        	echo"<strong style=color:green>Update successfully</strong>";
        }

	}

	foreach($st_manage->view($id3) as $updated_row){
    ?> <h2>Update Data</h2>

        <form action="" method="post" class="form_data">
		<table>
			<tr><td>Name:</td></tr>
			<tr><td><input class="intype" type="text" name="name" value="<?php echo $updated_row['name'];?>" required="1"></td></tr>

			<tr><td><br>Student Id:</td></tr>
			<tr><td><input class="intype" type="text" value="<?php echo $updated_row['std_id'];?>" name="id"></td></tr>

			<tr><td><br>Department:</td></tr>
			<tr><td><input class="intype" type="text" value="<?php echo $updated_row['dept'];?>" name="dept"></td></tr>

			<tr><td><br>CGPA:</td></tr>
			<tr><td><input class="intype" type="text" value="<?php echo $updated_row['cgpa'];?>" name="cgpa"></td></tr>

			<tr><td><br>Address:</td></tr>
			<tr><td><input class="intype" type="text" value="<?php echo $updated_row['address'];?>" name="address"></td></tr>

			<tr><td><input type="hidden" value="<?php echo $updated_row['id'];?>" name="id3"></td></tr>>

			<tr><td><input id="sub" type="submit" value="Update" name="update"></td></tr>
			
		</table>
		
	</form>

   
    <?php
}
}else{
   	?>
       <h2>Insert Data</h2>
   	  <form action="" method="post" class="form_data">
		<table>
			<tr><td>Name:</td></tr>
			<tr><td><input class="intype" type="text" name="name" required="1"></td></tr>

			<tr><td><br>Student Id:</td></tr>
			<tr><td><input class="intype" type="text" name="id"></td></tr>

			<tr><td><br>Department:</td></tr>
			<tr><td><input class="intype" type="text" name="dept"></td></tr>

			<tr><td><br>CGPA:</td></tr>
			<tr><td><input class="intype" type="text" name="cgpa"></td></tr>

			<tr><td><br>Address:</td></tr>
			<tr><td><input class="intype" type="text" name="address"></td></tr>

			<tr><td><input id="sub" type="submit" value="Submit" name="file1"></td></tr>
			
		</table>
		
	</form>
    <?php
      }
    ?>
   </center>
	
</section>


<section class="right_portion">
	<h2>List of Student</h2>
	<center>
	<table  cellspacing="15px" cellpadding="0px" style="font-size: 20px">
     <th>No</th>
     <th>Name</th>
     <th>Student Id</th>
     <th>Department</th>
     <th>CGPA</th>
     <th>Address</th>
     <th>Action</th>
  

      <?php
      $count=0;
     // $st_manage=new studentManagement();
        if(isset($_REQUEST['id'])){
			$id2=$_REQUEST['id'];
			$deleted=$st_manage->delete($id2);
          if ($deleted) {
          	echo"<b style=color:red>deleted successfully</b>";
          }
		}


      
       foreach($st_manage->read() as $row){
       	$count++;
		  
            ?>

     <tr>
     	<td><?php echo $count;?></td>
     	<td><?php echo $row['name'];?></td>
     	<td><?php echo $row['std_id'];?></td>
     	<td><?php echo $row['dept'];?></td>
     	<td><?php echo $row['cgpa'];?></td>
     	<td><?php echo $row['address'];?></td>
     	<td><a href="index.php?id3=<?php echo $row['id'];?>">Edit</a> || <a href="index.php?id=<?php echo $row['id'];?>">Delete</a></td>
     </tr>
      <?php
       }

      ?>
	</table>
	</center>
     
	
</section>

<section class="footer2">
	<h4>footer sectoion</h4>
	<p>&copy: Email:alamincse039@gmail.com </p>
</section>

</body>
</html>

