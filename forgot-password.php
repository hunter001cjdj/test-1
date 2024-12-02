<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>台北捷運美食地圖</title>
<link rel="stylesheet" href="header.css">
<style>
body {
font-family: Arial, sans-serif;
background-color: #f4f4f4;
margin: 0;
padding: 0;
}
.login-container {
max-width: 400px;
margin: 50px auto;
padding: 20px;
background-color: #fff;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
border-radius: 8px;
}
.login-container h2 {
text-align: center;
color: #333;
}
.login-container form {
display: flex;
flex-direction: column;
}
.login-container label {
margin-bottom: 10px;
color: #555;
}
.login-container input[type="email"] {
padding: 10px;
margin-bottom: 20px;
border: 1px solid #ccc;
border-radius: 4px;
}
.login-container input[type="submit"] {
padding: 10px;
background-color: #007BFF;
color: #fff;
border: none;
border-radius: 4px;
cursor: pointer;
}
.login-container input[type="submit"]:hover {
background-color: #0056b3;
}
</style>
</head>
<body>
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
<div class="login-container">
<h2>忘記密碼</h2>
<form action="send-reset-password.php" method="post">
<label for="email">輸入註冊信箱</label>
<input type="email" id="email" name="email" required>
<input type="submit" value="送出">
</form>
</div>
</body>
</html>