<?php
//require_once("include/session.php");
?>
<?php
//confirm_logged_in();
?>
<!-- it is used as the base for the templates -->




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
$result=mysql_query("SELECT * FROM presentation3 WHERE username='$username'",$connection);
if (!$result)
die("database query failed:".mysql_error());


//4. Use returned data
$myrow=array();
while ($row=mysql_fetch_array($result))
{
    $myrow=$row;
   
}


if (empty($myrow))
{
   
    $result=mysql_query("SELECT * FROM presentation3 WHERE username='siddhant'",$connection);
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
 require_once("include/alohainclude.php");   // to allow the aloha configuration files
 ?>	
 <link href="include/impress-demo.css" rel="stylesheet" />

<script type="text/javascript" src="jquery/jquery-1.4.2.min.js"></script><title>Aloha editable impress.js | presentation tool based on the power of CSS3 transforms and transitions in modern browsers </title>
</head>
<body style="background-image:url('images/red3.jpg')">
<div id="impress">
<div class="step" id="step1" style="font-size:40px;width:760px;height:760px;padding:40px;text-align:center;background-color:white;border-radius:100%;color:rgb(50,50,50)" data-x="0" data-y="0" data-scale="10">
<p><?php
echo $myrow['step1'];
?></p>
</div>
<div class="step" id="overview" data-x="0" data-y="0" data-z="0" data-scale="22"></div>

<div class="step" id="step2" style="font-size:40px;width:1000px;height:740px;padding:40px;text-align:center;background-color:white;border-radius:100%;color:rgb(50,50,50)" data-x="0" data-y="-7500"   data-scale="5" 
 >
 <p><?php
echo $myrow['step2'];
?></p>
</div>
<div class="step" id="step3" style="font-size:40px;width:1000px;height:740px;padding:40px;text-align:center;background-color:white;border-radius:100%;color:rgb(50,50,50)" data-x="0" data-y="-7500" data-z="-50000" data-rotate-z="180"  data-scale="1" 
 >
 <p><?php
echo $myrow['step3'];
?></p>
</div>
<div class="step" id="overview" data-x="0" data-y="0" data-z="0" data-scale="22"></div>
<div class="step"  id="step4" style="font-size:40px;width:1000px;height:740px;padding:40px;text-align:center;background-color:white;border-radius:100%;color:rgb(50,50,50)" data-x="7500" data-y="0" data-z="0" data-scale="5"  >
<p><?php
echo $myrow['step4'];
?></p>
</div>

<div class="step"  id="step5" style="font-size:40px;width:1000px;height:740px;padding:40px;text-align:center;background-color:white;border-radius:100%;color:rgb(50,50,50)" data-x="7500" data-y="0" data-z="-50000" data-rotate-z="180" data-scale="1"  >
<p><?php
echo $myrow['step5'];
?></p>
</div>
<div class="step" id="overview" data-x="0" data-y="0" data-z="0" data-scale="22"></div>
<div class="step"  id="step6" style="font-size:40px;width:1000px;height:740px;padding:40px;text-align:center;background-color:white;border-radius:100%;color:rgb(50,50,50)" data-x="0" data-y="7500" data-z="0" data-scale="5"  >
<p><?php
echo $myrow['step6'];
?></p>
</div>
<div class="step"  id="step7" style="font-size:40px;width:1000px;height:740px;padding:40px;text-align:center;background-color:white;border-radius:100%;color:rgb(50,50,50)" data-x="0" data-y="7500" data-z="-50000" data-rotate-z="180" data-scale="1"  >
<p><?php
echo $myrow['step7'];
?></p>
</div>
<div class="step" id="overview" data-x="0" data-y="0" data-z="0" data-scale="22"></div>
<div class="step"  id="step8" style="font-size:40px;width:1000px;height:740px;padding:40px;text-align:center;background-color:white;border-radius:100%;color:rgb(50,50,50)" data-x="-7500" data-y="0" data-z="0" data-scale="5"   >
<p><?php
echo $myrow['step8'];
?></p>
</div>
<div class="step"   id="step9" style="font-size:40px;width:1000px;height:740px;padding:40px;text-align:center;background-color:white;border-radius:100%;color:rgb(50,50,50)" data-x="-7500" data-y="0" data-z="-50000" data-rotate-z="180" data-scale="1"  >
<p><?php
echo $myrow['step9'];
?></p>
</div>
<div class="step" id="overview" data-x="0" data-y="0" data-z="0" data-scale="22"></div>

</div>
<button id="presentprezi"style="background-color:rgb(255,255,255);width:120px;height:55px;border-radius:15px;cursor:pointer" 
		   onclick="startprezi()"><h2>Present</h2></button>




<!-- form process presentation that is updates and inserts the elements-->


<form id="form" method="POST" action="processpresentation3.php?username=<?php echo $tryusername; ?>">
	      <textarea style="display:none" id="content1" name="content1">
             </textarea>
             <textarea style="display:none" id="divid" name="divid">
             </textarea>
            </form>
	  

<script type="text/javascript">
   for (var i=1;i<=1;i++)
   {
	Aloha.ready( function( ) {
		// Prepare
		var	$ = Aloha.jQuery,
			$body = $('body');
            $(".step").each(function() {
             $(this).aloha();
			$(this).blur(function(){

		     var id= $(this).attr("id");
             var e = Aloha.getEditableById(id);
		    $('#content1').html(e.getContents());
		    $('#divid').html(id);
                    $.post("processpresentation3.php?username=<?php echo $tryusername; ?>", $("#form").serialize());
                    });
		});
		});
}
</script>




 
 <?php
 require_once("include/impressdemo.php");  // javascript file for impress 
 ?>	
<script>
function startprezi()   // start the presentation on button click
{
var	$ = Aloha.jQuery,
$body = $('body');

var t=document.getElementById("presentprezi");
t.parentNode.removeChild(t);
impress().init();
}
</script> 
</body>
</html>
