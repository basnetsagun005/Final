
<?php

// Database credentials
$host = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check for errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST["name"];
$citizenship = $_POST["citizenship"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$crime = $_POST["crime"];
$details = $_POST["details"];
$location = $_POST["location"];

// Prepare SQL statement to insert data into database
$sql = "INSERT INTO incident_reports (name, citizenship, dob, gender, crime, details, location)
        VALUES ('$name', '$citizenship', '$dob', '$gender', '$crime', '$details', '$location')";

// Execute SQL statement and check for errors
if ($conn->query($sql) === TRUE) {
  echo "Form submitted successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();

?>
