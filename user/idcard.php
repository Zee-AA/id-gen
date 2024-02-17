<?php
session_start();
include '../connection.php';

$studentIn = $_SESSION['matric'];
if (empty(isset($studentIn))) {
  header('loaction; ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
    <style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 19px;
  color: #fff;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

</head>
<body>
<div class="box">
    <div class="row">
            <div class="col-md-2">
                <div class="sidenav">
                    <a href="Dasboard.php">Dashboard</a>
                    <a href="Profile.php">Profile</a>
                    <a href="idcard.php">ID card</a>
                    <a href="logout.php">Logout</a>
                    <!-- <a href="#">Link 1</a> -->
                </div>
            </div>
            <?php
            $query = "SELECT * FROM `user_bio_tb` WHERE `matric` ='$studentIn'";
            $check = mysqli_query($conn, $query);
            $data = mysqli_fetch_array($check);

            $fullname = $data['fullname'];
            $level = $data['level'];
            $phone = $data['phone'];
            $gender = $data['gender'];
            $passport = $data['passport'];
            $request = $data['request'];
            $status = $data['status'];

            if ($request == 0) {
              echo "<h3>You haven't requested for ID card</h3>
              <a href= '#' id='btn'>Click to request</a>
              ";
            }elseif (($request == 1) AND ($status == 'notapproved')) {
              echo "Your ID is awaiting approval";
            }else if ($status == 'approved') {

              echo"
            
                <div class='col-md-10'>
                    <div class='card bg-light mt-2'style='width:400px' >
                        <div class='card-body'>
                            <h3 class='text-center'><b>Software University</b></h3>
                            <p class='text-center'><b>Department of UI/IX</b></p>
                            <hr>
                        <div class='row'>
                            <div class='col-md-4'>
                                <img src='$passport' alt='' style='width: 120px;height:120px; border-radius:100px;'>
                            </div>
                        <div class='col-md-8'>
                            <p class= 'mb-1'>Fullname: $fullname</p>
                            <p class= 'mb-1'>Matric: $studentIn</p>
                            <p class= 'mb-1'>Level: $level</p>
                            <p class= 'mb-1'>Gender: $gender</p>
                        </div>
                     </div>
                </div>
            ";
            }
            ?>

            </div>
           
    </div>
</div>
</body>
</html>