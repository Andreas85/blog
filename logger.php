<?php
include '../config/database.php';

$sql = "INSERT INTO button_press_log (ip, page) VALUES ('" . $_SERVER['REMOTE_ADDR'] . "', '" . $conn->real_escape_string($_POST['page']) . "')";
$result = $conn->query($sql);
