<?php
ob_start();
?>
<?php
session_start();
?>
<?php
 require_once("include/dbconnection.php");
?>
<?php
$username=$_POST['username'];
$password=$_POST['password'];
?>
<?php
//3.perform database  query
$result=mysql_query("SELECT * FROM users ",$connection);
if (!$result)
die("database query failed:".mysql_error());
//4. Use returned data
$flag=0;
while ($row=mysql_fetch_array($result))
{
    
    if ($row['username']==$username && $row['password']==$password)
    $flag=1;
}
if ($flag==1)
{
 $_SESSION['user_id']=$username;
header("location:myhome.php?username=$username");   

}
else
{
 header("location:wronglogin.php");
}
//5.close the coonection
mysql_close($connection);
?>

<?php
ob_end_flush(); //now the headers are sent
?>