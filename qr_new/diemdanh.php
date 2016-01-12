<?php 
	header('Access-Control-Allow-Origin: *'); 
	header('content-type: application/json; charset=utf-8');
?>
<?php
	include('dbcon.php');

    if(isset($_POST["id"])){
    	$id= $_POST["id"];
 //       $ngaysinh= "";
    }else {
        exit;
    }
	
	$sql= "select * from `users` where id=".$id;
	$queryRs= $con->query($sql);
	if($queryRs->num_rows>0){
		$row = mysqli_fetch_array($queryRs);
		$res["id"]=$row["id"];
		$res["name"]=$row["ho_ten"];
		$res["gt"]= $row["gioi_tinh"];
		$res["khoa"]= $row["khoa"];
		$sql1="UPDATE diem_danh SET `diemdanh` = `diemdanh`+1 where id=".$id;
		$queryRs=$con->query($sql1);
		if($queryRs==true){
			$res["status"]= "ok";
			$sql="SELECT * from diem_danh where id=".$id;
			$queryRs=$con->query($sql);
			$row= mysqli_fetch_array($queryRs);
			$res["cc"]= $row["diemdanh"];
		}
	}else{
		$res["status"]="nok";
		$res["msg"]="Không tìm thấy id ".$id;
	}
	$con->close();
	echo json_encode($res);
?>