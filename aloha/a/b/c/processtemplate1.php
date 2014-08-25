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
$id=$_POST['divid'];
$content=$_POST['content1'];
$username1=$_GET['username'];
?>
<?php
$result=mysql_query("SELECT * FROM $username1 ",$connection);
if (!$result)
die("database query failed:".mysql_error());
$sql = "UPDATE $username1 ".
       "SET content = '$content' ".
       "WHERE divid = '$id'" ;
mysql_select_db('myimpress');
$retval = mysql_query( $sql, $connection );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
mysql_close($connection);
?>



