A.	Code đã hoàn thiện: Dán (paste) toàn bộ code của 2 tệp bạn đã sửa: 
•	handle_login.php 
<?php
// TODO 1: (Cực kỳ quan trọng) Khởi động session
session_start();

// TODO 2: Kiểm tra xem người dùng đã nhấn nút "Đăng nhập" (gửi form) chưa
if (isset($_POST['username']) && isset($_POST['password'])) {

    // TODO 3: Nếu đã gửi form, lấy dữ liệu 'username' và 'password' từ $_POST
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // TODO 4: (Giả lập) Kiểm tra logic đăng nhập
    if ($user == 'tuandeptrai' && $pass == '123456789') {

        // TODO 5: Nếu thành công, lưu tên username vào SESSION
        $_SESSION['username_login'] = $user;

        // TODO 6: Chuyển hướng người dùng sang trang "chào mừng"
        header('Location: welcome.php');
        exit;
    } else {
        // Đăng nhập sai → quay về form và báo lỗi
        header('Location: login.html?error=1');
        exit;
    }

} else {
    // TODO 7: Truy cập trực tiếp file → đá về form
    header('Location: login.html');
    exit;
}
?>
![Ảnh minh hoạ](./imgs/buoi3/handle_login.png)

•	welcome.php 
<?php
// TODO 1:Khởi động session (BẮT BUỘC ở mọi trang cần dùng SESSION)
session_start();

// TODO 2: Kiểm tra xem SESSION (lưu tên đăng nhập) có tồn tại không?
if (isset($_SESSION['username_login'])) {

    // TODO 3: Nếu tồn tại, lấy username từ SESSION ra
    $loggedInUser = $_SESSION['username_login'];

    // TODO 4: In lời chào
    echo "<h1>Chào mừng trở lại, $loggedInUser!</h1>";
    echo "<p>Bạn đã đăng nhập thành công.</p>";

    // TODO 5: (Tạm thời) Tạo 1 link để "Đăng xuất" (chỉ là quay về login.html)
    echo '<a href="login.html">Đăng xuất (Tạm thời)</a>';

} else {
    // TODO 6: Nếu không tồn tại SESSION (chưa đăng nhập)
    // Chuyển hướng người dùng về trang login.html
    header('Location: login.html');
    exit;
}
?>
![Ảnh minh hoạ](./imgs/buoi3/welcome_login.png)

B.	Ảnh chụp màn hình Kết quả (Trình duyệt Web): Chụp 01 ảnh màn hình trình duyệt hiển thị trang welcome.php sau khi bạn đăng nhập thành công (phải thấy rõ dòng chữ "Chào mừng trở lại, admin!"). 


![Ảnh minh hoạ](./imgs/buoi3/Chuong3_B.png)


Câu hỏi của tôi là: Nếu không gọi session_start() ở đầu file webcome.php, điều gì sẽ xảy ra và tại sao PHP không tự động mở lại session?