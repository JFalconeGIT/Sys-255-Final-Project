<?php
$host = "localhost";
$db   = "lamp_stack_delicious_and_stuff";
$user = "cuck";
$pass = "cuckchair";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

$name    = $_POST['name'] ?? '';
$message = $_POST['message'] ?? '';

if (!empty($name) && !empty($message)) {
    $stmt = $conn->prepare("INSERT INTO guestbook (name, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $message);
    $stmt->execute();
    $stmt->close();
}

header("Location: index.php");
exit;
