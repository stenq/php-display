<?php
include "db.php";

$result = $db->query("SELECT * FROM messages ORDER BY created_at DESC");

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "<div class='message'>";
    echo "<div class='meta'>" . $row["username"] . " • " . $row["created_at"] . "</div>";
    echo "<div>" . $row["message"] . "</div>";
    echo "<div class='delete' onclick='deleteMessage(" . $row["id"] . ")'>Delete</div>";
    echo "</div>";
}
?>