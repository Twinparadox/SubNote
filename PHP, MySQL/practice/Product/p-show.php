<?php
$host = 'localhost';
$user = 'root';
$PW = 'apmsetup';
$DB = 'class';

$con = mysql_connect ( $host, $user, $PW );
mysql_select_db ( $DB, $con );

$result = mysql_query ( "select * from list" );
$total = mysql_num_rows ( $result );

if (! $total) {
	echo ("<a href='p-input.php'><input type=submit value='��ǰ �Է��ϱ�'></a>");
	echo ("��ϵ� ��ǰ�� �����ϴ�");
} else {
	echo ("<a href='p-input.php'><input type=submit value='��ǰ �Է��ϱ�'></a>");
	echo ("<table border=1 width=900 style=border-collapse:collapse;>
			<tr align=center>
			<td>��ǰ��</td>
			<td>����</td>
			<td>�ܰ�</td>
			<td>��ǰ �Ѿ�</td>
			<td>����/����</td></tr>");
	$i = 0;
	while ( $i < $total ) :
		$wproduct = mysql_result ( $result, $i, "product" );
		$wquantity = mysql_result ( $result, $i, "quantity" );
		$wunitprice = mysql_result ( $result, $i, "unitprice" );
		$totalprice = $wquantity * $wunitprice;
		echo ("<tr align=center>
				<td>$wproduct</td>
				<td>$wquantity</td>
				<td>$wunitprice</td>
				<td>$totalprice</td>");
		echo ("<td><a href='p-modify.php?mproduct=$wproduct'>[M]</a>/<a href='p-delete.php?dproduct=$wproduct'>[X]</a></td></tr>");
		$i ++;
	endwhile;
}
mysql_close ( $con );
?>