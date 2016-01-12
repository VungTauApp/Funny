<?php
	if(isset($_POST['uid'])){
		$id=$_POST['uid'];
	}else header("location: index.php");
	$_GET['uid']=$id;
	include('../getUser.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Print</title>
<script src="js/jquery.2.1.1.min.js"></script>
<script src="js/qrcode.js"></script>
</head>
<body>
<div style="margin:auto; width:250px;height:370px; border:1px solid; text-align:center">
	<div style="height:50px;text-height:50px;font-size:25px">Công ty ABC</div>
	<img style="margin-bottom:10px" src=<?php  echo "\"".$user["avatar"]."\"" ?> width="150px" height="150px;">
    <div><?php echo $user["ho_ten"] ?></div>
    <div style="margin-bottom:20px"><?php echo $user['khoa']; ?></div>
    <div><?php echo $id ?></div>
    <div id= "qr" style="margin-left:90px;"></div>
</div>
<script>
	var id=<?php echo $id ?>;
	var q= new QRCode(document.getElementById("qr"),{width:70,height:70});
	q.makeCode(id+"");
</script>
</body>
</html>