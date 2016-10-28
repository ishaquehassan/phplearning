<?php
session_start();
$connection = mysqli_connect("127.0.0.1","root","","php_learning_sess8");
if(!$connection){
    die("Connection Not Successful");
}