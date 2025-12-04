<?php
$host = "localhost";
$db   = "lamp_stack_delicious_and_stuff";
$user = "cuck";
$pass = "cuckchair";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT name, message, created_at FROM guestbook ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guestbook</title>
</head>
<body>
    <h1>Guestbook</h1>

    <form action="save.php" method="POST">
        <input type="text" name="name" placeholder="Your Name" required><br><br>
        <textarea name="message" placeholder="Your Message" required></textarea><br><br>
        <button type="submit">Submit</button>
    </form>

    <h2>Messages</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <strong><?php echo htmlspecialchars($row['name']); ?></strong><br>
                <?php echo nl2br(htmlspecialchars($row['message'])); ?><br>
                <small><?php echo $row['created_at']; ?></small>
            </li>
            <hr>
        <?php endwhile; ?>
    </ul>
</body>
</html>
