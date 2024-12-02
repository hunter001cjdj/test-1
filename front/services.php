<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services</title>
  <link rel="stylesheet" href="services.css">
  <!-- 引入GSAP和ScrollTrigger -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body>
  <header>
    <nav class="nav-left">
      <a href="other-page.php" class="nav-link"><b>關於我們</b></a>
      <a href="services.php" class="nav-link"><b>服務項目</b></a>
    </nav>
    <div class="logo-container">
      <a href="../header-MRT.php" id="logo-link"><img src="../photo/logo.jpg" alt="TMFM" id="logo"></a>
    </div>
    <nav class="nav-right">
      <a href="contact-us.php" class="nav-link"><b>聯絡我們</b></a>
      <a href="../customer-input.php" class="nav-link"><b>會員資料</b></a>
    </nav>
  </header>
  <div class="container">
    <section class="sticky">
      <div class="header">
        <h1>服務項目</h1>
      </div>
    </section>
    <section class="website-content">
      <div class="section-header">
        <h1>發現美食</h1>
        <p>專注於為您提供準確、實用的美食資訊，讓您輕鬆品味生活。</p>
      </div>
      <div class="section-images">
        <div class="row">
          <img src="../images/food.png" alt="">
        </div>
        <div class="row">
          <img src="../images/question2.png" alt="">
        </div>
        <div class="row">
          <img src="../images/map.png" alt="">
        </div>
      </div>
    </section>
  </div>
  <script src="services.js"></script>
</body>
</html>
