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
        <p>Taipei MRT Food Map</p>
        <section class="grid-container">
            <?php
                $images = [
                    ["src" => "photo/danshui.jpg", "alt" => "Danshui", "link" => "no-logging.php"],
                    ["src" => "photo/beitou.jpg", "alt" => "Beitou", "link" => "no-logging.php"],
                    ["src" => "photo/shipai.jpg", "alt" => "Shipai", "link" => "no-logging.php"],
                    ["src" => "photo/shilin.jpg", "alt" => "Shilin", "link" => "no-logging.php"],
                    ["src" => "photo/zhongshan.jpg", "alt" => "Zhongshan", "link" => "no-logging.php"],
                    ["src" => "photo/xinyi.jpg", "alt" => "Xinyi", "link" => "no-logging.php"],
                    ["src" => "photo/daan.jpg", "alt" => "Daan", "link" => "no-logging.php"],
                    ["src" => "photo/xingshan.jpg", "alt" => "xingshan", "link" => "no-logging.php"],
                    ["src" => "photo/logging-in.jpg", "alt" => "logging-in", "link" => "login-input.php"]
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
