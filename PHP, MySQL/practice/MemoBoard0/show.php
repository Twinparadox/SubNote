<?
	$con = mysql_connect("localhost", "root", "apmsetup");
	mysql_select_db("class",$con);
	
	$result=mysql_query("select * from memo order by date desc", $con);
	$total = mysql_num_rows($result);
	$i = 0;
	echo ("<table border=1 width=500 align=center>
	<tr><td>번호</td><td>글쓴이</td>
	<td>날짜</td><td>메모내용</td></tr>");
	while ($i < $total):    
		$j = $i + 1;
		$oname = mysql_result($result, $i, "name");
		$odate = mysql_result($result, $i, "date");
		$ocontent = mysql_result($result, $i, "content");
		echo ("<tr><td>$j</td> 
				<td>$oname</td>
				<td>$odate</td>
				<td>$ocontent</td></tr>");
		echo ("<br>");
		$i++;
		endwhile;
		echo ("</table>");
	mysql_close($con);
?>