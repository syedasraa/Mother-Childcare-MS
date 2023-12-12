<?php
if(isset($_POST['report_no'])){
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
$report_no=$_POST['report_no'];
$blood_group=$_POST['blood_group'];
$haemoglobin=$_POST['haemoglobin'];
$blood_sugar=$_POST['blood_sugar'];
$drug_allergies=$_POST['drug_allergies'];
$protein=$_POST['protein'];
$pat_id=$_POST['pat_id'];
$sql="INSERT INTO `pat_report` (`report_no`, `blood_group`, `haemoglobin`, `blood_sugar`, `drug_allergies`, `protein`, `pat_id`) VALUES ('$report_no', '$blood_group', '$haemoglobin', '$blood_sugar', '$drug_allergies', ' $protein', '$pat_id');";
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
    <h1>Patient Report</h1>

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

  <form action="./pat_rep.php" method="post" class="anntenatalcard">
    <label for="report_no">Report Number:</label><br>
    <input type="text" id="report_no" name="report_no"><br>
    <label for="blood_group">Blood Group:</label><br>
    <input type="text" id="blood_group" name="blood_group"><br>
    <label for="haemoglobin">Haemoglobin:</label><br>
    <input type="text" id="haemoglobin" name="haemoglobin"><br>
    <label for="blood_sugar">Blood Sugar:</label><br>
    <input type="text" id="blood_sugar" name="blood_sugar"><br>
    <label for="drug_allergies">Drug Allergies:</label><br>
    <input type="text" id="drug_allergies" name="drug_allergies"><br>
    <label for="protein">Protein:</label><br>
    <input type="text" id="protein" name="protein"><br>
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