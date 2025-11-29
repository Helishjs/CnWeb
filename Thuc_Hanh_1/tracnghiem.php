<?php
require "quizi.php";

$result = null;

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $score = 0;
//     foreach ($quiz as $i => $q) {
//         $userAnswer = isset($_POST["q$i"]) ? $_POST["q$i"] : [];
//         sort($userAnswer);
//         $correctAnswer = $q['answer'];
//         sort($correctAnswer);
//         if ($userAnswer === $correctAnswer) {
//             $score++;
//         }
//     }
//     $result = "Bạn trả lời đúng $score trên ".count($quiz)." câu.";
// }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài trắc nghiệm</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { text-align: center; }
        .question { margin-bottom: 15px; padding: 10px; border-bottom: 1px solid #ddd; }
        .submit-btn { display: block; margin: 20px auto; padding: 10px 20px; font-size: 16px; }
        .result { text-align: center; font-size: 18px; color: green; margin-top: 20px; }
    </style>
</head>
<body>

<h2>Bài trắc nghiệm Android</h2>

<form method="post">
    <?php foreach ($quiz as $i => $q): ?>
        <div class="question">
            <p><strong>Câu <?= $i + 1 ?>:</strong> <?= $q['question'] ?></p>
            <?php foreach ($q['options'] as $label => $text): ?>
                <label>
                    <input type="checkbox" name="q<?= $i ?>[]" value="<?= $label ?>"> <?= $label ?>. <?= $text ?>
                </label><br>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

    <input type="submit" class="submit-btn" value="Nộp bài">
</form>

<?php if ($result): ?>
    <div class="result"><?= $result ?></div>
<?php endif; ?>

</body>
</html>
