<?php
// Kết nối database
include 'connect.php';

try {
    // Truy vấn tất cả sinh viên theo username tăng dần
    $stmt = $pdo->query("SELECT username, lastname, firstname, city, email, course1 FROM students ORDER BY username ASC");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Lỗi truy vấn: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="text-center text-primary mb-4">Danh sách sinh viên</h3>

    <?php if (empty($students)): ?>
        <div class="alert alert-warning">Chưa có dữ liệu sinh viên.</div>
    <?php else: ?>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Username</th>
                    <th>Họ đệm</th>
                    <th>Tên</th>
                    <th>Lớp</th>
                    <th>Email</th>
                    <th>Khóa học</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= htmlspecialchars($student['username']) ?></td>
                    <td><?= htmlspecialchars($student['lastname']) ?></td>
                    <td><?= htmlspecialchars($student['firstname']) ?></td>
                    <td><?= htmlspecialchars($student['city']) ?></td>
                    <td><?= htmlspecialchars($student['email']) ?></td>
                    <td><?= htmlspecialchars($student['course1']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>
