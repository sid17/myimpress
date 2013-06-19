<?php
$dbhost = 'localhost';
$dbuser = 'root';
$conn = mysql_connect($dbhost, $dbuser);
$id=$_POST['delid'];
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = "DELETE FROM siddhant ".
       "WHERE  divid = '$id' " ;

mysql_select_db('myimpress');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not delete data: ' . mysql_error());
}

echo true ;
mysql_close($conn);
?>