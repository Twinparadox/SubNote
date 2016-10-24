<?

	$con = mysql_connect("localhost", "root", "apmsetup");
	mysql_select_db("class",$con);
	
	mysql_query("delete from memo where num=$dnum", $con);
	mysql_query("update memo set num=num-1 where num>$dnum", $con);
	
	
	mysql_close($con);
	echo ("<meta http-equiv='Refresh' content='0; url=input.php'>");




?>