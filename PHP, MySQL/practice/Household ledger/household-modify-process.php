<?php
	if(!$mcontent)
	{
		echo("
			<script>
				window.alert('수입/지출 내역에 대한 내용이 없습니다.');
				history.go(-1);
			</script>
		");
		exit;
	}
	if((!$mincome)&&(!$mexpense))
	{
		echo("
			<script>
				window.alert('수입/지출 금액에 대한 내용이 없습니다.');
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