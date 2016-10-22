<?php
$host = 'localhost';
$user = 'root';
$PW = 'apmsetup';
$DB = 'class';

$con = mysql_connect ( $host, $user, $PW );
mysql_select_db ( $DB, $con );

$result = mysql_query ( "select * from list where product='$mproduct'", $con );

$wquantity = mysql_result ( $result, 0, "quantity" );
$wunitprice = mysql_result ( $result, 0, "unitprice" );

echo ("<table border=0><form action='p-mprocess.php?mproduct=$mproduct' method=post>
		<tr align=center>
		<td><font size=2>상품명</font></td>
		<td><font size=2>수량</font></td>
		<td><font size=2>단가</font></td>
		<td></td>
		</tr>
		<tr>
		<td><input type=text value='$mproduct' name=mproduct size=30></td>
		<td><input type=text value='$wquantity' name=mquantity size=10></td>
		<td><input type=text value='$wunitprice' name=munitprice size=10></td>
		<td><input type=submit value=입력></td>
		</tr>
		</form></table>");
mysql_close ( $con );
?>