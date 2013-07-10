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
//3.perform database  query
$result=mysql_query("SELECT * FROM presentation3 ",$connection);
if (!$result)
die("database query failed:".mysql_error());
//4. Use returned data
$flag=0;
while ($row=mysql_fetch_array($result))
{
    
    if ($row['username']==$username1 )
    $flag=1;
}
if ($flag==1)
{
$sql = "UPDATE presentation3 ".
       "SET $id = '$content' ".
       "WHERE username = '$username1'" ;
mysql_select_db('myimpress');
$retval = mysql_query( $sql, $connection );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}


}
else
{
 $sql ="INSERT INTO presentation3(username, $id) values ('$username1','$content')";
mysql_select_db('test_db');
$retval = mysql_query( $sql, $connection );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
 
}
}     
mysql_close($connection);
?>



