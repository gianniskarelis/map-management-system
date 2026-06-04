<?php
require_once 'db.php';

$message = ""; // Μεταβλητή για να δείχνουμε μήνυμα επιτυχίας ή σφάλματος

// Αν ο χρήστης πάτησε το κουμπί 'Καταχώρηση' (μέθοδος POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST['employee_id'];
    $item_id = $_POST['item_id'];
    $issue_date = date('Y-m-d'); // Παίρνει τη σημερινή ημερομηνία αυτόματα

    // 1. Εντολή για να προστεθεί η χορήγηση στο ιστορικό
    $sql_insert = "INSERT INTO issuances (employee_id, item_id, issue_date) VALUES ('$emp_id', '$item_id', '$issue_date')";
    
    // 2. Εντολή για να μειωθεί το απόθεμα κατά 1
    $sql_update = "UPDATE ppe_items SET stock_quantity = stock_quantity - 1 WHERE id = '$item_id' AND stock_quantity > 0";

    if ($conn->query($sql_insert) === TRUE && $conn->query($sql_update) === TRUE) {
        $message = "<div style='color: green; margin-bottom: 20px;'><strong>Επιτυχία!</strong> Η χορήγηση καταχωρήθηκε και το απόθεμα μειώθηκε κατά 1.</div>";
    } else {
        $message = "<div style='color: red; margin-bottom: 20px;'><strong>Σφάλμα:</strong> " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <title>Νέα Χορήγηση ΜΑΠ</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; background-color: #f9f9f9; text-align: center; }
        .form-container { background-color: white; width: 400px; margin: 0 auto; padding: 30px; border: 1px solid #ddd; border-radius: 8px; text-align: left; }
        h2 { color: #333; text-align: center; }
        label { font-weight: bold; display: block; margin-top: 15px; margin-bottom: 5px; }
        select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px; }
        button { margin-top: 25px; width: 100%; padding: 12px; background-color: #28a745; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; }
        button:hover { background-color: #218838; }
    </style>
</head>
<body>

    <h2>Καταχώρηση Νέας Χορήγησης</h2>

    <?php echo $message; ?>

    <div class="form-container">
        <form method="POST" action="issue_form.php">
            
            <label for="employee_id">Εργαζόμενος:</label>
            <select name="employee_id" id="employee_id" required>
                <option value="">-- Επιλέξτε Εργαζόμενο --</option>
                <?php
                // Παίρνουμε τους εργαζόμενους από τη βάση
                $emp_result = $conn->query("SELECT id, first_name, last_name, role FROM employees");
                while($row = $emp_result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['first_name'] . " " . $row['last_name'] . " (" . $row['role'] . ")</option>";
                }
                ?>
            </select>

            <label for="item_id">Είδος Προστασίας (ΜΑΠ):</label>
            <select name="item_id" id="item_id" required>
                <option value="">-- Επιλέξτε Εξοπλισμό --</option>
                <?php
                // Παίρνουμε τον εξοπλισμό που έχει διαθέσιμο απόθεμα
                $item_result = $conn->query("SELECT id, item_name, stock_quantity FROM ppe_items WHERE stock_quantity > 0");
                while($row = $item_result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['item_name'] . " - Απόθεμα: " . $row['stock_quantity'] . "</option>";
                }
                ?>
            </select>

            <button type="submit">Καταχώρηση Χορήγησης</button>
            
        </form>
    </div>
<br><a href='index.php'>Επιστροφή στο Κεντρικό Μενού</a>
</body>
</html>