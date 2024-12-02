<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title><!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>象山捷運美食地圖</title>
    <link rel="stylesheet" href="station.css">
    <style>
        .image-container {
            display: flex;
            justify-content: space-between;
            gap: 20px; /* 設置圖片之間的間距 */
        }
        .image-container img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <header>
        <nav class="nav-left">
            <a href="front/other-page.php" class="nav-link">關於我們</a>
            <a href="front/services.php" class="nav-link">服務項目</a>
        </nav>
        <div class="logo-container">
            <a href="header-MRT.php" id="logo-link"><img src="photo/logo.jpg" alt="TMFM" id="logo"></a>
        </div>
        <nav class="nav-right">
            <a href="front\contact-us.php" class="nav-link">聯絡我們</a>
            <a href="customer-input.php" class="nav-link">會員資料</a>
        </nav>
    </header>
    <main>
        <h1>象山捷運美食地圖</h1>
        <p>Taipei MRT Food Map</p>
        <div class="image-container">
            <a href="search-station-output\search-xingshan-output.php?keyword=早餐">
                <img src="photo/breakfast.jpg" alt="早餐">
            </a>
            <a href="search-station-output\search-xingshan-output.php?keyword=午餐">
                <img src="photo/lunch.jpg" alt="午餐">
            </a>
            <a href="search-station-output\search-xingshan-output.php?keyword=晚餐">
                <img src="photo/dinner.jpg" alt="晚餐">
            </a>
        </div>
    </main>
</body>
</html>