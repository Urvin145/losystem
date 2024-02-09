<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "losys";

$conn = mysqli_connect($server,$username,$password,$database);
if($conn){
    //echo"sucesss";
}else{
    die(mysqli_connect_error());
}

?>