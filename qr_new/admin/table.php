<table id="tableuser" style="text-align:center" class="tablesorter"> 
  <b><caption>User list</caption></b>
  <thead>
  <tr class="tableuser" style="background-color:#999;" >
        <th class="tableuser" width=100> ID</th> 
        <th class="tableuser" width="250">Name</th>
        <th class="tableuser" width="93">Sex</th>
        <th class="tableuser" width="93">Attendance</th>
  </tr> 
  </thead>
  <tbody>
<?php
	include('../dbcon.php');
	$page=$_GET['page'];
	$page=$page-1;
	$user= array();
	$sql= $con->query('Select * from users limit '.($page*7).',7');
	$i=0;
	while($value = mysqli_fetch_array($sql)){
		$sql1= $con->query("Select * from diem_danh where id=".$value["id"]);
		$dd=mysqli_fetch_array($sql1);
		$value["diemdanh"]= $dd["diemdanh"];
		$user[$i]=$value;
		$i++;
	}
	foreach($user as $value){
		if($value['gioi_tinh']==1) $gt="Male";
		else $gt="Female";
		//users.php?uid=
		echo "  <tr class=\"tableuser\">
	<td class=\"tableuser\"><a href='users.php?uid=".$value['id']."'>".$value['id']."</a></td>
	<td class=\"tableuser\">".$value['ho_ten']."</td>
	<td class=\"tableuser\">".$gt."</td>
	<td class=\"tableuser\">".$value["diemdanh"]."</td>
  </tr>
";
	}
?>
</tbody>
</table>
<script>
	$(document).ready(function(e) {
		$("#tableuser").tablesorter(); 
    });
</script>