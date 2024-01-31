<?php session_start(); ?>
<?php require 'php/db.php'; ?>
<?php require 'php/header.php';?>

<?php

$alias = $_POST['alias'];
$mailaddress = $_POST['mailaddress'];
$password = $_POST['password'];

$pdo = new PDO($connect,user,pass);

$sql = $pdo->prepare('SELECT * FROM user WHERE mail_address = ?');
$sql->execute([$mailaddress]);
$result = $sql->fetchAll();
$defaultimages = array("user1.png","user2.png","user3.png");
$rindex = rand(1,count($defaultimages));
$success = 0;
if(empty($result)){
    unset($_SESSION['user']);
    $query = $pdo->prepare('INSERT INTO user(user_alias,mail_address,user_password,profile_image_path) VALUES(?,?,?,?)');
    $query->execute([$alias,$mailaddress,$password,$defaultimages[$rindex]]);
    echo '新規登録が完了しました、ようこそ、',$alias,'さん';
    $success = 1;
}else{
    echo 'メールアドレスが既に登録されています';
}

echo "<br>";

?>
<?php if($success==1) :?>
    <button onclick="location.href='login.php'" class="button is-info">ログイン</button>
<?php else: ?>
    <button onclick="location.href='signin.php'" class="button is-info">戻る</button>
<?php endif; ?>

<?php require 'php/footer.php';?>