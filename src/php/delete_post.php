<?php session_start(); ?>
<?php require 'db.php'; ?>
<?php
$pdo = new PDO($connect,user,pass);
$sql = $pdo->prepare('DELETE from vote_option WHERE post_id = ?');
$sql->execute([$_POST['post_id']]);
$sql = $pdo->prepare('DELETE from post WHERE post_id = ? and user_id = ?');
$sql->execute([$_POST['post_id'],$_SESSION['user']['id']]);
echo 'post deleted';
exit;