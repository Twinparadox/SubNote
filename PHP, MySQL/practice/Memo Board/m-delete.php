<?php
	$host="localhost";
	$ID="root";
	$PW="apmsetup";
	$DB="class";
	
	$con=mysql_connect($host,$ID,$PW);
	mysql_select_db($DB,$con);
	
	mysql_query("delete from memo where num=$dnum");
	
	echo("<meta http-equiv='Refresh' content='0; url=memoshow.php'>");
	mysql_close($con);
?>