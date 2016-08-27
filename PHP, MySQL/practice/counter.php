<?
// using MySQL DB table
// Connect to DB
	$con = mysql_connect("localhost","root","apmsetup");
	mysql_select_db("tparadox",$con);
	
	$result=mysql_query("select*from counter",$con);
	$total=mysql_num_rows($result);
	
	$today=date("Ymd");
	
	if($total==0) {
		$todaycount=0;
		$totalcount=0;
		$lastlogin=$today;
		mysql_query("insert into counter values ($todaycount, $totalcount, '$lastlogin')",$con);
	}
	else {
		$todaycount=mysql_result($result,0,"today");
		$totalcount=mysql_result($result,0,"total");
		$lastlogin=mysql_result($result,0,"lastlogin");
	}
	
	// if lastlogin is today
	if($lastlogin==$today) {
		$todaycount=$todaycount+1;
	}
	else {
		$todaycount=1;
	}
	
	$totalcount=$totalcount+1;
	
	mysql_query("update counter set today = $todaycount, total = $totalcount, lastlogin='$today'",$con);
	
	echo "TODAY = $todaycount, TOTAL = $totalcount";
	
	mysql_close($con);
?>