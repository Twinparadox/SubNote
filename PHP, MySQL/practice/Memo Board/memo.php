<?php
	$host="localhost";
	$ID="root";
	$PW="apmsetup";
	$DB="class";
	
	function check($message){
		echo("
			<script>
				window.alert(\"$message\");
				history.go(-1);
			</script>");
	}
	if(!$wname)
		check("�̸��� �Է��ϼ���");
	if(!$wmemo)
		check("������ �Է��ϼ���");


	
	$con=mysql_connect($host,$ID,$PW);
	mysql_select_db($DB,$con);
	
	$wdate = date("Y-m-d H:i:s");
	
	mysql_query("insert into memo(name,date,message) values ('$wname','$wdate','$wmemo')",$con);
	mysql_close($con);
	
	echo("<meta http-equiv='Refresh' content='0; url=memoshow.php'>")
?>