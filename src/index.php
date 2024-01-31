<?php session_start(); ?>
<?php unset($_SESSION['user']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

    <h1 class="title" style="position:sticky; margin-bottom: 100px; margin-top: 100px; margin-left: auto; margin-right: auto;">Polls</h1>

    <h1 style="margin-left:auto; margin-right:auto" >未完成</h1>

    <p>テスト閲覧/投稿用アカウント</p>
        <p>メールアドレス：polls.com</p>
        <p>パスワード：12345</p>

    <div class="floating_shadow" style="background-color: white; margin-left: auto; margin-right: auto; text-align: center; width:50vh; height:50vh; margin-top:auto; margin-bottom: auto;">
        <p style="font-size:large; margin-top: 32px;">ようこそ</p>

        <button onclick="location.href='login.php'" class="button_default" style="background-color: deepskyblue;">ログイン</button>
        <br>
        <button onclick="location.href='signin.php'"class="button_default" style="background-color: deeppink;">新規登録</button>
        <br>
        <button onclick="location.href='posts.php'" class="button_default" style="background-color: gray;">スキップ</button>
    </div>
    
</body>
</html>