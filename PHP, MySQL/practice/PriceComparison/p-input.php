<?php
$host = 'localhost';
$user = 'root';
$PW = 'apmsetup';
$DB = 'class';

$con = mysql_connect ( $host, $user, $PW );
mysql_select_db ( $DB, $con );

echo ("<table border=0><form action=p-process.php method=post>
		<tr align=center>
		<td><font size=2>��ǰ��</font></td>
		<td><font size=2>��</font></td>
		<td><font size=2>����</font></td>
		<td><font size=2>������</font></td>
		<td><font size=2>11����</font></td>
		<td></td></tr>
		<tr>
		<td><input type=text size=40 name=wproduct></td>
		<td><input type=text size=30 name=wmodel></td>
		<td><input type=text size=10 name=wauction></td>
		<td><input type=text size=10 name=wgmarket></td>
		<td><input type=text size=10 name=wstreet></td>
		<td><input type=submit value=�Է�></td></tr>
	</form></table>");
?>
