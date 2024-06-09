<!DOCTYPE html>
<html>
<head>
  <title>Welcome back</title>
  <link rel="stylesheet" type="text/css" href="design.css">
  <link rel="stylesheet" type="text/css" href="../Frontend/home.css">
</head>
<body class="backround" style="height: 1000px;" >
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Funktionen definieren

// Eingaben validieren
function validateInput($input) {
  return filter_var($input, FILTER_SANITIZE_STRING);
}

// Weiterleitungsfunktion
function redirect($url) {
  header('Location: ' . $url);
  exit;
}


// Datenbankverbindungsdaten
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "if0_36188364_rate_me";

// Verbindung zur Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);
// Verbindung überprüfen
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if (isset($_SERVER['REQUEST_METHOD'])) {
  // Überprüfen, ob die Anfrage per POST erfolgt
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Eingegebene Benutzerdaten validieren
  $username = validateInput($_POST["username"]);
  $password = validateInput($_POST["password"]);

  // SQL-Abfrage, um Benutzerdaten abzurufen
  $stmt = $conn->prepare("SELECT user_id, user_username, user_password FROM user WHERE user_username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->bind_result($user_id, $user_username, $user_password);

  // Überprüfen, ob ein Benutzer mit den eingegebenen Anmeldeinformationen gefunden wurde
  if ($stmt->fetch()) {
    // Passwortüberprüfung
    if ($password === $user_password) {
      
      //redirect('home.php');
    } else {
      // Benutzername oder Passwort ungültig
      echo "Invalid username or password";
    }
  } else {
    // Benutzername oder Passwort ungültig
    echo "Invalid username or password";
  }

  // Statement schließen
  $stmt->close();
  }
}


// Verbindung schließen
$conn->close();
?>

 <!-- headline banner -->
 <div class="fixed-top container" style="background-color:rgba(255,255,255,0.9)">
        <h1 class="h1 text-center rate-me_headline">RateME</h1>
    </div>
<div id="central_panel">
  <div id="header">
    <h1>Sign in</h1>

  </div>
  <!-- Anmeldeformular -->
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="username">Username:</label>
    <input id="username" name="username" required type="text" />
    <label for="password">Password:</label>
    <input id="password" name="password" required type="password" />
    <!-- wennn das hier gedrückt wird passiert nichts --> 
    <input name="login" type="submit" value="Login"  />
  </>
  <div class="button-container">
    <a href="../Backend/register.php" class="small-button">New Here?</a>
  </div>
</div>
</body>
</html>
