-<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logged IN User</title>
  <link rel="stylesheet" href="logged.css">
</head>

<body>
  <nav>
    <div class="logo">
		<h3>Namaste</h3>
     
    </div>
    <div class="menu">
      <ul>
        <li><a href="homepage.html">Homepage</a></li>
        <li><a href="write_report.html">Write another Report</a></li>
        <li class="dropdown">
          <a href="#">User</a>
          
          <div class="user-logo">
  <a href="#"><span><?php echo $_SESSION['username']; ?></span></a>
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
    <h1>Form Successfully Submitted!</h1>
    <p>Try our website</p>
    <div class="buttons">
      <a href="homepage.html">Homepage</a>
      <br>
      <a href="write.php">Write a Report</a>
    </div>
  </div>

</body>

</html>
