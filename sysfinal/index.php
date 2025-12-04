<?php
$pdo = new PDO("mysql:host=localhost;dbname=lamp_stack_delicious_and_stuff", "cuck", "cuckchair");
$messages = $pdo->query("SELECT * FROM guestbook");
?>
<form action="save.php" method="POST">
  Name: <input type="text" name="name"><br>
  Message: <textarea name="message"></textarea><br>
  <button type="submit">Submit</button>
</form>
<hr>
<?php foreach ($messages as $m): ?>
<p>
  <b><?php echo $m['name']; ?></b><br>
  <?php echo $m['message']; ?><br>
  <?php echo $m['created_at']; ?>
</p>
<hr>
<?php endforeach; ?>