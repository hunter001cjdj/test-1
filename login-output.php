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

        <?php
        session_start();
        unset($_SESSION['customer']);
        $pdo = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'staff', 'password');
        $sql = $pdo->prepare('SELECT * FROM customer WHERE login=? AND password=?');
        $sql->execute([$_REQUEST['login'], $_REQUEST['password']]);
        foreach ($sql->fetchAll() as $row) {
        $_SESSION['customer'] = [
        'id' => $row['id'], 'name' => $row['name'], 
        'address' => $row['address'], 'login' => $row['login'], 
        'password' => $row['password'], 'mail' => $row['mail'],
        'role' => $row['role']
        ];
        }
        if (isset($_SESSION['customer'])) {
        if ($_SESSION['customer']['role'] === 'admin') {
        echo '親愛的', $_SESSION['customer']['name'], '、歡迎光臨。1秒後跳轉至管理頁面';
        echo '<script>
        setTimeout(function() {
        window.location.href = "admin.php";
        }, 1000);
        </script>';
        } else {
        echo '親愛的', $_SESSION['customer']['name'], '、歡迎光臨。1秒後跳回至官網';
        echo '<script>
        setTimeout(function() {
        window.location.href = "header-MRT.php";
        }, 1000);
        </script>';
        }
        } else {
        echo '登入ID或密碼有誤。';
        }
        ?>
		
    </main>
</body>
</html>
