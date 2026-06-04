<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <title>Σύστημα Διαχείρισης ΜΑΠ</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 50px; background-color: #f9f9f9; text-align: center; }
        h1 { color: #333; margin-bottom: 10px; }
        p { color: #666; margin-bottom: 40px; font-size: 18px; }
        .menu-container { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; }
        .menu-card { 
            background-color: white; 
            border: 1px solid #ddd; 
            border-radius: 8px; 
            width: 250px; 
            padding: 30px; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }
        .menu-card:hover { transform: translateY(-5px); }
        .btn { 
            display: inline-block; 
            margin-top: 20px; 
            padding: 12px 20px; 
            color: white; 
            text-decoration: none; 
            border-radius: 4px; 
            font-weight: bold; 
        }
        .btn-blue { background-color: #007BFF; }
        .btn-blue:hover { background-color: #0056b3; }
        .btn-green { background-color: #28a745; }
        .btn-green:hover { background-color: #218838; }
        .btn-orange { background-color: #fd7e14; }
        .btn-orange:hover { background-color: #da6204; }
    </style>
</head>
<body>

    <h1>Σύστημα Χορήγησης Μέσων Ατομικής Προστασίας (ΜΑΠ)</h1>
    <p>Ψηφιακή Διαχείριση & Καταγραφή Εξοπλισμού Ασφαλείας στη Βιομηχανία</p>

    <div class="menu-container">
        
        <div class="menu-card">
            <h3>Απόθεμα ΜΑΠ</h3>
            <p style="font-size:14px; color:#777;">Δείτε τη λίστα με τα διαθέσιμα τεμάχια στην αποθήκη.</p>
            <a href="inventory.php" class="btn btn-blue">Προβολή Αποθέματος</a>
        </div>

        <div class="menu-card">
            <h3>Νέα Χορήγηση</h3>
            <p style="font-size:14px; color:#777;">Καταχωρήστε τη διανομή εξοπλισμού σε κάποιον εργαζόμενο.</p>
            <a href="issue_form.php" class="btn btn-green">Φόρμα Χορήγησης</a>
        </div>

        <div class="menu-card">
            <h3>Ιστορικό</h3>
            <p style="font-size:14px; color:#777;">Δείτε αναλυτικά ποιος εργαζόμενος πήρε τι και πότε.</p>
            <a href="history.php" class="btn btn-orange">Προβολή Ιστορικού</a>
        </div>

    </div>

</body>
</html>