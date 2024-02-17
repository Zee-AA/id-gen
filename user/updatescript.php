<?php
session_start();
include "../connection.php";

if (isset($_POST['update'])) {
    $matric = $_POST['matric'];
    $fullname= $_POST['fullname'];
    $level = $_POST['level'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $passport = $_FILES["passport"]["name"];

    if ($passport != ""){
        $extension = explode(".", $passport);
        $newfilename = $matric . '.' . end($extension);
        $temp_name = $_FILES['passport']['tmp_name'];

        $folder = "../images";
        $path = "../images/".$newfilename;

        $query = "UPDATE user_bio_tb SET `fullname` = '$fullname', `level` = '$level', `phone` = '$phone', `gender` = '$gender', `passport` = '$path' WHERE `matric` = '$matric'";

        if (file_exists($folder)) {
            $uploadtodb = move_uploaded_file($temp_name, $path);
        }else{
            $created = mkdir($folder, 0755);
            if ($created) {
                $uploadtodb = move_uploaded_file($temp_name,$path);
            }
        }

        $update = mysqli_query($conn, $query);
        if($update && $uploadtodb){
            header('location:profile.php');
        }else{
            echo "error";
        }
    }

}
?>