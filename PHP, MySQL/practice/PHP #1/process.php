<?
#	echo ("이름 : $iname, 학번 : $inum, 국어 : $ikor, 영어 : $ieng, 수학 : $imath");
	
	$host="localhost";
	$ID="root";
	$PW="apmsetup";
	$DB="class";
	
	$con=mysql_connect($host,$ID,$PW);
	mysql_select_db($DB,$con);
	
	$insertQuery="insert into score values('$iname','$inum',$ikor,$ieng,$imath)";
	mysql_query($insertQuery,$con);
	
	mysql_close($con);
	
	echo("<meta http-equiv='Refresh' content='0; url=show.php'");
?>