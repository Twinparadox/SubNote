<?php
	$con=mysql_connect("localhost","root","apmsetup");
	mysql_select_db("tparadox",$con);
	
	mysql_query("insert into wordbook(enword,koword) values('$engword', '$korword')",$con);
	mysql_close($con);
?>

Eclipse나 Visual Studio가 더 좋음
