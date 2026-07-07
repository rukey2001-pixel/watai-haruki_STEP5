<?php
// send.php：お問い合わせフォームの送信処理画面

// POST送信以外でアクセスされた場合は、入力画面へ戻す
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// 必須項目のname属性を配列にまとめる
$requiredItems = ['name', 'companyName', 'email', 'age', 'message'];

// 必須項目が未入力の場合は、入力画面へ戻す
foreach ($requiredItems as $item) {
    if (!isset($_POST[$item]) || trim($_POST[$item]) === '') {
        header('Location: contact.php');
        exit;
    }
}

// HTMLに表示する文字を安全に変換する関数
function h($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

// POSTで送られてきた入力内容を変数に代入
$name = $_POST['name'];
$companyName = $_POST['companyName'];

// メールアドレスから改行コードを削除して不正なヘッダー挿入を防ぐ
$email = str_replace(["\r", "\n"], '', $_POST['email']);

$age = $_POST['age'];
$message = $_POST['message'];

// 画面に表示する送信結果メッセージ用の変数
$resultMessage = '';

// メールアドレスの形式を確認する
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $resultMessage = 'メールアドレスの形式が正しくありません。';
} else {
    // 送信先メールアドレス
    $to = 'sample@example.com';

    // メールの件名
    $subject = 'お問い合わせフォームから送信がありました';

    // メール本文を作成
    $body = "お問い合わせ内容\n\n";
    $body .= "お名前: " . $name . "\n";
    $body .= "会社名: " . $companyName . "\n";
    $body .= "メールアドレス: " . $email . "\n";
    $body .= "年齢: " . $age . "\n";
    $body .= "お問い合わせ内容:\n" . $message . "\n";

    // メールヘッダーを作成
    $headers = "From: no-reply@example.com\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // mb_send_mailが使える場合は日本語メール対応で送信
    if (function_exists('mb_send_mail')) {
        mb_language('Japanese');
        mb_internal_encoding('UTF-8');
        $isSent = mb_send_mail($to, $subject, $body, $headers);
    } else {
        // mb_send_mailが使えない場合は通常のmail関数で送信
        $isSent = mail($to, $subject, $body, $headers);
    }

    // メール送信結果に応じて表示メッセージを設定
    if ($isSent) {
        $resultMessage = 'お問い合わせが送信されました。ありがとうございます!';
    } else {
        $resultMessage = 'メール送信に失敗しました。時間をおいて再度お試しください。';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- 文字コードをUTF-8に設定 -->
    <meta charset="UTF-8">

    <!-- ブラウザのタブに表示されるタイトル -->
    <title>お問い合わせフォーム送信完了画面</title>

    <!-- CSSファイルを読み込む -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- 送信結果を表示するメイン部分 -->
    <main class="send-complete">

        <!-- 送信完了画面の見出し -->
        <h1>お問い合わせフォーム送信完了画面</h1>

        <!-- PHP側で作成した送信結果メッセージを表示 -->
        <p><?php echo h($resultMessage); ?></p>

        <!-- お問い合わせフォーム画面へ戻るリンク -->
        <a href="contact.php">お問い合わせフォームに戻る</a>
    </main>
</body>
</html>