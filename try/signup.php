
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Incident Report Signup</title>
</head>

<body>
  <div class="center">
    <h1>Incident Report Signup</h1>
    <form method="POST" action="">
      <div class="txt_field">
        <input type="text" name="email" required>
        <span></span>
        <label>Enter your email</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password" required>
        <span></span>
        <label>Password</label>
      </div>
      <div class="txt_field">
        <input type="password" name="confirm_password" required>
        <span></span>
        <label>Re-enter Password</label>
      </div>

      <input type="submit" value="Sign up">
      <div class="signup_link">
        <br>
        <hr>
        Already a member? <a href="login.php">Login</a> <br>
      </div>
    </form>
  </div>
</body>

</html>



<?php
// Database connection details
$servername = "localhost"; // Change this to your server name
$username = "milan"; // Change this to your database username
$password = "real"; // Change this to your database password
$dbname = "mydb"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['confirm_password'];

// Check if password and confirmation match
if ($password !== $password_confirm) {
  echo "<script>alert('Passwords do not match! Try again');</script>";
  exit();
}

// Hash password
$password = password_hash($password, PASSWORD_DEFAULT);

// Check if email already exists in the database
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  echo "<script>alert('This email is already registered!');</script>";
} else {
  // Insert new record into database
  $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $email, $password);

  if ($stmt->execute() === TRUE) {
    echo "<script>alert('Signup successful! Click On Login');</script>";
  } else {
    echo "<script>alert('Error: " . $stmt->error . "');</script>";
  }
}

// Close statement and connection
$stmt->close();
$conn->close();
?>


