<?
#	echo("Hello World...");

	echo ("
		<form method=post action=process.php>
			�̸� : <input type=text size=10 name=iname>
			<br>
			�й� : <input type=text size=10 name=inum>
			<br>
			���� : <input type=text size=5 name=ikor>
			<br>
			���� : <input type=text size=5 name=ieng>
			<br>
			���� : <input type=text size=5 name=imath>
			<br>
			<input type=submit value='���'>
		</form>
	");
	echo("
		<form action=show.php>
			<input type=submit value='DB ����'>
		</form>
	");
?>