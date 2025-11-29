<?php
$csvFile = '65HTTT_Danh_sach_diem_danh.csv'; // đường dẫn file CSV
$host    = 'localhost';
$dbname  = 'th1';
$user    = 'root';
$pass    = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

if (!file_exists($csvFile)) die("Không tìm thấy file CSV");

if (($handle = fopen($csvFile, 'r')) !== false) {
    $header = fgetcsv($handle, 1000, ','); // bỏ dòng header

    $sql = "INSERT INTO students (username,password,lastname,firstname,city,email,course1)
            VALUES (:username, :password, :lastname, :firstname, :city, :email, :course1)";
    $stmt = $pdo->prepare($sql);

    $count = 0;
    while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        $stmt->execute([
            ':username' => $data[0],
            ':password' => $data[1],
            ':lastname' => $data[2],
            ':firstname'=> $data[3],
            ':city'     => $data[4],
            ':email'    => $data[5],
            ':course1'  => $data[6]
        ]);
        $count++;
    }
    fclose($handle);
    echo "Đã chèn $count học viên vào bảng students.\n";
} else {
    die("Không thể mở file CSV.");
}
