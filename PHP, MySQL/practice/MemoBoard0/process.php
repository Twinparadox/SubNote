<?

	$con = mysql_connect("localhost", "root", "apmsetup");
	mysql_select_db("class",$con);
	
	$idate = date("Y-m-d H:i:s"); //Y=2016 y=16 H=15(24기준) h=3(12기준)
	//echo ("<font size=20>$idate</font>");
	$result = mysql_query("select * from memo", $con);
	$total = mysql_num_rows($result);
	$inum = $total + 1;
	
	mysql_query("insert into memo (num,name,date,content) values('$inum', '$iname', '$idate', '$icontent')", $con);
		
	mysql_close($con);
	echo ("<meta http-equiv='Refresh' content='0; url=input.php'>");



?>