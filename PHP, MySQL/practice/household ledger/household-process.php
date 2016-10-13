<?php
	$host='localhost';
	$user='root';
	$PW='apmsetup';
	$DB='class';
	
	$con=mysql_connect($host,$user,$PW);
	mysql_select_db($DB,$con);
	
	function check($message){
		echo("
			<script>
				window.alert(\"$message\");
				history.go(-1);
			</script>");
		exit;
	}
	if(!$wcontent)
		check("수입/지출내역을 입력하세요");
	if(!$wincome && !$wexpense)
		check("수입이나 지출사항을 입력하세요");
	
	// 수입, 지출 공백인 경우 0 저장
	if(!$wincome)
		$wincome=0;
	if(!$wexpense)
		$wexpense=0;
	
	$wdate = date("Y-m-d H:i:s");
	
	// 쿼리 삽입
	mysql_query("insert into household(date,content,income,expense) values ('$wdate','$wcontent','$wincome','$wexpense')",$con);
	mysql_close($con);
	
	echo("<meta http-equiv='Refresh' content='0; url=household-show.php'>")
?>