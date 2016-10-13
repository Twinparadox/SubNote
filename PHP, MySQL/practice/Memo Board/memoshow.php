<?php
	$host="localhost";
	$ID="root";
	$PW="apmsetup";
	$DB="class";
	$con=mysql_connect($host,$ID,$PW);
	mysql_select_db($DB,$con);
	
	$result=mysql_query("select * from memo order by num desc",$con);
	
	$total=mysql_num_rows($result);
	
	echo ("<font align=left color=blue><b>작성된 글의 수 : $total</b></font>");
	if(!$total)
		echo ("아직 등록된 글이 없습니다.");
	else {
		echo ("
			<table border=1 width=850 style=border-collapse:collapse>
			<tr align=center>
				<td width=50>No.</td>
				<td width=100>이름</td>
				<td width=150>날짜</td>
				<td width=400>메모</td>
				<td>수정/삭제</td>
			</tr>");
		
		$pagesize=5;
		$i=0;
		
		if ($cpage=='')
			$cpage=1;
		
		$endpage=(int)($total/$pagesize);
		
		if(($total%$pagesize)!=0)
			$endpage=$endpage+1;
				
		while($i<$pagesize) :
			$counter=$pagesize*($cpage-1)+$i;
			if($counter==$total)
				break;
			
			$wname=mysql_result($result,$counter,"name");
			$wdate=mysql_result($result,$counter,"date");
			$wmemo=mysql_result($result,$counter,"message");
			$wnum=mysql_result($result,$counter,"num");
			
			echo ("
				<tr align=center>
					<td>$wnum</td>
					<td>$wname</td>
					<td>$wdate</td>
					<td>$wmemo</td>
					<td>
						<a href=m-modify.php?mnum=$wnum><input type=submit value=수정 /></a>
						<a href=m-delete.php?dnum=$wnum><input type=submit value=삭제 /></a>
					</td>
				</tr>
			");
			
			$i++;
		endwhile;
		
		echo ("</table>");
	}
	
	echo ("<table border=0 width=700>
		<tr><td align=center>");
	$ppage=$cpage-1;
	$npage=$cpage+1;
	
	if($cpage>1)
		echo("[<a href=memoshow.php?cpage=$ppage>이전 페이지</a>]");
	
	if($cpage<$endpage)
		echo("[<a href=memoshow.php?cpage=$npage>다음 페이지</a>]");
	
	echo ("</td></tr>");
	
	$counter=$cpage-2;
	if($counter<0)
		$more=1;
	$showpage=0;

	echo ("<tr><td align=center>");
	echo ("[<a href=memoshow.php?cpage=1>첫 페이지</a>]");
	echo ("[<a href=memoshow.php?cpage=$endpage>마지막 페이지</a>]");
	echo ("</td></tr>");
	
	echo ("<tr><td align=center>");
	while (1):
		if($counter>$endpage)
			break;
		if($counter>$cpage+2)
			break;
		if($counter>0)
		{
			if($counter==$cpage)
				echo("<font color=blue><b>[$counter]</b></font>");
			else
				echo("[<a href=memoshow.php?cpage=$counter>$counter</a>]");
			$counter++;
		}
		else
			$counter++;
	endwhile;
	echo ("</td></tr>");
	
	
	echo ("<tr><td align=center><a href=memo.html><input type=submit value=메모쓰기 /></a></td></tr>
		</talbe>");
	mysql_close($con);
?>