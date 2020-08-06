<?php
include '_dbconnect.php';
$shoeExist = false;
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $cpass = $_POST["password1"];
    $usersql = "SELECT * FROM `user` WHERE username = '$username'";
    $userresult= mysqli_query($connection,$usersql);
    $numrows =mysqli_num_rows($userresult);
    echo  $numrows;
    if ($numrows>0){
        header("location:/index.php?singupSucess=false");
    }
    else{
        if($pass== $cpass){
            $hash = password_hash($pass,PASSWORD_DEFAULT);
            $sql ="INSERT INTO `user` (`username`, `email`, `password`, `timestamp`) VALUES ('$username', '$email', '$hash', current_timestamp())";
            $result = mysqli_query($connection, $sql);
            header("location:/index.php?singupSucess=true");
            exit();
        }
        else{
            echo 'Password Donot Match';
        }
    }
    header("location:/index.php?singupSucess=false");
}
?>