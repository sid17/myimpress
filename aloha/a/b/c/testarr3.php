<?php
global $pagecount;
$pagecount=$_GET['slides'];
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
      width: 140px;
      height: 190px;
      background: #efefef;
      border: 1px solid silver;
      position:relative;
    }

  </style>
</head>
<body>
  <input type="button" onclick=" myvalues()" value="click"></input>
   <input type="button"  id="next" value="next"></input>
<div id="container" style="width: 2800px; height: 1400px; border: 1px solid black; position: absolute;" >

<?php 
for($j=0;$j<=$pagecount;$j++)
{
  $k=$j+1;
echo("<div class='hi' style=\"float:left ;margin:50px\">
<div class='draggable'>
<div  id='hello'style=\"width: 140px; height: 140px; background-color: white; cursor: move; position: absolute;border:1px solid black\">
<p style=\"position:absolute;margin-top:50px;margin-left:50px\">slide{$k}</p>
<div id='count' style=\"color: black\"> </div></div>
<form id='form'style=\"position:absolute;margin-top:140px;\">
<label>pos-z</label>
<input type=\"text\" id=\"posz\" value=\" \" style=\"width:10px;position:relative;display:inline\" >
<label>scale</label>
<input type=\"text\" id=\"scale\"  value=\" \" style=\"width:10px;position:relative;display:inline\"  >  
<label>rot-x</label>
<input type=\"text\" id=\"rotx\" value=\" \" style=\"width:10px;position:relative;display:inline\" > 
<label>y</label>
<input type=\"text\" id=\"roty\" value=\" \" style=\"width:10px;position:relative;display:inline\" > 
<label>z</label>
<input type=\"text\" id=\"rotz\"  value=\" \" style=\"width:10px;position:relative;display:inline\" > 
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
            e{$z}.html(p.left + ', ' + p.top); 

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
         alert(posi{$i}+\" \"+posi{$i}+\" \"+degx{$i}+\" \"+degy{$i}+\" \"+degz{$i}+\" \"+sc{$i});
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
            ?>', {e8: e8},function(data)
  {
    if (data) 
      {
      $(document).ready(function()
 {
 $('#next').click(function()
{
            
    var url="template4.php?username=siddhant"
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