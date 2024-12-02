<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>台北捷運美食地圖 - 聯絡我們</title>
<link rel="stylesheet" href="contact-us.css">
</head>
<body>
    <header>
        <nav class="nav-left">
            <a href="other-page.php" class="nav-link">關於我們</a>
            <a href="services.php" class="nav-link">服務項目</a>
        </nav>
        <div class="logo-container">
            <a href="../header-MRT.php" id="logo-link"><img src="../photo/logo.jpg" alt="TMFM" id="logo"></a>
        </div>
        <nav class="nav-right">
            <a href="contact-us.php" class="nav-link">聯絡我們</a>
            <a href="../customer-input.php" class="nav-link">會員資料</a>
        </nav>
    </header>
<main>
    <section class="contact-section">
        <h2 class="section-title">聯絡我們</h2>
        <p class="section-description">如果您有任何問題或建議，請填寫以下表單與我們聯繫。</p>
        
        <form action="submit_message.php" method="post" class="contact-form">
            <div class="form-group">
                <label for="user_name">姓名</label>
                <input type="text" id="user_name" name="user_name" required placeholder="請輸入您的姓名">
            </div>
            <div class="form-group">
                <label for="user_number">連絡電話</label>
                <input type="number" id="user_number" name="user_number" required placeholder="請輸入您的電話">
            </div>
            <div class="form-group">
                <label for="user_mail">電子郵件</label>
                <input type="email" id="user_mail" name="user_mail" required placeholder="請輸入您的電子郵件">
            </div>
            <div class="form-group">
                <label for="message">留言內容</label>
                <textarea id="message" name="message" rows="5" required placeholder="請輸入您的留言"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-button">送出</button>
            </div>
        </form>
    </section>
</main>
</body>
</html>
