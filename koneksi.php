<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "db_asset";
$link= mysqli_connect ($dbhost, $dbuser, $dbpass, $database);
if (!$link)
	{
		die("Maaf Koneksi gagal :" .mysqli_connect_errno().
	" - " .mysqli_connect_error());
	}
?>