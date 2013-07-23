<?php
$file = 'phpscript/files/impresspresentation.html';
$source = file_get_contents("http://localhost/cloudpresentationapplication/aloha/a/b/c/newsave.php?username=sam___8");
file_put_contents($file, $source);
//echo $source;
?>
<?php
header('Location: phpscript/download.php?filename=impresspresentation.html');
exit;
?>