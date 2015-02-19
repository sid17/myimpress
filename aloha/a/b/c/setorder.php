<?php
 require_once("include/dbconnection.php");
?>
<?php
// $dbhost = 'localhost';
// $dbuser = 'root';
// $connection = mysql_connect($dbhost, $dbuser);
// if(! $connection )
// {
//   die('Could not connect: ' . mysql_error());
// }
// mysql_select_db('myimpress');
$neword = $_POST['sorder'];
$usrnew = $_GET['username'];
$result=mysql_query( "UPDATE orderofslide SET neword ='$neword' WHERE username ='$usrnew'", $connection );
if (!$result)
die("database query failed:".mysql_error());
echo true ;
mysql_close($connection);


?>