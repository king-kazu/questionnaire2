<?php
session_start();

// 入力画面からのアクセスでなければ、戻す
if (!isset($_SESSION['form'])) {
    header('Location: index.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = <<<EOT
    お名前: {$post['name']}      
    メールアドレス: {$post['mail']}      
    年齢: {$post['age']}    
    職業: {$post['occupation']}
    授業の満足度を教えてください: {$post['satisfaction']}
    コミュニティの充実度を教えてください: {$post['fullness']}
    プログラミングの理解度を教えてください: {$post['comprehension']}   
    卒業後の希望進路を教えてください: {$post['next']}
    ご意見: {$post['free']}
EOT;
    unset($_SESSION['form']);
    header('Location: confirm.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問合せフォーム</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- お問合せフォーム画面 -->
    <h2>アンケート内容確認画面</h2>
    <div class="container">
        <form action="" method="POST">
            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="inputName" class="title">お名前</label>
                    </div>
                    <div class="col-9">
                        <p class="display_item"><?php echo htmlspecialchars($post['name']); ?></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="inputEmail" class="title">メールアドレス</label>
                    </div>
                    <div class="col-9">
                        <p class="display_item"><?php echo htmlspecialchars($post['mail']); ?></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="inputContent" class="title">年齢</label>
                    </div>
                    <div class="col-9">
                        <p class="display_item"><?php echo nl2br(htmlspecialchars($post['age'])); ?></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="inputContent" class="title">職業</label>
                    </div>
                    <div class="col-9">
                        <p class="display_item"><?php echo nl2br(htmlspecialchars($post['occupation'])); ?></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="inputContent" class="title">授業の満足度</label>
                    </div>
                    <div class="col-9">
                        <p class="display_item"><?php echo nl2br(htmlspecialchars($post['satisfaction'])); ?></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="inputContent" class="title">コミュニティの充実度</label>
                    </div>
                    <div class="col-9">
                        <p class="display_item"><?php echo nl2br(htmlspecialchars($post['fullness'])); ?></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="inputContent" class="title">授業の理解度</label>
                    </div>
                    <div class="col-9">
                        <p class="display_item"><?php echo nl2br(htmlspecialchars($post['comprehension'])); ?></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="inputContent" class="title">卒業後の進路</label>
                    </div>
                    <div class="col-9">
                        <p class="display_item"><?php echo nl2br(htmlspecialchars($post['next'])); ?></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="inputContent" class="title">ご意見</label>
                    </div>
                    <div class="col-9">
                        <p class="display_item"><?php echo nl2br(htmlspecialchars($post['free'])); ?></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-9 offset-3">
                    <a href="index.php">戻る</a>
                    <button type="submit">送信する</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>


