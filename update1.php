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
  <div class="update">
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
        echo "
        <form action='./update1.php' method='post'>
        <input type='hidden' name='dis_id' value='" . $row["dis_id"] . "'>
        Disease Name: <input type='text' name='disease_name' value='" . $row["disease_name"] . "'>
        Medication: <input type='text' name='medication' value='" . $row["medication"] . "'>
        Surgery: <input type='text' name='surgery' value='" . $row["surgery"] . "'>
        Patient ID: <input type='text' name='pat_id' value='" . $row["pat_id"] . "'>
        <input type='submit' value='Update'>
        </form>
        ";
    } else {
        echo "No data found";
    }
}
elseif(isset($_POST['dis_id'])){
    $dis_id = $_POST['dis_id'];
    $disease_name = $_POST['disease_name'];
    $medication = $_POST['medication'];
    $surgery = $_POST['surgery'];
    $pat_id = $_POST['pat_id'];
//$sql = "UPDATE patient_medical_history SET disease_name='$disease_name', medication='$medication', surgery='$surgery', pat_id='$pat_id' WHERE dis_id='$dis_id'";
$sql = "UPDATE `patient_medical_history` SET `disease_name`='$disease_name',`medication`='$medication',`surgery`='$surgery',`pat_id`='$pat_id' WHERE `dis_id`='$dis_id'";
    if($conn->query($sql) === TRUE){
        echo "Record updated successfully";
    }
    else{
        echo "Error updating record: ".$conn->error;
    }
}
else{
    echo "No data provided";
}
$conn->close();
?>
<hr>
<div class="footer">
    <h1>Mother & Childcare </h1>
    <h3 class="heading" >Management System</h3>
    <p>syedasraa10@gmail.com</p>
    ©2023 by Mother & Childcare Management System.
  </div>
</div>
</body>
</html>