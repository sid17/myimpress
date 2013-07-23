 


<!-- obtain the username-->
<?php global $tryusername;
 $tryusername=$_GET['username']; global $i; $i=1;
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

<body>
  
  
    <!--  upper menu -->
  <div id="upper" style="position:absolute;margin-top:0px;margin-left:0px;width:1340px;height:80px">
    <div id="menu" style="background-color:#E0E0E0;position:fixed;margin-top:-30px;border-radius:20px;margin-left:0px;height:80px;width:1340px">
 <input id="start" class="btn btn-inverse btn-large " style="margin-left:5px;margin-top:10px;width:120px;height:55px;"
         type="button" value="PRESENT" onclick="saving()"></input>
<input id="addpage" class="btn btn-success"style="margin-left:5px;margin-top:10px;width:120px;height:55px;"
         type="button" value="ADD SLIDE" onclick="addpage()"></input>
 <input id="adjust" class="btn btn-primary" style="margin-left:5px;margin-top:10px;width:120px;height:55px;"
         type="button" value="POSITION" ></input>

 <input id="bgcolor" value="#D1F9F1" class="color {hash:true} input-small" style="width:120px;height:55px;border-radius:20px;position:absolute;margin-left:20px;margin-top:10px">

 <input id="pgcolor" value="#D1F9F2"  class="color {hash:true} input-small" style="position:absolute;margin-left:170px;margin-top:10px;width:120px;height:55px;border-radius:20px">
 
 <input id="bgimage" placeholder="BACKGROUNDIMAGE URL" type="text"  class="input-small" style="width:120px;height:55px;border-radius:20px;position:absolute;margin-top:10px;margin-left:300px"></input>
 
 <a style="position:absolute;margin-left:450px;margin-top:30px"href="logout.php">LOGOUT</a>
 <li class="dropdown" id="accountmenu" style="position:absolute;margin-left:1200px">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tutorials<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">PHP</a></li>
                            <li><a href="#">MySQL</a></li>
                            <li class="divider"></li>
                            <li><a href="#">JavaScript</a></li>
							<li><a href="#">HTML5</a></li>
                        </ul>
                    </li>
 
<a  style="position:absolute;margin-left:550px;margin-top:30px" data-toggle="modal" href="#example" class="btn btn-primary btn-large">Launch demo modal</a>


</div>
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

echo"<div id=\"parent\" style=\"width:120px;position:absolute;margin-left:10px;margin-top:55px;border-radius:10px\">
<div id=\"sortable \" style=\"height:550px;width:120px;overflow-y:scroll;background-color:yellow;border-radius:10px;padding:10px\">";
for ($rownum=1;$rownum<=$rownumber;$rownum++)
{
  $num=intval($newstr[$rownum-1]);
  echo"<div class=\"he\" id=\"q{$num}\" onclick=\"change(this)\"  style=\"width:100px;height:100px;
  background-color:rgb(250,200,200);position:relative;margin-top:20px\">hello{$num}</div>";
}
echo"</div></div>";
$divresult=mysql_query("SELECT * FROM divisiondata",$connection);
if (!$divresult) die("database query failed:".mysql_error());
$divrow=array();

echo " <div id=\"impress\" style=\"margin-left:300px;position:absolute;margin-top:55px;width:850px;height:565px;
background-color:red;z-index:6;overflow-y:scroll\">";


while ($row=mysql_fetch_array($divresult)) 
{$divrow=$row;}
while ($row=mysql_fetch_array($conresult)) 
{
 echo "<div class=\"closediv\" style=\"width:770px;height:770px;margin-left:20px;border-radius:10px;margin-top:20px;\"><a class=\"exit\"  onclick=\"sampledelete(this)\" ><span style=\"float:right;cursor:pointer;font-size:20px;margin-top:10px;margin-right:10px\">close<span></a>";
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
                               
    alert(e1);
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
div.setAttribute('class', 'closediv');
div.innerHTML="<a class=\"exit\"  onclick=\"sampledelete(this)\" ><span style=\"float:right;cursor:pointer;font-size:20px;margin-top:10px;margin-right:10px\">close<span></a><div class=\"step\" style=\"font-size:40px;width:700px;height:700px;padding:40px;text-align:center;background-color:white;border-radius:50px;color:black\" id=\""+q+"\" ><p>hello</p></div>";
div.style.width = '770px';
div.style.height = '770px';
div.style.marginLeft = '20px';
//div.style.backgroundColor = 'white';
div.style.borderRadius = '10px';
div.style.marginTop = '20px';
i.appendChild(div);
var sidediv=document.createElement('div');
sidediv.setAttribute('class', 'he');
sidediv.setAttribute('id', l);
sidediv.onclick=function(){change(this)};
sidediv.style.width="100px";
sidediv.style.height="100px";
sidediv.style.backgroundColor="rgb(250,200,200)";
sidediv.style.position="relative";
sidediv.style.marginTop="20px"
sidediv.innerHTML="hello"+l;
var sidemain=document.getElementById('sortable');
sidemain.appendChild(sidediv);
var dis=document.getElementById(window.currentdisplay);
dis.parentNode.style.display="none";
window.currentdisplay=q;


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
                               
    alert(e1se);
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
                               
    alert(e1se);
  }
                   }
  );
  }
                   });

 }
</script>


  <!-- adjust the position of various slides  -->
<script>
 $(document).ready(function()
 {
 $('#adjust').click(function()
{
             var l=0;
             $(".step").each(function() {
             l=l+1;
                });
             l=l-1;
             var url="testarr3.php?slides="+l+"&username=<?php echo $tryusername;
                    ?>";
    window.location = url;
});
 });
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
  var x=document.getElementById(newid);
  var y= document.getElementById(oldid);
  y.parentNode.style.display='none';
  x.parentNode.style.display='block';
  
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
<div id="example" class="modal hide fade in" style="display: none;">
            <div class="modal-header">
              <a class="close" data-dismiss="modal">×</a>
              <h3>This is a Modal Heading</h3>
            </div>
            <div class="modal-body">
              <h4>Text in a modal</h4>
              <p>You can add some text here.</p>		        
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-success">Call to action</a>
              <a href="#" class="btn" data-dismiss="modal">Close</a>
            </div>
          </div>

</body>
</html>