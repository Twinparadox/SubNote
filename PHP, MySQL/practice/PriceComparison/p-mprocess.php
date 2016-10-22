<?php
if (! $mproduct) {
	echo ("
			<script>
				window.alert('상품명이 입력되지 않았습니다.');
				history.go(-1);
			</script>
		");
	exit ();
}
if (! $mmodel) {
	echo ("
			<script>
				window.alert('모델명이 입력되지 않았습니다.');
				history.go(-1);
			</script>
		");
	exit ();
}
if (! $mauction) {
	echo ("
			<script>
				window.alert('옥션에서의 가격이 입력되지 않았습니다.');
				history.go(-1);
			</script>
		");
	exit ();
}
if (! $mgmarket) {
	echo ("
			<script>
				window.alert('지마켓에서의 가격이 입력되지 않았습니다.');
				history.go(-1);
			</script>
		");
	exit ();
}
if (! $mstreet) {
	echo ("
			<script>
				window.alert('11번가에서의 가격이 입력되지 않았습니다.');
				history.go(-1);
			</script>
		");
	exit ();
}

$host = 'localhost';
$ID = 'root';
$PW = 'apmsetup';
$DB = 'class';

$con = mysql_connect ( $host, $ID, $PW );
mysql_select_db ( $DB, $con );
mysql_query ( "update shop set product='$mwproduct', model='$mwmodel', auction='$mauction', gmarket='$mgmarket', street='$mstreet' where product='$mproduct' and model='$mmodel'", $con );
echo ("<meta http-equiv='Refresh' content='0; url=p-show.php'>");
mysql_close ( $con );
?>