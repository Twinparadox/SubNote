<?php
	$host="localhost";
	$ID="root";
	$PW="apmsetup";
	$DB="class";
	
	$con=mysql_connect($host,$ID,$PW);
	mysql_select_db($DB,$con);
	
	$wdate=date("Y-m-d H:i:s");
	
	mysql_query("update memo set name='$iname',0 date='$wdate', message='$imemo' where num=$mnum",$con);
	mysql_close($con);
	
	echo("<meta http-equiv='Refresh' content='0; url=memoshow.php'>")
?>