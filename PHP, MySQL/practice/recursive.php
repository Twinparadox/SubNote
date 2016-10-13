<?
	Function Test()
	{
		static $count=0;
		$count++;
		echo ("$count\t");
		if($count<10)
		{
			Test();
		}
	}
?>