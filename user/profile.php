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


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 10px;
  border: 1px solid #888;
  width: 80%;
  margin-left: 175px;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.myBtn{
    color: #f1f1f1;
    background-color: #000;
    width: 200px;
    padding: 10px 50px;
    height:60px;
}
input[type=text], 
select,
input[type=phone],
input[type=file]
{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
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
                                
                                
                                <!-- Trigger/Open The Modal -->
                                <button id="myBtn" class="myBtn">update record</button>
                            
                            
                            </div>
                            </div>
                        </div>
                        <?php
                        $query = "SELECT * FROM user_bio_tb WHERE `matric` = '$studentIn'";
                        $check = mysqli_query($conn, $query);
                        $data = mysqli_fetch_array($check);

                        $fullname = $data['fullname'];
                        $level = $data['level'];
                        $phone = $data['phone'];
                        $gender = $data['gender'];
                        $passport = $data['passport'];
                        ?>
                        <div class="row">
                        <div>
                    <p>Fullname: <?php echo $fullname ?></p>
                    <p>Matric: <?php echo $studentIn ?></p>
                    <p>Level: <?php echo $level ?></p>
                    <p>Phone: <?php echo $phone ?></p>
                    <p>Gender: <?php echo $gender ?></p>
                    <!-- <p>Passport: <?php echo $passport ?></p> -->
                    <img src="<?php echo $passport ?>" alt="" style="width: 150px;height:150px">
                </div>

                <!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span class="close">&times;</span>
  <div class="container">
  <form action="updatescript.php" method="post" enctype="multipart/form-data">
  <input type="hidden"  name="matric"  value="<?php echo $studentIn ?>">


    <label for="fullname">FullName</label>
    <input type="text" id="fullname" name="fullname" placeholder="Your name.." value="<?php echo $fullname ?>">

    <label for="level">Level</label>
    <select id="level" name="level">
      <option value="select-level">-Select level-</option>
      <option value="100" <?php if($level == "100") echo "Selected"; ?>>100</option>
      <option value="200" <?php if($level == "200") echo "Selected"; ?>>200</option>
      <option value="300" <?php if($level == "300") echo "Selected"; ?>>300</option>
      <option value="400" <?php if($level == "400") echo "Selected"; ?>>400</option>
      <option value="500"<?php if($level == "500") echo "Selected"; ?>>500</option>
      <option value="600"<?php if($level == "600") echo "Selected"; ?>>600</option>
    </select>

    <label for="phone">Phone</label>
    <input type="phone" id="phone" name="phone" placeholder="Your phone n..." value="<?php echo $phone ?>">

    <label for="gender">Gender</label>
    <select id="gender" name="gender">
      <option value="select-gender">-Select gender-</option>
      <option value="male" <?php if($gender == "male") echo "selected"; ?>>Male</option>
      <option value="female" <?php if($gender == "female") echo "selected"; ?>>Female</option>
    </select>
    <label for="passport">Passport</label>
    <input type="file" id="phone" name="passport" placeholder="choose a file" value="<?php echo $passport ?>">
  
    <input type="submit" value="Update record" name="update">
  </form>
</div>
</div>

</div>

                        </div>
                    </div>
                </div>
               
             


</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>

<!-- Mirrored from www.w3schools.com/howto/tryit.asp?filename=tryhow_css_sidenav_fixed by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Apr 2019 03:58:01 GMT -->
</html> 
