<?php
session_start();
$username = $_POST['username'];
$pass = $_POST['password'];

$servername = "localhost";
$userDB = "root";
$passDB = "root";
$dbName = 'T1806E';

$conn = new mysqli($servername,$userDB,$passDB,$dbName);

if($conn->connect_error){
    //echo "Connection error";
}else{
   // echo "Connection success";
}

$sql = "SELECT * FROM user WHERE username LIKE '".$username
    ."' AND password LIKE '".$pass."' LIMIT 1";

$result = $conn->query($sql);
$user = null;
if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        $user =  $row;
    }
}else{
    echo 0;
}

if(isset($user)){
    $_SESSION['current_user'] = $user;
    echo 1;
}

