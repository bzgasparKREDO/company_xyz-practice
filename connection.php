<?php
function connection(){
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $db_name = "company_xyz";
    
    $conn = new mysqli($server_name,$username,$password,$db_name);

    if($conn->connect_error){
        die("Connection failed: ".$conn->connec_error);
    }else{
        return $conn;
    }
}