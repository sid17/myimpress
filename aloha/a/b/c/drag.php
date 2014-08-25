<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Sortable - Default functionality</title>
  <link rel="stylesheet" href="jquery/sortable1.css" />
  <script src="jquery/sortable2.js"></script>
  <script src="jquery/sortable3.js"></script>
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
</head>
<body>
  <div id="upper" style="position:absolute;margin-top:0px;margin-left:0px;width:1340px;height:80px;background-color:red"></div>
 <div id="parent" style="width:120px;position:absolute;margin-left:0px;margin-top:80px">
<div id="sortable" style="height:560px;width:120px;overflow-y:scroll;background-color:yellow">
  <div class="he" id="q1" style="width:100px;height:100px;background-color:rgb(250,200,200);position:relative;margin-top:20px">hello1</div>
  <div class="he" id="q2"  style="width:100px;height:100px;background-color:rgb(200,250,200);position:relative;margin-top:20px">hello2</div>
   <div class="he" id="q3"  style="width:100px;height:100px;background-color:rgb(250,200,200);position:relative;margin-top:20px">hello3</div>
    <div  class="he" id="q4" style="width:100px;height:100px;background-color:rgb(250,200,200);position:relative;margin-top:20px">hello4</div>
     <div class="he" id="q5"  style="width:100px;height:100px;background-color:rgb(250,200,200);position:relative;margin-top:20px">hello5</div>
      <div class="he" id="q6"  style="width:100px;height:100px;background-color:rgb(250,200,200);position:relative;margin-top:20px">hello6</div>
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
</body>
</html>