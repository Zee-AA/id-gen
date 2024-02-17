
<?php
 
$conn = "";
  
try {
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "id_gen";
  
    $conn = new PDO(
        "mysql:host=$servername; dbname=id_gen",
        $username, $password_db
    );
     
   $conn->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
 
?>