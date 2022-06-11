<?php
$con = mysqli_connect("localhost","root","","sistema_php");
if($con){
    echo 'DB conectado ';
} else{
    echo 'DB não conectado ' .mysqli_connect_error();
}
?>