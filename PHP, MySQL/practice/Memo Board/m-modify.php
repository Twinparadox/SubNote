<?php
	$host="localhost";
	$ID="root";
	$PW="apmsetup";
	$DB="class";
	
	$con=mysql_connect($host,$ID,$PW);
	mysql_select_db($DB,$con);
	
	$result=mysql_query("select * from memo where num=$mnum",$con);
	$wname=mysql_result($result,0,"name");
	$wmemo=mysql_result($result,0,"message");
	
	echo ("<form action=memo2.php?mnum=$mnum method=post>
			<font size=2>이름</font>
			<input type=text size=10 name=iname value='$wname' />
			<font size=2>메모</font>
			<input type=text size=30 maxlength=100 name=imemo value='$wmemo' />
			<input type=submit value=게시하기 />
		</form>
	");

	
	mysql_close($con);
?>