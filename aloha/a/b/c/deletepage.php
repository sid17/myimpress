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
// $dbhost = 'localhost';
// $dbuser = 'root';
// $connection = mysql_connect($dbhost, $dbuser);
$id=$_POST['delid'];
$usr=$_GET['username'];
// if(! $connection )
// {
//   die('Could not connect: ' . mysql_error());
// }
$sql = "DELETE FROM $usr ".
       "WHERE  divid = '$id' " ;

// mysql_select_db('myimpress');
$retval = mysql_query( $sql, $connection );
if(! $retval )
{
  die('Could not delete data: ' . mysql_error());
}

$result = mysql_query("SELECT * FROM $usr", $connection);
$num_rows = mysql_num_rows($result);
//echo($num_rows);
$numid=substr($id, 1);
$num=intval($numid);
//echo($num);
for ($i=$num;$i<=$num_rows;$i++)
{
$setid="s".$i;
//echo($setid);
$j=$i+1;
$existid="s".$j;
//echo($existid);
$sql1 = "UPDATE $usr ".
       "SET divid= '$setid' ".
       "WHERE divid = '$existid'" ;
mysql_select_db('myimpress');
$retval1 = mysql_query( $sql1, $connection );
if(! $retval1 )
{
  die('Could not update data: ' . mysql_error());
}
}
echo true ;
mysql_close($connection);
?>