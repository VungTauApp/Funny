
<?php
//	ini_set('display_errors', 'Off');
	include('login.php');
	if(isset($_SESSION['login_user'])){
	header("location: homepage.php");
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quan Ly Nhan Vien</title>
<link rel="stylesheet" href="style/style.css">
</head>
<body>
	<h1 style="text-align:center">Quản Lý Nhân Viên</h1>
    <div class="login">
    <h2 style="text-align:center">Đăng Nhập</h2>
    	<form method="post" action="">
        <input type="text" name="username" placeholder="Username" value="admin"/><br>
        <input type="password" name="password" value="admin" placeholder="Password"/><br>
        <div style="color:#F00"><?php echo $error; ?></div>
        <div style="text-align:right">
        	<input type="submit" name="submit" value="Đăng nhập"/>
        </div>
        </form>
    </div>
</body>
</html>
