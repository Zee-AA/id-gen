<?php
        session_start();
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* style the container */
.container {
  /* position: relative; */
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px 0 30px 0;
  height: 100vh;
  display: flex;
  justify content: center;
  align-items: center;
} 

/* style inputs and link buttons */
input,
.btn {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; /* remove underline from anchors */
}

input:hover,
.btn:hover {
  opacity: 1;
}

/* add appropriate colors to fb, twitter and google buttons */
.fb {
  background-color: #3B5998;
  color: white;
}



/* style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Two-column layout */
.col {
  float: left;
  width: 50%;
  margin: auto;
  padding: 0 50px;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* vertical line */
.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 175px;
}

/* text inside the vertical line */
.vl-innertext {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 50%;
  padding: 8px 10px;
}

/* hide some text on medium and large screens */
.hide-md-lg {
  display: none;
}

/* bottom container */
.bottom-container {
  text-align: center;
  background-color: #666;
  border-radius: 0px 0px 4px 4px;
}

/* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 650px) {
  .col {
    width: 100%;
    margin-top: 0;
  }
  /* hide the vertical line */
  .vl {
    display: none;
  }
  /* show the hidden text on small screens */
  .hide-md-lg {
    display: block;
    text-align: center;
  }
}

#admin {
    line-height: 120px;
    text-align: center;
}

.link {
    text
}
</style>
</head>
<body>


<div class="container">
  <form action="loginscript.php" method="post">
    <div class="row">
      <h2 style="text-align:center">Student Login</h2>
      <div class="vl">
        <span class="vl-innertext">or</span>
      </div>

      <div class="col">
        <a href="#" class="fb btn">
          <i class="fa fa-user fa-fw"></i>Student Login
         </a>
        
      </div>

      <div class="col">
        <div class="hide-md-lg">
          <p>Or sign in manually:</p>
        </div>


        <?php
        if(isset($_SESSION['success'])){
            echo "<p style='color:green'>".$_SESSION['success']."</p>";
        }
        if(isset($_SESSION['error'])){
            echo "<p style= 'color:green'>".$_SESSION['error']."</p>";
        }
        ?>


        <input type="text" name="matric" placeholder="Matric Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login" name="login">
        <a href="register.php" class="link">Don't have an Account? register</a>
      </div>
      
    </div>
  </form>
</div>



</body>

<!-- Mirrored from www.w3schools.com/howto/tryit.asp?filename=tryhow_css_social_login by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Apr 2019 03:58:10 GMT -->
</html>
<?php
    unset($_SESSION['success']);
    unset($_SESSION['success']);

?>