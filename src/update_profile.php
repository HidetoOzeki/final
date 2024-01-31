<?php session_start(); ?>
<?php require 'php/db.php'; ?>
<?php
$pdo = new PDO($connect,user,pass);
$sql = $pdo->prepare('update user set user_alias = ?, user_password = ?, user_biography = ? where user_id = ?');
$sql->execute([$_POST['alias'],$_POST['password'],$_POST['user_biography'],$_SESSION['user']['id']]);
$_SESSION['user']['alias'] = $_POST['alias'];
$_SESSION['user']['password'] = $_POST['password'];
exit;