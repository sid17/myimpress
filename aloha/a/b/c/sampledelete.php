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
$id=$_POST['delid'];
$usr=$_GET['username'];
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = "DELETE FROM $usr ".
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