<?php
	include('../dbcon.php');
	$sql= $con->query("select * from users");
	$row = $sql->num_rows;
	if( ( $row%7) ==0 ){
		$page = ($row / 7 );
	}else $page= (int)(1+$row/7);
	for($i=1;$i<=$page;$i++){
		echo '
		<ul class="pagination">
        	<li>
            	<a class="active" href="#" onClick="table('.$i.');">'.$i.'</a>
            </li>
        </ul>
		';
	}
	
?>