<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>台北捷運美食地圖</title>
    <link rel="stylesheet" href="header.css">
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
    <main>
        <h1>台北捷運美食地圖</h1>
        <p>Taipei MRT Food Map</p></br>
        <h2><span style="color: red;">您尚未登入!</span></h2>
        <php>
        <script>
        setTimeout(function() {
        window.location.href = "no-header-MRT.php";
        }, 1000);
        </script>
        </php>
    </main>
</body>
</html>