<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>台北捷運美食地圖</title>
<link rel="stylesheet" href="header.css">
<style>
body {
margin: 0;
padding: 0;
font-family: Arial, sans-serif;
overflow: hidden;
}
.video-background {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: -1;
object-fit: cover;
}
.login-container {
max-width: 400px;
margin: 50px auto;
padding: 20px;
border: 1px solid #ccc;
border-radius: 10px;
background-color: rgba(255, 255, 255, 0.6); /* 透明度 */
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.login-container h2 {
text-align: center;
margin-bottom: 20px;
}
.login-container input[type="text"],
.login-container input[type="password"] {
width: 100%;
padding: 10px;
margin: 10px 0;
border: 1px solid #ccc;
border-radius: 5px;
}
.login-container input[type="submit"],
.login-container input[type="button"] {
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
.login-container input[type="submit"]:hover,
.login-container input[type="button"]:hover {
background-color: #e55a1c;
}
h1, p {
color: white; /* 設置文字顏色為白色 */
}
</style>
</head>
<body>
<video class="video-background" autoplay muted loop>
<source src="/photo/mrt-come.mp4" type="video/mp4">
</video>
<header>
<nav class="nav-left">
<a href="#" class="nav-link">關於我們</a>
<a href="#" class="nav-link">服務項目</a>
</nav>
<div class="logo-container">
<a href="no-header-MRT.php" id="logo-link"><img src="photo/logo.jpg" alt="TMFM" id="logo"></a>
</div>
<nav class="nav-right">
<a href="#" class="nav-link">聯絡我們</a>
<a href="#" class="nav-link">會員資料</a>
</nav>
</header>
<main>
<h1>台北捷運美食地圖</h1>
<p>Taipei MRT Food Map</p>

<div class="login-container">
<h2>登入</h2>
<form action="login-output.php" method="post">
<label for="login">登入ID</label>
<input type="text" id="login" name="login" required>
<label for="password">密碼</label>
<input type="password" id="password" name="password" required>
<input type="submit" value="登入">
<input type="button" value="註冊" onclick="location.href='customer-input.php'">
<input type="button" value="忘記密碼" onclick="location.href='forgot-password.php'">
</form>
</div>
</main>
</body>
</html>