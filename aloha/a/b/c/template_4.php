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
src="jquery/jquery-1.4.2.min.js"></script><title>Aloha editable impress.js |
presentation tool based on the power of CSS3 transforms and transitions in
modern browsers </title> </head> <body
style="background-image:url('images/images.jpg')">
<div id="impress">
 <input id="start" style="background-color:rgb(200,200,200);width:80px;height:34px;border-radius:8px;"
         type="button" value="click" onclick="startprezi()"></input>

 
 <input id="page" style="background-color:rgb(255,100,100);width:80px;height:34px;border-radius:8px;"
         type="button" value="add" onclick="addpage()"></input>
 
 <input id="page" style="background-color:rgb(1000,100,255);width:80px;height:34px;border-radius:8px;"
         type="button" value="delete" onclick="deletepage()"></input>
 
 <input id="adjust" style="background-color:rgb(20,250,100);width:80px;height:34px;border-radius:8px;"
         type="button" value="adjust" "></input>
 
 
 <?php
 require("include/dbconnection.php"); ?> <?php
$username=$tryusername;

//perform database query

$conresult=mysql_query("SELECT * FROM $tryusername",$connection);
if (!$conresult) die("database query failed:".mysql_error());
$divresult=mysql_query("SELECT * FROM divisiondata",$connection);
if (!$divresult) die("database query failed:".mysql_error());


$divrow=array();
while ($row=mysql_fetch_array($divresult)) 
{$divrow=$row;}

while ($row=mysql_fetch_array($conresult)) 
{ 
 echo "$divrow[0]"." id=\"$row[0]\" data-x=\"$row[1]\" data-y=\"$row[2]\" data-z=\"$row[3]\" data-rotate-x=\"$row[4]\"
 data-rotate-y=\"$row[5]\" data-rotate-z=\"$row[6]\" data-scale=\"$row[7]\""
 ." $divrow[1]"." $row[8]"." $divrow[2]";
}
 mysql_close($connection); ?>

 
 <form id="form" method="POST" action="processtemplate1.php?username=<?php echo
$tryusername; ?>">
              <textarea style="display:none" id="content1" name="content1">
             </textarea> <textarea style="display:none" id="divid" name="divid">
             </textarea>
            
              </form>
 
 
 




<form id="pageform" method="POST" action="addpage_.php?username=<?php echo $tryusername;
                    ?>">
              
              <textarea style="display:none" id="newid" name="newid">
              </textarea>
              <input type="submit" value="submit"></input>
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
var x=document.getElementById("start");
var y=document.getElementById("page");
x.parentNode.removeChild(x);
y.parentNode.removeChild(y);

impress().init(); } </script>

<script>
 function addpage()
 {
  
            
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
            $.post("addpage.php", $("#pageform").serialize(),
                   function(data) {
			       if (data)
                               {
                               
                                
                               var i = document.getElementById('impress');
var div = document.createElement('div');
div.setAttribute('class', 'step');
div.setAttribute('id', q);
div.innerHTML="hello world";
div.style.width = '700px';
div.style.height = '700px';
div.style.fontSize = '80px';
div.style.padding = '40px';
div.style.backgroundColor='white';
div.style.textAlign = 'center';
div.style.borderRadius = '50px';
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
 function deletepage()
 {
  
            
  var j=0;
  var q=" ";
  Aloha.ready(function( ) {
                // Prepare
                var $ = Aloha.jQuery,
                        $body = $('body');
            $(".step").each(function() {
             j=j+1;
                });
           q="s"+(j);
          
            
            $('#delid').html(q);
            $.post("deletepage.php?username=<?php echo $tryusername;
                    ?>", $("#delform").serialize(),
                   function(data) {
			       if (data)
                               {
                               
                               
                                
                              
var del=document.getElementById(q);
del.parentNode.removeChild(del);
                               }
                   });
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



</body> </html>
