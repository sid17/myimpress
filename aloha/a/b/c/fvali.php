<?php
$mystring="sidd___1745hant___1745";
$pos = strrpos($mystring, "___");
if ($pos === false) {
    echo"not found";
}
else
{
    
    $p=(substr($mystring, 0, $pos));  // bcd
    echo($p);
}

?>