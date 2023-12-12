
Connecting to Database using the MySQLi Procedural Method

<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create a connection
$conn = mysqli_connect($servername, $username, $password);

// Check the connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>

Closing the Connection
We can close the connection with the following code.
<?php
mysqli_close($conn);
?>



Creating a MySQL Database
We can use the CREATE DATABASE query inside a PHP script to create a new database in MySQL. 

There are also two methods by which we can do it.

 

MySQLi Object-oriented approach
<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create a connection
$conn = new mysqli($servername, $username, $password);
// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create a database query
$sql = "CREATE DATABASE cwhDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
 

MySQLi Procedural approach
<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create a connection
$conn = mysqli_connect($servername, $username, $password);
// Check the connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create a database
$sql = "CREATE DATABASE cwhDB";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>



Creating Table in MySQL
We can create a table in a database using the CREATE TABLE query in MySQL. Let's create a simple table "Employees", consisting of five columns: "employeeID", "firstname", "lastname", "email" and "joining_date". The query will look something like this:

CREATE TABLE Employees(
employeeID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
joining_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
Let's break down the attributes:

NOT NULL - Each row must contain a value for that column, null values are not allowed.
DEFAULT value - Set a default value that is added when no other value is passed.
UNSIGNED - Used for number types. It limits the stored data to positive numbers and zero.
AUTO INCREMENT - MySQL automatically increases the value of the field by 1 each time a new record is added.
PRIMARY KEY - Used to uniquely identify the rows in a table.
 

This is how it will look in a PHP script:

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "cwhDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE Employees(
employeeID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
joining_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Employees created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>


Inserting Data in MySQL
In MySQL, the INSERT INTO statement is used to add new records to a MySQL table. The string values inside the SQL query must be quoted and the numeric values along with the NULL should not be quoted when used in a PHP script. 

Let's assume we want to add a new Employee to the Employees Table we created in the previous tutorial. We will use the following syntax:

INSERT INTO table_name (column1, column2, column3,...)
VALUES (value1, value2, value3,...)
 

Now, let's see the PHP Script which inserts a new record to the database:

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "cwhDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Employees (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>













Selecting Data in MySQL
To select data from one or more tables in MySQL we can use the SELECT query. To select a single data in a table we use the following:

SELECT column_name(s) FROM table_name
To select all columns from a table, we need to use the following:

SELECT * FROM table_name
 

Let's assume we want to select employeeID, firstname and lastname from the Employees table, then we want to display the result using fetch_assoc() inside a while loop. 

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "cwhDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM Employees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["employeeID"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
Note: The function fetch_assoc() puts all the results into an associative array so that we can loop through. The while loop loops through the result set and outputs the data.






Updating Data in MySQL
Updating data in MySQL is very easy with the UPDATE statement. Let's assume we have this table where we need to update the lastname of the second employee. 

 

employeeID	firstname	lastname	email	joining_date
1	Harry	Bhai	harrybhai@bhai.com	2022-11-04 14:54:58
2	Rohan	Das	rohanbhai@bhai.com	2022-11-04 15:44:51
 

To update the lastname in the Employees table we will use the UPDATE command along side SET command and WHERE command. The SET command assigns variables and the WHERE command specifies which record should be updated. 

Note: If we don't use the WHERE clause, then all records will be updated.

Example:

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "cwhDB";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE Employees SET lastname='Bhai' WHERE id=2";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
 

After the record is updated, the table will look something like this:

employeeID	firstname	lastname	email	joining_date
1	Harry	Bhai	harrybhai@bhai.com	2022-11-04 14:54:58
2	Rohan	Bhai	rohanbhai@bhai.com	2022-11-04 15:44:51









Deleting Data in MySQL
To delete data in the MySQL database we can use the DELETE statement. 

 

Query:

DELETE FROM table_name
WHERE some_column = some_value
 

Let's assume we want to delete the second employee "Rohan" from the "Employees" Table. We will use the DELETE clause delete with the WHERE clause to specify which data is being deleted.

 

employeeID	firstname	lastname	email	joining_date
1	Harry	Bhai	harrybhai@bhai.com	2022-11-04 14:54:58
2	Rohan	Das	rohanbhai@bhai.com	2022-11-04 15:44:51
 

Example:

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "cwhDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM Employees WHERE firstname=Rohan";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
 

After deleting, this is how our table will look.

 

employeeID	firstname	lastname	email	joining_date
1	Harry	Bhai	harrybhai@bhai.com	2022-11-04 14:54:58
 
