<?php

$con = new mysqli('localhost', 'root', 'jc35#7V6nsQd6|8CGQS8$!nWz,q%^5]W','2a5projet');  
if($con){
    echo"connection successfull";
}else{
    die(mysqli_error($con));
}
 
?>