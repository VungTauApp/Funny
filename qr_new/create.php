<?php 
	header('Access-Control-Allow-Origin: *'); 
	header('content-type: application/json; charset=utf-8');
?>
<?php
	include('dbcon.php');
    if(isset($_POST["id"])){
    	$id= $_POST["id"];
        $ten=$_POST["ten"];
    	$gt= $_POST["gt"];
        $khoa=$_POST["khoa"];
 //       $ngaysinh= "";
    }else {
        $id= $_GET["id"];
        $ten=$_GET["ten"];
    	$gt= $_GET["gt"];
        $khoa=$_GET["khoa"];
    }
	
	$sql= "INSERT INTO `users`(`id`, `ho_ten`, `gioi_tinh`, `khoa`) VALUES (".$id.",'".$ten."',".$gt.",'".$khoa."')";
	
	if($con->query($sql) === TRUE){
		$mess["status"] = "ok";
		$sql1="Insert into diem_danh(id,diemdanh) values(\"".$id."\",0)";
		$con->query($sql1);
	}
	else {
       		$mess["status"]="nok";
		$mess["msg"]= ("Error: ".$con->error);
                $mess["sql"]=($sql);
	}
	$con->close();
	echo json_encode($mess);
?>