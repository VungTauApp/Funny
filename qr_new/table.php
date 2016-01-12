<?php
	include('dbcon.php');
	$page=$_GET['page'];
	$page=$page-1;
	$user= array();

	$sql= $con->query('Select * from users limit '.($page*5).',5');
	$i=0;
	while($value = mysqli_fetch_array($sql)){
		$sql1= $con->query("Select * from diem_danh where id=".$value["id"]);
		$dd=mysqli_fetch_array($sql1);
		$value["diemdanh"]= $dd["diemdanh"];
		$user[$i]=$value;
		$i++;
	}	
	$sql= $con->query('SELECT COUNT(id) FROM users');
	$i =  mysqli_fetch_row($sql);
	$numberOfUsers = $i[0];
	if( ( $numberOfUsers%5) == 0 ){
		$numpage = ($numberOfUsers / 5 );
	}else $numpage= (int)(1+$numberOfUsers/5);
	$kq=new stdClass();
	$kq->nop=$numpage;
	$kq->users=$user;
	
	echo json_encode($kq);
?>