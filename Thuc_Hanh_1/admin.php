<?php
require "data.php";
$isAdmin = true;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý hoa</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid #999;
        }
        th, td {
            padding: 10px;
        }
        img { width: 80px; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Bảng quản lý các loài hoa</h2>

<table>
    <tr>
        <th>Ảnh</th>
        <th>Tên Hoa</th>
        <th>Mô Tả</th>
        <th>Hành Động</th>
    </tr>

    <?php foreach ($flowers as $index => $f): ?>
    <tr>
        <td><img src="<?= $f['image'] ?>"></td>
        <td><?= $f['name'] ?></td>
        <td><?= $f['description'] ?></td>
        <td>
            <a href="edit.php?id=<?= $index ?>">Sửa</a> |
            <a href="delete.php?id=<?= $index ?>">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
