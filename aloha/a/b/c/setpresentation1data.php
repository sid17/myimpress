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
 require_once("include/constant.php");
 ?>
<?php
$username=$tryusername;
//perform database  query
$result=mysql_query("SELECT * FROM presentation1 WHERE username='$username'",$connection);
if (!$result)
die("database query failed:".mysql_error());


//4. Use returned data
$myrow=array();
while ($row=mysql_fetch_array($result))
{
    $myrow=$row;
    /*$length=count($row);
    echo $length."<br/>";
    for ($i=1;$i<=$length;$i++)
    {
  $step="step".$i;
  if($row[$step]!=NULL)
  {
  echo $row[$step];
  }
    }*/
}


if (empty($myrow))
{
   
    $result=mysql_query("SELECT * FROM presentation1 WHERE username='siddhant'",$connection);
if (!$result)
die("database query failed:".mysql_error());
global $myrow;
while ($row=mysql_fetch_array($result))
{
     $myrow=$row;
}

}



//5.close the coonection
mysql_close($connection);
?>

