<?php
require_once("include/session.php");
?>
<?php
confirm_logged_in();
?>


<?php
global $tryusername;
 $tryusername=$_GET['username'];
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








<!DOCTYPE html>
<html>
<head>
<?php
 require_once("include/alohainclude.php");
 ?>	
 <link href="include/impress-demo.css" rel="stylesheet" />
<title>Aloha editable impress.js | presentation tool based on the power of CSS3 transforms and transitions in modern browsers </title>
</head>
<body style="background-image:url('https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQ-eEJ0Y58k4KUQwQb9PaKKoYXDxPRNG7a-MKRHdd9f9KPc_3GIwg')">
<div id="impress">
<div class="step" id="step1" style="font-size:80px;width:700px;height:700px;padding:40px;text-align:center;background-color:white;border-radius:50px" data-x="0" data-y="0" >
<p><?php
echo $myrow['step1'];
?></p>
</div>

<div class="step" id="step2" style="font-size:80px;width:700px;height:700px;padding:40px;text-align:center;background-color:white;border-radius:50px" data-x="350" data-y="0" data-z="-350" data-rotate-y="90" data-scale="5" 
 >
 <p><?php
echo $myrow['step2'];
?></p>
</div>

<div class="step"  id="step3" style="font-size:80px;width:700px;height:700px;padding:40px;text-align:center;background-color:white;border-radius:50px" data-x="0" data-y="0" data-z="-700" data-rotate-y="180" >
<p><?php
echo $myrow['step3'];
?></p>
</div>


<div class="step"  id="step4" style="font-size:80px;width:700px;height:700px;padding:40px;text-align:center;background-color:white;border-radius:50px" data-x="-350" data-y="0" data-z="-350" data-rotate-y="270" >
<p><?php
echo $myrow['step4'];
?></p>
</div>
<div class="step"  id="step5" style="font-size:80px;width:700px;height:700px;padding:40px;text-align:center;background-color:white;border-radius:50px" data-x="0" data-y="-350" data-z="-350" data-rotate-x="90" >
<p><?php
echo $myrow['step5'];
?></p>
</div>
<div class="step"   id="step6" style="font-size:80px;width:700px;height:700px;padding:40px;text-align:center;background-color:white;border-radius:50px" data-x="0" data-y="350" data-z="-350" data-rotate-x="-90" >
<p><?php
echo $myrow['step6'];
?></p>
</div>

</div>
<input id="presentprezi"style="background-color:rgb(255,255,255);width:80px;height:34px;border-radius:8px;" 
		 type="button" value="click" onclick="startprezi()">







<form id="form" method="POST" action="processpresentation1.php?username=<?php echo $tryusername; ?>">
	      <textarea style="display:none" id="content1" name="content1">
             </textarea>
             <textarea style="display:none" id="divid" name="divid">
             </textarea>
             <input type="submit" value="Send to backend"/>
              </form>
	      

 
 
 
 
 
 
 
 <?php
 require_once("include/phptransfer.php");
 ?>	
 
 <?php
 require_once("include/impressdemo.php");
 ?>	
<script>
function startprezi()
{
var	$ = Aloha.jQuery,
$body = $('body');
$(".step").each(function() {
$(this).mahalo();});
var t=document.getElementById("presentprezi");
t.parentNode.removeChild(t);
impress().init();
}
</script> 
</body>
</html>
