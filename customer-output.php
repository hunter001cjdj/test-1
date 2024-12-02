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
            <a href="#" id="logo-link"><img src="photo/logo.jpg" alt="TMFM" id="logo"></a>
        </div>
        <nav class="nav-right">
            <a href="#" class="nav-link">聯絡我們</a>
            <a href="#" class="nav-link">會員資料</a>
        </nav>
    </header>
    <main>
        <h1>台北捷運美食地圖</h1>
        <p>Taipei MRT Food Map</p></br>

        <?php  ?>
        <?php
        session_start();
        $pdo = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'staff', 'password');

        if (isset($_SESSION['customer'])) {
            $id = $_SESSION['customer']['id'];
            $sql = $pdo->prepare('select * from customer where id!=? and login=?');
            $sql->execute([$id, $_REQUEST['login']]);
        } else {
            $sql = $pdo->prepare('select * from customer where login=?');
            $sql->execute([$_REQUEST['login']]);
        }

        if (empty($sql->fetchAll())) {
            if (isset($_SESSION['customer'])) {
                $sql = $pdo->prepare('update customer set name=?, address=?, login=?, password=?, mail=? where id=?');
                $sql->execute([
                    $_REQUEST['name'], $_REQUEST['address'], 
                    $_REQUEST['login'], $_REQUEST['password'], $_REQUEST['mail'], $id
                ]);
                $_SESSION['customer'] = [
                    'id' => $id, 'name' => $_REQUEST['name'], 
                    'address' => $_REQUEST['address'], 'login' => $_REQUEST['login'], 
                    'password' => $_REQUEST['password'], 'mail' => $_REQUEST['mail']
                ];
                echo '會員資料修改完成。';
                echo '<script>
                                setTimeout(function() {
                                window.location.href = "header-MRT.php";
                                    }, 500);
                            </script>';
            } else {
                $sql = $pdo->prepare('insert into customer (name, address, login, password, mail) values (?, ?, ?, ?, ?)');
                $sql->execute([
                    $_REQUEST['name'], $_REQUEST['address'], 
                    $_REQUEST['login'], $_REQUEST['password'], $_REQUEST['mail']
                ]);
                echo '會員資料新增完成。';
                echo '<script>
                                setTimeout(function() {
                                window.location.href = "login-input.php";
                                    }, 500);
                            </script>';
            }
        } else {
            echo '登入ID已被使用，請重新設定。';
        }
        ?>
        <?php  ?>
    </main>
</body>
</html>
