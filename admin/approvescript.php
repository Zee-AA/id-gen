<?php 
    session_start();
    include "connection.php";

    $matric = $_GET['matric'];
    $request = mysqli_query($conn, "UPDATE admin_tb SET request = '1' WHERE matric = $matric");

	if($request ) {
	    header('location: index.php');
   	}else {
	    // header('location: dashboard.php');
        echo "error";
   	}
?>