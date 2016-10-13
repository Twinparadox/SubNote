<?php
	$con=mysql_connect("localhost","root","password");
	if(!$con) die('DB 접속 실패'.mysql_error());
	
	mysql_query("set name utf8");
	mysql_set_charset("utf8",$con);
	mysql_select_db("tparadox",$con);
	
	$result=mysql_query("select * from guestboard order by num desc", $con);
	
	$total=mysql_num_rows($result);
	
	if(!$total) {
		echo ("등록된 글이 없습니다.");
	}
	else {
		echo("<table border=1 width=700>
				<tr><td width=50>글 번호</td><td width=100>이름</td><td width=150>쓴 날짜</td><td width=400>메모</td></tr>");
	
	
		$pagesize=5;
		
		if($cpage=='') $cpage=1;
		$endpage=(int)($total/$pagesize);
		if(($total%$pagesize)!=0) $endpage=$endpage+1;
		
		$i=0;
		
		while ($i<$pagesize) :
			$counter = $pagesize * ($cpage-1) + $i;
			if($counter==$total) break;
			$num=mysql_result($result,$counter,"num");
			$name=mysql_result($result,$counter,"name");
			$wdate=mysql_result($result,$counter,"wdate");
			$message=mysql_result($result,$counter,"message");
			
			echo ("<tr><td>$num</td><td>$name</td><td>$wdate</td><td>$message</td></tr>");
			
			$i++;
		
			endwhile;
		
			echo("</table>");
	}
	
	echo("<table border=0 width=700><tr><td align=center>");
	
	$ppage=$cpage-1;
	$npage=$cpage+1;
	
	if($cpage>1) echo("[<a href=memoshow.php?cpage=$ppage>이전 페이지</a>]");
	if($cpage<$endpage) echo("[<a href=memoshow.php?cpage=$npage>다음 페이지</a>]");
	
	echo("</td></tr>
			<tr><td align=center><a href=memo.html>방명록 쓰기</a></td></tr></table>");
	
	mysql_close($con);
?>