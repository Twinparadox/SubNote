<?php
if (! $mproduct) {
	echo ("
			<script>
				window.alert('��ǰ���� �Էµ��� �ʾҽ��ϴ�.');
				history.go(-1);
			</script>
		");
	exit ();
}
if (! $mmodel) {
	echo ("
			<script>
				window.alert('�𵨸��� �Էµ��� �ʾҽ��ϴ�.');
				history.go(-1);
			</script>
		");
	exit ();
}
if (! $mauction) {
	echo ("
			<script>
				window.alert('���ǿ����� ������ �Էµ��� �ʾҽ��ϴ�.');
				history.go(-1);
			</script>
		");
	exit ();
}
if (! $mgmarket) {
	echo ("
			<script>
				window.alert('�����Ͽ����� ������ �Էµ��� �ʾҽ��ϴ�.');
				history.go(-1);
			</script>
		");
	exit ();
}
if (! $mstreet) {
	echo ("
			<script>
				window.alert('11���������� ������ �Էµ��� �ʾҽ��ϴ�.');
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