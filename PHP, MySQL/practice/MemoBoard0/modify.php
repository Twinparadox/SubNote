<?
	$con = mysql_connect("localhost", "root", "apmsetup");
	mysql_select_db("class",$con);
	
	$result=mysql_query("select * from memo where num=$mnum", $con);
	$oname = mysql_result($result, 0, "name");
	$ocontent = mysql_result($result, 0, "content");
	echo ("
	<center>
		<form method=post action=process2.php?mnum=$mnum>
		이름: <input type=text size=10 name=iname value='$oname'>
		메모: <input type=text size=60 name=icontent value='$ocontent'>
		<input type = submit value=수정완료>
		</form>
		</center>
	");

?>