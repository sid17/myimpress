<?php
require_once("include/session.php");
?>
<?php
confirm_logged_in();
?>
<?php
global $username1;
 $username1=$_GET['username'];
?>
<?php
 require_once("include/dbconnection.php");
 //3.perform database  query
$result=mysql_query("SELECT * FROM users WHERE username='$username1' ",$connection);
if (!$result)
die("database query failed:".mysql_error());
//4. Use returned data
global $selfcounter;
global $tempcounter;

while ($row=mysql_fetch_array($result))
{
$selfcounter=$row['selfcount'];
$tempcounter=$row['tempcount'];
}


mysql_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example of Fluid Layout with Twitter Bootstrap version 2.0 from w3resource.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Example of Fluid Layout with Twitter Bootstrap version 2.0 from w3resource.com">
    <meta name="author" content="">

    <!-- Le styles -->
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
          <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet"> <link href="twitter-bootstrap-v2/docs/assets/css/example-fluid-layout.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="twitter-bootstrap-v2/docs/examples/images/favicon.ico">
    <link rel="apple-touch-icon" href="twitter-bootstrap-v2/docs/examples/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="twitter-bootstrap-v2/docs/examples/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="twitter-bootstrap-v2/docs/examples/images/apple-touch-icon-114x114.png">
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div style="height:70px" class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          
          <div class="nav-collapse">
            <ul style="margin-top:25px"class="nav">
              <li class="active"><a href="#"><span style="font-size:30px"><b>HOME</b></span></a></li>
              <li><a href="#about"><span style="font-size:30px"><b>ABOUT</b></span></a></li>
              <li><a href="#contact"><span style="font-size:30px"><b>CONTACT</b></span></a></li>
            </ul>
             <p class="navbar-text pull-right">Logged in as <a href="#"><?php global $username;echo $username1; ?></a></p>
              <p class="navbar-text pull-right"> <a href="logout.php">Log out</a></p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  
    
           
         
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav" style="margin-top:150px">
            <ul class="nav nav-list" >
              <li class=" active"><a href="#" style="height:40px;"><h4>My Presentations</h4></a></li>
              <li class=" active"><a href="newpresentation.php?username=<?php $kj=$selfcounter+1;
              echo "{$username1}___{$kj}"; ?>&user=<?php echo $username1; ?>&pgcoun=<?php echo $selfcounter; ?>" style="height:40px;"><h4 >Create new</h4></a></li>
              <li class=" active"><a href="tryaloha2.php?username=<?php echo $username1; ?>" style="height:40px;"><h4 >Templates</h4></a></li>
              
           </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="leaderboard">
            <h1 ><span style="color:rgb(255,100,100)">Learn. Practice. Develop.</span></h1>
            <p>My Impress is a Free Application . It gives a platform to your ideas . You may use the existing templates also.</p>
  </div>

<div class="row-fluid">
  
<?php
echo ("<h1>Created presentations</h1>");
if ($selfcounter==0)
echo ("<h3>you dont have any existing created presentations</h3>");
else
{
  
  for ($i=1;$i<=$selfcounter;$i++)
  {
  echo(" <a style=\"margin:50px\"class=\"btn btn-info btn-large\" href=\"testt.php?username={$username1}___$i\">Presentation{$i}</a> ");
  }
}
?>

<?php
echo ("<h1>Template Based  presentations</h1>");
if ($tempcounter==0)
echo ("<h3>you dont have any existing template  based presentations</h3>");
else
{
  
  for ($i=1;$i<=$tempcounter;$i++)
  {
  echo("work under process");
  }
}
?>



        
          
           
          </div><!--/row-->
          <hr>
     <footer>
        <p>&copy; Siddhant Manocha</p>
      </footer>

    </div><!--/.fluid-container-->
    
    
    



    
    
    
    
    
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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

  </body>
</html>