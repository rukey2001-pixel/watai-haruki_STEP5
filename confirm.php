<?php
// confirm.php：お問い合わせフォームの確認画面

// POST送信以外でアクセスされた場合は、入力画面へ戻す
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// 必須項目のname属性を配列にまとめる
$requiredItems = ['name', 'companyName', 'email', 'age', 'message'];

// 必須項目が未入力かどうかを確認する
foreach ($requiredItems as $item) {
    if (!isset($_POST[$item]) || trim($_POST[$item]) === '') {
        echo "<script>
                alert('必須項目が未入力です。入力内容をご確認ください。');
                location.href = 'contact.php';
            </script>";
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
$email = $_POST['email'];
$age = $_POST['age'];
$message = $_POST['message'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- 文字コードをUTF-8に設定 -->
    <meta charset="UTF-8">

    <!-- ブラウザのタブに表示されるタイトル -->
    <title>お問い合わせフォーム・確認画面</title>

    <!-- CSSファイルを読み込む -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- ページ上部の見出し部分 -->
    <header>
        <h2>お問い合わせフォーム・確認画面</h2>
    </header>

    <!-- sidebarと確認内容をまとめる親要素 -->
    <div class="container">

        <!-- サイドバー部分 -->
        <aside class="sidebar">
            <ul>
                <!-- sidebar内のリンク一覧 -->
                <li><a href="#">トップページ</a></li>
                <li><a href="#">人気投稿</a></li>
                <li><a href="#">エンジニアおすすめ商品</a></li>
                <li><a href="#">エンジニアおすすめ記事</a></li>
                <li><a href="#">投稿ページ</a></li>
            </ul>
        </aside>

        <!-- メインコンテンツ部分 -->
        <main>
            <!-- 確認した内容をsend.phpへPOST送信するフォーム -->
            <form action="send.php" method="post">

                <!-- 入力内容を表形式で表示 -->
                <table class="form-table">
                    <tr>
                        <th>お名前</th>
                        <td><?php echo h($name); ?></td>
                    </tr>
                    <tr>
                        <th>会社名</th>
                        <td><?php echo h($companyName); ?></td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td><?php echo h($email); ?></td>
                    </tr>
                    <tr>
                        <th>年齢</th>
                        <td><?php echo h($age); ?></td>
                    </tr>
                    <tr>
                        <th>お問い合わせ内容</th>
                        <td><?php echo h($message); ?></td>
                    </tr>
                    </table>

                <!-- 表示した入力内容をsend.phpへ引き継ぐためのhiddenフィールド -->
                <input type="hidden" name="name" value="<?php echo h($name); ?>">
                <input type="hidden" name="companyName" value="<?php echo h($companyName); ?>">
                <input type="hidden" name="email" value="<?php echo h($email); ?>">
                <input type="hidden" name="age" value="<?php echo h($age); ?>">
                <input type="hidden" name="message" value="<?php echo h($message); ?>">

                <!-- 戻るボタンと送信ボタンをまとめる -->
                <div class="button-area">
                    <!-- 前の入力画面へ戻るボタン -->
                    <input type="button" value="戻る" onclick="history.back()">

                    <!-- send.phpへ送信するボタン -->
                    <input type="submit" value="送信">
                </div>
            </form>
        </main>
    </div>
</body>
</html>