<?php
	if(!$mcontent)
	{
		echo("
			<script>
				window.alert('����/���� ������ ���� ������ �����ϴ�.');
				history.go(-1);
			</script>
		");
		exit;
	}
	if((!$mincome)&&(!$mexpense))
	{
		echo("
			<script>
				window.alert('����/���� �ݾ׿� ���� ������ �����ϴ�.');
				history.go(-1);
			</script>
		");
		exit;
	}
	$host="localhost";
	$ID="root";
	$PW="apmsetup";
	$DB="class";
	$con=mysql_connect($host,$ID,$PW);
	mysql_select_db($DB,$con);
	mysql_query("update household set income='$mincome', expense='$mexpense', content='$mcontent' where date='$mdate'",$con);
	echo("<meta http-equiv='Refresh' content='0; url=household-show.php'>");
	mysql_close($con);
?>