<?php
if (! $wproduct) {
	echo ("
			<script>
				window.alert('��ǰ���� �Էµ��� �ʾҽ��ϴ�.');
				history.go(-1);
			</script>
		");
	exit ();
}
if (! $wmodel) {
	echo ("
			<script>
				window.alert('�𵨸��� �Էµ��� �ʾҽ��ϴ�.');
				history.go(-1);
			</script>
		");
	exit ();
}
if (! $wauction) {
	echo ("
			<script>
				window.alert('���ǿ����� ������ �Էµ��� �ʾҽ��ϴ�.');
				history.go(-1);
			</script>
		");
	exit ();
}
if (! $wgmarket) {
	echo ("
			<script>
				window.alert('�����Ͽ����� ������ �Էµ��� �ʾҽ��ϴ�.');
				history.go(-1);
			</script>
		");
	exit ();
}
if (! $wstreet) {
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

mysql_query ( "insert into shop(product,model,auction,gmarket,street) values('$wproduct','$wmodel','$wauction','$wgmarket','$wstreet')", $con );

mysql_close ( $con );

echo ("<meta http-equiv='Refresh' content='0; p-show.php'>");
?>