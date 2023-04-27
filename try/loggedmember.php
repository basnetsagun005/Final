-<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logged In Page</title>
  <link rel="stylesheet" href="logged.css">
</head>

<body>
  <nav>
    <div class="logo">
      <h3>Successful</h3>
    </div>
    <div class="menu">
      <ul>
        <li><a href="homepage.html">Homepage</a></li>
        <li><a href="write.php">Write a Report</a></li>
        <li class="dropdown">
          <a href="#">User</a>
          
          <div class="user-logo">
  <a href="#"><span><?php echo $_SESSION['email']; ?></span></a>
  <div class="dropdown-menu">
            <a href="#">Profile</a>
            <a href="#">Settings</a>
           <a href="logout.php">Sign out</a>
           </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h1>Welcome!</h1>
    <p>You are currently logged in. Please choose one of the following options:</p>
    <div class="buttons">
      <a href="homepage.html">Go to Homepage</a>
      <a href="write.php">Write a Report</a>
    </div>
  </div>

</body>

</html>
