<?php
session_start();
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    // 「フォームの送信時に」エラーをチェックする
    if ($post['name'] === '') {
        $error['name'] = 'blank';
    }
    if ($post['mail'] === '') {
        $error['mail'] = 'blank';
    } else if (!filter_var($post['mail'], FILTER_VALIDATE_EMAIL)) {
        $error['mail'] = 'mail';
    }
    if ($post['age'] === '') {
        $error['age'] = 'blank';
    }
    if ($post['occupation'] === '') {
        $error['occupation'] = 'blank';
    }
    if ($post['satisfaction'] === '') {
        $error['satisfaction'] = 'blank';
    }
    if ($post['fullness'] === '') {
        $error['fullness'] = 'blank';
    }
    if ($post['comprehension'] === '') {
        $error['comprehension'] = 'blank';
    }
    if ($post['next'] === '') {
        $error['next'] = 'blank';
    }
    if (count($error) === 0) {
        // エラーがなければ確認画面に移動
        $_SESSION['form'] = $post;
        header('Location: read.php');
        exit();
    }
} else {
    if (isset($_SESSION['form'])) {
        $post = $_SESSION['form'];
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='style.css'>
    <title>Document</title>
</head>
<body>
    <h2 class="back-ground">G'Sアカデミーアンケート</h2>
    <form action="" method="POST" novalidate>
        <div>
            <p class="title">お名前</p>
            <input type="text" name="name" id="inputName" class="form" value="<?php echo htmlspecialchars($post['name']); ?>">
            <?php if ($error["name"] === "blank"): ?>
                <p class="error_msg">※必須入力項目です</p>
            <?php endif; ?>
        </div>
        
        <div>
            <p class="title">メールアドレス</p>
            <input type="text" name="mail" class="form" value="<?php echo htmlspecialchars($post['mail']); ?>">
            <?php if ($error["mail"] === "blank"): ?>
                <p class="error_msg">※必須入力項目です</p>
            <?php endif; ?>
            <?php if ($error["mail"] === "mail"): ?>
                <p class="error_msg">※メールアドレスを正しく入力してください</p>
            <?php endif; ?>
        </div>
        
        <div>
            <p class="title">年齢</p>
            <input type="text" name="age" class="form" value="<?php echo htmlspecialchars($post['age']); ?>">
            <?php if ($error["age"] === "blank"): ?>
                <p class="error_msg">※必須入力項目です</p>
            <?php endif; ?>
        </div>
       
        <div>
            <p class="title">職業</p>
            <select type="text" name="occupation" class="form" value="<?php echo htmlspecialchars($post['occupation']); ?>">
                <option value = ""></option>
                <option value = "会社員（IT系）">会社員（IT系）</option>
                <option value = "会社員（IT系以外">会社員（IT系以外</option>
                <option value = "公務員">公務員</option>
                <option value = "パート・アルバイト">パート・アルバイト</option>
                <option value = "無職">無職</option>
            </select>
            <?php if ($error["occupation"] === "blank"): ?>
                <p class="error_msg">※必須入力項目です</p>
            <?php endif; ?>
        </div>
    
        <div>
            <p class="title">授業の満足度を教えてください</p>
            <select type="text" name="satisfaction" class="form" value="<?php echo htmlspecialchars($post['satisfaction']); ?>">
            <option value = ""></option>
                <option value = "とても満足している">とても満足している</option>
                <option value = "まあまあ満足している">まあまあ満足している</option>
                <option value = "ふつう">ふつう</option>
                <option value = "あまり満足していない">あまり満足していない</option>
                <option value = "全く満足していない">全く満足していない</option>
            </select>
            <?php if ($error["satisfaction"] === "blank"): ?>
                <p class="error_msg">※必須入力項目です</p>
            <?php endif; ?>
        </div>
        
        <div>
            <p class="title">コミュニティの充実度を教えてください</p>
            <select type="text" name="fullness" class="form" value="<?php echo htmlspecialchars($post['fullness']); ?>">
                <option value = ""></option>
                <option value = "とても充実している">とても充実している</option>
                <option value = "まあまあ充実している">まあまあ充実している</option>
                <option value = "ふつう">ふつう</option>
                <option value = "あまり充実していない">あまり充実していない</option>
                <option value = "全く充実していない">全く充実していない</option>
            </select>
            <?php if ($error["fullness"] === "blank"): ?>
                <p class="error_msg">※必須入力項目です</p>
            <?php endif; ?>
        </div>
        
        
        <div>
            <p class="title">プログラミングの理解度を教えてください</p>
            <select type="text" name="comprehension" class="form" value="<?php echo htmlspecialchars($post['comprehension']); ?>">
                <option value = ""></option>
                <option value = "よく理解できている">よく理解できている</option>
                <option value = "まあまあ理解できている">まあまあ理解できている</option>
                <option value = "どちらとも言えない">どちらとも言えない</option>
                <option value = "あまり理解できていない">あまり理解できていない</option>
                <option value = "全く理解できていない">全く理解できていない</option>
            </select>
            <?php if ($error["comprehension"] === 'blank'): ?>
                <p class="error_msg">※必須入力項目です</p>
            <?php endif; ?>
        </div>
        
        <div>
            <p class="title">卒業後の希望進路を教えてください。</p>
            <select type="text" name="next" class="form" value="<?php echo htmlspecialchars($post['next']); ?>">
                <option value = ""></option>
                <option value = "起業したい">起業したい</option>
                <option value = "エンジニアに転職したい">エンジニアに転職したい</option>
                <option value = "IT系の企業に転職したい">IT系の企業に転職したい</option>
                <option value = "現在の仕事を続ける">現在の仕事を続ける</option>
                <option value = "考え中">考え中</option>
                <option value = "その他">その他</option>
                </select>
            <?php if ($error["next"] === "blank"): ?>
                <p class="error_msg">※必須入力項目です</p>
            <?php endif; ?>
        </div>
        
        <div>
            <p class="title">ご意見</p>
            <textarea type="text" name="free" id="content" cols="50" rows="15" value="<?php echo htmlspecialchars($post['free']); ?>"></textarea>
            <br />
            <input type="submit" value="送信">
        </div>
        
    </form>
</body>
</html>