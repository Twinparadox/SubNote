<?php
	$host='localhost';
	$user='root';
	$PW='apmsetup';
	$DB='class';
	
	$con=mysql_connect($host,$user,$PW);
	mysql_select_db($DB,$con);
	
	echo ("	<form action=household-process.php method=post>
		<font size=2>수입/지출내역</font>
		<input type=text size=30 name=wcontent>
		<font size=2>수입(원)</font>
		<input type=text size=10 name=wincome>
		<font size=2>지출(원)</font>
		<input type=text size=10 name=wexpense>
		<input type=submit value=입력>
	</form> ");
	
?>
