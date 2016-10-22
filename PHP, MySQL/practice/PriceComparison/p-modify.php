<?php
$host = 'localhost';
$ID = 'root';
$PW = 'apmsetup';
$DB = 'class';

$con = mysql_connect ( $host, $ID, $PW );
mysql_select_db ( $DB, $con );
$result = mysql_query ( "select * from shop where product='$mproduct' and model='$mmodel'", $con );

$wproduct = mysql_result ( $result, 0, "product" );
$wmodel = mysql_result ( $result, 0, "model" );
$wauction = mysql_result ( $result, 0, "auction" );
$wgmarket = mysql_result ( $result, 0, "gmarket" );
$wstreet = mysql_result ( $result, 0, "street" );

echo ("<table border=0><form action='p-mprocess.php?mproduct=$mproduct&mmodel=$mmodel' method=post>
		<tr align=center>
		<td><font size=2>상품명</font></td>
		<td><font size=2>모델</font></td>
		<td><font size=2>옥션</font></td>
		<td><font size=2>지마켓</font></td>
		<td><font size=2>11번가</font></td>
		<td></td></tr>
		<tr>
		<td><input type=text size=40 value='$wproduct' name=mwproduct></td>
		<td><input type=text size=30 value='$wmodel' name=mwmodel></td>
		<td><input type=text size=10 value='$wauction' name=mauction></td>
		<td><input type=text size=10 value='$wgmarket' name=mgmarket></td>
		<td><input type=text size=10 value='$wstreet' name=mstreet></td>
		<td><input type=submit value=수정완료></td></tr>
	</form></table>");
?>