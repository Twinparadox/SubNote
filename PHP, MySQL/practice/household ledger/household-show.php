<?php
	$host="localhost";
	$ID="root";
	$PW="apmsetup";
	$DB="class";
	$con=mysql_connect($host,$ID,$PW);
	mysql_select_db($DB,$con);
	
	$result=mysql_query("select * from household order by date",$con);
	$total=mysql_num_rows($result);
	
	// �ۼ��� ����� �ִ��� Ȯ��
	if(!total)
		echo("���� �ۼ��� ������ �����ϴ�.");
	else
	{
		// ǥ �ۼ�
		echo("
			<table border=1 width=850 style=border-collapse:collapse>
			<tr align=center>
				<td>��¥</td>
				<td>����/���⳻��</td>
				<td>����(��)</td>
				<td>����(��)</td>
				<td>�ܾ�(��)</td>
				<td>����/����</td>
			</tr>
		");
			// �Ѽ���, ������, �ܾ� ��� ���� ���� ����
			$i=0;
			$balance=0;
			$total_income=0;
			$total_expense=0;
			// ��º�
			while($i<$total) :
				// ���� ��¥ �̿��� ��¥�� �޶������� Ȯ���ϱ� ���� ���ڿ� ����
				$wdate=mysql_result($result,$i,"date");
				$showdate=substr($wdate,0,10);
				if($i>0)
					$beforedate=substr(mysql_result($result,$i-1,"date"),0,10);
				// ���빰 ����
				$wcontent=mysql_result($result,$i,"content");
				$wincome=mysql_result($result,$i,"income");
				$wexpense=mysql_result($result,$i,"expense");
				// �ܾ�, �Ѽ���, ������ ���
				$balance=$balance+$wincome-$wexpense;
				$total_income=$total_income+$wincome;
				$total_expense=$total_expense+$wexpense;
				
				echo("<tr align=center>");		
				// ���� ������ Ȯ��
				if($showdate==$beforedate)
				{
					echo("<td></td>");
				}
				else
				{
					echo("<td>$showdate</td>");					
				}
				// ���� ���
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
		// ���� ���
		echo("���� �Ѿ� : $total_income");
		echo("��");
		echo("���� �Ѿ� : $total_expense");
		echo("��");
		echo("�ܾ� : $balance");
	}
?>