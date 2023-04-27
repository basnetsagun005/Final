<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="center">
        <h1> </h1>
        <form method="post" action="">
        <div class="txt_field">
            <input type="text" name="email" required>
            <span></span>
            <label>Email</label>
        </div>
        <div class="txt_field">
            <input type="password" name="password" required>
            <span></span>
            <label>Password</label>
        </div>
        <div class="pass"><a href="#">Forgot Password?</a></div><br>
    
        <input type="submit" value="Login">
        <div class="signup_link">
            <br>
            Not a member? <a href="signup.php">Sign up</a>
            <br>
            <br>
            <br>
        </div>
        </form>
    </div>
</body>
</html>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Database connection details
  $servername = "localhost"; // server name
  $username = "milan"; // database username
  $password = "real"; // database password
  $dbname = "mydb"; // database name

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Checks connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get form data
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Query database for user with matching username
  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      // Login successful
      $_SESSION['username'] = $email;
      header("Location: loggedmember.php");
      exit();
    } else {
      // Incorrect password
      echo "<script type='text/javascript'>alert('Incorrect password.');</script>";
      exit();
    }
  } else {
    // User not found
    echo "<script type='text/javascript'>alert('User not found.');</script>";
    exit();
  }

  // Close statement and connection
  $stmt->close();
  $conn->close();

}
?>
