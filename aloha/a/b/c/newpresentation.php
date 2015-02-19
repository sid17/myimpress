<?php
require_once("include/session.php");
?>
<?php
confirm_logged_in();
?>
<?php
 require_once("include/dbconnection.php");
?>

<?php
$name=$_GET['username'];
$up=$_GET['user'];
$count=$_GET['pgcoun'];
$count=$count+1;
echo("$name  $up");

// $connection = mysql_connect('localhost', 'root');
// if(! $connection )
// {
//   die('Could not connect: ' . mysql_error());
// }
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

    $sql2 = "INSERT INTO orderofslide (username, neword)
values ('$name',' ')";  
// mysql_select_db('myimpress');
$retval = mysql_query( $sql, $connection );
$retval2 = mysql_query( $sql2, $connection );

if(! $retval )
{
  die('Could not create table: ' . mysql_error());
}
if (!$retval2)
{
   die('Could not enter into  table: ' . mysql_error());
}
$result=mysql_query("SELECT * FROM users ",$connection);
if (!$result)
die("database query failed:".mysql_error());
$sql1 = "UPDATE users ".
       "SET selfcount = '$count' ".
       "WHERE username = '$up'" ;
mysql_select_db('myimpress');
$retval1 = mysql_query( $sql1, $connection );
if(! $retval1 )
{
  die('Could not update data: ' . mysql_error());
}

header('Location:template4.php?username='.$name);
mysql_close($connection);
?>




