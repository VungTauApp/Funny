<?php
session_start();
$error='';
include('../dbcon.php');
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
	$error = "Xin điền đầy đủ tên đăng nhập và mật khẩu";
	}
	else
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		
		$sql = $con->query("select * from `account` WHERE username = '$username'");
		if(mysqli_num_rows($sql) == 0 ){
			$error="Sai tên đăng nhập hoặc mật khẩu";
		}
		else
		{
			$rs= $sql->fetch_object();
			if($rs->level==0){
		
			if($password == $rs->password){
				$_SESSION['login_user']=$username;
				header("location: homepage.php"); // Redirecting To Other Page
			} else {
				$error = "Sai tên đăng nhập hoặc mật khẩu";
			}
			}
			else{
				$error="Tài khoản của bạn không có quyền truy cập";
				}
		}
	}
}
$con->close();
?>