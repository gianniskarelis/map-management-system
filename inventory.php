<?php
// Καλούμε το αρχείο σύνδεσης που φτιάξαμε πριν
require_once 'db.php';

// Δίνουμε εντολή στη βάση να μας φέρει τα ονόματα των ΜΑΠ και το απόθεμά τους
$sql = "SELECT item_name, stock_quantity FROM ppe_items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <title>Διαθέσιμο Απόθεμα ΜΑΠ</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; background-color: #f9f9f9; text-align: center; }
        h2 { color: #333; }
        table { width: 60%; border-collapse: collapse; margin: 20px auto; background-color: white; text-align: left; }
        th, td { border: 1px solid #ddd; padding: 12px; }
        th { background-color: #007BFF; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Διαθέσιμο Απόθεμα ΜΑΠ</h2>
    
    <table>
        <tr>
            <th>Είδος Προστασίας</th>
            <th>Διαθέσιμο Απόθεμα (Τεμάχια)</th>
        </tr>
        
        <?php
        // Ελέγχουμε αν η βάση μας επέστρεψε δεδομένα
        if ($result->num_rows > 0) {
            // Για κάθε γραμμή δεδομένων, φτιάχνουμε μια γραμμή στον πίνακα (<tr>)
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["item_name"] . "</td>";
                echo "<td>" . $row["stock_quantity"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Δεν βρέθηκε απόθεμα στη βάση δεδομένων.</td></tr>";
        }
        
        // Κλείνουμε τη σύνδεση
        $conn->close();
        ?>
    </table>
<br><a href='index.php'>Επιστροφή στο Κεντρικό Μενού</a>
</body>
</html>