<?php 
	include("dbcon.php");
	if(isset($_POST['id'])){
		
    	$id= $_POST["id"];
        $ten=$_POST["ten"];
    	$gt=$_POST["gt"];
		$avatar=$_POST["avatar"];
        $khoa=$_POST["khoa"];
	//	$avatar=str_replace("/","//",$avatar);
		$sql="UPDATE users SET ho_ten = '$ten' ,khoa = '$khoa',
		gioi_tinh= $gt, avatar = '$avatar' WHERE `id` = $id ";
		$rs = $con->query($sql);
		if($rs){
			$res= "ok";
		}
		else{
			$res=$con->error;
		
			}
		echo json_encode($res);
	}
?>