<?php
	function check($message) {
		echo ("<script>window.alert(\"$message\");history.go(-1);</script>");
		exit;
	}
	
	if(!$wname) check("�̸��� �Է��ϼ���");
	if(!$wmemo) check("������ �Է��ϼ���");
	
	$con=mysql_connect("localhost","root","password");
	if(!$con) die('DB ���� ����'.mysql_error());
	
	mysql_set_charset("utf8",$con);
	mysql_select_db("tparadox",$con);
	
	$wdate=date("Y-m-d H:i:s");
	
	mysql_query("insert into guestboard(name,wdate,message) values ('$wname','$wdate','$wmemo')", $con);
	
	mysql_close($con);
	
	echo("<meta http-equiv='Refresh' content='0; url=memoshow.php'>");
	
?>