<?
echo ("
	<center>
		<form method=post action=process.php>
		�̸�: <input type=text size=10 name=iname>
		�޸�: <input type=text size=60 name=icontent>
		<input type = submit value=���>
		</form>
		</center>
	");

$con = mysql_connect ( "localhost", "root", "apmsetup" );
mysql_select_db ( "class", $con );

$result = mysql_query ( "select * from memo order by num", $con );
$total = mysql_num_rows ( $result );
$i = 0;
echo ("<table border=1 borderwidth=0 width=500 align=center >
		<tr><td>��ȣ</td><td>�۾���</td>
		<td>��¥</td><td>�޸𳻿�</td>
		<td>����/����</td></tr>");
$pagesize = 10;
if ($cpage == "")
	$cpage = 1;
$totalpage = ( int ) ($total / $pagesize);
if (($total % $pagesize) != 0)
	$totalpage = $totalpage + 1;
while ( $i < $pagesize ) : // �����ݷ� ���� �߱��,<��
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