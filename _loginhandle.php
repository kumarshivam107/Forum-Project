<?php
include '_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"]){
    $username = $_POST["uname"];
    $password = $_POST["lpassword"];
    $loginsql = "SELECT * FROM `user` WHERE username = '$username'";
    $result = mysqli_query($connection,$loginsql);
    $numRows = mysqli_num_rows($result);
    if ($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password,$row['password'])){
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"]  = $username;
            header("location:/index.php");
        }
        else{
        header("location:/index.php?login=false");
        }
    }
    else{
        header("location:/index.php?login=false");
    }

}

?>