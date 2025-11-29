<?php
require "data.php";
$isAdmin = false;   // khách
?>

<!DOCTYPE html>
<html>
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
        img {
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<h2>Danh sách các loài hoa</h2>

<?php foreach ($flowers as $f): ?>
    <div class="flower-card">
        <img src="<?= $f['image'] ?>" alt="">
        <h3><?= $f['name'] ?></h3>
        <p><?= $f['description'] ?></p>
    </div>
<?php endforeach; ?>

</body>
</html>
