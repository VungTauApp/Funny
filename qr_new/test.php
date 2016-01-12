<?php 
	include("dbcon.php");
	$sql= $con->query("select * from users");
	$row = $sql->num_rows;
	$page;
	if( ( $row%5) ==0 ){
		$page = ($row / 5 );
	}else $page= (int)(1+$row/5);
	echo $page;
?>