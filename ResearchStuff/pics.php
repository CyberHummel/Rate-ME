<?php
$servername = "your_host";
$username = "your_username";
$password = "your_password";
$dbname = "bilderdatenbank";

// Verbindung zur Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung überprüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$name = "Beispielbild";
$filePath = "path/to/your/image.jpg";
$binaryData = file_get_contents($filePath);

// Bild in die Datenbank einfügen
$stmt = $conn->prepare("INSERT INTO bilder (name, data) VALUES (?, ?)");
$stmt->bind_param("sb", $name, $null);
$stmt->send_long_data(1, $binaryData);

if ($stmt->execute()) {
    echo "Bild erfolgreich hochgeladen.";
} else {
    echo "Fehler beim Hochladen des Bildes: " . $stmt->error;
}

// Bild aus der Datenbank abrufen
$sql = "SELECT name, data FROM bilder WHERE id = 1"; // ID des gewünschten Bildes
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $data = $row['data'];
    $base64 = base64_encode($data);

    // Bild auf der Webseite anzeigen
    echo "<h1>$name</h1>";
    echo '<img src="data:image/jpeg;base64,' . $base64 . '" alt="' . $name . '">';
} else {
    echo "Kein Bild gefunden.";
}

$conn->close();
$stmt->close();
?>


