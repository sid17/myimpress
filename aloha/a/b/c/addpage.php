<?php
$dbhost = 'localhost';
$dbuser = 'root';
$conn = mysql_connect($dbhost, $dbuser);
$id=$_POST['newid'];
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = "INSERT INTO siddhant(divid, posx,posy,posz,rotx,roty,rotz,scale,content)
values ('$id',0,0,0,0,0,0,1,' ')";
       
mysql_select_db('myimpress');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo true;
mysql_close($conn);
?>