<?php
include '../connection.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body>
<!-- <nav class="navbar navbar-expand-lg navbar-black bg-black p-3">
            <div class="container-fluid">
              <a class="navbar-brand text-white" href="#"><i class="fa fa-home"></i>Admin Page</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          
              <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto ">
                  
                  <li class="nav-item">
                    <a class="nav-link mx-2 text-white" href="#">Welcome</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-2 text-white" href="#">welcome</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-2 text-white" href="#">Welcome</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-2 text-white" href="#">Welcome</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-2 text-white" href="#">Welcome</a>
                  </li>
                  
                </ul>
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <form action="logout.php" class="">
                        <button type="submit" class=" btn-white btn-lg" style="border-radius: 30%;"><i class="fa fa-user"></i>Logout</button>
                        </form>
                    </li>
                </ul>
              </div>
            </div>
          </nav> -->

<h2>Admin Page</h2>

<div style="overflow-x:auto;">
  <table>
    <tr>
    <th>Profile Photo</th>
      <th>Full Name</th>
      <th>Level</th>
      <th>Phone Number</th>
      <th>Gender</th>
      <th>Request</th>
      
    </tr>


    <?php
        // $view = ;
        $query = mysqli_query($conn, "SELECT * FROM `user_bio_tb`");

        while ($row = mysqli_fetch_array($query)) {
          
            $passport = $row['passport'];
            $fullname = $row['fullname'];
            $level = $row['level'];
            $phone = $row['phone'];
            $gender = $row['gender'];
            $request = $row['request'];
            // $status = $row['status'];

        
      ?>

    <tr>
        <td><?php echo "<img src='$passport' alt='' style='width: 90px;height:90px; border-radius:100px;'>" ?></td>
      <td><?php echo $fullname ?></td>
      <td><?php echo $level ?></td>
      <td><?php echo $phone ?></td>
      <td><?php echo $gender ?></td>
      <td>
      <?php
                        if ($request == 1) {
                          echo "
                          <a href='approvescript.php?' id='btn'>Approve</a>
                          ";
                        }else{
                          echo "
                          <h4>Approved✅</h4>
                          ";
                        }
                        ?>
      <!-- <a href= ''>Approve</a></td> -->
      
      
    </tr>
    <?php
     }
     ?>
  </table>
</div>

</body>
</html>
