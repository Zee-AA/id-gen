<?php
session_start();
include '../connection.php';

$studentIn = $_SESSION['matric'];
if (empty(isset($studentIn))) {
  header('loaction; ../index.php');
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
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
.id{
  style: button;
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
    <div class="col-md-10">
        <div class="row">
            <div class="container-fluid">
            <div class="card p-5 mt-4 bg-secondary">
                <h3 class="text-center"><b>welcome to student ID card portal</b></h3>
                <p>Matric Number is: <?php echo $studentIn ?></p>
            </div>
            </div>
        </div>
        <div class="row">
          <?php
          $sql = "SELECT * FROM user_bio_tb WHERE `matric` = '$studentIn'";
          $check = mysqli_query($conn, $sql);
          $data = mysqli_fetch_array($check);
          $status = $data['status'];
          $request = $data['request'];


          ?>
            <div class="col-md-6">
                    <div class="card p-2 mt-4 bg-secondary">
                        <h3 class="text-center"><b>status</b></h3>
                        <!-- <form action="log in.html" class="">
                        <button type="submit" class="bg-dark mx-auto d-block"><b class="text-light">click to request</b></button>
                        </form> -->
                        
                        <!-- <a href="#" id='btn'>click to request</a> -->
                        <?php
                        if ($request == 0) {
                          echo "
                          <a href='requestscript.php?matric=$studentIn' id='btn'>Click to request</a>
                          ";
                        }else{
                          echo "
                          <h4>you have already requested for id</h4>
                          ";
                        }
                        ?>

                    </div>
            </div>        
            <div class="col-md-6">
                    <div class="card p-3 mt-4 bg-secondary">
                        <h3 class="text-center mb-2"><b>status</b></h3>
                        <!-- <h5 class="text-center mb-4"><B>Not Approved</B></h5> -->
                        <?php
                        if ($status == "notapproved") {
                          echo "<h5 class='text-center mb-1'><B>Not Approved</B></h5>";
                        }else{
                          echo "<h5 class='text-center mb-1'><B>Approved</B></h5>";
                        }
                        ?>
                    </div>
            </div>
        </div>
    </div>
    </div>
</div>

   
</body>

<!-- Mirrored from www.w3schools.com/howto/tryit.asp?filename=tryhow_css_sidenav_fixed by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Apr 2019 03:58:01 GMT -->
</html> 
