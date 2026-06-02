<?php
include "db.php";

$username = htmlspecialchars($_POST["username"]);
$message = htmlspecialchars($_POST["message"]);

if (!empty($username) && !empty($message)) {
    $stmt = $db->prepare("INSERT INTO messages (username, message) VALUES (:username, :message)");
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':message', $message);
    $stmt->execute();
}
?>