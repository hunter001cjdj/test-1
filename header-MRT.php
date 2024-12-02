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
<main>
    <h1>台北捷運美食地圖</h1>
    <p>Taipei MRT Food Map</p>
    <section class="grid-container">
    <?php
    $images = [
        ["src" => "photo/danshui.jpg", "alt" => "Danshui", "link" => "danshui.php"],
        ["src" => "photo/beitou.jpg", "alt" => "Beitou", "link" => "beitou.php"],
        ["src" => "photo/shipai.jpg", "alt" => "Shipai", "link" => "shipai.php"],
        ["src" => "photo/shilin.jpg", "alt" => "Shilin", "link" => "shilin.php"],
        ["src" => "photo/zhongshan.jpg", "alt" => "Zhongshan", "link" => "zhongshan.php"],
        ["src" => "photo/xinyi.jpg", "alt" => "Xinyi", "link" => "xinyi.php"],
        ["src" => "photo/daan.jpg", "alt" => "Daan", "link" => "daan.php"],
        ["src" => "photo/xingshan.jpg", "alt" => "xingshan", "link" => "xingshan.php"],
        ["src" => "photo/welcome.jpg", "alt" => "welcome", "link" => "logout-input.php#logout"]
        ];

        foreach ($images as $image) {
            echo '<a href="' . $image["link"] . '" class="grid-item">';
            echo '<img src="' . $image["src"] . '" alt="' . $image["alt"] . '">';
            echo '</a>';
            }
    ?>
    </section>
</main>
</body>
</html>