<?
#	echo("Hello World...");

	echo ("
		<form method=post action=process.php>
			이름 : <input type=text size=10 name=iname>
			<br>
			학번 : <input type=text size=10 name=inum>
			<br>
			국어 : <input type=text size=5 name=ikor>
			<br>
			영어 : <input type=text size=5 name=ieng>
			<br>
			수학 : <input type=text size=5 name=imath>
			<br>
			<input type=submit value='등록'>
		</form>
	");
	echo("
		<form action=show.php>
			<input type=submit value='DB 보기'>
		</form>
	");
?>