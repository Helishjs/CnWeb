<?php
require "connect.php"; // connect.php dùng PDO

$isAdmin = false;

try {
    $stmt = $pdo->query("SELECT * FROM flowers ORDER BY id ASC");
    $flowers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Lỗi truy vấn: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách hoa</title>
    <style>
        .flower-card {
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 15px;
            padding: 10px;
            display: inline-block;
            vertical-align: top;
        }
        img { width: 100%; border-radius: 10px; }
    </style>
</head>
<body>

<h2>Danh sách các loài hoa</h2>

<?php if (!empty($flowers)): ?>
    <?php foreach($flowers as $f): ?>
        <div class="flower-card">
            <img src="<?= htmlspecialchars($f['image']) ?>" alt="">
            <h3><?= htmlspecialchars($f['name']) ?></h3>
            <p><?= htmlspecialchars($f['description']) ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Chưa có hoa nào.</p>
<?php endif; ?>

</body>
</html>
