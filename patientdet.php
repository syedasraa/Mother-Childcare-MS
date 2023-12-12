<?php
if(isset($_POST['username'])){
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
$username=$_POST['username'];
$password=$_POST['password'];
$sql="INSERT INTO `users`(`username`, `password`) VALUES ( '$username', '$password')";
//echo $sql;

if($conn->query($sql) == TRUE){
  //echo "successfully inserted";
}
else{
  echo "ERROR: $sql<br> $conn->error";
}
/*
include ("connection.php");
$cmd=$_REQUEST['cmd'];
switch($cmd){
  case="add":
    $sql="INSERT INTO `users`(`username`, `password`)
     VALUES ( '".$_REQUEST['username']."' , 
              '".$_REQUEST['password']."');
    //echo $sql;
}*/




$conn->close(); 
}
?>

<!DOCTYPE html>
  <html lang="en">
  <head>
    <link rel="stylesheet" href="beautify.css">
    <link rel="icon" href="https://img.icons8.com/external-bzzricon-flat-bzzricon-studio/512/external-mother-womens-day-bzzricon-flat-bzzricon-flat-bzzricon-studio.png">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mother & Childcare</title>
  </head>
  <body>
      <div class="header">
      <h1>Mother & Childcare </h1>
      <h3 class="heading" >Management System</h3>
    </div>
<!-- Navigation links -->
<nav>
  <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="./Login.html">Login</a></li>
      <li><a href="./forpatients+.html">For Patients+</a></li>
      <li><a href="./doctor.html">Find A Doctor</a></li>
      <li><a href="./appointment.php">Appointments</a></li>
      <li><a href="#For Healthcare Proffesionals">For Healthcare Proffesionals+</a></li>
      <li><a href="./support.html">Support</a></li>
  </ul>
</nav>


<!-- form-->
<div class="form-body" style="background:url(https://www.cnet.com/a/img/resize/17009ba9167d789785fa6231e04e03fe83df6d29/hub/2021/09/14/6f5a47f0-8e8d-424b-9f68-15a6c71079ae/articlemain.jpg?auto=webp&fit=crop&height=675&width=1200)">
  <div class="row">
      <div class="form-holder">
          <div class="form-content">
              <div class="form-items">
                  <h3>Patient-Details</h3>
                  <p>------------------------------------------</p>
                 <!--<form action="./antenatalcard.php" method="post" class="requires-validation" novalidate>

                    <div >
                        <input class="form-control" type="text" name="name" placeholder="Patient-ID" required>
                    </div>
                    <div >
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                    </div>
                    <div >
                        <input class="form-control" type="text" name="name" placeholder="Age" required>
                    </div>
                    <div >
                        <select class="form-select mt-3" required>
                            <option>Marital-status</option>
                            <option value="">Married</option>
                            <option value="">Unmarried</option>
                        </select>
                    </div>
                    <div>
                        <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                   </div>
                   <br>
                    <div >
                      <button id="rbtn" id="submit" type="submit" class="btn btn-primary">
                       Register
                      </button>
                    </div>
                 </form>-->
                <form action="./antenatalcard.php" method="post">
                 <input class="form-control" type="text" name="pat_id" placeholder="Patient ID" required>
                 <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                 <input class="form-control" type="number" name="age" placeholder="Age" required>
                 <input class="form-control" type="text"  name="marital_status" placeholder="Marital Status" >
                 <input class="form-control" type="text" name="address" placeholder="Address" required>
                 <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                 <hr>
                 <button id="rbtn" id="submit" type="submit" class="btn btn-primary">Register</button>
                </form>
                </div>
          </div>
      </div>
  </div>
</div>
<!--form ends -->
<div class="footer">
  <h1>Mother & Childcare </h1>
  <h3 class="heading" >Management System</h3>
  <p>syedasraa10@gmail.com</p>
  ©2023 by Mother & Childcare Management System.
</div>

  </body>
  </html>
