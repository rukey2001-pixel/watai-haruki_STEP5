// HTMLの読み込みが完了してからJavaScriptを実行する
document.addEventListener('DOMContentLoaded', function () {
    // お問い合わせフォームを取得する
    var contactForm = document.getElementById('contactForm');

    // フォームが存在する場合のみ、送信時の処理を設定する
    if (contactForm !== null) {
        contactForm.addEventListener('submit', function (event) {
            // 入力された値を取得する
            var name = document.getElementById('name').value;
            var companyName = document.getElementById('companyName').value;
            var email = document.getElementById('email').value;
            var age = document.getElementById('age').value;
            var message = document.getElementById('message').value;

            // 未入力の項目があるか確認する
            if (
                name.trim() === '' ||
                companyName.trim() === '' ||
                email.trim() === '' ||
                age.trim() === '' ||
                message.trim() === ''
            ) {
                // 未入力がある場合はアラートを表示する
                alert('必須項目が未入力です。入力内容をご確認ください。');

                // フォーム送信を中止する
                event.preventDefault();
                return;
            }

            // 確認ダイアログに表示する文章を作成する
            var confirmMessage = '下記の内容を本当に送信しますか？\n\n';
            confirmMessage += 'お名前 ➡️ ' + name + '\n';
            confirmMessage += '会社名 ➡️ ' + companyName + '\n';
            confirmMessage += 'メールアドレス ➡️ ' + email + '\n';
            confirmMessage += '年齢 ➡️ ' + age + '\n';
            confirmMessage += 'お問い合わせ内容 ➡️ ' + message;

            // 入力内容の確認ダイアログを表示する
            var result = confirm(confirmMessage);

            // キャンセルが押された場合は送信を中止する
            if (result === false) {
                event.preventDefault();
            }
        });
    }

    // footerの背景色を変更するボタンを取得する
    var colorButton = document.querySelector('#colorButton');

    // 背景色を変更するfooter要素を取得する
    var footer = document.querySelector('footer');

    // ボタンとfooterが存在する場合のみ、クリック時の処理を設定する
    if (colorButton !== null && footer !== null) {
        // 背景色を変更する順番を配列で用意する
        var colors = ['blue', 'red', 'yellow', 'gray'];

        // 現在の色の位置を管理する変数
        var currentIndex = 0;

        // ボタンがクリックされた時の処理
        colorButton.addEventListener('click', function () {
            // footerの背景色を現在の配列の色に変更する
            footer.style.backgroundColor = colors[currentIndex];

            // 次の色に進める。最後まで行ったら最初に戻る
            currentIndex = (currentIndex + 1) % colors.length;
        });
    }
});