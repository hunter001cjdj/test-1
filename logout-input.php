<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>台北捷運美食地圖</title>
<link rel="stylesheet" href="header.css">
<style>
/* 設置背景影片 */
.video-background {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: -1;
object-fit: cover;
overflow: hidden;
}

/* 設置主內容區域，居中對齊並適應螢幕比例 */
main {
display: flex;
flex-direction: column;
align-items: center;
justify-content: center;
height: 100vh;
color: #fff;
text-align: center;
padding: 20px;
box-sizing: border-box;
}

/* 標題樣式 */
h1 {
font-size: 3em;
margin-bottom: 0.5em;
}

/* 副標題樣式 */
p {
font-size: 1.5em;
margin-bottom: 1em;
}

/* 登出容器樣式 */
.logout-container {
background: rgba(255, 255, 255, 0.9);
padding: 20px;
border-radius: 10px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
max-width: 400px;
width: 100%;
}

/* 登出提示文字樣式 */
.logout-container h2 {
color: #333;
margin-bottom: 1em;
}

/* 登出按鈕樣式 */
.logout-container a {
display: inline-block;
padding: 10px 20px;
background: #ff4d4d;
color: #fff;
text-decoration: none;
border-radius: 5px;
transition: background 0.3s;
}

/* 登出按鈕懸停效果 */
.logout-container a:hover {
background: #ff1a1a;
}
</style>
</head>
<body>
<!-- 背景影片 -->
<video class="video-background" autoplay muted loop>
<source src="/photo/mrt-out.mp4" type="video/mp4">
</video>
<!-- 頁首導航 -->
<header>
<nav class="nav-left">
<a href="front/other-page.php" class="nav-link">關於我們</a>
<a href="front/services.php" class="nav-link">服務項目</a>
</nav>
<div class="logo-container">
<a href="header-MRT.php" id="logo-link"><img src="photo/logo.jpg" alt="TMFM" id="logo"></a>
</div>
<nav class="nav-right">
<a href="front/contact-us.php" class="nav-link">聯絡我們</a>
<a href="customer-input.php" class="nav-link">會員資料</a>
</nav>
</header>
<!-- 主內容區域 -->
<section class="logout" id="logout">
<main>
<h1>台北捷運美食地圖</h1>
<p>Taipei MRT Food Map</p>
<div class="logout-container">
<?php  ?>
<h2>確定要登出系統嗎？</h2>
<a href="logout-output.php">登出</a>
</section>
<?php  ?>
</div>
</main>
</body>
</html>
