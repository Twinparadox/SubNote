<?php
if (! $wproduct) {
	echo ("<script>
			window.alert('��ǰ���� �Էµ��� �ʾҽ��ϴ�.');
			history.go(-1);
			</script>");
	exit ();
}
if (! $wquantity) {
	echo ("<script>
			window.alert('������ �Էµ��� �ʾҽ��ϴ�.');
			history.go(-1);
			</script>");
	exit ();
}
if (! $wunitprice) {
	echo ("<script>
			window.alert('�ܰ��� �Էµ��� �ʾҽ��ϴ�.');
			history.go(-1);
			</script>");
	exit ();
}

$host = 'localhost';
$user = 'root';
$PW = 'apmsetup';
$DB = 'class';

$con = mysql_connect ( $host, $user, $PW );
mysql_select_db ( $DB, $con );

$result = mysql_query ( "select * from list where product='$wproduct'", $con );
$already = mysql_num_rows ( $result );
if (! $already) {
	mysql_query ( "insert into list(product,quantity,unitprice) values('$wproduct','$wquantity','$wunitprice')", $con );
}
else {
	$prevprice = mysql_result ( $result, 0, "unitprice" );
	$prevquantity = mysql_result ( $result, 0, "quantity" );
	$wunitprice = (($prevprice * $prevquantity) + ($wunitprice * $wquantity)) / ($prevquantity + $wquantity);
	mysql_query ( "update list set unitprice=$wunitprice, quantity=quantity+$wquantity where product='$wproduct'" );
}
mysql_close ( $con );

echo ("<meta http-equiv='Refresh' content='0; p-show.php'>");
?>