<?php session_start(); ?>
<?php require 'php/db.php'; ?>
<?php require 'php/header.php';?>

<?php

$mailaddress = $_POST['mailaddress'];
$password = $_POST['password'];

$pdo = new PDO($connect,user,pass);

$sql = $pdo->prepare('SELECT * FROM user WHERE mail_address = ? and user_password = ?');
$sql->execute([$mailaddress,$password]);
$result = $sql->fetchAll();
$success = 0;
if(empty($result)){
    echo "ログインできませんでした";
}else{
    unset($_SESSION['user']);
    $_SESSION['user'] = [
        'id'=>$result[0]['user_id'],
        'alias'=>$result[0]['user_alias'],
        'mailaddress'=>$result[0]['mail_address'],
        'password'=>$result[0]['user_password'],
        'profile_image_path'=>$result[0]['profile_image_path']
    ];

    echo 'ようこそ、',$_SESSION['user']['alias'],'さん';
    $success = 1;
}

echo "<br>";

?>
<?php if($success==1) :?>
    <button onclick="location.href='posts.php'" class="button is-info">GO</button>
<?php else: ?>
    <button onclick="location.href='login.php'" class="button is-info">ログイン</button>
<?php endif; ?>

<?php require 'php/footer.php';?>