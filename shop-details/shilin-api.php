<?php
// 連接到資料庫
$pdo = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'staff', 'password');

// 假設你有一個包含所有店家資訊的陣列
$shops = [
['id' => 40, 'api' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3610.923755632156!2d121.4434573749857!3d25.172052177727135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442aff80c87d82d%3A0x7e4b4ebe228ab51!2z6aWe6ayl6Y2L54mpIOawtOa6kOW6lw!5e0!3m2!1szh-TW!2stw!4v1729496583535!5m2!1szh-TW!2stw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'],
['id' => 41, 'api' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3610.9871007221823!2d121.4445648!3d25.169913399999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a5580a05119b%3A0x1061ee526fd677b5!2z5LiD6Jmf576O5byP6aSQ5buz!5e0!3m2!1szh-TW!2stw!4v1729563293363!5m2!1szh-TW!2stw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'],
// 更多店家...
];

foreach ($shops as $shop) {
$id = $shop['id'];
$api = htmlspecialchars($shop['api']);

// 插入資料庫
$sql = $pdo->prepare('UPDATE shilin SET api = ? WHERE id = ?');
$sql->execute([$api, $id]);
}

echo "Data inserted successfully.";
?>