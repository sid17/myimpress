<?php
 require_once("include/dbconnection.php");
 ?>
<?php
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
global $efirst;
$efirst=0;
global $elast;
$elast=0;
global $eemail;
$eemail=0;
global $euser;
$euser=0;
global $echeck;
$echeck=0;
//check for the first name and the last name
if (isset($_POST['firstname'])) {  
if(empty($_POST['firstname']))
$efirst =1;
else{
 $name_subject = $_POST['firstname'];
 $name_pattern = '/^[a-zA-Z]*$/';
 
 if(!preg_match($name_pattern, $name_subject))  
$efirst=2;
}
if(empty($_POST['lastname']))
$elast =1;
else{
$name_subject1 = $_POST['lastname'];
$name_pattern1 = '/^[a-zA-Z ]*$/';  
;
if(!preg_match($name_pattern1, $name_subject1 ))  
$elast =2;
}
}

//email validation

if (isset($_POST['email']))
{  
if(empty($_POST['email']))  
$eemail= 1;
else{
$email_subject = $_POST['email'];  
$email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';  
if(!preg_match($email_pattern, $email_subject))
  $eemail =2;
}
} 


//terms and condition acceptance
if (isset($_POST['check'])) {  
//checking facilities  
$check = $_POST['check'];  
  if(empty($check))   
  {  
    $echeck = 1;
  }   
   
 
}  
//username check
if (isset($_POST['username']))
{  
if(empty($_POST['username']))  
$euser= 1;
if ($euser==0)
{
$user_subject = $_POST['username'];  
$user_pattern = ' /^[0-9a-zA-Z_][0-9a-zA-Z_]+$/'; 
if(!preg_match($user_pattern, $user_subject))  
$euser =2;
}
if ($euser==0)
{
 $res=mysql_query("SELECT * FROM users  ",$connection);
if (!$res) die("database query failed:".mysql_error());

while ($row=mysql_fetch_array($res)) 
{
 if($row['username']==$_POST['username'])
 $euser=3;
}
}
}

echo($efirst ." ". $elast." ".   $eemail ." ". $euser." ".  $echeck);
if (($efirst!=0&&$elast!=0&&$eemail!=0&&$euser!=0&&$echeck!=0))
{
 echo("move to register.php");
}
else
{
echo("registered");
}
mysql_close($connection);
?>


