<!DOCTYPE html> <!--Generelles Layout/Funktion Marius, überarbeitetes Design Maximus-->
<html lang="en">
<head>
    <title>Welcome back</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="design.css">
    <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body class="gradient-background text-center" style="height: 100px">
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

include "connect.php";
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


<div id="central_panel" class=" container align-self-center shadow round">
    <div class="container text-left rounded mt-xl-3">
        <h1 class="rate-me_headline text-center" style="background-color: white">Rate ME</h1>
        <h3 class="mt-xl-2" style="">Sign in</h3>
        <br>
    </div>
    <!-- Anmeldeformular -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="margin-left: 8%;">
        <div class="row rounded shadow">
            <div class="rounded">
                <label for="username">Username:</label>
                <input id="username" name="username" required type="text" class="shadow rounded login-field"/>
            </div>
            <br>
            <div class="rounded shadow">
                <label for="password">Password: </label>
                <input id="password" name="password" required type="password" class="shadow rounded login-field" />
            </div>

        </div>
        <div class="container text-left">
            <input name="login" type="submit" value="Login" class="button rounded shadow mt-2 btn login-btn" style="border-width: 0; width: 100%;/>
        </div>
    </form>
    <div class="button-container">
        <a href="register.php" class="mb-lg-5 mt-2">Want to join Community?</a>
    </div>


</div>
</body>
</html>
