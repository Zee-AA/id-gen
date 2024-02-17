<?php
session_start();
require 'connection.php';

if (isset($_POST['login'])) {

    $matric = $_POST['matric'];
    $password = $_POST['password'];

    $passhash = md5($password);

    $success = "Your account login was successfull";
    $error = "Error login in student";


    $sql = "SELECT * FROM `user_bio_tb` WHERE `matric`='$matric' AND `password`='$passhash'";

    $userLogin = mysqli_query($conn, $sql);

    if (mysqli_num_rows($userLogin)>0) {
        // echo "login successful";
        $_SESSION['matric'] = $matric;
        header('location: user/dashboard.php');
    }else{
        // echo "error";
        $_SESSION['error'] = $error;
        header('location: index.php');
    }


}



?>