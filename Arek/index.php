<?php
$db = new mysqli('localhost', 'root', '', 'wakacje');
if ($db->connect_error) {
    die('Błąd połączenia z bazą danych: ' . $db->connect_error);
}
$sql1 = "SELECT nazwa, cena FROM wydatki WHERE cena < 100";
$result1 = $db->query($sql1);
$sql2 = "SELECT nazwa, cena FROM wydatki WHERE cena >= 100";
$result2 = $db->query($sql2);
if ($result1->num_rows > 0) {
    echo "<h3>Towary do 100zł:</h3>";
    echo "<ul>";
    while ($row1 = $result1->fetch_assoc()) {
        echo "<li>" . $row1['nazwa'] . " - " . $row1['cena'] . "zł</li>";
    }
    echo "</ul>";
} else {
    echo "Brak towarów o cenie mniejszej niż 100zł.";
}
if ($result2->num_rows > 0) {
    echo "<h3>Towary 100zł i więcej:</h3>";
    echo "<ul>";
    while ($row2 = $result2->fetch_assoc()) {
        echo "<li>" . $row2['nazwa'] . " - " . $row2['cena'] . "zł</li>";
    }
    echo "</ul>";
} else {
    echo "Brak towarów o cenie równej lub wyższej niż 100zł.";
}
$db->close();
?>