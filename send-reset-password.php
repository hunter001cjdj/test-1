<?php
require 'C:\Apache24\htdocs\mrt\PHPMailer\src\Exception.php';
require 'C:\Apache24\htdocs\mrt\PHPMailer\src\PHPMailer.php';
require 'C:\Apache24\htdocs\mrt\PHPMailer\src\SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 定義生成隨機數字的函數
function generateRandomNumber($length = 6) {
$characters = '0123456789';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// 取得使用者輸入的信箱
$email = $_POST["email"];

// 連接資料庫並設置編碼為 UTF-8
$conn = new mysqli("localhost", "root", "123456", "restaurant");
$conn->set_charset("utf8");

if ($conn->connect_error) {
die("連接資料庫失敗: " . $conn->connect_error);
}

// 檢查信箱是否存在
$sql = "SELECT * FROM customer WHERE mail = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
// 生成六位數隨機數字作為新密碼
$newPassword = generateRandomNumber();

// 將新密碼以明文形式更新到資料庫
$sql = "UPDATE customer SET password = ? WHERE mail = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $newPassword, $email);
$stmt->execute();

// 使用 PHPMailer 發送郵件
$mail = new PHPMailer(true);
try {
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'yangmenghsuan236'; // 替換為您的 Gmail 帳號
$mail->Password = 'worx fsey ugqh gdih'; // 替換為您的 Gmail 密碼
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

// 設置寄件人名稱為 UTF-8
$mail->CharSet = 'UTF-8';
$mail->setFrom('your_email@gmail.com', '台北捷運美食地圖');
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject = '台北捷運美食地圖 - 忘記密碼';
$mail->Body = "您的新密碼為：$newPassword";

$mail->send();
echo "新密碼已發送到您的信箱。";
} catch (Exception $e) {
echo "郵件發送失敗: {$mail->ErrorInfo}";
}
} else {
echo "該信箱未註冊。";
}

$stmt->close();
$conn->close();
}
?>