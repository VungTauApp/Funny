<?php 
	include("dbcon.php");
	
	if(isset($_POST["id"])){
		$id= $_POST["id"];
	}else $id= $_GET["id"];
	
	$sql= "select * from users where id=".$id;
	$a=$con->query($sql);
	if($a->num_rows >0){
		echo json_encode(true);
	}else echo json_encode(false);
?>