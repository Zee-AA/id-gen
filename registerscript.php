<?php

session_start();
require 'connection.php';

if (isset($_POST['register'])) {
    $matric = $_POST['matric'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // hash the pasword

    $passhash = md5($password);

    $success = "Your account creation was successfull, please login below";
    $error = "Error registering student";

    $query = "INSERT INTO `user_bio_tb`(`matric`, `phone`, `password`) VALUES ('$matric', '$phone', '$passhash')";

    $registerStudent = mysqli_query($conn, $query);

    if ($registerStudent) {
        // echo "Student registered";
        $_SESSION['success'] = $success;
        header('location: index.php');

    }else{
        // echo "Error";
        $_SESSION['success'] = $error;
        header('location: register.php');
    }
}



?>