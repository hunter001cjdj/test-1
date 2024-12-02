<?php
$pdo = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'staff', 'password');
$id = $_GET['id'];

// 獲取店家詳細信息
$sql = $pdo->prepare('SELECT * FROM daan WHERE id = ?');
$sql->execute([$id]);
$row = $sql->fetch();

$photos = explode(',', $row['photos']);
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<title><?php echo htmlspecialchars($row['name']); ?> - 大安捷運美食地圖</title>
<link rel="stylesheet" href="../station.css">
<style>
.image-container {
display: grid;
grid-template-columns: repeat(2, 1fr);
gap: 0.3rem;
}
.image-container img {
width: 100%;
height: auto;
cursor: pointer;
}
.modal {
display: none;
position: fixed;
z-index: 1000;
left: 0;
top: 0;
width: 100%;
height: 100%;
overflow: auto;
background-color: rgba(0, 0, 0, 0.8);
}
.modal-content {
margin: 15% auto;
display: block;
width: 80%;
max-width: 700px;
}
.close {
position: absolute;
top: 15px;
right: 35px;
color: #fff;
font-size: 40px;
font-weight: bold;
transition: 0.3s;
}
.close:hover,
.close:focus {
color: #bbb;
text-decoration: none;
cursor: pointer;
}
</style>
</head>
<body>
<header>
<nav class="nav-left">
<a href="../front/other-page.php" class="nav-link">關於我們</a>
<a href="../front/services.php" class="nav-link">服務項目</a>
</nav>
<div class="logo-container">
<a href="../header-MRT.php" id="logo-link"><img src="../photo/logo.jpg" alt="TMFM" id="logo"></a>
</div>
<nav class="nav-right">
<a href="../front/contact-us.php" class="nav-link">聯絡我們</a>
<a href="../customer-input.php" class="nav-link">會員資料</a>
</nav>
</header>
<main>
<h1><?php echo htmlspecialchars($row['name']); ?></h1>
<!-- 顯示店家詳細信息 -->
<div class="shop-details">
<p><strong>店家名稱：</strong><?php echo htmlspecialchars($row['name']); ?></p>
<p><strong>店家價格：</strong><?php echo htmlspecialchars($row['price']); ?></p>
<p><strong>店家地址：</strong><?php echo htmlspecialchars($row['address']); ?></p>
<p><strong>營業時間：</strong><?php echo htmlspecialchars($row['hours']); ?></p>
</div>
<div class="image-container">
<?php foreach ($photos as $photo): ?>
<img src="../<?php echo htmlspecialchars(trim($photo)); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" onclick="openModal(this)">
<?php endforeach; ?>
</div>
<!-- 插入地圖 -->
<div class="map-container">
<?php echo htmlspecialchars_decode($row['api']); ?>
</div>
<!-- 模態框 -->
<div id="myModal" class="modal">
<span class="close" onclick="closeModal()">×</span>
<img class="modal-content" id="img01">
</div>
</main>
<script>
function openModal(element) {
var modal = document.getElementById("myModal");
var modalImg = document.getElementById("img01");
modal.style.display = "block";
modalImg.src = element.src;
}

function closeModal() {
var modal = document.getElementById("myModal");
modal.style.display = "none";
}
</script>
</body>
</html>
