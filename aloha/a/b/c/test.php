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
$slides=$_GET["slides"];
$usern=$_GET['username'];
$elements = $_POST['e8'];
$elements = explode('and', $elements);
$posx=explode(',', $elements[5]);
$posy=explode(',', $elements[6]);
$posz=explode(',', $elements[4]);
$rotx=explode(',', $elements[0]);
$roty=explode(',', $elements[1]);
$rotz=explode(',', $elements[2]);
$scale=explode(',', $elements[3]);




for ($i=0;$i<=$slides;$i++)
{
    $k=$i+1;
    $id="s"."$k";
    $posx[$i]=round(($posx[$i]+70)*5);
   $posy[$i]=round(($posy[$i]+70)*5);
    
$result=mysql_query("SELECT * FROM $usern ",$connection);
if (!$result)
die("database query failed:".mysql_error());
$sql = "UPDATE $usern ".
       "SET posx = '$posx[$i]',posy='$posy[$i]',posz='$posz[$i]',rotx='$rotx[$i]',roty='$roty[$i]',rotz='$rotz[$i]',scale='$scale[$i]' ".
       "WHERE divid = '$id'" ;
mysql_select_db('myimpress');

$retval = mysql_query( $sql, $connection );

if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
}
echo ($slides);
mysql_close($connection);
?>


