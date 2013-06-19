<?php
ob_start();
?>
<?php
 require_once("include/dbconnection.php");
 ?>
<?php
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];

//insert into the database
//$sql = 'INSERT INTO users '.
      // '(username, firstname, lastname,email,password) '.
       //'VALUES ($username,$firstname,$lastname,$email,$password)';
$sql ="INSERT INTO users(username, firstname, lastname,email,password) values ('$username','$firstname','$lastname','$email','$password')";
mysql_select_db('test_db');
$retval = mysql_query( $sql, $connection );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
include ("registered.php");
mysql_close($connection);
?>
<?php
ob_end_flush(); //now the headers are sent
?>

