<?php
require_once 'db.php';

// Το ερώτημα JOIN που ενώνει τους 3 πίνακες
$sql = "SELECT employees.first_name, employees.last_name, ppe_items.item_name, issuances.issue_date 
        FROM issuances 
        JOIN employees ON issuances.employee_id = employees.id 
        JOIN ppe_items ON issuances.item_id = ppe_items.id 
        ORDER BY issuances.issue_date DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <title>Ιστορικό Χορηγήσεων</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; background-color: #f9f9f9; text-align: center; }
        h2 { color: #333; }
        table { width: 70%; border-collapse: collapse; margin: 20px auto; background-color: white; text-align: left; }
        th, td { border: 1px solid #ddd; padding: 12px; }
        th { background-color: #007BFF; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Ιστορικό Χορηγήσεων Εξοπλισμού</h2>
    
    <table>
        <tr>
            <th>Εργαζόμενος</th>
            <th>Είδος Προστασίας (ΜΑΠ)</th>
            <th>Ημερομηνία Χορήγησης</th>
        </tr>
        
        <?php
        if ($result->num_rows > 0) {
            // Εμφάνιση των δεδομένων γραμμή-γραμμή
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                echo "<td>" . $row["item_name"] . "</td>";
                // Μετατροπή της ημερομηνίας σε ελληνική μορφή (ΗΗ/ΜΜ/ΕΕΕΕ)
                $date = date("d/m/Y", strtotime($row["issue_date"]));
                echo "<td>" . $date . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3' style='text-align: center;'>Δεν υπάρχουν ακόμα καταγεγραμμένες χορηγήσεις.</td></tr>";
        }
        
        $conn->close();
        ?>
    </table>
<br><a href='index.php'>Επιστροφή στο Κεντρικό Μενού</a>
</body>
</html>