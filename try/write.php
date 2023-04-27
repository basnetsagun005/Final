<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Online Incident Report</title>
    <link rel="stylesheet" href="write.css">
  </head>
  <body>
    <form method="post" action="">
      <a href="Homepage.html"><h1>Online Incident Report</h1> </a>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required placeholder="Enter your full name">
      <label for="citizenship">Citizenship Number:</label>
      <input type="text" id="citizenship" name="citizenship" placeholder="For verification purpose" required>
      
      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="dob" required>
      <label for="gender">Gender:</label>
      <select id="gender" name="gender" required>
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
      <label for="crime">Nature of Crime:</label>
      <select id="crime" name="crime" required>
        <option value="">Select Crime</option>
        <option value="theft">Theft</option>
        <option value="fraud">Fraud</option>
        <option value="abuse">Abuse</option>
      </select>
      <label for="details">Enter Report Details:</label>
      <textarea id="details" name="details" rows="3" required></textarea>
      <input type="submit" value="Submit">
    
     <label for="location">Enter District of Crime Occurrence:</label>
      <input type="text" id="location" list="districts" name="location" placeholder="Type to search..." required>
      <datalist id="districts" required>
        <option value="Achham"></option>
        <option value="Arghakhanchi"></option>
        <option value="Baglung"></option>
        <option value="Baitadi"></option>
        <option value="Bajhang"></option>
        <option value="Bajura"></option>
        <option value="Banke"></option>
        <option value="Bara"></option>
        <option value="Bardiya"></option>
        <option value="Bhaktapur"></option>
        <option value="Bhojpur"></option>
        <option value="Chitwan"></option>
        <option value="Dadeldhura"></option>
        <option value="Dailekh"></option>
        <option value="Dang"></option>
        <option value="Darchula"></option>
        <option value="Dhading"></option>
        <option value="Dhankuta"></option>
        <option value="Dhanusa"></option>
        <option value="Dholkha"></option>
        <option value="Dolpa"></option>
        <option value="Doti"></option>
        <option value="Eastern Rukum"></option>
        <option value="Gorkha"></option>
        <option value="Gulmi"></option>
        <option value="Humla"></option>
        <option value="Ilam"></option>
        <option value="Jajarkot"></option>
        <option value="Jhapa"></option>
        <option value="Jumla"></option>
        <option value="Kailali"></option>
        <option value="Kalikot"></option>
        <option value="Kanchanpur"></option>
        <option value="Kapilvastu"></option>
        <option value="Kaski"></option>
        <option value="Kathmandu"></option>
        <option value="Kavrepalanchok"></option>
        <option value="Khotang"></option>
        <option value="Lalitpur"></option>
        <option value="Lamjung"></option>
        <option value="Mahottari"></option>
        <option value="Makwanpur"></option>
        <option value="Manang"></option>
        <option value="Morang"></option>
        <option value="Mugu"></option>
        <option value="Mustang"></option>
        <option value="Myagdi"></option>
        <option value="Nawalparasi"></option>
        <option value="Nuwakot"></option>
        <option value="Okhaldhunga"></option>
        <option value="Palpa"></option>
        <option value="Panchthar"></option>
        <option value="Parbat"></option>
        <option value="Parsa"></option>
        <option value="Pyuthan"></option>
        <option value="Ramechhap"></option>
        <option value="Rasuwa"></option>
        <option value="Rautahat"></option>
        <option value="Rolpa"></option>
        <option value="Rupandehi"></option>
        <option value="Salyan"></option>
        <option value="Sankhuwasabha"></option>
        <option value="Saptari"></option>
        <option value="Sarlahi"></option>
        <option value="Sindhuli"></option>
        <option value="Sindhupalchok"></option>
        <option value="Siraha"></option>
        <option value="Solukhumbu"></option>
        <option value="Sunsari"></option>
        <option value="Surkhet"></option>
        <option value="Syangja"></option>
        <option value="Tanahun"></option>
        <option value="Taplejung"></option>
        <option value="Terhathum"></option>
        <option value="Udayapur"></option>  

    </form>
  </body>
</html>
   
     <?php

/* Start the session to access session variables
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
// Get the username from the session
$username = $_SESSION['username'];
 */

// Get the form values
$name = $_POST['name'];
$citizenship = $_POST['citizenship'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$crime = $_POST['crime'];
$details = $_POST['details'];

// Replace with your database credentials
$host = 'localhost';
$dbname = 'mydb';
$user = 'milan';
$password = 'real';

try {
  $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Prepare the SQL statement
  $stmt = $db->prepare("INSERT INTO incident_reports ( name, citizenship, dob, gender, crime, details) VALUES ( :name, :citizenship, :dob, :gender, :crime, :details)");

  // Bind the parameters
  //$stmt->bindParam(':username', $username);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':citizenship', $citizenship);
  $stmt->bindParam(':dob', $dob);
  $stmt->bindParam(':gender', $gender);
  $stmt->bindParam(':crime', $crime);
  $stmt->bindParam(':details', $details);

  // Execute the statement
  $stmt->execute();

  // Redirect to the confirmation page
  header("Location: confirmation.php");
  echo "Redirecting to confirmation page...";
  exit();
} catch(PDOException $e) {
  // Handle the error
  echo "Error: " . $e->getMessage();
  exit();
}

?>
