<?php
	$host='localhost';
	$user='root';
	$PW='apmsetup';
	$DB='class';
	
	$con=mysql_connect($host,$user,$PW);
	mysql_select_db($DB,$con);
	
	echo ("<table><form action=household-process.php method=post>
			<tr align=center>
			<td><font size=2>수입/지출내역</font></td>
			<td><font size=2>수입</font></td>
			<td><font size=2>지출</font></td>
			<td></td>			</tr>
			<tr>
			<td><input type=text size=30 name=wcontent></td>
			<td><input type=text size=10 name=wincome></td>
			<td><input type=text size=10 name=wexpense></td>
			<td><input type=submit value=입력></td></tr>
	</form></table> ");
	
?>
