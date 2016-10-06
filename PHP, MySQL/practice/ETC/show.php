<?
	$host="localhost";
	$ID="root";
	$PW="apmsetup";
	$DB="class";
	
	$con=mysql_connect($host,$ID,$PW);
	mysql_select_db($DB,$con);
	
	$readQuery="select * from score order by name";
	$result=mysql_query($readQuery,$con);
	$resultline=mysql_num_rows($result);
		
	#echo $resultline;
	
	echo ("
		<table border=1 style=border-collapse:collapse>
			<tr align=center><td width=100>이름</td><td width=200>학번</td><td width=50>국어</td><td width=50>영어</td><td width=50>수학</td><td width=50>총점</td><td width=50>평균</td></tr>
	");
	
	$i=0;
	while ($i<$resultline) :
		$oname=mysql_result($result,$i,"name");
		$onum=mysql_result($result,$i,"num");
		$okor=mysql_result($result,$i,"kor");
		$oeng=mysql_result($result,$i,"eng");
		$omath=mysql_result($result,$i,"math");
		$osum=$okor+$oeng+$omath;
		$oavg=$osum/3;
		
		echo("
			<tr align=center><td>$oname</td><td>$onum</td><td>$okor</td><td>$oeng</td><td>$omath</td><td>$osum</td><td>$oavg</td></tr>
		");
		
		$i++;
	endwhile;
	echo("</table>");
	
	<form action=input.php>
		<input type=submit value='입력으로 돌아가기'>
	</form>
	
	mysql_close($con);
?>