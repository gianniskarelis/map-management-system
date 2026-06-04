# Σύστημα Διαχείρισης ΜΑΠ & Σχεδιασμός Εταιρικού Δικτύου

[cite_start]Αυτό το αποθετήριο αποτελεί το τελικό παραδοτέο για το εργαστηριακό project: "Τεχνολογίες Διαδικτύου στην Ψηφιακή Βιομηχανία"[cite: 5, 6].

## 1. Περιγραφή Σεναρίου
[cite_start]Η εφαρμογή αναπτύχθηκε για τις ανάγκες μιας φανταστικής βιομηχανικής εγκατάστασης[cite: 17]. [cite_start]Το σύστημα αναλαμβάνει την ψηφιακή διαχείριση της αποθήκης όσον αφορά τα Μέσα Ατομικής Προστασίας (ΜΑΠ)[cite: 18]. Ο υπεύθυνος ασφαλείας μπορεί να ελέγχει το διαθέσιμο απόθεμα, να χορηγεί εξοπλισμό στους εργαζομένους και να διατηρεί ψηφιακό ιστορικό όλων των διανομών.

## 2. Αρχιτεκτονική Εφαρμογής & Διαδικασία Ανάπτυξης
[cite_start]Η διαδικτυακή εφαρμογή αναπτύχθηκε τοπικά χρησιμοποιώντας το λογισμικό XAMPP (Web Server Apache)[cite: 21, 24]. 
Τα βήματα υλοποίησης περιλάμβαναν:
* Σχεδιασμό της λογικής και του UI με HTML/CSS και PHP.
* [cite_start]Δημιουργία σύνδεσης (`db.php`) με τη βάση δεδομένων[cite: 28].
* [cite_start]Ανάπτυξη τριών βασικών λειτουργικών σελίδων (`inventory.php`, `issue_form.php`, `history.php`) και ενός κεντρικού μενού (`index.php`)[cite: 36].

**Στιγμιότυπο καίριου σημείου του κώδικα:**
[ΣΥΡΕ ΤΟ SCREENSHOT ΤΟΥ ΚΩΔΙΚΑ (code_screenshot.png) ΕΔΩ]

## 3. Δομή της Βάσης Δεδομένων
[cite_start]Χρησιμοποιήθηκε βάση δεδομένων MySQL [cite: 25] με το όνομα `map_system`. Αποτελείται από 3 πίνακες:
1. `employees`: Αποθήκευση στοιχείων προσωπικού (Ονοματεπώνυμο, Ρόλος).
2. `ppe_items`: Διαχείριση των διαθέσιμων ΜΑΠ και της ποσότητάς τους.
3. `issuances`: Πίνακας ιστορικού που ενώνει τους εργαζόμενους με τα αντικείμενα (καταγράφει `employee_id`, `item_id`, `issue_date`).

## 4. Χρήση Εργαλείων Τεχνητής Νοημοσύνης (AI)
[cite_start]Για την ανάπτυξη της εργασίας αξιοποιήθηκε το μοντέλο Τεχνητής Νοημοσύνης Gemini της Google[cite: 39, 40]. 
* [cite_start]**Τρόπος αξιοποίησης:** Χρησιμοποιήθηκε ως βοηθός εκμάθησης (tutor) για την κατανόηση της σύνδεσης PHP με MySQL και για οδηγίες παραμετροποίησης του Packet Tracer[cite: 41].
* [cite_start]**Τμήματα κώδικα:** Ο κώδικας της PHP για την εμφάνιση των δεδομένων με χρήση της εντολής SQL `JOIN` (στο `history.php`) και τα CSS styles για το UI γράφτηκαν με την καθοδήγηση του AI[cite: 42].

---

## ΜΕΡΟΣ Α: Στιγμιότυπα Λειτουργίας Εφαρμογής

### Κεντρικό Μενού (index)
<img width="1919" height="905" alt="map_index" src="https://github.com/user-attachments/assets/ef2f2e22-3147-4523-8289-b1462c91c305" />

### Απόθεμα ΜΑΠ (Ανάκτηση Δεδομένων/inventory)
<img width="1919" height="907" alt="map_inventory" src="https://github.com/user-attachments/assets/dacc008d-6d15-484a-9d63-255a1cb74396" />

### Φόρμα Χορήγησης (Εισαγωγή Δεδομένων/issue form)
<img width="1919" height="913" alt="map_xorigisi1" src="https://github.com/user-attachments/assets/7757ba37-e555-430d-b51f-ec27dfb18274" />
<img width="1918" height="903" alt="map_xorigisi2" src="https://github.com/user-attachments/assets/aa9b7550-a4ae-4720-b53e-1a34e11297cf" />
<img width="1919" height="914" alt="map_xorigisi3" src="https://github.com/user-attachments/assets/9a656d60-ba85-4e43-8d0b-f838cbb986f6" />

### Ιστορικό Διανομών (history)
<img width="1919" height="914" alt="map_istoriko" src="https://github.com/user-attachments/assets/e0fa2f5d-a102-465b-af58-a8f52fd6d92f" />


---

## ΜΕΡΟΣ Β: Δικτυακή Αρχιτεκτονική

[cite_start]Η τοπολογία σχεδιάστηκε στο Cisco Packet Tracer [cite: 50] [cite_start]και είναι κυκλική[cite: 59]. [cite_start]Αποτελείται από 5 Routers (μοντέλο 2911) [cite: 53][cite_start], 2 Switches (2960) [cite: 54] [cite_start]και 2 PCs[cite: 55]. [cite_start]Οι υπολογιστές βρίσκονται σε διαφορετικά υποδίκτυα (`192.168.1.0/24` και `192.168.2.0/24`) και είναι τοποθετημένοι σε αντιδιαμετρικά σημεία[cite: 56, 57, 58]. [cite_start]Για τη δρομολόγηση των πακέτων υλοποιήθηκε το πρωτόκολλο δυναμικής δρομολόγησης **RIP**[cite: 70].

### Τοπολογία Δικτύου
<img width="1919" height="890" alt="packettracer_topologia" src="https://github.com/user-attachments/assets/6e7dff75-0545-4d66-b166-cfc5a55dd5fd" />

### Έλεγχος Συνδεσιμότητας (Ping & Tracert)
<img width="1271" height="693" alt="packettracer_ping_tracert" src="https://github.com/user-attachments/assets/dd47c6e2-d614-414e-8c79-2d631c44ed0b" />

### Έλεγχος Πρόσβασης (HTTP Request)
<img width="1424" height="696" alt="packettracer_browser" src="https://github.com/user-attachments/assets/1fe2e092-1407-4712-90d5-4213eab59c8f" />
