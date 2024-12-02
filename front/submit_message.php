<?php
$pdo = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'staff', 'password');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = $_POST['user_name'];
$number = $_POST['user_number'];
$email = $_POST['user_mail'];
$message = $_POST['message'];

$stmt = $pdo->prepare("INSERT INTO messages (name, number, email, message) VALUES (?, ?, ?, ?)");
$stmt->execute([$name, $number, $email, $message]);

header("Location: contact-us.php?status=success");
exit;
}
?>