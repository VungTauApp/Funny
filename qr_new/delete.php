<html>

<body> //sua lai
	<form action="delete.php" method="post">
    	ID:<input type="text" name="ma"><br/>
        <input type="submit">
    </form>
</body>
</html>
<?php
	include('dbcon.php');
	if(isset($_POST['ma'])){		
		$sql1="DELETE FROM users WHERE id =  ".$_POST['ma'];
		$sql= "delete from diem_danh where id = ".$_POST['ma'];
		$con->query($sql);
		$con->query($sql1);
		echo $sql;
	}else echo"chua lay dc id";
?>
