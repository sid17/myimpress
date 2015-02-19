 <?php
 require_once("include/dbconnection.php");
?>
<!-- obtain the username-->
<?php global $tryusername;
 $tryusername=$_GET['username']; global $i; $i=1;
 $pos = strrpos($tryusername, "___");
$tryusername1=(substr($tryusername, 0, $pos));  
?>
<?php
//  $connection=mysql_connect("localhost","root");
// if (!$connection)
// {
//     die("Database connection failed:".mysql_error());
// }

// //2.Select a database
// $db_select=mysql_select_db("myimpress",$connection);
// if (!$db_select)
// {
//     die("Database connection failed:".mysql_error());
// }
 //3.perform database  query
$res=mysql_query("SELECT * FROM users WHERE username='$tryusername1' ",$connection);
if (!$res)
die("database query failed:".mysql_error());
//4. Use returned data
global $selfcounter;
global $tempcounter;

while ($row=mysql_fetch_array($res))
{
$selfcounter=$row['selfcount'];
$tempcounter=$row['tempcount'];
}


mysql_close($connection);
?>

<!-- include the aloha files-->
<?php
 require_once("include/alohainclude.php");
 ?>
 
 
 
 <!-- html starts-->
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Sortable - Default functionality</title>
  
  <!-- include the jquery and jquery ui  -->
  <link rel="stylesheet" href="jquery/sortable1.css" />
   <script src="jquery/sortable2.js"></script>
  <script src="jquery/sortable3.js"></script>
  
    <!-- bootstrap css files  -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
          <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
            <link href="twitter-bootstrap-v2/docs/assets/css/example-fixed-layout.css" rel="stylesheet">
             
             
               <!--  include js color files  -->
<script type="text/javascript" src="jscolor/jscolor.js"></script>


  <!--  style the sortable elements  -->
  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>
 
  
    <!-- script that makes the elements sortable  -->
  
  <script>
   $(document).ready(function() {
    $( "#sortable" ).sortable({ containment: "#parent" });
    $( "#sortable" ).disableSelection();
    $('.dropdown-toggle').dropdown();
  });
  </script>
</head>

  <!-- body starts  -->
  
<li class="dropdown btn btn-primary" id="fontmenu" style="display:none;position:absolute;margin-left:100px;z-index:10;height:55px;width:120px">

                        <a class="dropdown-toggle" style="z-index:10;"  data-toggle="dropdown" href="#"><span style="color:white">Set Font</span><b class="caret"></b></a>
                     <ul class="dropdown-menu" >
                            <li><a href="#">Font size</a></li>
                            <li><a href="#"><i style="margin-right:4px" class="icon-tint"></i>Font color</a></li>
                            <li><a href="#"><i style="margin-right:4px" class="icon-font"></i>Font Style</a></li>
                            
                                                        
                                                        
                        </ul>
                     </li>
<body style="background-color:#F3F9BB">
 
   <li class="dropdown btn btn-primary" id="accountmenu" style="position:absolute;margin-left:3px;z-index:10;margin-top:-20px;width:120px;height:45px;">

                        <a class="dropdown-toggle" style="z-index:10;"  data-toggle="dropdown" href="#"><span style="margin-top:15px;position:absolute;margin-left:-45px;color:white"><i style="margin-right:4px" class="icon-home"></i>MY IMPRESS<b class="caret"></b></span></a>
                     <ul class="dropdown-menu" >
                            <li><a href="newpresentation.php?username=<?php $kj=$selfcounter+1;
              echo "{$tryusername1}___{$kj}"; ?>&user=<?php echo $tryusername1; ?>&pgcoun=<?php echo $selfcounter; ?>"><i style="margin-right:4px" class="icon-file"></i>NEW</a></li>
                            <li><a href="selfpres.php?username=<?php echo $tryusername1;?>
                    "><i style="margin-right:4px" class="icon-search"></i>OPEN</a></li>
                            <li><a href="#"><i style="margin-right:4px" class="icon-trash"></i>DELETE</a></li>
                            <li><a><div onclick="saving()"><i style="margin-right:4px" class="icon-download-alt"></i>IMPORT</div></a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="myhome.php?username=<?php echo $tryusername1;?>"><i style="margin-right:4px" class="icon-user"></i>MY ACCOUNT</a></li>
                                                        <li><a href="logout.php"><i style="margin-right:4px" class=" icon-arrow-left"></i>LOGOUT</a></li>
                                                        
                                                        
                        </ul>
                     </li>
   
  
    <!--  upper menu -->
  <div id="upper" style="position:absolute;margin-top:0px;margin-left:0px;width:1340px;height:80px">
    <div id="menu" style="background-color:#B2F998;position:fixed;margin-top:-28px;margin-left:0px;height:80px;width:1440px">
                    
 <input id="start" class="btn btn-primary btn-large " style="margin-left:5px;margin-top:10px;width:120px;height:55px;display:none"
         type="button" value="SAVE" onclick="saving()"></input>
<input id="addpage"  class="btn btn-primary"style="display:none;margin-left:5px;margin-top:10px;width:120px;height:55px;"
         type="button" value="ADD SLIDE" onclick="addpage()"></input>
 <input id="adjust" class="btn btn-primary" style="display:none;margin-left:1000px;margin-top:10px;width:120px;height:55px;"
         type="button" value="POSITION" ></input>
<input id="bgcolor"  value="#D1F9F1" class="color {hash:true} input-small" style="width:10px;display:none;height:55px;border-radius:20px;position:absolute;margin-left:400px;margin-top:10px">
<input id="bgimage" placeholder="BACKGROUNDIMAGE URL" type="text"  class="input-small" style="display:none;width:120px;height:55px;display:none;
              border-radius:20px;position:absolute;margin-top:10px;margin-left:300px"></input>	
 <input id="pgcolor" value="#D1F9F2"  class="color {hash:true} input-small" style="display:none;position:absolute;margin-left:170px;margin-top:10px;width:120px;height:55px;border-radius:20px">
<a  style="position:absolute;margin-left:320px;margin-top:30px;display:none" data-toggle="modal" href="#image" class="btn btn-primary btn-large">background image</a>
<a  style="position:absolute;margin-left:550px;margin-top:30px;display:none" data-toggle="modal" href="#video" class="btn btn-primary btn-large">video</a>
 
</div>
  </div>
  
 
   <div class="btn-group" data-toggle="buttons-radio"  style="position:absolute;margin-left:350px;margin-top:-20px" >
                    <button class="btn btn-primary" data-toggle="modal" href="#image" style="height:55px;width:120px"><i style="margin-right:4px" class="icon-picture"></i>IMAGE</button>
                    <button class="btn btn-primary" data-toggle="modal" href="#video" style="height:55px;width:120px"><i style="margin-right:4px" class="icon-film"></i>VIDEO</button>
                    <button class="btn btn-primary" data-toggle="modal" href="#color" style="height:55px;width:120px"><i style="margin-right:4px" class="icon-star"></i>COLOR</button>
                    <button class="btn btn-primary" style="height:55px;width:120px"><i style="margin-right:4px" class="icon-font"></i>FONT</i></button>
 <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#" style="height:45px"><span ><span style="margin-top:20px" class="caret"></span></span></a>
          <ul style="margin-left:500px" class="dropdown-menu">
            <li><a href="#"><i style="margin-right:4px" class="icon-tint"></i>FONT COLOR</a></li>
            <li><a href="#"><i style="margin-right:4px" class=" icon-text-height"></i>FONT SIZE</a></li>
            <li><a href="#"><i style="margin-right:4px" class="icon-pencil"></i>FONT STYLE</a></li>
            
          </ul>
 </div>
   
   
    <div class="btn-group" data-toggle="buttons-radio"  style="position:absolute;margin-left:1240px;margin-top:-20px" >
                    <button class="btn btn-primary" id="adjust" onclick="adjust()" style="height:55px;width:120px"><i style="margin-right:4px" class="icon-adjust"></i>POSITION</button>
                    <button class="btn btn-primary"  onclick="" style="display:none;height:55px;width:120px"><i style="margin-right:4px" class="icon-play"></i>PRESENT</button>
                   
 </div>
   
 
  
    <!-- the sortable divisions  -->
  
 
  
  <!--<div class="he" id="q2"  onclick="change(this)" style="width:100px;height:100px;background-color:rgb(200,250,200);position:relative;margin-top:20px">hello2</div>
   
    <div  class="he" id="q4" onclick="change(this)" style="width:100px;height:100px;background-color:rgb(250,200,200);position:relative;margin-top:20px">hello4</div>
     <div class="he" id="q5" onclick="change(this)"  style="width:100px;height:100px;background-color:rgb(250,200,200);position:relative;margin-top:20px">hello5</div>
      <div class="he" id="q6" onclick="change(this)"  style="width:100px;height:100px;background-color:rgb(250,200,200);position:relative;margin-top:20px">hello6</div>
</div></div>-->
 
 
   <!--  slide division starts -->
     <!-- main division where the  new slides are appended  -->

  
  <?php
 require("include/dbconnection.php"); ?> <?php
$username=$tryusername;
$ordres=mysql_query("SELECT * FROM orderofslide ",$connection);
if (!$ordres)
die("database query failed:".mysql_error());
//4. Use returned data
global $str;
while ($setord=mysql_fetch_array($ordres))
{
    
    if ($setord['username']==$username )
    $str=$setord['neword'];
}
global $newstr;
$newstr=explode(',', $str);
for ($i=0;$i<3;$i++)
{
  //echo($newstr[$i]);
}
//perform database query
$conresult=mysql_query("SELECT * FROM $tryusername",$connection);
if (!$conresult) die("database query failed:".mysql_error());
$rownumber=mysql_num_rows($conresult);

echo"<div id=\"parent\" style=\"width:140px;position:absolute;margin-left:0px;margin-top:52px;\">
<div id=\"sortable\" style=\"height:550px;width:140px;overflow-y:scroll;background-color:#B2F998;padding:10px\">";
echo "<button id=\"addpage\" class=\"btn btn-success\" onclick=\"addpage()\" style=\"position:relative\"><i class=\"icon-plus\"></i>ADD SLIDE</button>";
for ($rownum=1;$rownum<=$rownumber;$rownum++)
{
  $num=intval($newstr[$rownum-1]);
  echo"<div class=\"he\" id=\"q{$num}\" onclick=\"change(this)\"  style=\"width:120px;height:100px;
  background-color:white;position:relative;margin-top:20px\"></div>";
}
echo"</div></div>";
$divresult=mysql_query("SELECT * FROM divisiondata",$connection);
if (!$divresult) die("database query failed:".mysql_error());
$divrow=array();

echo " <div id=\"impress\" style=\"margin-left:160px;position:absolute;margin-top:55px;width:1200px;height:565px;
background-color:#F3F9BB;z-index:6;overflow-y:scroll\">";


while ($row=mysql_fetch_array($divresult)) 
{$divrow=$row;}
while ($row=mysql_fetch_array($conresult)) 
{
 echo "<div class=\"closediv\" style=\"width:850px;height:750px;margin-left:130px;border-radius:10px;margin-top:20px;\"><a class=\"exit\"  onclick=\"sampledelete(this)\" ><span style=\"float:right;cursor:pointer;font-size:20px;margin-top:10px;margin-right:-50px\">close<span></a>";
 echo "$divrow[0]"." id=\"$row[0]\" data-x=\"$row[1]\" data-y=\"$row[2]\" data-z=\"$row[3]\" data-rotate-x=\"$row[4]\"
 data-rotate-y=\"$row[5]\" data-rotate-z=\"$row[6]\" data-scale=\"$row[7]\""
 ." $divrow[1]"." $row[8]"." $divrow[2]";
 echo"</div>";
 
}
 mysql_close($connection); ?>
  
</div>

  <!--  form that extracts the content to be sent at the back end -->
<form id="form" method="POST" action="processtemplate1.php?username=<?php echo
$tryusername; ?>">
              <textarea style="display:none" id="content1" name="content1">
             </textarea> <textarea style="display:none" id="divid" name="divid">
             </textarea>
            
              </form>
 
 
 



  <!-- form to add a new page   -->
<form id="pageform" method="POST" action="addpage.php?username=<?php echo $tryusername;
                    ?>">
              
              <textarea style="display:none" id="newid" name="newid">
              </textarea>
              </form>


  <!-- form for page deletion  -->
<form id="delform" method="POST" action="deletepage.php">
              
              <textarea style="display:none" id="delid" name="delid">
              </textarea>
              </form>

<form id="setorder" method="POST" action="setorder.php">
              
              <textarea style="display:none" id="sorder" name="sorder">
              </textarea>
              </form>

              
              
                <!-- form that displays the order of sortable slides  -->
 <script>
  $('#parent').mouseleave(
  function()
  {
   var i;
   var x=document.getElementsByClassName('he');
   var arr=new Array();
   for (i=0;i<x.length;i++) {
   
   var currid=x[i].id;
   var numid=currid.substring(1,currid.length);
   var num=parseInt(numid);
   arr[i]=num;
   }
    var e1= arr.join(" ,");
    $('#sorder').html(e1);
    $.post("setorder.php?username=<?php echo
$tryusername; ?>", $("#setorder").serialize(),
                   function(data) {
			       if (data)
                               {
                               
    //alert(e1);
  }
                   }
  );
  });
 </script>
 <script>
  /*window.onload=function()
{
  document.body.style.paddingTop='0px';
    document.body.style.position='absolute';
     document.body.style.backgroundColor='black';
     console.log(document.body);
}*/
</script>
 
 
   <!-- script that makes the slides aloha editable and makes a query upon blur   -->
 <script type="text/javascript">
   for (var i=1;i<=1;i++) {
        Aloha.ready( function( ) {
                // Prepare
                var $ = Aloha.jQuery,
                        $body = $('body');
            $(".step").each(function() {
             $(this).aloha();
                        $(this).blur(function(){
                        
                     var id= $(this).attr("id");
             var e = Aloha.getEditableById(id);
             
                    $('#content1').html(e.getContents());
                    $('#divid').html(id);
                    $.post("processtemplate1.php?username=<?php echo $tryusername;
                    ?>", $("#form").serialize()); });
                }); });
} </script>



  <!--  function to initialize the presentation -->
<?php
 require_once("include/impressdemo.php"); ?>
<script> function startprezi() { var $ = Aloha.jQuery, $body = $('body');
$(".step").each(function() { $(this).mahalo();}); 
var x=document.getElementById("menu");
//var y=document.getElementById("page");
x.parentNode.removeChild(x);
//y.parentNode.removeChild(y);


impress().init(); } </script>


</script>


  <!-- add a new page to impress id and process the query at the back end  -->
<script>
 function addpage()
 {
  
 var pa=document.getElementById("addpage");
 pa.onclick=null;
  var j=0;
  var q=" ";
  Aloha.ready( function( ) {
                // Prepare
                var $ = Aloha.jQuery,
                        $body = $('body');
            $(".step").each(function() {
             j=j+1;
                });
           q="s"+(j+1);
           l="q"+(j+1);
            
            $('#newid').html(q);
            $.post("addpage.php?username=<?php echo
$tryusername; ?>", $("#pageform").serialize(),
                   function(data) {
			       if (data)
                               {
                               
                                var pa1=document.getElementById("addpage");
                                pa1.onclick=addpage;
                               var i = document.getElementById('impress');
var div = document.createElement('div');
if (q!="s1")
{
 

document.getElementById("q"+parseInt(window.currentdisplay.substring(1,window.currentdisplay.length))).style.border="0px";
}
div.setAttribute('class', 'closediv');
div.innerHTML="<a class=\"exit\"  onclick=\"sampledelete(this)\" ><span style=\"float:right;cursor:pointer;font-size:20px;margin-top:10px;margin-right:-50px\">close<span></a><div class=\"step\" style=\"font-size:40px;width:850px;height:700px;padding:40px;text-align:center;border-radius:20px;color:black\" id=\""+q+"\" ><p>hello</p></div>";
div.style.width = '850px';
div.style.height = '750px';
div.style.marginLeft = '130px';
var backColor =$('.step').css("background-color");
div.style.borderRadius = '10px';
div.style.marginTop = '20px';
i.appendChild(div);
var color=document.getElementsByClassName('step');
var co1;
for (co1=0;co1<color.length;co1++)
{
 color[co1].style.backgroundColor =backColor;
}
var sidediv=document.createElement('div');
sidediv.setAttribute('class', 'he');
sidediv.setAttribute('id', l);
sidediv.onclick=function(){change(this)};
sidediv.style.width="120px";
sidediv.style.height="100px";
sidediv.style.backgroundColor=$('.step').css("background-color");
sidediv.style.position="relative";
sidediv.style.marginTop="20px"
//sidediv.innerHTML="hello"+l;
var sidemain=document.getElementById('sortable');
sidemain.appendChild(sidediv);
var dis=document.getElementById(window.currentdisplay);
//alert(window.currentdisplay);
if (q!="s1")
{
 dis.parentNode.style.display="none";
}

window.currentdisplay=q;
document.getElementById("q"+parseInt(window.currentdisplay.substring(1,window.currentdisplay.length))).style.border="5px solid black";

var ise;
   var xse=document.getElementsByClassName('he');
   var arrse=new Array();
   for (ise=0;ise<xse.length;ise++) {
   
   var curridse=xse[ise].id;
   var numidse=curridse.substring(1,curridse.length);
   var numse=parseInt(numidse);
   arrse[ise]=numse;
   }
    var e1se= arrse.join(" ,");
    $('#sorder').html(e1se);
    $.post("setorder.php?username=<?php echo
$tryusername; ?>", $("#setorder").serialize(),
                   function(data) {
			       if (data)
                               {
                               
    //alert(e1se);
  }
                   }
  );





 for (var i=1;i<=1;i++) {
        Aloha.ready( function( ) {
                // Prepare
                var $ = Aloha.jQuery,
                        $body = $('body');
            $(".step").each(function() {
             $(this).aloha();
                        $(this).blur(function(){
                        
                     var id= $(this).attr("id");
             var e = Aloha.getEditableById(id);
             
                    $('#content1').html(e.getContents());
                    $('#divid').html(id);
                    $.post("processtemplate1.php?username=<?php echo $tryusername;
                    ?>", $("#form").serialize()); });
                }); });
}
 
                               }
						}
                   );
            });

 
 
 
 
 }
</script>

  <!-- delete any page upon click  -->
<script>
function sampledelete(ele)
 {
  var ty=document.getElementsByClassName('exit');
  for (asd=0;asd<ty.length;asd++)
  {
  ty[asd].onclick=null;
  }
var x=document.getElementsByClassName("step");
var len=x.length-1;
var current=ele.parentNode.getElementsByClassName('step');
currid=current[0].id;
var q=currid;
var del=document.getElementById(currid);
var deleteid=del.parentNode;
deleteid.parentNode.removeChild(deleteid);
var number=parseInt(currid.substring(1,currid.length));
var corres="q"+number;
var corresdel=document.getElementById(corres);
corresdel.parentNode.removeChild(corresdel);



 //alert(currid);
 //alert(len);
            
            $('#delid').html(q);
            
            $.post("deletepage.php?username=<?php echo $tryusername;
                    ?>", $("#delform").serialize(),
                   function(data) {
			       if (data)
                               {
                                 //alert("hello");
                                 
                               
                               
  
                              //alert(currid);
var numid=currid.substring(1,currid.length);
 //alert(numid);
 //alert(len);
var num=parseInt(numid);
//alert(num);
var zx=document.getElementsByClassName("step");
//alert(zx.length);
var yy;

var qwe=document.getElementsByClassName("he");
var tyu;
for (tyu=num;tyu<=qwe.length;tyu++)
{
  var id="q"+(tyu+1);
var element=document.getElementById(id);
element.id="q"+tyu;
}
/*for (yy=0;yy<qwe.length;yy++)
{
alert(qwe[yy].id);
alert(qwe[yy].innerHTML);
}*/

var i;
for (i=num;i<=zx.length;i++)
{
 
zx[i-1].id="s"+i;
//alert(zx[i-1].id);
}
/*for (yy=0;yy<zx.length;yy++)
{
alert(zx[yy].id);
}*/
  var ty1=document.getElementsByClassName('exit');
  for (asd1=0;asd1<ty1.length;asd1++)
  {
  ty1[asd1].onclick=function(){sampledelete(this)};
  }
  
  if ( (document.getElementsByClassName("he").length)>0)
{
 //alert(document.getElementsByClassName("he").length) ;
 
if ((number-1)==(document.getElementsByClassName("he").length))
{
 var z=document.getElementById("s"+1);
 z.parentNode.style.display="block";
 window.currentdisplay="s"+1;
}
else
{
  //alert(number);
var z= document.getElementById("s"+number);
z.parentNode.style.display="block";
 window.currentdisplay="s"+number;
 
}
document.getElementById("q"+parseInt(window.currentdisplay.substring(1,window.currentdisplay.length))).style.border="5px solid black";
}
  
  
 
 var ise;
   var xse=document.getElementsByClassName('he');
   var arrse=new Array();
   for (ise=0;ise<xse.length;ise++) {
   
   var curridse=xse[ise].id;
   var numidse=curridse.substring(1,curridse.length);
   var numse=parseInt(numidse);
   arrse[ise]=numse;
   }
    var e1se= arrse.join(" ,");
    $('#sorder').html(e1se);
    $.post("setorder.php?username=<?php echo
$tryusername; ?>", $("#setorder").serialize(),
                   function(data) {
			       if (data)
                               {
                               
    //alert(e1se);
  }
                   }
  );
  }
                   });

 }
</script>


  
<script>
 function adjust()
  
{
             var l=0;
             $(".step").each(function() {
             l=l+1;
                });
             l=l-1;
            
             var url="testarr3.php?slides="+l+"&username=<?php echo $tryusername;
                    ?>"+"&bcolor="+($('#impress').css("background-color"))+"&scolor="+($('.step').css("background-color"))+"&bimage="+($('#impress').css("background-image"));
   //alert(url);
   //alert(($('#impress').css("background-image")))
    
    open_in_new_tab(url);
  }
</script>
<script>
 function open_in_new_tab(url)
{
  var win=window.open(url, '_blank');
  win.focus();
}
</script>


  <!--  remove the aloha sidebar  -->


 
    <script src="bootstrap/js/bootstrap.js"></script>
     
<script src="bootstrap/js/bootstrap-transition.js"></script>  
<script src="bootstrap/js/bootstrap-alert.js"></script>  

<script src="bootstrap/js/bootstrap-dropdown.js"></script>  
<script src="bootstrap/js/bootstrap-scrollspy.js"></script>  
<script src="bootstrap/js/bootstrap-tab.js"></script>  
<script src="bootstrap/js/bootstrap-tooltip.js"></script>  
<script src="bootstrap/js/bootstrap-popover.js"></script>  
<script src="bootstrap/js/bootstrap-button.js"></script>  
<script src="bootstrap/js/bootstrap-collapse.js"></script>  
<script src="bootstrap/js/bootstrap-carousel.js"></script>  
<script src="bootstrap/js/bootstrap-typeahead.js"></script>  
<script>
$("#bgcolor").change(function(){
   $("body").css('background-image','url( )');
   $("#bgimage").val("");
   $("body").css("background-color",$("#bgcolor").val());
});
$("#pgcolor").change(function(){
  
  $(".step").css("background-color",$("#pgcolor").val());
  
  
});
$("#bgimage").change(function(){
    $("body").css('background-image','url(' + $("#bgimage").val() + ')');
;
});
</script>
<script>
function helloworld(ele)
{
 
var x=document.getElementsByClassName("step");
var len=x.length-1;
var current=ele.parentNode.getElementsByClassName('step');
currid=current[0].id;
alert(currid);
var numid=currid.substring(1,currid.length);
var num=parseInt(numid);
var zx=document.getElementsByClassName("step");
var yy;
for (yy=num;yy<zx.length;yy++)
{
alert(zx[yy].id);
}
var i;
for (i=len;i>=num;i--)
{
var id2=x[i-1].id;
x[i].id=id2;
}
}
</script>
<script>
  function change (ele)
  {
   
  var elid=ele.id;
  var numberid=elid.substring(1,elid.length);
  var number=parseInt(numberid);
  var newid="s"+number;
  var oldid=window.currentdisplay;
 var numberid1=oldid.substring(1,oldid.length);
  var number=parseInt(numberid1);
  var oldid1="q"+number;
  var x1=document.getElementById(elid);
  var y1= document.getElementById(oldid1);
  x1.style.border="5px solid black";
  y1.style.border="0px";
  
  var x=document.getElementById(newid);
  var y= document.getElementById(oldid);
  
  
  y.parentNode.style.display='none';
  x.parentNode.style.display='block';
  
  y1.style.border='0px';
  x1.style.border='5px solid black';
  //alert(window.currentdisplay);
  window.currentdisplay=newid;
  //alert(window.currentdisplay);
  //alert(newid);
  }
</script>
<script>
  window.onload=function()
  {
    var x=document.getElementsByClassName('step');
    var i;
    for (i=0;i<x.length;i++)
    {
    if (i==0) {

      window.currentdisplay=x[i].id;
      continue;
    }
    else
    {
    x[i].parentNode.style.display='none'; 
    }
    }
     var side=document.getElementsByClassName('aloha-sidebar-right');
     side[0].parentNode.removeChild(side[0]);
     if ((document.getElementById("q1"))) {
     document.getElementById("q1").style.border="5px solid black";
     $('#s1').clone().appendTo('#sortable').css('-webkit-transform', 'scale(.125, .125)');
     }
   }
</script>

<script>
function saving()
{
  //alert("hello");
  //$.post("http://localhost/cloudpresentationapplication/aloha/a/b/c/saving.php");
  //$.get("http://localhost/cloudpresentationapplication/aloha/a/b/c/saving.php");
  //return false;
  window.open("http://localhost/cloudpresentationapplication/aloha/a/b/c/saving.php")
}
</script>
<div id="image" class="modal hide fade in" style="display: none;">
            <div class="modal-header">
              <a class="close" data-dismiss="modal">×</a>
              <h3>Background Image URL</h3>
            </div>
            <div class="modal-body" style="height:65px">
              	<input id="backimage" placeholder=" ENTER BACKGROUND IMAGE URL" type="text"  class="input-small" style="width:500px;height:55px;
              border-radius:20px;"></input>	        
            </div>
            <div class="modal-footer">
              <div onclick="changebackground()" class="btn btn-success">Apply</div>
              <a href="#" class="btn" data-dismiss="modal">Close</a>
            </div>
          </div>
<div id="video" class="modal hide fade in" style="display: none;">
            <div class="modal-header">
              <a class="close" data-dismiss="modal">×</a>
              <h3>INSERT VIDEO</h3>
            </div>
            <div class="modal-body" style="height:80px">
              	<input id="backimage" placeholder=" ENTER VIDEO URL" type="text"  class="input-small" style="width:500px;height:55px;
              border-radius:20px;"></input>	        
            </div>
            <div class="modal-footer">
              <div onclick="changebackground()" class="btn btn-success">Apply</div>
              <a href="#" class="btn" data-dismiss="modal">Close</a>
            </div>
          </div>

<div id="color" class="modal hide fade in" style="display: none;width:700px">
            <div class="modal-header">
              <a class="close" data-dismiss="modal"><span style="color:red">X</span></a>
              <h3>BACKGROUND COLOR<span style="margin-left:150px">SLIDE COLOR</span></h3>
              
            </div>
            <div class="modal-body" style="height:180px">
<input id="bgcolor1"  value="#D1F9F1" class="color {hash:true} input-small" style="width:200px;height:55px;position:absolute;margin-left:0px;margin-top:10px;border-radius:5px">
 <input id="pgcolor1" value="#D1F9F2"  class="color {hash:true} input-small" style="position:absolute;margin-left:450px;margin-top:10px;width:200px;height:55px;border-radius:5px">
            </div>
            
            <div class="modal-footer">
              <div onclick="changebackcolor()" style="position:absolute;margin-left:-650px" class="btn btn-success">Apply</div>
              <div onclick="changeslidecolor()" style="margin-left:5px" class="btn btn-success">Apply</div>
             
            </div>
          </div>

<script>
 function changebackground() {
   
   $("#impress").css('background-image','url(' + $("#backimage").val() + ')');
 }
 
 function changebackcolor() {
   
   $("#impress").css('background-image','url( )');
   $("#bgimage").val("");
   $("#impress").css("background-color",$("#bgcolor1").val());
 }
 function changeslidecolor() {
   
   $(".step").css("background-color",$("#pgcolor1").val());
    $(".he").css("background-color",$("#pgcolor1").val());
 }

</script>

</body>
</html>