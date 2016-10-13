<?php
	$host="localhost";
	$ID="root";
	$PW="apmsetup";
	$DB="class";
	$con=mysql_connect($host,$ID,$PW);
	mysql_select_db($DB,$con);
	
	$result=mysql_query("select * from household where date=$mdate",$con);

	$wcontent=mysql_result($result,0,"content");
	$wincome=mysql_result($result,0,"income");
	$wexpense=mysql_result($result,0,"expense");
	
	echo("<form action=household-modify-process.php?mdate=$mdate method=post>
			<input>
	</form>");
?>