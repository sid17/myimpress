<?php
require_once("include/session.php");
?>
<?php
confirm_logged_in();
?>


<?php
$name=$_GET['username'];
$up=$_GET['user'];
$count=$_GET['pgcoun'];
$count=$count+1;
echo("$name  $up");

$conn = mysql_connect('localhost', 'root');
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
$sql = "CREATE TABLE $name( ".
       "divid VARCHAR(50) NOT NULL, ".
       "posx INT(8) NOT NULL, ".
       "posy INT(8) NOT NULL,  ".
       "posz INT(8) NOT NULL, ".
       "rotx INT(8) NOT NULL,  ".
       "roty INT(8) NOT NULL,  ".
       "rotz INT(8) NOT NULL,  ".
       "scale INT(8) NOT NULL,  ".
       "content TEXT NOT NULL,  ".
       "PRIMARY KEY ( divid )) ";

mysql_select_db('myimpress');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not create table: ' . mysql_error());
}

$result=mysql_query("SELECT * FROM users ",$conn);
if (!$result)
die("database query failed:".mysql_error());
$sql1 = "UPDATE users ".
       "SET selfcount = '$count' ".
       "WHERE username = '$up'" ;
mysql_select_db('myimpress');
$retval1 = mysql_query( $sql1, $conn );
if(! $retval1 )
{
  die('Could not update data: ' . mysql_error());
}

header('Location:template4.php?username='.$name);
mysql_close($conn);
?>




mysql_close($connection);