<?php
	$host="localhost";
	$ID="root";
	$PW="apmsetup";
	$DB="class";
	$con=mysql_connect($host,$ID,$PW);
	mysql_select_db($DB,$con);
	
	$result=mysql_query("select * from household order by date",$con);
	$total=mysql_num_rows($result);
	
	// 작성된 가계부 있는지 확인
	if(!total)
		echo("아직 작성된 내역이 업습니다.");
	else
	{
		// 표 작성
		echo("
			<table border=1 width=850 style=border-collapse:collapse>
			<tr align=center>
				<td>날짜</td>
				<td>수입/지출내역</td>
				<td>수입(원)</td>
				<td>지출(원)</td>
				<td>잔액(원)</td>
				<td>수정/삭제</td>
			</tr>
		");
			// 총수입, 총지출, 잔액 계산 위한 변수 선언
			$i=0;
			$balance=0;
			$total_income=0;
			$total_expense=0;
			// 출력부
			while($i<$total) :
				// 이전 날짜 이용해 날짜가 달라지는지 확인하기 위해 문자열 추출
				$wdate=mysql_result($result,$i,"date");
				$showdate=substr($wdate,0,10);
				if($i>0)
					$beforedate=substr(mysql_result($result,$i-1,"date"),0,10);
				// 내용물 저장
				$wcontent=mysql_result($result,$i,"content");
				$wincome=mysql_result($result,$i,"income");
				$wexpense=mysql_result($result,$i,"expense");
				// 잔액, 총수입, 총지출 계산
				$balance=$balance+$wincome-$wexpense;
				$total_income=$total_income+$wincome;
				$total_expense=$total_expense+$wexpense;
				
				echo("<tr align=center>");		
				// 같은 날인지 확인
				if($showdate==$beforedate)
				{
					echo("<td></td>");
				}
				else
				{
					echo("<td>$showdate</td>");					
				}
				// 내용 출력
				echo("
					<td>$content</td>
					<td>$wincome</td>
					<td>$wexpense</td>
					<td>$balance</td>
					<td><a href=household-modify.php?mdate=$wdate>[M]</a>/<a href=household-delete.php>[X]</a></td>
					</tr>
				");				
				
				$i++;
			endwhile;
		echo("</table>");
		// 최종 출력
		echo("수입 총액 : $total_income");
		echo("원");
		echo("지출 총액 : $total_expense");
		echo("원");
		echo("잔액 : $balance");
	}
?>