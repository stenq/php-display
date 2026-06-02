<?php
include "db.php";

$id = intval($_GET["id"]);
$db->exec("DELETE FROM messages WHERE id = $id");
?>