<?php
$host = 'localhost';
$ID = 'root';
$PW = 'apmsetup';
$DB = 'class';

$con = mysql_connect ( $host, $ID, $PW );
mysql_select_db ( $DB, $con );

mysql_query ( "delete from shop where product='$dproduct' and model='$dmodel'", $con );

echo ("<meta http-equiv='Refresh' content='0; p-show.php'>");
?>