<?php
if(isset($_POST['last_date'])){
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
$last_date=$_POST['last_date'];
$menarche_age=$_POST['menarche_age'];
$associated_symptoms=$_POST['associated_symptoms'];
$pat_id=$_POST['pat_id'];
$sql="INSERT INTO `menstural_history` (`last_date`, `menarche_age`, `associated_symptoms`, `pat_id`) VALUES ('$last_date', '$menarche_age', '$associated_symptoms', '$pat_id');";
//echo $sql;

if($conn->query($sql) == TRUE){
  //echo "successfully inserted";
}
else{
  echo "ERROR: $sql<br> $conn->error";
}

$conn->close(); 
}
?>

<!DOCTYPE html>

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
    <h1>Menstrual History</h1>

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
  <button id="back-button">
  <a href="./antenatalcard.php">Back</a></button>

<div class="anntenatalcard" style="background:url()">   
  <form action="./men_his.php" method="post" class="anntenatalcard">
  <label for="last_date">Last Menstrual Period Date:</label><br>
  <input type="date" id="last-date" name="last_date"><br>
  <br>
  <label for="menarche_age">Age at Menarche:</label><br>
  <input type="number" id="menarche-age" name="menarche_age"><br>
  <br>
  <label for="associated_symptoms">Associated Symptoms:</label><br>
  <input type="text" id="ass-symptoms" name="associated_symptoms"><br>

  <input class="form-control" type="text" name="pat_id" placeholder="Patient ID" required>

  <button type="submit">Submit</button>
</form> 
<hr>
<div class="footer">
    <h1>Mother & Childcare </h1>
    <h3 class="heading" >Management System</h3>
    <p>syedasraa10@gmail.com</p>
    ©2023 by Mother & Childcare Management System.
  </div>

</body>
</html>