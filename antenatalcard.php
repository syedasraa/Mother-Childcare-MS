<?php
if(isset($_POST['pat_id'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mc";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection 
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "success connecting to the db";
$pat_id=$_POST['pat_id'];
$name=$_POST['name'];
$age=$_POST['age'];
$marital_status=$_POST['marital_status'];
$address=$_POST['address'];
$email=$_POST['email'];
$sql="INSERT INTO `patient` (`pat_id`, `name`, `age`, `marital_status`, `address`, `email`) VALUES ('$pat_id', '$name', '$age', '$marital_status', '$address', '$email')";
//echo $sql;

if($conn->query($sql) == TRUE){
  //echo "successfully inserted";
}
else{
  echo "ERROR: $sql<br> $conn->error";
}

$conn->close(); 
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>antenatal-card</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://img.icons8.com/external-bzzricon-flat-bzzricon-studio/512/external-mother-womens-day-bzzricon-flat-bzzricon-flat-bzzricon-studio.png">
</head>
<body>
    <h1>Antenatal Card</h1>

<!-- Navigation links -->
<nav>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="./doctor.html">Find A Doctor</a></li>
      <li><a href="./appointment.php">Appointments</a></li>
      <li><a href="./patientdet.php"> Patient Details</a></li>
      <li><a href="./delivery.php">Delivery details</a></li>
      <li><a href="./visit.php">Visits</a></li>
      <li><a href="./test.php">Tests</a></li>
      <li><a href="./scans.html">Scans</a></li>
      <li><a href="./checkup.html">Check-ups</a></li>
      <li><a href="./support.html">Support</a></li>    
    </ul>
  </nav> 
<hr>


  <nav>
  <ol display="block" style="background:url(https://images.healthshots.com/healthshots/en/uploads/2022/05/12104033/pregnancy-1.jpg)"> 
      <li><a href="./edit1.php">Edit patient details </a></li>
      <li><a href="./men_his.php">Menstrual History </a></li>
      <li><a href="./med_his.php">Patient Medical History</a></li>
      <li><a href="./preg_his.php"> Patient Pregnancy History</a></li>
      <li><a href="./pat_rep.php"> Patient Report</a></li>      
</ol>
  </nav>
    
  

</div>
</body><hr>

  <div class="footer">
    <h1>Mother & Childcare </h1>
    <h3 class="heading" >Management System</h3>
    <p>syedasraa10@gmail.com</p>
    ©2023 by Mother & Childcare Management System.
  </div>

</body>
</html>