<?php
$host = 'localhost';
$user = 'root';
$PW = 'apmsetup';
$DB = 'class';

$con = mysql_connect ( $host, $user, $PW );
mysql_select_db ( $DB, $con );

echo ("<table><form action=p-process.php method=post>
		<tr align=center>
		<td><font size=2>��ǰ��</font></td>
		<td><font size=2>����</font></td>
		<td><font size=2>�ܰ�</font></td>
		<td></td>
		</tr>
		<tr>
		<td><input type=text name=wproduct size=30></td>
		<td><input type=text name=wquantity size=10></td>
		<td><input type=text name=wunitprice size=10></td>
		<td><input type=submit value=�Է�></td>		
		</tr>
		</form></table>");
mysql_close ( $con );
?>