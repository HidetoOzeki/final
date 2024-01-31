<?php session_start(); ?>
<?php require 'db.php'; ?>
<?php require 'general.php'; ?>
<?php
$pdo = new PDO($connect,user,pass);
$sql = $pdo->prepare('select * from vote WHERE post_id = ? and user_id = ?');
$sql->execute([$_POST['post_id'],$_SESSION['user']['id']]);

$data = $sql->fetchAll();

if(empty($data)){
    $sql = $pdo->prepare('INSERT INTO vote(post_id,user_id,vote_number) values(?,?,?)');
    $sql->execute([$_POST['post_id'],$_SESSION['user']['id'],$_POST['selected_option']]);
}else {
    $sql = $pdo->prepare('update vote set vote_number = ? where post_id = ? and user_id = ?');
    $sql->execute([$_POST['selected_option'],$_POST['post_id'],$_SESSION['user']['id']]);
}
echo showpost($connect,"","");
exit;