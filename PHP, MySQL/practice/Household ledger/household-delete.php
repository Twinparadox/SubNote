<?php
	$host='localhost';
	$user='root';
	$PW='apmsetup';
	$DB='class';
	
	$con=mysql_connect($host,$user,$PW);
	mysql_select_db($DB,$con);
	mysql_query("delete from household where date='$ddate'");
	echo("<meta http-equiv='Refresh' content='0; url=household-show.php'>");
	mysql_close($con);
?>