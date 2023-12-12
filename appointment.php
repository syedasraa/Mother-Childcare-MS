<?php
if(isset($_POST['Ap_id'])){
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
$Ap_id=$_POST['Ap_id'];
$Ap_date=$_POST['Ap_date'];
$pat_id=$_POST['pat_id'];
$doc_id=$_POST['doc_id'];
$sql="INSERT INTO `consults` (`Ap_id`, `Ap_date`, `pat_id`, `doc_id`) VALUES ('$Ap_id, '$Ap_date', '$pat_id', '$doc_id');";

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
    <link rel="stylesheet" href="beautify.css">
        <title>Appointments</title>
        <link rel="icon" href="https://img.icons8.com/external-bzzricon-flat-bzzricon-studio/512/external-mother-womens-day-bzzricon-flat-bzzricon-flat-bzzricon-studio.png">


</head>
<body>
  <script src="script.js"></script>


  <div class="header">
    <h1>Mother & Childcare </h1>
    <h3 class="heading" >Management System</h3>
  </div>
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
<!--
<div class="form-body" style="background:url(https://emedia1.nhs.wales/PublicHealthWales/cache/file/6BF94ED6-F79C-498C-9E60C2F2AB4F9A0D_carouselimage.jpg)">
  <div class="row">
      <div class="form-holder">
          <div class="form-content">
              <div class="form-items">
                  <h3>Appointments</h3>
                  <p>------------------------------------------</p>
                  <div><p class="text">Here you can view & schedule <br>your prenatal appointments with your healthcare provider.</p></div>
                 <form class="requires-validation" >

                    <div >
                        <input class="form-control" type="text" name="name" placeholder="Appointment-ID" required>
                    </div>
                    <div >
                        <input class="form-control" type="time" name="name" placeholder="Appointment-Time" required>
                    </div>
                    <div >
                        <input class="form-control" type="date" name="name" placeholder="Appointment-Date" required>
                    </div>
                    <input class="form-control" type="text" name="name" placeholder="Doctor-ID" required>
                    </div>
                    <input class="form-control" type="text" name="name" placeholder="Doctor-Name" required>
                    </div>
                    <input class="form-control" type="text" name="name" placeholder="specialization" required>
                    </div>
                    <input class="form-control" type="text" name="name" placeholder="Patient-ID" required>
                  </div>
                    <div>
                    <input class="form-control" type="number" name="name" placeholder="phone-no." required>
                   </div>
                   <br>
                    <div >

                      
                      <button class="rbtn" id="submit" type="submit" class="btn btn-primary">
                      <a href="http://127.0.0.1:5500/appointment.html"> Register</a>
                      </button>
                    </div>
                 </form>
                </div>
          </div>
      </div>
  </div>
</div>

-->


<div class="form-body" style="background:url(https://emedia1.nhs.wales/PublicHealthWales/cache/file/6BF94ED6-F79C-498C-9E60C2F2AB4F9A0D_carouselimage.jpg)">
  <div class="row">
      <div class="form-holder">
          <div class="form-content">
              <div class="form-items">
                  <h3>Appointments</h3>
                  <p>------------------------------------------</p>
                  <div><p class="text">Here you can view & schedule <br>your prenatal appointments with your healthcare provider.</p></div>
                 <form  action="./appointment.php" method="post" class="requires-validation">
                    <div>
                        <input class="form-control" type="text" name="Ap_id" placeholder="Appointment-ID" required>
                    </div>
                    <div>
                        <input class="form-control" type="date" name="Ap_date" placeholder="Appointment-Date" required>
                    </div>
                    <div>
                      <input class="form-control" type="text" name="pat_id" placeholder="Patient-ID" required>
                  </div>
                    <div>
                        <input class="form-control" type="text" name="doc_id" placeholder="Doctor-ID" required>
                    </div>
                    <div>
                      <button id="rbtn" id="submit" type="submit" class="btn btn-primary">Book-Appointment</button>
                    </div>
                  </form>
                </div>
              </div>    
            </div>
          </div>
        </div>
        <div class="footer">
          <h1>Mother & Childcare </h1>
          <h3 class="heading" >Management System</h3>
          <p>syedasraa10@gmail.com</p>
          ©2023 by Mother & Childcare Management System.
        </div>
      </body>
    </html>
