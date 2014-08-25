<?php
require_once("include/session.php");
?>
<?php
confirm_logged_in();
?>

<style>
#container
{
 background: rgb(149,149,149); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(149,149,149,1) 0%, rgba(13,13,13,1) 46%, rgba(1,1,1,1) 50%, rgba(10,10,10,1) 53%, rgba(78,78,78,1) 76%, rgba(56,56,56,1) 87%, rgba(27,27,27,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(149,149,149,1)), color-stop(46%,rgba(13,13,13,1)), color-stop(50%,rgba(1,1,1,1)), color-stop(53%,rgba(10,10,10,1)), color-stop(76%,rgba(78,78,78,1)), color-stop(87%,rgba(56,56,56,1)), color-stop(100%,rgba(27,27,27,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(149,149,149,1) 0%,rgba(13,13,13,1) 46%,rgba(1,1,1,1) 50%,rgba(10,10,10,1) 53%,rgba(78,78,78,1) 76%,rgba(56,56,56,1) 87%,rgba(27,27,27,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(149,149,149,1) 0%,rgba(13,13,13,1) 46%,rgba(1,1,1,1) 50%,rgba(10,10,10,1) 53%,rgba(78,78,78,1) 76%,rgba(56,56,56,1) 87%,rgba(27,27,27,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(149,149,149,1) 0%,rgba(13,13,13,1) 46%,rgba(1,1,1,1) 50%,rgba(10,10,10,1) 53%,rgba(78,78,78,1) 76%,rgba(56,56,56,1) 87%,rgba(27,27,27,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(149,149,149,1) 0%,rgba(13,13,13,1) 46%,rgba(1,1,1,1) 50%,rgba(10,10,10,1) 53%,rgba(78,78,78,1) 76%,rgba(56,56,56,1) 87%,rgba(27,27,27,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#959595', endColorstr='#1b1b1b',GradientType=0 ); /* IE6-9 */

}
</style>
<?php
global $pagecount;
$pagecount=$_GET['slides'];
$usr=$_GET['username'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>jQuery UI: Get the position of a draggable in the droppable event drop</title>
  <link class="jsbin" href="jquery/jquery-ui1.7.2.css" rel="stylesheet" type="text/css"></link>
  <script class="jsbin" src="jquery/jquery1.3.2.min.js"></script>
  <script class="jsbin" src="jquery/jquery-ui1.7.2min.js"></script>  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="jquery/jquery-1.9.1.js"></script>
  <script src="jquery/jquery-ui1.10.3.js"></script>
    <style type="text/css">
    .draggable {
      width: 168px;
      height: 190px;
      
      
      position:relative;
      border-radius:20px 20px 0px 0px;
    }

  </style>
</head>
<body style="background-color:#D2DBF7">
  <input type="button" style="height:55px;width:120px;cursor:pointer;border-radius:20px;background-color:#2FCFF7;font-size:14px" onclick=" myvalues()" value="POSITION"></input>
   <input type="button"  id="next" value="PRESENT" style="float:right;height:55px;width:120px;cursor:pointer;border-radius:20px;background-color:#2FCFF7;font-size:14px;display:none"></input>
<div id="container" style="width: 2800px; height: 1400px; border: 5px solid #737373;border-radius:50px; position: absolute;margin-left:20px;margin-bottom:20px;margin-right:20px;margin-top:20px;" >

<?php 
for($j=0;$j<=$pagecount;$j++)
{
  $k=$j+1;
echo("<div class='hi' style=\"float:left ;margin:50px\">
<div class='draggable'>
<div  id='hello'style=\"width: 168px; height: 140px; background-color: #4A9FF5;border-radius:20px; cursor: move; position: absolute;\">
<p style=\"position:absolute;margin-top:50px;margin-left:50px\"><span style=\"font-family:cursive\">slide{$k}</span></p>
<div id='count' style=\"color: black\"> </div></div>
<form id='form'style=\"position:absolute;margin-top:140px;\">
<label><span style=\"color:#F6F2FF\">pos-z</span></label>
<input type=\"text\" id=\"posz\" value=\" \" style=\"width:15px;position:relative;display:inline\" >
<label><span style=\"color:#F6F2FF\">scale</span></label>
<input type=\"text\" id=\"scale\"  value=\" \" style=\"width:15px;position:relative;display:inline\"  >  
<label><span style=\"color:#F6F2FF\">rot-x</span></label>
<input type=\"text\" id=\"rotx\" value=\" \" style=\"width:15px;position:relative;display:inline\" > 
<label><span style=\"color:#F6F2FF\">y</span></label>
<input type=\"text\" id=\"roty\" value=\" \" style=\"width:15px;position:relative;display:inline\" > 
<label><span style=\"color:#F6F2FF\">z</span></label>
<input type=\"text\" id=\"rotz\"  value=\" \" style=\"width:15px;position:relative;display:inline\" > 
</form>
</div>  
</div> ");
}
?>



</div>  
<script>
var arr=document.getElementsByClassName("hi");
var myrotx=new Array();
var myroty=new Array();
var myrotz=new Array();
var myscale=new Array();
var myposz=new Array();
var myposy=new Array();
var myposx=new Array();
<?php 
for($z=0;$z<=$pagecount;$z++)
{
echo("
var a{$z}=arr[{$z}].childNodes[1];//draggable
var b{$z}=a{$z}.childNodes[1];//hello
var c{$z}=b{$z}.childNodes[3];//count
var d{$z}=jQuery(a{$z});
var e{$z}=jQuery(c{$z});
d{$z}.draggable({
 containment: \"#container\",
        scroll: false,
        drag: function(event) {
            o = $(this).offset();
            p = $(this).position();
            myposy[{$z}]=p.top;
            myposx[{$z}]=p.left;
            //e{$z}.html(p.left + ', ' + p.top); 

  }
});

");
}
?>


<?php
for ($i=0;$i<=$pagecount;$i++)
{
echo("var i{$i}={$i};
  ");
echo("var x{$i}=arr[i{$i}];
var y{$i}=x{$i}.childNodes[1];
var hel{$i}=y{$i}.childNodes[1];
var myform{$i}=y{$i}.childNodes[3];
var helobj{$i} = jQuery(hel{$i});
var formobj{$i} = jQuery(myform{$i});
formobj{$i}.find(':input').each(function(){
  $(this).change(function(){

      var posi{$i}=myform{$i}.elements[0].value;
      if(posi{$i}== \" \")
      {
        posi{$i}=0;
      }
      
      var sc{$i}=myform{$i}.elements[1].value;
       if(sc{$i}==\" \")
       {
        sc{$i}=1;
      }
        var degx{$i}=myform{$i}.elements[2].value;
       if(degx{$i}==\" \")
        {
          degx{$i}=0;
        }
      if ((degx{$i}%90)==0 && ((degx{$i}/90)%2)==1)
        {
          degx{$i}=degx{$i}-0.5;
        }
        var degy{$i}=myform{$i}.elements[3].value;
       if(degy{$i}==\" \")
        {
          degy{$i}=0;
        }
      if ((degy{$i}%90)==0 && ((degy{$i}/90)%2)==1)
        {
          degy{$i}=degy{$i}-0.5;
        }
        var degz{$i}=myform{$i}.elements[4].value;
       if(degz{$i}==\" \")
        {
          degz{$i}=0;
        }
         
        helobj{$i}.css({
        transform: 'scale('+sc{$i}+') rotateX('+degx{$i}+'deg) rotateY('+degy{$i}+'deg) rotateZ('+degz{$i}+'deg)'
        
  });
        myrotx[{$i}]=degx{$i};
        myroty[{$i}]=degy{$i};
        myrotz[{$i}]=degz{$i};
        myposz[{$i}]=posi{$i};
        myscale[{$i}]=sc{$i};
        
        var sinz{$i}=Math.sin(degz{$i}/180*Math.PI);
        var cosz{$i}=Math.cos(degz{$i}/180*Math.PI);
        var ad{$i}=140+70*(sc{$i}-1)+70*sc{$i}*(sinz{$i}+cosz{$i}-1);
         
        formobj{$i}.css({'margin-top': ad{$i}+'px'});
        
});
});");

}
?>
function myvalues()
{
        var i;
        var drag=document.getElementsByClassName("draggable");
        for (i=0;i<=<?php echo($pagecount);?>;i++)
{

  if (typeof myrotx[i]== 'undefined')
    myrotx[i]=0;
  if (typeof myroty[i]== 'undefined')
    myroty[i]=0;
  if (typeof myrotz[i]== 'undefined')
    myrotz[i]=0;
  if (typeof myscale[i]== 'undefined')
    myscale[i]=1;
  if (typeof myposz[i]== 'undefined')
    myposz[i]=0;
   if (typeof myposy[i]== 'undefined')
    {
     var off=jQuery(drag[i]).offset();
     var posit=jQuery(drag[i]).position();
      myposy[i]=posit.top;
      myposx[i]=posit.left;
          }
   
}
        
        var e1= myrotx.join(" ,");
         
         var e2= myroty.join(" ,");
        
         var e3= myrotz.join(" ,");
         
         var e4= myscale.join(" ,");
        
          var e5= myposz.join(" ,");

           var e6= myposx.join(" ,");

            var e7= myposy.join(" ,");
            
            
            var e8=[e1,e2,e3,e4,e5,e6,e7].join("and");
           

         $.post('test.php?slides=<?php
            echo($pagecount);
            ?>&username=<?php echo($usr); ?>', {e8: e8},function(data)
  {
    if (data) 
      {
       
      $(document).ready(function()
 {
  var x=document.getElementById('next');
  x.style.display="block";
 $('#next').click(function()
{
   
   
    var url="newsave.php?username=<?php echo $usr;
                    ?>&bcolor=<?php echo $_GET['bcolor'];
                    ?>&scolor=<?php echo $_GET['scolor'];
                    ?>&bimage=<?php echo $_GET['bimage'];
                    ?>";
    window.location = url;
});
 });
    }
  });
          



}
</script>
<script>
 
</script>


</body>
</html>