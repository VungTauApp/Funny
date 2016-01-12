<?php
	include("dbcon.php");
	if(isset($_POST['username'])){
		$un= $_POST['username'];
		$pw= $_POST['pass'];
	}
	$sql=$con->query("SELECT * FROM account WHERE username='$un'");
	if(mysqli_num_rows($sql) == 0 ){
			$mess="nok";
		}
	else
		{
			$rs= $sql->fetch_object();
			if($pw == $rs->password){
				if($rs->level==0)
					$mess=0;
				if($rs->level==1)
					$mess=1;
			} else {
				$mess = 'nok';
			}
		}
	$con->close();
	echo $mess;	
?>