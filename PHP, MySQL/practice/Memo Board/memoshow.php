<?php
	$host="localhost";
	$ID="root";
	$PW="apmsetup";
	$DB="class";
	$con=mysql_connect($host,$ID,$PW);
	mysql_select_db($DB,$con);
	
	$result=mysql_query("select * from memo order by num desc",$con);
	
	$total=mysql_num_rows($result);
	
	echo ("<font align=left color=blue><b>�ۼ��� ���� �� : $total</b></font>");
	if(!$total)
		echo ("���� ��ϵ� ���� �����ϴ�.");
	else {
		echo ("
			<table border=1 width=850 style=border-collapse:collapse>
			<tr align=center>
				<td width=50>No.</td>
				<td width=100>�̸�</td>
				<td width=150>��¥</td>
				<td width=400>�޸�</td>
				<td>����/����</td>
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
						<a href=m-modify.php?mnum=$wnum><input type=submit value=���� /></a>
						<a href=m-delete.php?dnum=$wnum><input type=submit value=���� /></a>
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
		echo("[<a href=memoshow.php?cpage=$ppage>���� ������</a>]");
	
	if($cpage<$endpage)
		echo("[<a href=memoshow.php?cpage=$npage>���� ������</a>]");
	
	echo ("</td></tr>");
	
	$counter=$cpage-2;
	if($counter<0)
		$more=1;
	$showpage=0;

	echo ("<tr><td align=center>");
	echo ("[<a href=memoshow.php?cpage=1>ù ������</a>]");
	echo ("[<a href=memoshow.php?cpage=$endpage>������ ������</a>]");
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
	
	
	echo ("<tr><td align=center><a href=memo.html><input type=submit value=�޸𾲱� /></a></td></tr>
		</talbe>");
	mysql_close($con);
?>