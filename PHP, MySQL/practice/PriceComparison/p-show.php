<?php
$host = 'localhost';
$ID = 'root';
$PW = 'apmsetup';
$DB = 'class';

$con = mysql_connect ( $host, $ID, $PW );
mysql_select_db ( $DB, $con );
$result = mysql_query ( "select * from shop", $con );
$total = mysql_num_rows ( $result );

if (! $total) {
	echo ("아직 등록된 글이 없습니다.");
}
else {
	echo ("
			<table border=1 width=900 style=border-collapse:collapse;>
			<tr align=center><td>상품명</td><td>모델</td><td>옥션</td><td>지마켓</td><td>11번가</td><td>최저가</td><td>수정/삭제</td></tr>
		");
	
	$i = 0;
	while ( $i < $total ) :
		$wproduct = mysql_result ( $result, $i, "product" );
		$wmodel = mysql_result ( $result, $i, "model" );
		$wauction = mysql_result ( $result, $i, "auction" );
		$wgmarket = mysql_result ( $result, $i, "gmarket" );
		$wstreet = mysql_result ( $result, $i, "street" );
		echo ("
			<tr align=center>
				<td>$wproduct</td>
				<td>$wmodel</td>
				<td>$wauction</td>
				<td>$wgmarket</td>
				<td>$wstreet</td>
			");
		if ($wauction < $wgmarket) {
			if ($wauction < $wstreet) {
				$showmin=number_format($wauction);
				echo ("<td>옥션($showmin");
				echo ("원)</td>");
			}
			else {
				$showmin=number_format($wstreet);
				echo ("<td>11번가($showmin");
				echo ("원)</td>");
			}
		}
		else {
			if ($wgmarket < $wstreet) {
				$showmin=number_format($wgmarket);
				echo ("<td>지마켓($showmin");
				echo ("원)</td>");
			}
			else {
				$showmin=number_format($wstreet);
				echo ("<td>11번가($showmin");
				echo ("원)</td>");
			}
		}
		echo ("<td><a href='p-modify.php?mproduct=$wproduct&mmodel=$wmodel'>[M]</a>/<a href='p-delete.php?dproduct=$wproduct&dmodel=$wmodel'>[X]</a></td></tr>");
		$i ++;
	endwhile;
	echo("</table>");
}
echo("<a href=p-input.php><input type=submit value='내용 추가'></a>");

mysql_close ( $con );
?>