<?php
$servername = "localhost";
$username = "root";       // Το προεπιλεγμένο όνομα χρήστη στο XAMPP
$password = "";           // Ο προεπιλεγμένος κωδικός είναι κενός
$dbname = "map_system";   // Το όνομα της βάσης που φτιάξαμε

// Δημιουργία σύνδεσης
$conn = new mysqli($servername, $username, $password, $dbname);

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Η σύνδεση απέτυχε: " . $conn->connect_error);
}
?>