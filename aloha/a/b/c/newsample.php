<?php
//require_once("include/session.php");
?>
<?php
//confirm_logged_in();
?>


<!--get the username from login page for the database management-->
<?php global $tryusername;
 $tryusername=$_GET['username']; global $i; $i=1;
?>
<!--sets the presentation data upon reload-->

<!--HTML starts--> <!DOCTYPE html> <html> <head>
 
 <!--include aloha editor-->
 
<?php
 require_once("include/alohainclude.php"); ?> <link
 href="include/impress-demo.css" rel="stylesheet" />
<script type="text/javascript"
src="jquery/jquery-1.4.2.min.js"></script>
<link rel="stylesheet" href="jquery/sortable1.css" />
  <script src="jquery/sortable2.js"></script>
  <script src="jquery/sortable3.js"></script>
<script type="text/javascript" src="jscolor/jscolor.js"></script>
<style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>
  <script>
  $(function() {
    $( "#sortable" ).sortable({ containment: "#parent" });
    $( "#sortable" ).disableSelection();
  });
  </script>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
          <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet"> <link href="twitter-bootstrap-v2/docs/assets/css/example-fixed-layout.css" rel="stylesheet">

<title>Aloha editable impress.js |
presentation tool based on the power of CSS3 transforms and transitions in
modern browsers </title> </head>
 <body style="background-color:#91CCFF;background-image:url('images/images.jpg')">
  
<!--<div id="menu" style="background-color:#E0E0E0;position:fixed;margin-top:0px;border-radius:20px;margin-left:10px;height:670px;width:150px">
 <input id="start" class="btn btn-inverse btn-large " style="margin-left:10px;margin-top:10px;width:120px;height:55px;"
         type="button" value="PRESENT" onclick="addpage()"></input>

 
 <input id="addpage" class="btn btn-success"style="margin-left:10px;margin-top:10px;width:120px;height:55px;"
         type="button" value="ADD SLIDE" onclick="addpage()"></input>
 <input id="adjust" class="btn btn-primary" style="margin-left:10px;margin-top:10px;width:120px;height:55px;"
         type="button" value="POSITION" ></input>
 <label style="margin-top:10px;margin-left:15px">BACKGROUND COLOR</label>
 <input id="bgcolor" value="#D1F9FF" class="color {hash:true} input-small" style="margin-left:10px;margin-top:10px;width:120px;height:55px;border-radius:20px">
 <label style="margin-top:10px;margin-left:15px">SLIDE COLOR</label>
 <input id="pgcolor" value="#D1F9FF"  class="color {hash:true} input-small" style="margin-left:10px;margin-top:10px;width:120px;height:55px;border-radius:20px">
 <label style="margin-top:10px;">BACKGROUNDIMAGE <span style="margin-left:60px">URL</span></label>
 <input id="bgimage" placeholder="BACKGROUNDIMAGE URL" type="text"  class="input-small" style="margin-left:10px;margin-top:10px;width:120px;height:55px;border-radius:20px"></input>
 
 <a href="logout.php">LOGOUT</a>
<a href="#s1">next</a>
<a href="#s2">next1</a></div>-->
<div id="parent" style="width:200px">
<div id="sortable" style="height:600px;width:200px;overflow:scroll;background-color:yellow">
  <div class="he" id="s1" style="width:100px;height:100px;background-color:rgb(250,200,200);position:relative;margin-top:20px">hello1</div>
  <div class="he" id="s2"  style="width:100px;height:100px;background-color:rgb(200,250,200);position:relative;margin-top:20px">hello2</div>
   <div class="he" id="s3"  style="width:100px;height:100px;background-color:rgb(250,200,200);position:relative;margin-top:20px">hello3</div>
    <div  class="he" id="s4" style="width:100px;height:100px;background-color:rgb(250,200,200);position:relative;margin-top:20px">hello4</div>
     <div class="he" id="s5"  style="width:100px;height:100px;background-color:rgb(250,200,200);position:relative;margin-top:20px">hello5</div>
      <div class="he" id="s6"  style="width:100px;height:100px;background-color:rgb(250,200,200);position:relative;margin-top:20px">hello6</div>
</div>
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
    alert(e1);
  }
  );
 </script>

 <div id="aftereffect"></div>

<div id="impress" >
  
 <?php
 require("include/dbconnection.php"); ?> <?php
$username=$tryusername;
$order =array();
$order[0]=7;
$order[1]=5;
$order[2]=2;
$order[3]=0;
$order[4]=3;
$order[5]=1;
$order[6]=4;
$order[7]=6;
//$array = array('lastname', 'email', 'phone');
$comma = implode(",", $order);
$elements = explode(',', $comma);
//perform database query
for ($i=0;$i<8;$i++)
{
$conresult=mysql_query("SELECT * FROM $tryusername limit $elements[$i], 1",$connection);
if (!$conresult) die("database query failed:".mysql_error());
$divresult=mysql_query("SELECT * FROM divisiondata",$connection);
if (!$divresult) die("database query failed:".mysql_error());


$divrow=array();
while ($row=mysql_fetch_array($divresult)) 
{$divrow=$row;}

while ($row=mysql_fetch_array($conresult)) 
{
 
echo "<div class=\"closediv\" style=\"width:770px;height:770px;margin-left:300px;background-color:white;border-radius:10px;margin-top:20px\"><a class=\"exit\"  onclick=\"sampledelete(this)\" ><span style=\"float:right;cursor:pointer;font-size:20px;margin-top:10px;margin-right:10px\">close<span></a>";
 echo "$divrow[0]"." id=\"$row[0]\" data-x=\"$row[1]\" data-y=\"$row[2]\" data-z=\"$row[3]\" data-rotate-x=\"$row[4]\"
 data-rotate-y=\"$row[5]\" data-rotate-z=\"$row[6]\" data-scale=\"$row[7]\""
 ." $divrow[1]"." $row[8]"." $divrow[2]";
 echo"</div>";
 
}
}
 mysql_close($connection); ?>

 
 <form id="form" method="POST" action="processtemplate1.php?username=<?php echo
$tryusername; ?>">
              <textarea style="display:none" id="content1" name="content1">
             </textarea> <textarea style="display:none" id="divid" name="divid">
             </textarea>
            
              </form>
 
 
 




<form id="pageform" method="POST" action="addpage.php?username=<?php echo $tryusername;
                    ?>">
              
              <textarea style="display:none" id="newid" name="newid">
              </textarea>
              </form>


<form id="delform" method="POST" action="deletepage.php">
              
              <textarea style="display:none" id="delid" name="delid">
              </textarea>
              </form>
              
              
<!--post the form on remove of focus , setting the form entries--> <script
type="text/javascript">
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

div.innerHTML="<a class=\"exit\"  onclick=\"sampledelete(this)\" ><span style=\"float:right;cursor:pointer;font-size:20px;margin-top:10px;margin-right:10px\">close<span></a><div class=\"step alert\" style=\"font-size:40px;width:700px;height:700px;padding:40px;text-align:center;background-color:white;border-radius:50px;color:black\" id=\""+q+"\" ><p>hello</p></div>";
div.style.width = '770px';
div.style.height = '770px';
div.style.marginLeft = '300px';
div.style.backgroundColor = 'white';
div.style.borderRadius = '10px';
div.style.marginTop = '20px';


i.appendChild(div);






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
/*for (yy=num;yy<zx.length;yy++)
{
alert(zx[yy].id);
}*/
var i;
for (i=num;i<=zx.length;i++)
{
 
zx[i-1].id="s"+i;
//alert(zx[i-1].id);
}
  var ty1=document.getElementsByClassName('exit');
  for (asd1=0;asd1<ty1.length;asd1++)
  {
  ty1[asd1].onclick=function(){sampledelete(this)};
  }}
                   });
 

 }
</script>

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
<script>window.onload=function()
{
 var side=document.getElementsByClassName('aloha-sidebar-right');
side[0].parentNode.removeChild(side[0]);
}
</script>
<script src="jquery/jquery.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="/js/jquery.js"></script>  
<script src="bootstrap/js/bootstrap-transition.js"></script>  
<script src="bootstrap/js/bootstrap-alert.js"></script>  
<script src="bootstrap/js/bootstrap-modal.js"></script>  
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
  $(".closediv").css("background-color",$("#pgcolor").val());
  
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

</body> </html>
