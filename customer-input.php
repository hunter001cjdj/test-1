<?php
session_start();
$logoLink = 'no-header-MRT.php'; // 預設未登入時的連結
$loggedIn = false; // 預設為未登入

if (isset($_SESSION['customer'])) {
$logoLink = 'header-MRT.php'; // 已登入時的連結
$loggedIn = true; // 設置為已登入
}

// 初始化所有變數
$name = $address = $login = $password = $mail = '';

if ($loggedIn) {
$name = $_SESSION['customer']['name'];
$address = $_SESSION['customer']['address'];
$login = $_SESSION['customer']['login'];
$password = $_SESSION['customer']['password'];
$mail = $_SESSION['customer']['mail'];
}

// 設置取消按鈕的目標頁面
$cancelLink = 'login-input.php';
if ($loggedIn) {
$cancelLink = 'header-MRT.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>台北捷運美食地圖</title>
<link rel="stylesheet" href="header.css">
<style>
.video-background {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: -1;
object-fit: cover;
}
.register-container {
max-width: 400px;
margin: 50px auto;
padding: 20px;
border: 1px solid #ccc;
border-radius: 10px;
background-color: #f9f9f9;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.register-container h2 {
text-align: center;
margin-bottom: 20px;
}
.register-container input[type="text"],
.register-container input[type="password"],
.register-container input[type="email"] {
width: 100%;
padding: 10px;
margin: 10px 0;
border: 1px solid #ccc;
border-radius: 5px;
}
.register-container input[type="submit"],
.register-container input[type="button"] {
width: 100%;
padding: 10px;
margin: 10px 0;
border: none;
border-radius: 5px;
background-color: #f26d30;
color: white;
cursor: pointer;
transition: background-color 0.3s;
}
.register-container input[type="submit"]:hover,
.register-container input[type="button"]:hover {
background-color: #e55a1c;
}
h1, p {
color: white; /* 設置文字顏色為白色 */
}
</style>
<script>
function showAlert() {
alert("功能尚未開放，敬請期待！");
}
</script>
</head>
<body>
<video class="video-background" autoplay muted loop>
<source src="/photo/mrt-keep.mp4" type="video/mp4">
</video>
<header>
<nav class="nav-left">
<?php if ($loggedIn): ?>
<a href="front/other-page.php" class="nav-link">關於我們</a>
<a href="front/services.php" class="nav-link">服務項目</a>
<?php else: ?>
<a href="#" class="nav-link">關於我們</a>
<a href="#" class="nav-link">服務項目</a>
<?php endif; ?>
</nav>
<div class="logo-container">
<a href="<?php echo $logoLink; ?>" id="logo-link"><img src="photo/logo.jpg" alt="TMFM" id="logo"></a>
</div>
<nav class="nav-right">
<?php if ($loggedIn): ?>
<a href="../front/contact-us.php" class="nav-link">聯絡我們</a>
<a href="customer-input.php" class="nav-link">會員資料</a>
<?php else: ?>
<a href="#" class="nav-link">聯絡我們</a>
<a href="#" class="nav-link">會員資料</a>
<?php endif; ?>
</nav>
</header>
<main>
<h1>台北捷運美食地圖</h1>
<p>Taipei MRT Food Map</p>

<div class="register-container">
<h2>會員資料</h2>
<form action="customer-output.php" method="post">
<label for="name">姓名</label>
<input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
<label for="address">地址</label>
<input type="text" id="address" name="address" value="<?php echo $address; ?>" required>
<label for="login">登入ID</label>
<input type="text" id="login" name="login" value="<?php echo $login; ?>" required>
<label for="password">密碼</label>
<input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
<label for="mail">信箱</label>
<input type="email" id="mail" name="mail" value="<?php echo $mail; ?>" required>
<input type="submit" value="確定">
<input type="button" value="取消" onclick="location.href='<?php echo $cancelLink; ?>'">
</form>
</div>
</main>
</body>
</html>