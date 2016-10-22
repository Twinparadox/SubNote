<?php
if (! $mproduct) {
	echo ("<script>
			window.alert('제품명이 입력되지 않았습니다.');
			history.go(-1);
			</script>");
	exit ();
}
if (! $mquantity) {
	echo ("<script>
			window.alert('수량이 입력되지 않았습니다.');
			history.go(-1);
			</script>");
	exit ();
}
if (! $munitprice) {
	echo ("<script>
			window.alert('단가가 입력되지 않았습니다.');
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

mysql_query ( "update list set quantity=$mquantity, unitprice=$munitprice where product='$mproduct'", $con );
mysql_close ( $con );
echo ("<meta http-equiv='Refresh' content='0; url=p-show.php'>");
?>