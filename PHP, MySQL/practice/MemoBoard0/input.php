<?
echo ("
	<center>
		<form method=post action=process.php>
		이름: <input type=text size=10 name=iname>
		메모: <input type=text size=60 name=icontent>
		<input type = submit value=등록>
		</form>
		</center>
	");

$con = mysql_connect ( "localhost", "root", "apmsetup" );
mysql_select_db ( "class", $con );

$result = mysql_query ( "select * from memo order by num", $con );
$total = mysql_num_rows ( $result );
$i = 0;
echo ("<table border=1 borderwidth=0 width=500 align=center >
		<tr><td>번호</td><td>글쓴이</td>
		<td>날짜</td><td>메모내용</td>
		<td>수정/삭제</td></tr>");
$pagesize = 10;
if ($cpage == "")
	$cpage = 1;
$totalpage = ( int ) ($total / $pagesize);
if (($total % $pagesize) != 0)
	$totalpage = $totalpage + 1;
while ( $i < $pagesize ) : // 세미콜론 없음 잘기억,<로
	$j = ($cpage - 1) * $pagesize + $i;
	if ($j == $total)
		break;
	$onum = mysql_result ( $result, $j, "num" );
	$oname = mysql_result ( $result, $j, "name" );
	$odate = mysql_result ( $result, $j, "date" );
	$ocontent = mysql_result ( $result, $j, "content" );
	echo ("<tr><td>$onum</td> 
				<td>$oname</td>
				<td>$odate</td>
				<td>$ocontent</td>
				<td><center><a href=modify.php?mnum=$onum>O</a>
				/<a href =delete.php?dnum=$onum>X</center></td></tr>");
	echo ("<br>");
	$i ++;
endwhile;
echo ("</table>");
$ppage = $cpage - 1;
$npage = $cpage + 1;

echo ("<center>");

$k = 1;

while ( $k <= $totalpage ) :
	echo ("[<a href=input.php?cpage=$k><font color=black>$k</font></a>]");
	$k ++;
endwhile
;

echo ("</center>");

mysql_close ( $con );

?>