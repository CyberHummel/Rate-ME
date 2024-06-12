<!DOCTYPE html> <!--Generelles Layout/Funktion Marius, überarbeitetes Design Maximus-->
<html lang="en">
<head>
    <title>Welcome back</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="design.css">
    <link rel="stylesheet" type="text/css" href="../Frontend/home.css">
</head>
<body class="backround">
<?php
session_start();
// generell blackbox autocomplete m schnerller zu schreiben ~ marius

/* feheler finden dies das 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
// Funktionen definieren

// Eingaben validieren
function validateInput($input)
{
    return filter_var($input, FILTER_SANITIZE_STRING);
}

include "./Backend/connect.php";
$conn=connect_db();

// isset überprüft ob die methode tatsächlich exitiert bevor ich sie dann aufrufe
if (isset($_SERVER['REQUEST_METHOD'])) {
    // Überprüfen ob  Anfrage per POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Eingegebene Benutzerdaten checken
        $username = validateInput($_POST["username"]);
        $password = validateInput($_POST["password"]);


        $stmt = $conn->prepare("SELECT user_id, user_username, user_password FROM user WHERE user_username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($user_id, $user_username, $user_password);

        // Überprüfen, ob ein Benutzer mit den eingegebenen Anmeldeinformationen gefunden wurde
        if ($stmt->fetch()) {
            // Passwortüberprüfung
            if ($password === $user_password) {

                $_SESSION["user_username"] = $user_username;
                $_SESSION["user_password"] = $user_password;

                header("Location: home.php");
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
<div class="fixed-top container rounded" style="background-color:rgba(255,255,255,0.9)">
    <h1 class="h1 text-center rate-me_headline">RateME</h1>
</div>

<div id="central_panel" class="rounded container">
    <div class="container text-left rounded">
        <h1 style="margin-top: 25%">Sign in</h1>
        <br>
    </div>
    <!-- Anmeldeformular -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="margin-left: 8%;">
        <label for="username">Username:</label>
        <input id="username" name="username" required type="text"/>
        <br>
        <label for="password">Password: </label>
        <input id="password" name="password" required type="password"/>
        <!-- wennn das hier gedrückt wird passiert nichts -->
        <input name="login" type="submit" value="Login" class="button button-primary rounded"
               style="margin-left: 15%; color: #007bff; border-width: 0; background-color: rgb(253,253,253)"/>
    </form>
    <div class="button-container">
        <a href="../Backend/register.php" class="small-button">Want to join Community?</a>
    </div>


</div>
</body>
</html>
