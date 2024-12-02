<?php
$pdo = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'staff', 'password');

// 獲取所有表格名稱
$tables = ['danshui', 'beitou', 'shipai', 'shilin', 'zhongshan', 'xinyi', 'daan', 'xingshan'];
$currentTable = isset($_GET['table']) ? $_GET['table'] : 'danshui';

// 確保選擇的表格在允許的表格列表中
if (!in_array($currentTable, $tables)) {
$currentTable = 'danshui';
}

// 處理刪除請求
if (isset($_GET['delete'])) {
$id = $_GET['delete'];
$pdo->prepare("DELETE FROM $currentTable WHERE id = ?")->execute([$id]);
header("Location: admin.php?table=$currentTable");
exit;
}

// 處理新增和修改請求
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['customer_id'])) {
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$address = $_POST['address'];
$hours = $_POST['hours'];
$photos = $_POST['photos'];
$kind = $_POST['kind'];
$api = $_POST['api'];

if (is_array($photos)) {
$photos = implode(',', $photos);
}

if ($id) {
// 修改店家
$stmt = $pdo->prepare("UPDATE $currentTable SET name = ?, price = ?, address = ?, hours = ?, photos = ?, kind = ?, api = ? WHERE id = ?");
$stmt->execute([$name, $price, $address, $hours, $photos, $kind, $api, $id]);
} else {
// 新增店家
$stmt = $pdo->prepare("INSERT INTO $currentTable (name, price, address, hours, photos, kind, api) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$name, $price, $address, $hours, $photos, $kind, $api]);
}
header("Location: admin.php?table=$currentTable");
exit;
}

// 獲取當前表格的所有店家資料
$shops = $pdo->query("SELECT * FROM $currentTable")->fetchAll();
$shop = null;
if (isset($_GET['edit'])) {
$id = $_GET['edit'];
$shop = $pdo->prepare("SELECT * FROM $currentTable WHERE id = ?");
$shop->execute([$id]);
$shop = $shop->fetch();
}

// 顯示顧客資料
if (isset($_GET['manage']) && $_GET['manage'] === 'customers') {
$customers = $pdo->query("SELECT * FROM customer")->fetchAll();
$customer = null;
if (isset($_GET['edit_customer'])) {
$id = $_GET['edit_customer'];
$customer = $pdo->prepare("SELECT * FROM customer WHERE id = ?");
$customer->execute([$id]);
$customer = $customer->fetch();
}
if (isset($_GET['delete_customer'])) {
$id = $_GET['delete_customer'];
$pdo->prepare("DELETE FROM customer WHERE id = ?")->execute([$id]);
header("Location: admin.php?manage=customers");
exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['customer_id'])) {
$id = $_POST['customer_id'];
$name = $_POST['customer_name'];
$address = $_POST['customer_address'];
$login = $_POST['customer_login'];
$password = $_POST['customer_password'];
$mail = $_POST['customer_mail'];
$role = $_POST['customer_role'];

if ($id) {
// 修改顧客
$stmt = $pdo->prepare("UPDATE customer SET name = ?, address = ?, login = ?, password = ?, mail = ?, role = ? WHERE id = ?");
$stmt->execute([$name, $address, $login, $password, $mail, $role, $id]);
} else {
// 新增顧客
$stmt = $pdo->prepare("INSERT INTO customer (name, address, login, password, mail, role) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$name, $address, $login, $password, $mail, $role]);
}
header("Location: admin.php?manage=customers");
exit;
}
?>
<!--第一頁 -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<title>管理顧客資料</title>
<link rel="stylesheet" href="admin.css">
</head>
<body>
<h1>管理顧客資料</h1>

<div class="center-buttons">
    <a href="admin.php"><button>管理店家資料</button></a>
    <a href="admin.php?manage=customers"><button>管理顧客資料</button></a>
    <a href="admin.php?manage=messages"><button>檢視留言內容</button></a>
</div>


<?php if ($customer): ?>
<h2>修改顧客資料</h2>
<form action="admin.php?manage=customers" method="post">
<input type="hidden" name="customer_id" value="<?php echo $customer['id']; ?>">
<label for="customer_name">顧客名稱：</label>
<input type="text" id="customer_name" name="customer_name" value="<?php echo htmlspecialchars($customer['name']); ?>" required>
<label for="customer_address">地址：</label>
<input type="text" id="customer_address" name="customer_address" value="<?php echo htmlspecialchars($customer['address']); ?>" required>
<label for="customer_login">登入ID：</label>
<input type="text" id="customer_login" name="customer_login" value="<?php echo htmlspecialchars($customer['login']); ?>" required>
<label for="customer_password">密碼：</label>
<input type="text" id="customer_password" name="customer_password" value="<?php echo htmlspecialchars($customer['password']); ?>" required>
<label for="customer_mail">信箱：</label>
<input type="email" id="customer_mail" name="customer_mail" value="<?php echo htmlspecialchars($customer['mail']); ?>" required>
<label for="customer_role">角色：</label>
<select id="customer_role" name="customer_role" required>
<option value="user" <?php echo $customer['role'] === 'user' ? 'selected' : ''; ?>>使用者</option>
<option value="admin" <?php echo $customer['role'] === 'admin' ? 'selected' : ''; ?>>管理者</option>
</select>
<button type="submit">修改</button>
</form>
<?php endif; ?>
<h2>顧客列表</h2>
<table>
<tr>
<th>顧客名稱</th>
<th>操作</th>
</tr>
<?php foreach ($customers as $customer): ?>
<tr>
<td><?php echo htmlspecialchars($customer['name']); ?></td>
<td>
<a href="admin.php?manage=customers&edit_customer=<?php echo $customer['id']; ?>">修改</a>
<a href="admin.php?manage=customers&delete_customer=<?php echo $customer['id']; ?>" onclick="return confirm('確定要刪除嗎？')">刪除</a>
</td>
</tr>
<?php endforeach; ?>
</table>
<h2>新增顧客資料</h2>
<form action="admin.php?manage=customers" method="post">
<input type="hidden" name="customer_id" value="">
<label for="customer_name">顧客名稱：</label>
<input type="text" id="customer_name" name="customer_name" required>
<label for="customer_address">地址：</label>
<input type="text" id="customer_address" name="customer_address" required>
<label for="customer_login">登入ID：</label>
<input type="text" id="customer_login" name="customer_login" required>
<label for="customer_password">密碼：</label>
<input type="text" id="customer_password" name="customer_password" required>
<label for="customer_mail">信箱：</label>
<input type="email" id="customer_mail" name="customer_mail" required>
<label for="customer_role">角色：</label>
<select id="customer_role" name="customer_role" required>
<option value="user">使用者</option>
<option value="admin">管理者</option>
</select>
<button type="submit">新增</button>
</form>
</body>
</html>
<?php
exit;
}

// 顯示留言資料
if (isset($_GET['manage']) && $_GET['manage'] === 'messages') {
$messages = $pdo->query("SELECT * FROM messages")->fetchAll();
?>

<!--第二頁 -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<title>檢視留言內容</title>
<link rel="stylesheet" href="admin.css">
</head>
<body>
<h1>檢視留言內容</h1>

<div class="center-buttons">
    <a href="admin.php"><button>管理店家資料</button></a>
    <a href="admin.php?manage=customers"><button>管理顧客資料</button></a>
    <a href="admin.php?manage=messages"><button>檢視留言內容</button></a>
</div>


<h2>留言列表</h2>
<table>
<tr>
<th>姓名</th>
<th>連絡電話</th>
<th>電子郵件</th>
<th>留言</th>
<th>操作</th>
</tr>
<?php foreach ($messages as $message): ?>
<tr>
<td><?php echo htmlspecialchars($message['name']); ?></td>
<td><?php echo htmlspecialchars($message['number']); ?></td>
<td><?php echo htmlspecialchars($message['email']); ?></td>
<td><?php echo htmlspecialchars($message['message']); ?></td>
<td>
<a href="admin.php?manage=messages&delete_message=<?php echo $message['id']; ?>" onclick="return confirm('確定要刪除嗎？')">刪除</a>
</td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
<?php
exit;
}
// 處理刪除留言請求
if (isset($_GET['delete_message'])) {
    $id = $_GET['delete_message'];
    $stmt = $pdo->prepare("DELETE FROM messages WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: admin.php?manage=messages");
    exit;
    }
?>
<!--第三頁 -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<title>管理店家資料</title>
<link rel="stylesheet" href="admin.css">
</head>
<body>
<h1>管理店家資料</h1>

<div class="center-buttons">
    <a href="admin.php?manage=customers"><button>管理顧客資料</button></a>
    <a href="admin.php?manage=messages"><button>檢視留言內容</button></a>
    <a href="admin.php"><button>管理店家資料</button></a>
</div>


<h2>選擇表格</h2>
<form action="admin.php" method="get">
<select name="table" onchange="this.form.submit()">
<?php foreach ($tables as $table): ?>
<option value="<?php echo $table; ?>" <?php echo $table === $currentTable ? 'selected' : ''; ?>>
<?php echo ucfirst($table); ?>
</option>
<?php endforeach; ?>
</select>
</form>
<?php if ($shop): ?>
<h2>修改店家資訊</h2>
<form action="admin.php?table=<?php echo $currentTable; ?>" method="post">
<input type="hidden" name="id" value="<?php echo $shop['id']; ?>">
<label for="name">店家名稱：</label>
<input type="text" id="name" name="name" value="<?php echo htmlspecialchars($shop['name']); ?>" required>
<label for="price">價格：</label>
<input type="text" id="price" name="price" value="<?php echo htmlspecialchars($shop['price']); ?>" required>
<label for="address">地址：</label>
<input type="text" id="address" name="address" value="<?php echo htmlspecialchars($shop['address']); ?>" required>
<label for="hours">營業時間：</label>
<input type="text" id="hours" name="hours" value="<?php echo htmlspecialchars($shop['hours']); ?>" required>
<label for="photos">圖片：</label>
<input type="text" id="photos" name="photos" value="<?php echo htmlspecialchars($shop['photos']); ?>" required>
<label for="kind">餐別：</label>
<select id="kind" name="kind" required>
<option value="早餐" <?php echo $shop['kind'] === '早餐' ? 'selected' : ''; ?>>早餐</option>
<option value="午餐" <?php echo $shop['kind'] === '午餐' ? 'selected' : ''; ?>>午餐</option>
<option value="晚餐" <?php echo $shop['kind'] === '晚餐' ? 'selected' : ''; ?>>晚餐</option>
</select>
<label for="api">API：</label>
<input type="text" id="api" name="api" value="<?php echo htmlspecialchars($shop['api']); ?>" required>
<button type="submit">修改</button>
</form>
<?php endif; ?>
<h2>店家列表</h2>
<h3>早餐</h3>
<table>
<tr>
<th>店家名稱</th>
<th>操作</th>
</tr>
<?php foreach ($shops as $shop): ?>
<?php if ($shop['kind'] === '早餐'): ?>
<tr>
<td><?php echo htmlspecialchars($shop['name']); ?></td>
<td>
<a href="admin.php?table=<?php echo $currentTable; ?>&edit=<?php echo $shop['id']; ?>">修改</a>
<a href="admin.php?table=<?php echo $currentTable; ?>&delete=<?php echo $shop['id']; ?>" onclick="return confirm('確定要刪除嗎？')">刪除</a>
</td>
</tr>
<?php endif; ?>
<?php endforeach; ?>
</table>
<h3>午餐</h3>
<table>
<tr>
<th>店家名稱</th>
<th>操作</th>
</tr>
<?php foreach ($shops as $shop): ?>
<?php if ($shop['kind'] === '午餐'): ?>
<tr>
<td><?php echo htmlspecialchars($shop['name']); ?></td>
<td>
<a href="admin.php?table=<?php echo $currentTable; ?>&edit=<?php echo $shop['id']; ?>">修改</a>
<a href="admin.php?table=<?php echo $currentTable; ?>&delete=<?php echo $shop['id']; ?>" onclick="return confirm('確定要刪除嗎？')">刪除</a>
</td>
</tr>
<?php endif; ?>
<?php endforeach; ?>
</table>
<h3>晚餐</h3>
<table>
<tr>
<th>店家名稱</th>
<th>操作</th>
</tr>
<?php foreach ($shops as $shop): ?>
<?php if ($shop['kind'] === '晚餐'): ?>
<tr>
<td><?php echo htmlspecialchars($shop['name']); ?></td>
<td>
<a href="admin.php?table=<?php echo $currentTable; ?>&edit=<?php echo $shop['id']; ?>">修改</a>
<a href="admin.php?table=<?php echo $currentTable; ?>&delete=<?php echo $shop['id']; ?>" onclick="return confirm('確定要刪除嗎？')">刪除</a>
</td>
</tr>
<?php endif; ?>
<?php endforeach; ?>
</table>
<h2>新增店家資訊</h2>
<form action="admin.php?table=<?php echo $currentTable; ?>" method="post">
<input type="hidden" name="id" value="">
<label for="name">店家名稱：</label>
<input type="text" id="name" name="name" required>
<label for="price">價格：</label>
<input type="text" id="price" name="price" required>
<label for="address">地址：</label>
<input type="text" id="address" name="address" required>
<label for="hours">營業時間：</label>
<input type="text" id="hours" name="hours" required>
<label for="photos">圖片：</label>
<input type="text" id="photos" name="photos" required>
<label for="kind">餐別：</label>
<select id="kind" name="kind" required>
<option value="早餐">早餐</option>
<option value="午餐">午餐</option>
<option value="晚餐">晚餐</option>
</select>
<label for="api">API：</label>
<input type="text" id="api" name="api" required>
<button type="submit">新增</button>
</form>
</body>
</html>