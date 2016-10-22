<?php
$host = 'localhost';
$ID = 'root';
$PW = 'apmsetup';
$DB = 'class';

$con = mysql_connect ( $host, $ID, $PW );
mysql_select_db ( $DB, $con );

mysql_query ( "delete from list where product='$dproduct'", $con );
mysql_close ( $con );
echo ("<meta http-equiv='Refresh' content='0; url=p-show.php'>");
?>