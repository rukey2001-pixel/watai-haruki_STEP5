<?php
// contact.php：お問い合わせフォーム画面
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- 文字コードをUTF-8に設定 -->
    <meta charset="UTF-8">

    <!-- ブラウザのタブに表示されるタイトル -->
    <title>お問い合わせフォーム</title>

    <!-- CSSファイルを読み込む -->
    <link rel="stylesheet" href="style.css">

    <!-- JavaScriptファイルを読み込む。deferでHTML読み込み後に実行 -->
    <script src="style.js" defer></script>
</head>
<body>
    <!-- ページ上部の見出し部分 -->
    <header>
        <h2>お問い合わせフォーム</h2>
    </header>

    <!-- sidebarとメインフォームをまとめる親要素 -->
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
            <!-- 入力内容をconfirm.phpへPOST送信するフォーム -->
            <form id="contactForm" action="confirm.php" method="post">

                <!-- 入力フォームを表形式で表示 -->
                <table class="form-table">
                    <tr>
                        <th>お名前</th>
                        <td>
                            <input type="text" id="name" name="name" size="40">
                        </td>
                    </tr>

                    <tr>
                        <th>会社名</th>
                        <td>
                            <input type="text" id="companyName" name="companyName" size="40">
                        </td>
                    </tr>

                    <tr>
                        <th>メールアドレス</th>
                        <td>
                            <input type="text" id="email" name="email" size="40">
                        </td>
                    </tr>

                    <tr>
                        <th>年齢</th>
                        <td>
                            <input type="text" id="age" name="age" size="40">
                        </td>
                    </tr>

                    <tr>
                        <th>お問い合わせ内容</th>
                        <td>
                            <textarea id="message" name="message" cols="40" rows="6" placeholder="お問い合わせ内容"></textarea>
                        </td>
                    </tr>
                </table>

                <!-- フォームを送信するボタン -->
                <input type="submit" value="送信">
            </form>
        </main>
    </div>

    <!-- ページ下部のfooter部分 -->
    <footer>
        <p>横のボタンを押すとfooterの背景色が変わります。</p>

        <!-- JavaScriptでfooterの背景色を変更するためのボタン -->
        <button type="button" id="colorButton">押してみてね!</button>
    </footer>
</body>
</html>