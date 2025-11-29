<?php
require_once 'connect.php';

// Thêm hoa
if (isset($_POST['add'])) {
    $name  = $_POST['name'];
    $desc  = $_POST['description'];
    $image = $_POST['image'];

    $stmt = $pdo->prepare("INSERT INTO flowers (name, description, image) VALUES (:name, :desc, :image)");
    $stmt->execute([
        ':name' => $name,
        ':desc' => $desc,
        ':image'=> $image
    ]);
    header("Location: admin1.php");
    exit;
}

// Sửa hoa
if (isset($_POST['edit'])) {
    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $desc  = $_POST['description'];
    $image = $_POST['image'];

    $stmt = $pdo->prepare("UPDATE flowers SET name=:name, description=:desc, image=:image WHERE id=:id");
    $stmt->execute([
        ':name' => $name,
        ':desc' => $desc,
        ':image'=> $image,
        ':id'   => $id
    ]);
    header("Location: admin1.php");
    exit;
}

// Xóa hoa
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM flowers WHERE id=:id");
    $stmt->execute([':id' => $id]);
    header("Location: admin1.php");
    exit;
}

// Lấy danh sách hoa
$stmt = $pdo->query("SELECT * FROM flowers ORDER BY id ASC");
$flowers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý hoa</title>
    <style>
        table { width: 80%; border-collapse: collapse; margin: 20px auto; }
        th, td { border: 1px solid #999; padding: 10px; text-align: center; }
        img { width: 80px; }
        form { display: inline; }
    </style>
</head>
<body>
<h2 style="text-align:center;">Quản lý các loài hoa</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Ảnh</th>
        <th>Tên Hoa</th>
        <th>Mô Tả</th>
        <th>Hành Động</th>
    </tr>

    <?php foreach ($flowers as $f): ?>
    <tr>
        <td><?= htmlspecialchars($f['id']) ?></td>
        <td><img src="<?= htmlspecialchars($f['image']) ?>" alt=""></td>
        <td><?= htmlspecialchars($f['name']) ?></td>
        <td><?= htmlspecialchars($f['description']) ?></td>
        <td>
            <!-- Sửa -->
            <form method="post" action="admin1.php">
                <input type="hidden" name="id" value="<?= $f['id'] ?>">
                <input type="text" name="name" value="<?= htmlspecialchars($f['name']) ?>" required>
                <input type="text" name="description" value="<?= htmlspecialchars($f['description']) ?>" required>
                <input type="text" name="image" value="<?= htmlspecialchars($f['image']) ?>" required>
                <button type="submit" name="edit">Sửa</button>
            </form>
            <!-- Xóa -->
            <a href="admin1.php?delete=<?= $f['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h3 style="text-align:center;">Thêm hoa mới</h3>
<form method="post" style="text-align:center;">
    Tên: <input type="text" name="name" required>
    Mô tả: <input type="text" name="description" required>
    Ảnh: <input type="text" name="image" placeholder="imgs/tenfile.jpg" required>
    <button type="submit" name="add">Thêm</button>
</form>
</body>
</html>
