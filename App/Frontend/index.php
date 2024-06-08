<!DOCTYPE html>
<html>
<head>
  <title>Rate ME!!!!</title>
  <link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>
<?php

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

// Überprüfen, ob ein POST-Request vorliegt (wenn das Formular abgesendet wurde)
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
      // Bei erfolgreicher Anmeldung den Benutzer weiterleiten
      redirect('home.php');
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

// Verbindung schließen
$conn->close();
?>
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
    <input name="login" type="submit" value="Login"  />
  </form>
  <div class="button-container">
    <a href="../Backend/register.php" class="small-button">New Here?</a>
  </div>
</div>
</body>
</html>
