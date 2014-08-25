<?php
require_once("include/session.php");
?>
<?php
confirm_logged_in();
?>
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$conn = mysql_connect($dbhost, $dbuser);
$id=$_POST['newid'];
$usr=$_GET['username'];
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = "INSERT INTO $usr (divid, posx,posy,posz,rotx,roty,rotz,scale,content)
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