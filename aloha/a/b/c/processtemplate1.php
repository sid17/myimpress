<?php
 require_once("include/dbconnection.php");
 ?>
<?php
$id=$_POST['divid'];
$content=$_POST['content1'];
$username1=$_GET['username'];
?>
<?php
$result=mysql_query("SELECT * FROM siddhant ",$connection);
if (!$result)
die("database query failed:".mysql_error());
$sql = "UPDATE siddhant ".
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



