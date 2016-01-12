<?php
	include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Home Page</title>
<link href="style/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="style/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery.2.1.1.min.js"></script>
<script src="js/jquery.tablesorter.js"></script>
<script >
	$(document).ready(function(e) {
        $("#userlist").load("table.php?page=1");
		$("#pagi").load("pagination.php");		
    });
</script>
</head>

<body class="container">

<div class="profile">
	<b id="welcome">Welcome <i><?php echo $_SESSION['login_user']; ?></i> </b>
	<span id="logout" style="text-align:right"><a class="btn-blue" href="logout.php">Log Out</a></span>
</div>
<div class="nav">
	<nav style="margin-left:5px;">
  		<a style="color:#09F" href="#userlist">Users</a> 
	</nav>
</div>
<!--          table user         -->
<div id="userlist" class="mytable" style="margin-left:250px"></div>
<!--		1 2 3					 -->
<div id="pagi" style="margin-left:250px"></div>

  <script>
	function table(page){
		$("#userlist").load("table.php?page="+page);
	}
	
	
  </script>
</body>
</html>