<?php
	function check($message) {
		echo ("<script>window.alert(\"$message\");history.go(-1);</script>");
		exit;
	}
	
	if(!$wname) check("이름을 입력하세요");
	if(!$wmemo) check("내용을 입력하세요");
	
	$con=mysql_connect("localhost","root","password");
	if(!$con) die('DB 접속 실패'.mysql_error());
	
	mysql_set_charset("utf8",$con);
	mysql_select_db("tparadox",$con);
	
	$wdate=date("Y-m-d H:i:s");
	
	mysql_query("insert into guestboard(name,wdate,message) values ('$wname','$wdate','$wmemo')", $con);
	
	mysql_close($con);
	
	echo("<meta http-equiv='Refresh' content='0; url=memoshow.php'>");
	
?>