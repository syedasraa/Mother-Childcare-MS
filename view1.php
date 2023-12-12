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
<h1>Patient Medical History</h1>

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
<?php
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

if(isset($_GET['dis_id'])){
    $dis_id = $_GET['dis_id'];
    $sql = "SELECT dis_id, disease_name, medication, surgery, pat_id FROM patient_medical_history WHERE dis_id='$dis_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Disease ID: " . $row["dis_id"]. "<br>";
        echo "Disease Name: " . $row["disease_name"]. "<br>";
        echo "Medication: " . $row["medication"]. "<br>";
        echo "Surgery: " . $row["surgery"]. "<br>";
        echo "Patient ID: " . $row["pat_id"]. "<br>";
    } else {
        echo "No data found";
    }
}
else{
    echo "No data provided";
}
$conn->close();
?>
<hr>
<hr>
<div class="footer">
    <h1>Mother & Childcare </h1>
    <h3 class="heading" >Management System</h3>
    <p>syedasraa10@gmail.com</p>
    ©2023 by Mother & Childcare Management System.
  </div>