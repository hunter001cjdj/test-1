<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<title>中山捷運美食地圖</title>
<link rel="stylesheet" href="../station.css">
<style>
table {
border-collapse: separate;
border-spacing: 10px; /* 調整這個值來增加或減少間隔 */
width: 100%;
}
th, td {
padding: 10px; /* 調整這個值來增加或減少內部間隔 */
white-space: nowrap; /* 確保文字不會換行 */
}
th {
position: sticky;
top: 0;
background-color: #f1f1f1; /* 背景顏色，讓標題更明顯 */
z-index: 1; /* 確保標題在最上層 */
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
<h1>中山捷運美食地圖</h1>
<p>Taipei MRT Food Map</p>
<form action="search-zhongshan-output.php" method="post">
<input type="text" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : (isset($_GET['keyword']) ? $_GET['keyword'] : ''); ?>">
<input type="submit" value="搜尋">
</form>
<table>
<tr>
<th>店家總類</th>
<th>店家名稱</th>
<th>店家價格</th>
<th>店家地址</th>
<th>營業時間</th>
</tr>
<?php
// 連接到資料庫
$pdo = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'staff', 'password');
// 獲取關鍵字
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : (isset($_GET['keyword']) ? $_GET['keyword'] : '');
// 準備 SQL 查詢，搜尋 kind、name、price、address 和 hours
$sql = $pdo->prepare('SELECT * FROM zhongshan WHERE kind LIKE ? OR name LIKE ? OR price LIKE ? OR address LIKE ? OR hours LIKE ?');
// 執行查詢，使用關鍵字
$sql->execute(['%' . $keyword . '%', '%' . $keyword . '%', '%' . $keyword . '%', '%' . $keyword . '%', '%' . $keyword . '%']);
// 顯示查詢結果
foreach ($sql->fetchAll() as $row) {
echo '<tr>';
echo '<td>' . htmlspecialchars($row['kind']) . '</td>';
echo '<td><a href="../shop-details/zhongshan-details.php?id=' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</a></td>';
echo '<td>' . htmlspecialchars($row['price']) . '</td>';
echo '<td>' . htmlspecialchars($row['address']) . '</td>';
echo '<td>' . htmlspecialchars($row['hours']) . '</td>';
echo '</tr>';
}
?>
</table>
</main>
</body>
</html>