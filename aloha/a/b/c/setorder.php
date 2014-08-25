<?php
$dbhost = 'localhost';
$dbuser = 'root';
$conn = mysql_connect($dbhost, $dbuser);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('myimpress');
$neword = $_POST['sorder'];
$usrnew = $_GET['username'];
$result=mysql_query( "UPDATE orderofslide SET neword ='$neword' WHERE username ='$usrnew'", $conn );
if (!$result)
die("database query failed:".mysql_error());
echo true ;
mysql_close($conn);


?>